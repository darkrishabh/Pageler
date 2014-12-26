<?php
/**
 * Created by PhpStorm.
 * User: rishabh
 * Date: 12/21/14
 * Time: 6:25 PM
 */

class api extends Controller {

    function __construct()
    {
        parent::__construct();
        $this->response=array(
            "response" => array(
                "status"    => "200",
                "message"   => "Ok",
                "error"     => null,
                "data"      => null,
                "user"      => array(
                    "userEmail" =>  "",
                    "userID"    =>  ""
                )
            )
        );

        $this->type = "json";

        if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){
            $this->type=$_REQUEST['type'];
        }

        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->userID = null;
    }

    /**
     * Method to Validate the User connection
     */
    function validate(){
        $api_key = $_SERVER['HTTP_X_API_KEY'];
        if($userInfo = $this->model->isAuth($api_key)) {
            $this->response['response']['user']['userEmail'] = $userInfo[0]['userEmail'];
            $this->response['response']['user']['userID'] = $userInfo[0]['userID'];
            $this->userID = $userInfo[0]['userEmail'];
            return true;
        }
        $this->response['response']['status'] = "403";
        $this->response['response']['message'] = "Wrong API Key";
        $this->response['response']['error'] = "Forbidden Access, valid API key required";
        echo json_encode($this->response);
        exit;

    }

    function index(){
        /**
         * Not found methods are directed here.
         */
    }

    function pages(){
        // check if request is valid
        $this->validate();
        //based on the request method execute the process
        switch($this->method){
            CASE "GET":
                @http_response_code(200);
                    $this->response['response']['data'] = $this->model->getList($this->userID);
                break;
            CASE "POST":
                if(!isset($_REQUEST['pageName'])){
                    @http_response_code(422);
                    $this->response['response']['status'] = "422";
                    $this->response['response']['message'] = "Wrong Request Data";
                    $this->response['response']['error'] = "POST data sent was not processed.";
                }
                else{
                    if($insertID = $this->model->addPage($this->userID, $_REQUEST)) {
                        $this->response['response']['data'] = array(
                            "success"   => true,
                            "InsertID"  => $insertID,
                            "message"   => "Page Successfully Inserted"
                        );
                    }
                    else{
                        $this->response['response']['data'] = array(
                            "success"   => false,
                            "Reason"  => "Internal Error.",
                            "message"   => "Could not process the data. Contact Customer Support."
                        );
                    }
                }
                break;
        }
        //create the response.

        APIResponse::sendResponse($this->response, $this->type);
    }
    /**
     * @param null $id
     */
    function page($id){
        // check if request is valid
        $this->validate();
        //based on the request method execute the process
        //Check if Page exists or You are the owner.
        if(sizeof($this->model->fetchOnePage($this->userID, $id)) == 0){
            if($this->model->notYours($this->userID, $id)){
                $this->response['response']['data'] = array(
                    "success"   => false,
                    "message"   => "Failed to Delete the Page"
                );
                @http_response_code(403);
                $this->response['response']['status'] = "403";
                $this->response['response']['message'] = "Forbidden Content";
                $this->response['response']['error'] = "You don't have access to this content.";
            }
            else {
                $this->response['response']['data'] = array(
                    "success" => false,
                    "message" => "Failed to Delete the Page"
                );

                @http_response_code(404);
                $this->response['response']['status'] = "404";
                $this->response['response']['message'] = "Content Not Found";
                $this->response['response']['error'] = "Content not Found";
            }
        } else {

            switch ($this->method) {
                CASE "GET":
                    $this->response['response']['data'] = $this->model->fetchOnePage($this->userID, $id);
                    break;
                CASE "PUT":
                    $x = explode('=',file_get_contents("php://input"));
                    $data[$x[0]]= $x[1];

                    $this->model->updatePage($this->userID, $id, $data);
                    $this->response['response']['data'] = array(
                        "success" => true,
                        "message" => "Page Successfully Updated"
                    );
                    break;
                CASE "DELETE":
                     if ($this->model->deletePage($this->userID, $id)) {
                        $this->response['response']['data'] = array(
                            "success" => true,
                            "message" => "Page Successfully Deleted"
                        );
                    } else {
                        $this->response['response']['data'] = array(
                            "success" => false,
                            "message" => "Failed to Delete the Page"
                        );
                        @http_response_code(422);
                        $this->response['response']['status'] = "422";
                        $this->response['response']['message'] = "Wrong Request Data";
                        $this->response['response']['error'] = "POST data sent was not processed.";
                    }
                    break;
            }
        }
        //create the response.

        APIResponse::sendResponse($this->response, $this->type);
    }
}
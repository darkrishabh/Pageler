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

        $this->responseOject = new APIResponse();

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
        $api_key = (isset($_SERVER['HTTP_X_API_KEY'])) ? $_SERVER['HTTP_X_API_KEY'] : null;
        if($userInfo = $this->model->isAuth($api_key)) {
            $this->responseOject->build_user($userInfo[0]);
            $this->userID = $userInfo[0]['userEmail'];
            return true;
        }
        $this->responseOject->build_error_response(403, WRONG_API_MESSAGE, FORBIDDEN_ERROR);
        $this->responseOject->sendResponse($this->type);
        exit;

    }

    function index(){
        /**
         * Not found methods are directed here.
         */
        echo "blah";
    }

    function pages(){
        // check if request is valid
        $this->validate();

        switch($this->method){
            CASE "GET":
                @http_response_code(200);
                $this->responseOject->build_data($this->model->getList($this->userID));
                break;
            CASE "POST":
                if(!isset($_REQUEST['pageName'])){
                    @http_response_code(422);
                    $this->responseOject->build_error_response(422,
                        "Wrong Request Data", "POST data sent was not processed.");
                }
                else{
                    if($insertID = $this->model->addPage($this->userID, $_REQUEST)) {
                        $this->responseOject->build_data(array(
                            "success"   => true,
                            "InsertID"  => $insertID,
                            "message"   => "Page Successfully Inserted"
                            )
                        );
                    }
                    else{
                        $this->responseOject->build_data(array(
                            "success"   => false,
                            "Reason"  => "Internal Error.",
                            "message"   => "Could not process the data. Contact Customer Support."
                            )
                        );
                    }
                }
                break;
        }
        //create the response.

        $this->responseOject->sendResponse($this->type);
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
                $this->responseOject->build_data( array(
                    "success"   => false,
                    "message"   => "Failed to Find the Page"
                    )
                );
                @http_response_code(403);
                $this->responseOject->build_error_response(403,
                    "Forbidden Content", "You don't have access to this content.");
            }
            else {
                $this->responseOject->build_data( array(
                    "success" => false,
                    "message" => "Failed to Delete the Page"
                    )
                );

                @http_response_code(404);
                $this->responseOject->build_error_response(404,
                    "Content Not Found", "Content Not Found");
            }
        } else {

            switch ($this->method) {
                CASE "GET":
                    $this->responseOject->build_data($this->model->fetchOnePage($this->userID, $id));
                    break;
                CASE "PUT":
                    $x = explode('=',file_get_contents("php://input"));
                    $data[$x[0]]= $x[1];

                    $this->model->updatePage($this->userID, $id, $data);
                    $this->responseOject->build_data( array(
                        "success" => true,
                        "message" => "Page Successfully Updated"
                        )
                    );
                    break;
                CASE "DELETE":
                     if ($this->model->deletePage($this->userID, $id)) {
                         $this->responseOject->build_data( array(
                            "success" => true,
                            "message" => "Page Successfully Deleted"
                            )
                         );
                    } else {
                         $this->responseOject->build_data(array(
                            "success" => false,
                            "message" => "Failed to Delete the Page"
                            )
                         );
                         @http_response_code(422);
                         $this->responseOject->build_error_response(422,
                             "Wrong Request Data", "POST data sent was not processed.");
                    }
                    break;
            }
        }
        //send the response.

        $this->responseOject->sendResponse($this->type);
    }
}
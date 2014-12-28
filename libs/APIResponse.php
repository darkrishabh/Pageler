<?php
/**
 * Created by PhpStorm.
 * User: rishabh
 * Date: 12/21/14
 * Time: 8:04 PM
 */

class APIResponse {

    function __construct(){
        $this->response=array(
            "response" => array(
                "status"    => "200",
                "message"   => "Ok",
                "error"     => null,
                "data"      => null,
                "user"      => null
            )
        );
    }

    function build_error_response($status, $message, $error){
        $this->response['response']['status'] = $status;
        $this->response['response']['message'] = $message;
        $this->response['response']['error'] = $error;
    }

    function build_data($data){
        $this->response['response']['data'] = $data;
    }

    function build_user($user){
        $this->response['response']['user'] = $user;
    }


    /**
     * Method to send the API Response in the desired format
     * @param $response
     * @param $type
     */
    function sendResponse( $type = "json"){
        switch(strtolower($type)){
            CASE "xml":
                require_once 'XML/Serializer.php';

                $options = array(
                    "indent"          => "    ",
                    "linebreak"       => "\n",
                    "typeHints"       => false,
                    "addDecl"         => true,
                    "encoding"        => "UTF-8",
                    "rootName"        => "Pageler:pageler",
                    "rootAttributes"  => array("version" => "0.88"),
                    "defaultTagName"  => "item",
                    "attributesArray" => "_attributes"
                );

                $serializer = new XML_Serializer($options);

                $result = $serializer->serialize($this->response);
                @header('Content-type: application/xml');
                if( $result === true ) {

                    echo $serializer->getSerializedData();

                }
                break;

            default:
                @header('Content-type: application/json');
                echo json_encode($this->response);
                break;

        }
    }

} 
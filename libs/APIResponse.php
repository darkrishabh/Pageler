<?php
/**
 * Created by PhpStorm.
 * User: rishabh
 * Date: 12/21/14
 * Time: 8:04 PM
 */

class APIResponse {
    /**
     * Method to send the API Response in the desired format
     * @param $response
     * @param $type
     */
    static function sendResponse($response, $type = "json"){
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

                $result = $serializer->serialize($response);
                @header('Content-type: application/xml');
                if( $result === true ) {

                    echo $serializer->getSerializedData();

                }
                break;

            default:
                @header('Content-type: application/json');
                echo json_encode($response);
                break;

        }
    }

} 
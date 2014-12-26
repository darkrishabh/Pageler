<?php
/**
 * Created by PhpStorm.
 * User: rishabh
 * Date: 12/21/14
 * Time: 6:55 PM
 */

class api_Model extends Model {


    function __construct()
    {
        parent::__construct();
    }

    function isAuth($api_key){
        $result = $this->db->select('SELECT * FROM user WHERE APIKey = :apikey',
            array('apikey' => $api_key));
        if(sizeof($result)!=1){
            return false;
        }
        else{
            return $result;
        }
    }
    /**
     * Method to get all the Pages of the logged in user.
     * @return Arrray list of all the fetched pages
     */
    function getList($userID){
        return $this->db->select('SELECT * FROM page WHERE userID = :userid',
            array('userid' => $userID));
    }

    /**
     * Fetch only one page
     * @param $userID, $id
     * @return mixed
     */
    function fetchOnePage($userID, $id){
        return $this->db->select('SELECT * FROM page WHERE userID = :userid AND pageID= :pageID LIMIT 1',
            array(
                'userid' => $userID,
                'pageID' => $id
            )
        );
    }

    function addPage($userID,$data){
        try{
            $this->db->insert('page', array(
                'pageName' => $data['pageName'],
                'userID' => $userID,
                'pageData' => isset($data['pageData']) ? $data['pageData'] : "[{}]"
            ));
        } catch(Exception $e){
            return false;
        }
        return $this->db->lastInsertId();
    }

    /**
     * Deletes the Page.
     * @param $userID
     * @param $id - the page ID to be deleted.
     * @return int
     */
    public function deletePage($userID, $id)
    {
        return $this->db->delete('page', "`pageID` = {$id} AND userID = '{$userID}'");
    }

    public function notYours($userID, $id){

            if(sizeof($this->db->select('SELECT * FROM page WHERE userID != :userid AND pageID= :pageID LIMIT 1',
                array(
                    'userid' => $userID,
                    'pageID' => $id
                )
            )) == 1){
                return true;
            }

        return false;
    }

    public function updatePage($userID, $id, $data){
        $postData = array(
            'pageName' => $data['pageName']
        );

        $this->db->update('page', $postData,
            "`pageID` = '{$id}' AND userID = '{$userID}'");
    }
}

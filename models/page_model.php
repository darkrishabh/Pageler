<?php
/**
 * Created by PhpStorm.
 * User: rishabh
 * Date: 12/20/14
 * Time: 10:27 PM
 *
 * For user Sessions
 */

class Page_Model extends Model {

    function __construct()
    {
        parent::__construct();

    }

    /**
     * Method to get all the Pages of the logged in user.
     * @return Arrray list of all the fetched pages
     */
    function getList(){
        return $this->db->select('SELECT * FROM page WHERE userID = :userid',
            array('userid' => $_SESSION['userid']));
    }

    /**
     * Fetch only one page
     * @param $id
     * @return mixed
     */
    function fetchOnePage($id){
        return $this->db->select('SELECT * FROM page WHERE userID = :userid AND pageID= :pageID LIMIT 1',
            array(
                'userid' => $_SESSION['userid'],
                'pageID' => $id
            )
        );
    }

    function addPage($data){
        try{
            $this->db->insert('page', array(
                'pageName' => $data['pageName'],
                'userID' => $_SESSION['userid'],
                'pageData' => INITIAL_PAGE
            ));
        } catch(Exception $e){
            return false;
        }
        return $this->db->lastInsertId();
    }

    /**
     * Deletes the Page.
     * @param $id - the page ID to be deleted.
     * @return bool
     */
    public function delete($id)
    {
        try {
            $this->db->delete('page', "`pageID` = {$id} AND userID = '{$_SESSION['userid']}'");
            $this->db->delete('publish_page', "`pageID` = {$id}");
            return true;
        } catch(Exception $e){
            return false;
        }
    }

    public function updatePage($id, $data){

        try{
            $this->db->update('page', $data,
                "`pageID` = '{$id}' AND userID = '{$_SESSION['userid']}'");
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function publish($id){
        try{
            $hashkey = substr(Hash::create("md5",$id,HASH_GENERAL_KEY),0,8);
            $this->db->insert('publish_page', array(
                'pageID' => $id,
                'pageCode' => $hashkey
            ));
            return $hashkey;
        } catch(Exception $e){
            return false;
        }
    }

    public function unpublish($id){
        try{
            $this->db->delete('publish_page', "`pageID` = {$id}");
            return true;
        } catch(Exception $e){
            return false;
        }
    }

    public function isPublish($id){
        return $this->db->select('SELECT * FROM publish_page WHERE pageID=:pageid LIMIT 1',
            array(
                'pageid' => $id
            )
        );
    }
}
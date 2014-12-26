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
                'pageData' => "{}"
            ));
        } catch(Exception $e){
            return false;
        }
        return $this->db->lastInsertId();
    }

    /**
     * Deletes the Page.
     * @param $id - the page ID to be deleted.
     */
    public function delete($id)
    {
        $this->db->delete('page', "`pageID` = {$id} AND userID = '{$_SESSION['userid']}'");
    }

    public function updatePage($id, $data){
        $postData = array(
            'pageData' => $data['pageData']
        );

        $this->db->update('page', $postData,
            "`pageID` = '{$id}' AND userID = '{$_SESSION['userid']}'");
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: rishabh
 * Date: 12/28/14
 * Time: 7:03 PM
 */

class P_Model extends Model {


    function __construct()
    {
        parent::__construct();
    }

    function fetchData($HashId){
        return $this->db->select('SELECT * FROM page a, publish_page b WHERE a.pageID=b.pageID AND b.pageCode=:hashid LIMIT 1',
            array(
                'hashid' => $HashId
            )
        );
    }

}
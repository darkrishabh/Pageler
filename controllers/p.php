<?php
/**
 * Created by PhpStorm.
 * User: rishabh
 * Date: 12/28/14
 * Time: 6:50 PM
 */

class P extends Controller {

    function __construct()
    {
        parent::__construct();
        Session::init();
    }

    function index(){
        header("Location: ".URL."");
    }

    function view($id){
        if($id == null){
            header("Location: ".URL."");
        } else {
            $this->view->pageValues = $this->model->fetchData($id)[0];
            $this->view->title = $this->view->pageValues['pageName'];
            $this->view->render("p/view");
        }
    }
}
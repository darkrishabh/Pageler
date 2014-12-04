<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->title = 'User Info';

        $this->view->render('error/index');

    }

    /**
     * Method to check if the user exists already and Add if not.
     */
    function check(){
        Session::init();
        if( !($this->model->check(Session::get('userid')))){
            header('Location: '.URL.'index/index/'.USER_NOT_ENTERED);
        }
        else{
            header('Location: '.URL.'dashboard');
        }
    }
}
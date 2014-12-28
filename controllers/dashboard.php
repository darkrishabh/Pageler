<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        Session::init();
        $this->view->js = array('dashboard/js/default.js');
    }
    
    function index() 
    {    
        $this->view->title = 'Dashboard';
        $this->view->render('header');
        $this->view->render('sidebar');
        $user = $this; $user->loadModel("user");

        $this->view->apiKey = $user->model->getAPIKey(Session::get('userid'))['APIKey'];
        $this->view->render('page/index');
        $this->view->render('footer');
    }
    
    function logout()
    {
        Session::destroy();
        header('location: ' . URL .  'login');
        exit;
    }
    


}
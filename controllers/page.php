<?php
/**
 * Created by PhpStorm.
 * User: rishabh
 * Date: 12/20/14
 * Time: 10:25 PM
 */

class Page extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index() {
        $this->view->title = 'Page';
        $this->view->render('header');
        $this->view->render('sidebar');
        $this->view->render('page/index');
        $this->view->render('footer');
    }

    public function view($id) {

        $this->view->pageValues = $this->model->fetchOnePage($id);
        if($this->view->pageValues == NULL){
            @header("Location: ".URL."dashboard");
        }
        $this->view->pageValues = $this->view->pageValues[0];
        $this->view->title = $this->view->pageValues['pageName'];
        $this->view->render('header');
        $this->view->render('sidebar');
        $this->view->render('page/view');
        $this->view->render('footer');
    }

    public function add(){
        if($_POST){

            if(trim($_POST['pageName']) != ""){
                $data = array(
                    "pageName" => $_POST['pageName']
                );
                $isAdded = $this->model->addPage($data);
                echo $isAdded;
            } else echo false;
        }
        echo false;
    }

    public function update($id){
        if($_POST){
            if(trim($_POST['pageData']) != ""){
                $data = array(
                    "pageData" => $_POST['pageData']
                );
                $isUpdated = $this->model->updatePage($id,$data);
                echo $isUpdated;
            } else echo false;
        }
        echo false;

    }
    public function delete($id){

        $this->model->delete($id);

    }

} 
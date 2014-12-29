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
        } else
            echo false;
    }

    public function update($id){
        $data = array();
        $isUpdated = null;
        if($_POST){
            foreach($_POST as $key => $value){
                if(($key == "pageData" || $key=="pageName") && (trim($value) != ""))
                    $data[$key] = $value;
            }
            if(sizeof($data) > 0) {
                try {
                    $isUpdated = $this->model->updatePage($id, $data);
                } catch (Exception $e) {
                    echo "Failed";
                }
            }
            if( $isUpdated ){
                echo "Success";
            }
            else {
                echo "failed";
            }
        } else{
            echo "No Post";
        }


    }
    public function delete($id){
        if( $this->model->delete($id))
            echo "Success";
        else echo "Fail";

    }

    public function publish($id){
      if( $hashkey = $this->model->publish($id))
          echo $hashkey;
        else echo "Fail";

    }
    public function unpublish($id){
        if( $this->model->unpublish($id))
            echo "Success";
        else echo "Fail";

    }

} 
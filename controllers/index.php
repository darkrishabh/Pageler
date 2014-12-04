<?php

class Index extends Controller {

    public $authURL;
    function __construct() {
        parent::__construct();
        Session::init();
        /**
         * Google OAuth2 Login.
         *
         * It's easier to do it here.
         * TODO - Create a separate sub-routine for Google and Also a new controller to add other OAuth Clients
         */

        require_once realpath(dirname(__FILE__) .'/autoload.php');

        $client_id = '662672656244-t4n12p66fdnapm2aqos4ota4vtdsgud2.apps.googleusercontent.com';
        $client_secret = 'PHUQ1Crxvik6lb3D5P0Um3KS';
        $redirect_uri = URL;
        $client = new Google_Client();
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setScopes(array('email','profile'));
        $oauth = new Google_Service_Oauth2($client);


        $this->authURL = $client->createAuthUrl();
        //If Requested to Logout. Kill the Sessions.
        if (isset($_REQUEST['logout'])) {
            Session::destroy();
        }
        //If a code is received from the Google Login, get the access token.
        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            Session::set('access_token', $client->getAccessToken());
        }
        if (isset($_SESSION['access_token']) && Session::get('access_token')) {
            $client->setAccessToken(Session::get('access_token'));
        }
        //If the Token is registered, fetch the user details. And create the sessions
        if ($client->getAccessToken()) {

            $token_data = $client->verifyIdToken()->getAttributes();

            Session::set('access_token', $client->getAccessToken());
            Session::set('loggedIn', true);
            Session::set('userid', $token_data['payload']['email']);
            Session::set('name', $oauth->userinfo->get()->getName());
            Session::set('userpic',$oauth->userinfo->get()->getPicture());
        }
        /**
         * On Logged in Check the user and insert if not existing.
         */
        if (isset($_SESSION["loggedIn"])) {
            if(Session::get('loggedIn')) {

                    header('Location: user/check/');

            }
        }
    }

    /**
     * @param mixed $error If any error during the login, the error message will be passed to this and will be shown
     * on the index page
     */
    function index($error = false) {
        if($error){
            $this->error_message = $error;
        }
        $this->view->title = 'Pageler';
        $this->view->authURL = $this->authURL;
        $this->view->render('index/index');

    }



    
}
<?php

class Index extends Controller {

    public $authURL;
    function __construct() {
        parent::__construct();
        Session::init();
        /**
         * Google OAuth2 Login.
         *
         */
        if (isset($_SESSION["loggedIn"]) && !isset($_REQUEST['logout'])) {
            if (Session::get('loggedIn')) {

                header('Location: user/check/');

            }
        }
        try {
            require_once realpath(dirname(__FILE__) . '/autoload.php');
            $client_id = GOOGLE_CLIENT_ID;
            $client_secret = GOOGLE_CLIENT_SECRET;
            $redirect_uri = URL;
            $client = new Google_Client();
            $client->setClientId($client_id);
            $client->setClientSecret($client_secret);
            $client->setRedirectUri($redirect_uri);
            $client->setScopes(array('email', 'profile'));
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
                Session::set('userpic', $oauth->userinfo->get()->getPicture());
            }
            /**
             * On Logged in Check the user and insert if not existing.
             */
            if (isset($_SESSION["loggedIn"])) {
                if (Session::get('loggedIn')) {

                    header('Location: user/check/');

                }
            }
        }catch(Exception $e){

        }
    }

    /**
     * @param mixed $error If any error during the login, the error message will be passed to this and will be shown
     * on the index page
     */
    function index($error = false) {
        if($error){
            $this->view->error_message = $error;
        }
        $this->view->title = SITE_TITLE;
        $this->view->authURL = $this->authURL;
        $this->view->render('index/index');

    }



    
}
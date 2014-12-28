<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This method checks if the user exists in the DB and if not it will create a new user.
     * @param $userEmail The Email ID of the signed in user.
     * @return bool Returns true if the user already exists or new user is created.
     */
    function check($userEmail){

        $sth = $this->db->prepare("SELECT * FROM user WHERE userEmail = :userEmail");
        $sth->execute(array(
            ':userEmail' => $userEmail
        ));

        $count =  $sth->rowCount();
        if ($count == 0) {
            // Insert the User
            if($this->create($userEmail))
            {
                return true;
            }
            else{
                return false;
            }
        } else {
            return true;
        }
    }

    /**
     * Method to create a new user.
     * @param $userEmail Email of the User
     * @return bool Returns true if user is successfully created.
     */
    function create($userEmail){

        try {

             $this->db->insert('user', array(
                'userID' => NULL,
                'userEmail' => $userEmail,
                'APIKey' => Hash::create('sha256', substr(sha1(rand()), 0, 30), HASH_PASSWORD_KEY)
            ));

        }catch(Exception $e){

            return false;
        }
        return true;

    }

    function getAPIKey($userEmail){
        return $this->db->select('SELECT APIKey FROM user WHERE userEmail = :userid',
            array('userid' => $userEmail))[0];
    }

}
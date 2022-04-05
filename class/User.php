<?php

class User{
    private $db;

    //Autommiti call __construct function when object is created of this class
    public function __construct()
    {
        $this->db = new Database();
    }

    //Checking if user profilecreated.
    public function checkUserProfile()
    {
        // Getting currently loged in user id from session
        $user_id = SessionUser::getUser('user_id');

        $query = "SELECT * FROM profiles WHERE user_id='$user_id'";

        $result = $this->db->select($query);

        if($result != false)
        {
            return true;
        }else{
            return false;
        }
    }
}
<?php

class Login{
    private $db;

    //Autommiti call __construct function when object is created of this class
    public function __construct()
    {
        $this->db = new Database();
    }

    
    /*
    * User Login Function & Session Create
    * array type $data variable
    */
    public function userLogin($data){
        $userName = mysqli_real_escape_string($this->db->link, $data['user_name']); // From login input field
        $passWord = mysqli_real_escape_string($this->db->link, $data['user_password']); // From login input field
        
        if($userName == "" || $passWord == "")
        {
            $msg = "
            <div class='alert alert-danger text-center'>
                Username or password can not be empty!
            </div>";
            return $msg;
        }

        $passWord = md5($passWord);
        
        $query = "SELECT * FROM users WHERE user_name='$userName' AND password = '$passWord'";

        $result = $this->db->select($query);

        if($result != false)
        {
            $userValue = $result->fetch_assoc(); // converting to associative array

            //SESSION SET FOR LOGGED IN USER
            SessionUser::setUser('userLogin', true);
            SessionUser::setUser('user_id', $userValue['id']);
            SessionUser::setUser('user_fName', $userValue['first_name']);
            SessionUser::setUser('user_lName', $userValue['last_name']);
            SessionUser::setUser('user_email', $userValue['email']);

            $user_id = SessionUser::getUser('user_id');
            $profileQuery = "SELECT * FROM profiles WHERE user_id = '$user_id'";
            $profileResult = $this->db->select($profileQuery);

            if($profileResult != false){
                $profileData = $profileResult->fetch_assoc(); // converting to associative array
                
                SessionUser::setUser('user_phone', $profileData['phone']);
                SessionUser::setUser('user_address',$profileData['address']);
                SessionUser::setUser('user_about', $profileData['about']);
            }
            //Redirecting to dashboard after login and session set
            header("Location: dashboard.php");
        }else{
            $msg = "
            <div class='alert alert-danger text-center'>
                Username or password not found in our database!
            </div>";
            return $msg;
        }
    }
}

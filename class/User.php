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

    //Creating logged in user's profile
    public function createUserProfile($data)
    {
        $phone = mysqli_real_escape_string($this->db->link, $data['user_phone']);
        $address = mysqli_real_escape_string($this->db->link, $data['user_address']);
        $about = mysqli_real_escape_string($this->db->link, $data['user_about']);

        // Getting currently loged in user id from session
        $user_id = SessionUser::getUser('user_id');

        $query = "SELECT * FROM profiles WHERE user_id='$user_id'";

        $result = $this->db->select($query);

        if($result == false)
        {
            $query = "INSERT INTO profiles (`user_id`, `phone`, `about`, `address`)
                      VALUES ('$user_id', '$phone', '$address', '$about')
            ";

            $result = $this->db->insert($query);

            if($result){
                $msg = "
                    <div class='alert alert-success text-center'>
                        Profile created successfully! Please 
                        <a href='dashboard.php'>click here</a> for dashboard view.
                    </div>";
            return $msg;
            }else{
                $msg = "
                    <div class='alert alert-danger text-center'>
                        Unable to creating profile!
                    </div>";
                return $msg;
            }
        }else{
            $msg = "
                <div class='alert alert-danger text-center'>
                    Unable to creating profile!
                </div>";
            return $msg;
        }
    }
}
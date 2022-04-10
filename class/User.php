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

    //Getting logged in user's profile
    public function getProfile()
    {
        $user_id = SessionUser::getUser('user_id');

        $query = "SELECT * FROM profiles WHERE user_id = '$user_id'";
        $result = $this->db->select($query);

        return $result; 
    }

    //Update Logged in user's profile
    public function updateProfile($data)
    {
        $user_id = SessionUser::getUser('user_id');

        $query = "SELECT * FROM profiles WHERE user_id = '$user_id'";
        $result = $this->db->select($query);

        if($result != false){
            $phone = mysqli_real_escape_string($this->db->link, $data['user_phone']);
            $address = mysqli_real_escape_string($this->db->link, $data['user_address']);
            $about = mysqli_real_escape_string($this->db->link, $data['user_about']);

            $updateQuery = "UPDATE profiles
                      SET
                      `phone` = '$phone',
                      `address` = '$address',
                      `about` = '$about'
                      WHERE `user_id` = '$user_id'
                    ";
            $updatedResult = $this->db->update($updateQuery);

            if($updatedResult)
            {
                $msg = "
                    <div class='alert alert-success text-center'>
                        Profile updated successfully!
                    </div>";
                return $msg;
            }else{
                $msg = "
                    <div class='alert alert-danger text-center'>
                        Unable to update profile!
                    </div>";
                return $msg;
            }
        }else{
            $msg = "
                <div class='alert alert-danger text-center'>
                    Profile not found!
                </div>";
            return $msg;
        }
    }

    //Update logged in user's password
    public function updatePassword($data)
    {
        $user_id = SessionUser::getUser('user_id');
        $old_password = $data['user_old_password'];
        $new_password = $data['user_new_password'];
        $confirm_password = $data['user_confirm_new_password'];
        
        if( $old_password == "" || $new_password == ""){
            $msg = 'empty_error';
			return $msg;
        }

        if( $new_password != $confirm_password){
            $msg = 'confirm_error';
			return $msg;
        }

        //Verifying old password
        $old_password = md5($old_password);
        $confirm_password = md5($confirm_password);

        $passQuery = "SELECT * FROM users WHERE id = '$user_id' AND password = '$old_password'";
        $passResult = $this->db->select($passQuery);

        if($passResult != false){
            $updateQuery ="UPDATE users
                        SET password='$confirm_password'
                        WHERE id = '$user_id'
                        ";
            $updatedResult = $this->db->update($updateQuery);
            if($updatedResult){
                    $msg = 'success';
                    return $msg;
            }else{
                $msg = 'faild_error';
                return $msg;
            }
        }else{
            $msg = 'not_matched_error';
            return $msg;
        }
    }
}
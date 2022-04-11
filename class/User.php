<?php
// include composer autoload
require 'vendor/autoload.php';
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;


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

    //Uploading new avatar image for logged in user
    /*
    * Array type $avatar (files)
    */
    public function uploadAvatar($avatar)
    {
        //FILE PROCESS
        $image_name = $avatar['user_avatar']['name'];
        $image_size = $avatar['user_avatar']['size'];
        $image_temp = $avatar['user_avatar']['tmp_name'];
        $image_type = $avatar['user_avatar']['type'];

        $allowed = array(
            "jpg"  => "image/jpg", 
            "jpeg" => "image/jpeg",
            "gif"  => "image/gif", 
            "png"  => "image/png"
        );

         //CHECK IF ANY REQUIRED FIELD IS EMPTY OR NOT
         if($image_name == "")
         {
             $msg = "
                     <div class='alert alert-danger mt-3 text-center'>
                         <h4>Avatar field is required!</h4>
                     </div>
                 ";
            return $msg;
         }

         // CHECKING ALOWED OR VAID FILE EXTENTION TYPE
        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed))
        {
            $msg = "
                <div class='alert alert-danger mt-3 text-center'>
                    <h4>Only jpg/jpeg/png/gif file type is allowed!</h4>
                </div>
            ";
            return $msg;
        }

        //CHECKING FILE SIZE
        if($image_size > 1048567)
        {
            $msg = "
                <div class='alert alert-danger mt-3 text-center'>
                    <h4>Image Size should be less then 1MB!</h4>
                </div>
            ";
            return $msg;
        }

        //Generating unique image name
        $imageName = str_shuffle(time()).'.'.$ext; 

        // create an image manager instance with favored driver
        $manager = new ImageManager(['driver' => 'gd']);
        
        // to finally create image instances
        $image = $manager->make($avatar["user_avatar"]["tmp_name"])->resize(200, 200);

        //Checking directory
        $dir = "assets/img/avatars/";
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        //Updating image name in datatabse table
        $user_id = SessionUser::getUser('user_id');

        //chacking logged in user's profile if exit
        $query = "SELECT * FROM profiles WHERE user_id = '$user_id'";
        $result= $this->db->select($query);

        if($result)
        {
            $profileData = $result->fetch_assoc();

            $oldAvatar = $profileData['avatar'];
        }else{
            $msg = "
                     <div class='alert alert-success mt-3 text-center'>
                         <h4>No profile found with your account!</h4>
                     </div>
                 ";
            return $msg;
        }

        $queryUpdate = "UPDATE `profiles`
                  SET 
                  `avatar` = '$imageName'
                  WHERE `user_id` = '$user_id'
        ";

        $updatedResult = $this->db->update($queryUpdate);
        if($updatedResult)
        {
            //Removing old avatar from directory before upload new avatar
            if($oldAvatar != 'default.png')
            {
                if (is_file($dir.$oldAvatar)) {
                    unlink($dir.$oldAvatar);
                }
            }
            //Finally moving the image to directory
            $image->save($dir.$imageName);
            $msg = "
                     <div class='alert alert-success mt-3 text-center'>
                         <h4>Avatar uploaded successfully!</h4>
                     </div>
                 ";
            return $msg;
        }else{
            $msg = "
                     <div class='alert alert-danger mt-3 text-center'>
                         <h4>Unabale to upload avatar!</h4>
                     </div>
                 ";
            return $msg;
        }
    }
}
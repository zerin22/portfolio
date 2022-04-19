<?php 

class Helper{
    private $db;

    //Autommiti call __construct function when object is created of this class
    public function __construct()
    {
        $this->db = new Database();
    }

    // Getting active page
    // public function active(){
	// 	$path = $_SERVER['SCRIPT_FILENAME'];
	// 	$title = basename($path, '.php');
    //     return $title;
    // }

    //Getting page title
    public function title(){
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path, '.php');
		//$title = str_replace('_', ' ', $title);
		if($title == 'dashboard') {
				$title = 'Dashboard';
		}elseif ($title == 'edit_profile') {
				$title = 'Edit Profile';
		}elseif ($title == 'profile') {
				$title = 'User Profile';
		}elseif ($title == 'profile') {
			$title = 'User Profile';
		}elseif ($title == 'blank') {
			$title = 'Blank Page';
		}elseif ($title == 'form') {
				$title = 'Basic Form';
		}elseif ($title == 'table') {
			$title = 'Basic Table';
		}elseif($title == 'update_password'){
			$title = 'Update Password';
		}elseif($title == 'upload_avatar'){
			$title = 'Upload Avatar';
		}elseif($title == 'settings'){
			$title = 'Site Settings';
		}elseif($title == 'education'){
			$title = 'All Educations';
		}
		return $title = ucfirst($title);
	}

    //Getting user avatar
	public function getAvatar($user_id)
	{
		$query = "SELECT * FROM profiles WHERE user_id = '$user_id'";
        $result= $this->db->select($query);

        if($result){
			$userData = $result->fetch_assoc();
			$avatar = $userData['avatar'];
			return $avatar;
		}else{
			$avatar = 'default.png';
			return $avatar;
		}
	}

    //Get site settings
    public function getSetting($key)
    {
        $query = "SELECT * FROM `settings` WHERE `key` = '$key'";
        $result = $this->db->select($query);

        
        if($result)
        {
            $settingData = $result->fetch_assoc();
            $value = $settingData['value'];

            return $value;
        }else{
            return 'NULL';
        }
    }
}
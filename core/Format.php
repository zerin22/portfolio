<?php
/**
* Format Class
*/
class Format{
	public function big_rand( $len = 10 ) {
		$rand   = '';
		while( !( isset( $rand[$len-1] ) ) ) {
			$rand   .= mt_rand( );
		}
		return substr( $rand , 0 , $len );
	}
	
	public function formatDate($date){
		return date('M j, Y g:i a', strtotime($date));
	}
	
	public function formatDateOnly($date){
		return date('M j, Y', strtotime($date));
	}

	public function textShorten($text, $limit = 400){
		$text = $text. " ";
		$text = substr($text, 0, $limit);
		$text = substr($text, 0, strrpos($text, ' '));
		$text = $text.".....";
		return $text;
	}

	public function validation($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

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
		}
		return $title = ucfirst($title);
	}
}
?>
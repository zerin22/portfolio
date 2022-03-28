<?php
/**
*Session Class
**/
class SessionUser{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 public static function setUser($key, $val){
  $_SESSION[$key] = $val;
 }

 public static function getUser($key){
  if (isset($_SESSION[$key])) {
   return $_SESSION[$key];
  } else {
   return false;
  }
 }

 public static function checkUserSession(){
  self::init();
  if (self::getUser("userLogin")== false) {
   self::destroyUser();
   header("Location: index.php");
  }
 }

 public static function checkUserLogin(){
  self::init();
  if (self::getUser("userLogin")== true) {
   header("Location:dashboard.php");
  }
 }
 
 public static function checkLoginForCatPost(){
  self::init();
  if (self::getUser("bloggerlogin")== true) {
   echo '<a href="profile.php" style="color:#d10909;">Post now</a>';
  }else{
	  echo '<a href="login.php" style="color:#d10909;">Login to post</a>';
  }
 }

 public static function destroyUser(){
  session_destroy();
  header("Location:index.php");
 }
}
?>
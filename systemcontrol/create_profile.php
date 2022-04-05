<?php
  include_once('../core/Database.php');
  include_once('../core/SessionUser.php');
  include_once('../class/User.php');
  SessionUser::init();

  $user = new User();

  if($user->checkUserProfile())
  {
    header("Location:dashboard.php");
  }else{
      echo "This Is  Create Profile Form";
  }

?>
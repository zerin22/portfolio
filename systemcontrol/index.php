<?php
  include_once('../core/Database.php'); // For database connection in class files
  include_once('../core/SessionUser.php'); // Creating session and initializing session in all secured files
  SessionUser::init();

  include_once('../class/Login.php');

  $login = new Login();

  SessionUser::checkUserLogin();
  // $userSession = SessionUser::getUser('userLogin');

  // if($userSession == true)
  // {

  // }
  if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['login'])){
		/*
    * Array type $_POST 
    */
	  $userLogin = $login->userLogin($_POST);
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../systemcontrol/assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Portfolio</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Portfolio</h1>
      </div>
      <?php
        if(isset($userLogin))
        {
          echo $userLogin;
        }
      ?>
      <div class="login-box">
        <form class="login-form" action="" method="POST">
          <h3 class="login-head">
            <i class="fa fa-lg fa-fw fa-user"></i>SIGN IN
          </h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" name="user_name" type="text" placeholder="Username">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="user_password" type="password" placeholder="Password">
          </div>
          <div class="form-group btn-container">
            <input type="submit" class="btn btn-primary btn-block" name="login" value="SIGN IN">
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="../systemcontrol/assets/js/jquery-3.3.1.min.js"></script>
    <script src="../systemcontrol/assets/js/popper.min.js"></script>
    <script src="../systemcontrol/assets/js/bootstrap.min.js"></script>
    <script src="../systemcontrol/assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../systemcontrol/assets/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>
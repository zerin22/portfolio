<?php
  include_once('../core/Database.php');
  include_once('../core/SessionUser.php');
  include_once('../class/User.php');
  SessionUser::init();

  $user = new User();

  if($user->checkUserProfile())
  {
    header("Location:dashboard.php");
  }
  SessionUser::checkUserSession();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Blank Page - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../systemcontrol/assets/css/main.css">
    <!--Selectize CSS-->
    <link rel="stylesheet" type="text/css" href="../../systemcontrol/assets/js/plugins/selectize/dist/css/selectize.css">
    <link rel="stylesheet" type="text/css" href="../../systemcontrol/assets/js/plugins/selectize/dist/css/selectize.bootstrap4.css">
    <!-- Data Table CSS-->
    <link rel="stylesheet" type="text/css" href="../../systemcontrol/assets/js/plugins/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../../systemcontrol/assets/js/plugins/datatable/dataTables.bootstrap4.css">
    <!-- Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../systemcontrol/assets/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
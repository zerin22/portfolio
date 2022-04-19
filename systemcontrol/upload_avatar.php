<?php include_once("inc/header.php");?>
<?php
  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['uploadAvatar']))
  {
    $uploadAvatar = $user->uploadAvatar($_FILES);
  }
?>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include_once('inc/navbar.php'); ?>
    <!-- Sidebar menu-->
    <?php include_once('inc/sidebar.php'); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Upload Avatar</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Upload Avatar</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
                    <?php 
                      if(isset($uploadAvatar))
                      {
                          echo $uploadAvatar;
                      }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="userUploadAvatar">Choose Avatar</label>
                            <input class="form-control" name="user_avatar" id="userUploadAvatar" type="file" placeholder="Avatar">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary float-right" name="uploadAvatar" value="Upload">
                        </div>
                    </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <?php include_once('inc/footer.php'); ?>
  </body>
</html>
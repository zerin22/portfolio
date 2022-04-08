<?php include_once('inc/create_profile_header.php');?>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['createProfile']))
    {
      $userProfile = $user->createUserProfile($_POST);
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
          <h1><i class="fa fa-dashboard"></i> Create Profile</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Create Profile</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                          if(isset($userProfile))
                          {
                            echo $userProfile;
                          }
                        ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="userPhone">Phone</label>
                                <input class="form-control" name="user_phone" id="userPhone" type="text" placeholder="Phone">
                            </div>

                            <div class="form-group">
                                <label for="userAddress">Address</label>
                                <input class="form-control" name="user_address" id="userAddress" type="text" placeholder="Address">
                            </div>

                            <div class="form-group">
                                <label for="userAbout">About</label>
                                <textarea class="form-control" name="user_about" id="userAbout" cols="30" rows="5" placeholder="About"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" name="createProfile" value="Create Profile">
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


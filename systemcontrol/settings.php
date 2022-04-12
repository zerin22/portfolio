<?php include_once("inc/header.php");?>
<?php
  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['generalSettings']))
  {
    $siteSettings = $settings->updateGneralSettings($_POST);
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
          <h1><i class="fa fa-dashboard"></i> Site Settings</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Site Settings</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
                    <?php 
                      if(isset($siteSettings))
                      {
                          echo $siteSettings;
                      }
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="siteTitle">Site Title</label>
                            <input class="form-control" name="site_title" id="siteTitle" type="text" placeholder="Site Title" value="<?php echo $helper->getSetting('site_title'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="siteSlogan">Site Slogan</label>
                            <input class="form-control" name="site_slogan" id="siteSlogan" type="text" placeholder="Site Slogan" value="<?php echo $helper->getSetting('site_slogan'); ?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary float-right" name="generalSettings" value="Save">
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
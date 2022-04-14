<?php include_once("inc/header.php");?>
<?php
  //General Settings
  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['generalSettings']))
  {
    $siteSettings = $settings->updateGneralSettings($_POST);
  }

  //Seo Settings
  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['seoSettings']))
  {
    $siteSeoSettings = $settings->updateSeoSettings($_POST);
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
            <h3 class="tile-title">General Settings</h3>
            <div class="row">
              <div class="col-lg-12">
                    <?php 
                      if(isset($siteSettings))
                      {
                          echo $siteSettings;
                      }
                    ?>
                    <form action="" method="POST">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="siteTitle">Site Title</label>
                                <input class="form-control" name="site_title" id="siteTitle" type="text" placeholder="Site Title" value="<?php echo $helper->getSetting('site_title'); ?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="siteSlogan">Site Slogan</label>
                                <input class="form-control" name="site_slogan" id="siteSlogan" type="text" placeholder="Site Slogan" value="<?php echo $helper->getSetting('site_slogan'); ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary float-right" name="generalSettings" value="Save">
                        </div>
                    </form>
                </div>
              </div>
          </div>

          <div class="tile">
            <h3 class="tile-title">SEO Settings</h3>
            <div class="row">
              <div class="col-lg-12">
                    <?php 
                      if(isset($siteSeoSettings))
                      {
                          echo $siteSeoSettings;
                      }
                    ?>
                    <form action="" method="POST">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="siteAuthor">Site Author</label>
                                <input class="form-control" name="site_author" id="siteAuthor" type="text" placeholder="Site Author" value="<?php echo $helper->getSetting('site_author'); ?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="siteURL">Site URL</label>
                                <input class="form-control" name="site_url" id="siteURL" type="text" placeholder="Site URL" value="<?php echo $helper->getSetting('site_url'); ?>">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="sitetype">Site Type</label>
                                <input class="form-control" name="site_type" id="sitetype" type="text" placeholder="Site Type" value="<?php echo $helper->getSetting('site_type'); ?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="siteRobot">Site Robot</label>
                                <input class="form-control" name="site_robot" id="siteRobot" type="text" placeholder="Site Robot" value="<?php echo $helper->getSetting('site_robot'); ?>">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="siteAppID">Facebook App ID</label>
                                  <input id="siteAooID" type="text" name="site_app_id" placeholder="Faceboo App ID" class="form-control" value="<?php echo $helper->getSetting('site_app_id'); ?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="siteTwitterAuthor">Twitter Author</label>
                                  <input id="siteTwitterAuthor" type="text" name="site_twitter_author" placeholder="Twitter Author" class="form-control" value="<?php echo $helper->getSetting('site_twitter_author'); ?>">
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="siteTwitterCard">Twitter Card</label>
                                  <select id="siteTwitterCard" name="site_twitter_card" class="form-control">
                                      <option value="">Selelct Twitter Card</option>
                                      <option value="summary" <?php if($helper->getSetting('site_twitter_card') == 'summary'){ echo "selected='selected'";}?>>Summary</option>
                                      <option value="summary_large_image" <?php if($helper->getSetting('site_twitter_card') == 'summary_large_image'){ echo "selected='selected'";}?>>Summary Large Image</option>
                                      <option value="app" <?php if($helper->getSetting('site_twitter_card') == 'app'){ echo "selected='selected'";}?>>App</option>
                                      <option value="player" <?php if($helper->getSetting('site_twitter_card') == 'player'){ echo "selected='selected'";}?>>Player</option>
                                  </select>
                              </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="siteKeywords">Site Keywords</label>
                                  <input id="siteKeywords" type="text" name="site_keywords" placeholder="Site Keywords" class="form-control" value="<?php echo $helper->getSetting('site_keywords'); ?>">
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-lg-12">
                              <div class="form-group">
                                  <label for="siteDescription">Site Description</label>
                                  <textarea id="siteDescription" cols="30" rows="5" name="site_description" class="form-control" placeholder="Site Description"><?php echo $helper->getSetting('site_description'); ?></textarea>
                                </div>
                          </div>
                      </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary float-right" name="seoSettings" value="Save">
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
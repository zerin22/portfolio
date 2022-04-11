<?php include_once("inc/header.php");?>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include_once('inc/navbar.php'); ?>
    <!-- Sidebar menu-->
    <?php include_once('inc/sidebar.php'); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> User Profile</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">User Profile</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <div>
                    <img class="profile-img center-img" src="assets/img/avatars/<?php echo $format->getAvatar(SessionUser::getUser('user_id'));?>" alt="">
                </div>

                <div class="text-center mt-3 mb-3">
                  <a href="upload_avatar.php">Upload Avater</a>
                </div>

                <table class="table table-bordered mt-3">
                <tbody>
                    <tr>
                        <th>Full Name</th>
                        <td>
                            <?php echo SessionUser::getUser('user_fName')?> 
                            <?php echo SessionUser::getUser('user_lName')?>
                        </td>
                    </tr>

                    <tr>
                        <th>E-Mail</th>
                        <td>
                            <a href="mailto:<?php echo SessionUser::getUser('user_email')?>"><?php echo SessionUser::getUser('user_email')?></a> 
                        </td>
                    </tr>

                    <tr>
                        <th>Phone</th>
                        <td>
                            <a href="tel:<?php echo SessionUser::getUser('user_phone')?>"><?php echo SessionUser::getUser('user_phone')?></a> 
                        </td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>
                            <?php echo SessionUser::getUser('user_address')?> 
                        </td>
                    </tr>

                    <tr>
                        <th>About</th>
                        <td>
                            <?php echo SessionUser::getUser('user_about')?> 
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <?php include_once('inc/footer.php'); ?>
  </body>
</html>
<?php include_once('inc/header.php');?>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['createClient']))
    {
      $userClient = $clients->createClient($_POST, $_FILES);
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
          <h1><i class="fa fa-dashboard"></i> Create Client</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Create Client</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="tile">
              <div class="action-div clearfix mb-3">
                  <a href="client.php" class="float-right" style="text-decoration: none;"><i class="fa fa-arrow-left" aria-hidden="true"></i> All Clients</a>
              </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                          if(isset($userClient))
                          {
                            echo $userClient;
                          }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="clientTitle">Title <span class="text-danger">*</span></label>
                                  <input class="form-control" name="client_title" id="clientTitle" type="text" placeholder="Title">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="clientImage">Image</label>
                                  <input class="form-control" name="client_image" id="clientImage" type="file" placeholder="Client Image">
                                </div>
                              </div>
                            </div>

                            
                            <div class="form-group">
                              <label for="clientActiveStatus">Active Status <span class="text-danger">*</span></label>
                              <select class="form-control" name="client_active_status" id="clientActiveStatus">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="clientDescription">Description</label>
                                <textarea class="form-control" name="client_description" id="clientDescription" cols="30" rows="5" placeholder="Description"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" name="createClient" value="Save">
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


<?php include_once('inc/header.php');?>
<?php
    if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
      $client_id = $_GET['id'];
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updateClient']))
    {
      $userClient = $clients->editClient($client_id, $_POST, $_FILES);
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
          <h1><i class="fa fa-dashboard"></i> Edit Client</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Edit Client</a></li>
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

                        <?php
                          if(isset($_GET['id']) && is_numeric($_GET['id']))
                          {
                            $id = $_GET['id'];
                            $getClient = $clients->getClient($id);

                            if( $getClient != NULL){
                              $data = $getClient->fetch_assoc();
                        ?>
                              <div class="text-center">
                                <img src="../systemcontrol/assets/img/clients/<?php echo $data['image'];?>" alt="" style="width:300px;">
                              </div>
                              <form action="" method="POST" enctype="multipart/form-data">
                                  <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="clientTitle">Title <span class="text-danger">*</span></label>
                                        <input class="form-control" name="client_title" id="clientTitle" type="text" placeholder="Title" value="<?php echo $data['title'];?>">
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
                                      <option value="1" <?php if($data['active_status'] == 1){ echo "selected=selected";}?>>Active</option>
                                      <option value="0" <?php if($data['active_status'] == 0){ echo "selected=selected";}?>>Inactive</option>
                                    </select>
                                    
                                  </div>

                                  <div class="form-group">
                                      <label for="clientDescription">Description</label>
                                      <textarea class="form-control" name="client_description" id="clientDescription" cols="30" rows="5" placeholder="Description"><?php echo $data['description'];?></textarea>
                                  </div>

                                  <div class="form-group">
                                      <input type="submit" class="btn btn-primary float-right" name="updateClient" value="Save">
                                  </div>
                              </form>
                        <?php
                            }else{
                        ?>
                              <div class="alert alert-danger text-center" role="alert">
                                    Client not found!
                              </div>
                        <?php   
                            }
                          }else{
                        ?>
                          <div class="alert alert-danger text-center" role="alert">
                            Something went wrong! Please try again later.
                          </div>
                        <?php    
                          }
                        ?>
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


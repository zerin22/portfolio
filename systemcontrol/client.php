<?php include_once("inc/header.php");?>
<?php 
  if(isset($_GET['id']) && is_numeric($_GET['id']))
  {
    $id = $_GET['id'];
    $deleteClient = $clients->deleteClient($id);
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
          <h1><i class="fa fa-dashboard"></i> All Clients</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">All Clients</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php 
            if(isset($deleteClient))
            {
              echo $deleteClient;
            }
          ?>
          <div class="tile">
          <div class="tile-body">
              <div class="action-div clearfix mb-3">
                  <a href="client_create.php" class="float-right" style="text-decoration: none;"><i class="fa fa-plus" aria-hidden="true"></i> Add Client</a>
              </div>
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="clientTable">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Active Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $getClient = $clients->getAllClient();

                      if($getClient != NULL){
                        while($data = $getClient->fetch_assoc()){
                    ?>
                          <tr>
                            <td><?php echo $data['title']; ?></td>
                            <td>
                              <img src="assets/img/clients/<?php echo $data['image']; ?>" class="img-fluid" alt="">
                            </td>
                            <td>
                              <?php echo $data['description']; ?>
                            </td>
                            <td>
                              <?php 
                                if($data['active_status'] == 1)
                                {
                                  echo "<span class='badge badge-pill badge-success'>Active</span>";
                                }else{
                                  echo "<span class='badge badge-pill badge-danger'>Inactive</span>";
                                }
                              ?>
                            </td>
                            <td class="text-center">
                                <a href="client_edit.php?id=<?php echo $data['id']; ?>" class="edit-link">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="?id=<?php echo $data['id']; ?>" class="delete-link d-inline-block border-0">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                          </tr>
                    <?php      
                        }
                      }else{
                    ?>
                        <tr>
                          <td colspan="7" class="text-center text-danger">
                              No data found
                          </td>
                        </tr>
                    <?php    
                      }
                    ?>
                  </tbody>
                </table>
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
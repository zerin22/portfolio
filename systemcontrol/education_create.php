<?php include_once('inc/header.php');?>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['createEducation']))
    {
      $userEducation = $educations->createEducation($_POST);
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
          <h1><i class="fa fa-dashboard"></i> Create Education</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Create Education</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="tile">
              <div class="action-div clearfix mb-3">
                  <a href="education.php" class="float-right" style="text-decoration: none;"><i class="fa fa-arrow-left" aria-hidden="true"></i> All Education</a>
              </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                          if(isset($userEducation))
                          {
                            echo $userEducation;
                          }
                        ?>
                        <form action="" method="POST">
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="educationTitle">Title <span class="text-danger">*</span></label>
                                  <input class="form-control" name="education_title" id="educationTitle" type="text" placeholder="Title">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="educationInstitute">Institute <span class="text-danger">*</span></label>
                                  <input class="form-control" name="education_institute" id="educationInstitute" type="text" placeholder="Institute Name">
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="educationStartDate">Start Date <span class="text-danger">*</span></label>
                                  <input class="form-control" name="education_start_date" id="educationStartDate" type="date" placeholder="Start Date">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="educationEndDate">End Date <span class="text-danger">*</span></label>
                                  <input class="form-control" name="education_end_date" id="educationEndDate" type="date" placeholder="End Date">
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="educationGraduationStatus">Graduation Status <span class="text-danger">*</span></label>
                                  <select class="form-control" name="education_graduation_status" id="educationGraduationStatus">
                                    <option value="1">Graduated</option>
                                    <option value="0">Stuyding</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="educationActiveStatus">Active Status <span class="text-danger">*</span></label>
                                  <select class="form-control" name="education_active_status" id="educationActiveStatus">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                                <label for="educationDescription">Description</label>
                                <textarea class="form-control" name="education_description" id="educationDescription" cols="30" rows="5" placeholder="Description"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" name="createEducation" value="Save">
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


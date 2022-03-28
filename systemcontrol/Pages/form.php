<?php include_once('../inc/header.php');?>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include_once('../inc/navbar.php'); ?>
    <!-- Sidebar menu-->
    <?php include_once('../inc/sidebar.php'); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label class="control-label">File</label>
                                <input class="form-control" type="file">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender">Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender">Female
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Education</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox">School
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox">College
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelect1">Example select</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelect1">Selectize Single Select</label>
                                <select class="form-control singleSelect" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelect1">Selectize Multiple Select</label>
                                <select multiple="multiple" class="form-control multipleSelect" id="exampleSelect1">
                                    <option>Dhaka</option>
                                    <option>Dinajpur</option>
                                    <option>rajshahi</option>
                                    <option>Khulna</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <?php include_once('../inc/footer.php'); ?>
  </body>
</html>
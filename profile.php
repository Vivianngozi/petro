<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
      <!-- Main Sidebar Container -->
 <?php include "includes/sidebar.php"; ?>

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="row justify-content-center">
  <div class="card card-primary mt-5 ">
        <div class="card-header">
          <h3 class="card-title">Profile</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
       
        <form>
          <div class="card-body">
            <div class="form-group">
              <p class="bg-primary">Personal Info</p>
              <label for="name1">Name</label>
              <input type="text" class="form-control"  placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Profile Pic</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <p class="bg-primary">Work Info</p>
              <label for="company name">Company's Name</label>
              <input type="text" class="form-control"  placeholder="Enter Company Name">
            </div>
            <div class="form-group">
              <label for="department">Department</label>
              <input type="text" class="form-control"  placeholder="Enter your Department">
            </div>

            <p class="bg-primary">Change Password</p>
            <div class="form-group">
              <label for="exampleInputPassword1">Current  Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">New  Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password">
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
          <!--form ends-->
        </div>
        <!-- /.content-wrapper -->
        </div>
        </div>

<?php include "includes/footer.php"; ?>
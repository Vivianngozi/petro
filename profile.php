<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
      <!-- Main Sidebar Container -->
 <?php include "includes/sidebar.php"; ?>
 
 <?php
    if (isset($_SESSION["email"])) {
      $email = $_SESSION["email"];

      $query = "SELECT * FROM loginapp WHERE email = '$email' ";

      $select_profile = mysqli_query($connect, $query);

      while($row = mysqli_fetch_array($select_profile)) {
          $id = $row['id'];
          $name= $row['name'];
          $email = $row['email'];
          $image_file = $row['image_file'];
          $company_name = $row['company_name'];
          $department = $row['department'];
          $password = $row['password'];
      }
    }
 
?>
<?php

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $name= $_POST['name'];
  $email = $_POST['email'];
  // $image_file = $_POST['image_file'];
  $company_name = $_POST['company_name'];
  $department = $_POST['department'];
  $password = $_POST['password'];

  $query ="UPDATE loginapp SET ";
  $query .= "name = '{$name}', ";
  $query .= "email = '{$email}', ";
  $query .= "company_name = '{$company_name}', ";
  $query .= "department = '{department}', ";
  $query .= "password = '{password}', ";
  $query .= "WHERE id = '{$id}'";

  $edit_query = mysqli_query($connect, $query);
  confirmQuery($edit_query);
}


?>
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <div class="container">
  <!-- <div class="d-flex justify-content-center"> -->
  <div class="card card-primary mt-5 ">
        <div class="card-header">
          <h3 class="card-title">Profile</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
       
        <form method="POST">
          <div class="card-body">
          <div class="form-group">
                <label></label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" >
            </div>   
            <div class="form-group">
              <p class="bg-primary">Personal Info</p>
              <label for="name1">Name</label>
              <input type="text" class="form-control"  placeholder="Enter your name" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
            </div>
            <br>
            <img src="uploads/<?php echo $image_file; ?>" class="bd-placeholder-img" width="200" height="250" >
            <div class="form-group">
              <label for="exampleInputFile">Profile Pic</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file"name="fileToUpload" width="200" height="250" class="custom-file-input" id="exampleInputFile">
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
              <input type="text" class="form-control"  placeholder="Enter Company Name" name="company_name" value="<?php echo $company_name; ?>">
            </div>
            <div class="form-group">
              <label for="department">Department</label>
              <input type="text" class="form-control"  placeholder="Enter your Department" name="department" value="<?php echo $department; ?>">
            </div>

     
            <p class="bg-primary">Change Password</p>
            <div class="form-group">
              <label for="exampleInputPassword1">Current  Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo $password; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">New  Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password" name="newPassword">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm  Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password" name="confirmPassword">
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Update Profile</button>
          </div>
          <!--form ends-->
        </div>
        <!-- /.content-wrapper -->
        </div>
  </div>
<?php include "includes/footer.php"; ?>
<?php include "includes/script.php"; ?>
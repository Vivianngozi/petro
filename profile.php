<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
      <!-- Main Sidebar Container -->
 <?php include "includes/sidebar.php"; ?>
 
 <?php
    if (isset($_SESSION["username"])) {
      $username = $_SESSION["username"];

      $query = "SELECT * FROM loginapp WHERE username = '$username' ";

      $select_profile = mysqli_query($connect, $query);

      while($row = mysqli_fetch_array($select_profile)) {
          $id = $row['id'];
          $username = $row['username'];
          $name= $row['name'];
          $email = $row['email'];
          $image_file= $row['image_file'];
          $company_name = $row['company_name'];
          $department = $row['department'];
          $password = $row['password'];
      }
    }
 
?>
<?php

if(isset($_POST['update_user']))
{
   $email = mysqli_real_escape_string($connect, trim($_POST['email']));
  //  $username = mysqli_real_escape_string($connect, trim($_POST['username']));
   $password = mysqli_real_escape_string($connect, trim($_POST['password']));
   $name = mysqli_real_escape_string($connect, trim($_POST['name']));
   $company_name = mysqli_real_escape_string($connect, trim($_POST['company_name']));
   $department = mysqli_real_escape_string($connect, trim($_POST['department']));
  

   $image_file = $_FILES['image_file']['name'];
   $image_file_tmp = $_FILES['image_file']['tmp_name'];

   move_uploaded_file($image_file_tmp, "images/$image_file");

   if(empty($image_file))
   {
        $query = "SELECT * FROM loginapp WHERE id = $id";
        $select_image = mysqli_query($connect, $query);

        while($row = mysqli_fetch_array($select_image))
        {
            $image_file = $row['image_file'];
        }
   }
   $update_user_profile_query = "UPDATE loginapp SET name = '$name', password = '$password',
   email = '$email', image_file = '$image_file', company_name = '$company_name', department = '$department'
     WHERE id= '$id'";

$result = mysqli_query($connect, $update_user_profile_query);
confirmQuery($result);

   }


?>


?>
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <div class="container">
  <!-- <div class="d-flex justify-content-center"> -->
  <div class="card card-primary mt-3">
        <div class="card-header">
          <h3 class="card-title">Profile</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
       
        <form method="post" enctype="multipart/form-data">
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
            <img src="images/<?php echo $image_file; ?>" class="bd-placeholder-img" width="200" height="250" >
            <div class="form-group">
              <label for="exampleInputFile">Profile Pic</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="image_file" class="custom-file-input" id="exampleInputFile">
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
         
            <div class="form-group">
                                <input type="submit" value="Update Profile" name="update_user" class="btn btn-primary">
                            </div>
          </div>
          <!--form ends-->
        </div>
        <!-- /.content-wrapper -->
        </div>
  </div>
<?php include "includes/footer.php"; ?>
<?php include "includes/script.php"; ?>
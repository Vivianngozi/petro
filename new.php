<?php include("includes/header.php"); ?>

<?php

if(isset($_SESSION['username']))
{
    $session_username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '$session_username'";
    $edit_user_profile = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($edit_user_profile))
    {
        $user_id            = $row['user_id'];
        $username           = $row['username'];
        $password           = $row['password'];
        $user_firstname     = $row['user_firstname'];
        $user_lastname      = $row['user_lastname'];
        $user_email         = $row['user_email'];
        $user_image         = $row['user_image'];
        $user_role          = $row['user_role'];
    }
}

?>

<?php

if(isset($_POST['update_user']))
{
   $username        = mysqli_real_escape_string($connection, trim($_POST['username']));
   $password        = mysqli_real_escape_string($connection, trim($_POST['password']));
   $user_firstname  = mysqli_real_escape_string($connection, trim($_POST['user_firstname']));
   $user_lastname   = mysqli_real_escape_string($connection, trim($_POST['user_lastname']));
   $user_email      = mysqli_real_escape_string($connection, trim($_POST['user_email']));
   $user_role       = mysqli_real_escape_string($connection, trim($_POST['user_role']));

   $user_image      = $_FILES['user_image']['name'];
   $user_image_tmp  = $_FILES['user_image']['tmp_name'];

   move_uploaded_file($user_image_tmp, "../images/$user_image");

   if(empty($user_image))
   {
        $query = "SELECT * FROM users WHERE username = $session_username";
        $select_image = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_image))
        {
            $user_image = $row['user_image'];
        }
   }

   $update_user_profile_query = "UPDATE users SET password = '$password', user_firstname = '$user_firstname', 
                                user_lastname = '$user_lastname', user_email = '$user_email', user_role = '$user_role', 
                                username = '$username', user_image = '$user_image' WHERE username = '$session_username'";

    $result = mysqli_query($connection, $update_user_profile_query);

    confirmQuery($result);
   
}

?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">
    
                            <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="<?php echo $password; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_firstname">Firstname</label>
                                <input type="text" name="user_firstname" value="<?php echo $user_firstname; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_lastname">Lastname</label>
                                <input type="text" name="user_lastname" value="<?php echo $user_lastname; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="email" name="user_email" value="<?php echo $user_email; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_image">Image</label>
                                <img class="img-responsive" width="200" src="../images/<?php echo $user_image; ?>" alt="">
                                <input type="file" name="user_image" class="form-control">
                            </div>


                            <div class="form-group">
                                <select name="user_role" class="form-control">
                                    <option value="Subscriber"><?php echo $user_role?></option>
                                
                                <?php
                                
                                    if($user_role == "Admin")    
                                    {
                                        echo "<option value='Subscriber'>Subscriber</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='Admin'>Admin</option>";
                                    }
                                
                                ?>
                                    
                                    
                                    
                                </select>

                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update Profile" name="update_user" class="btn btn-primary">
                            </div>

                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/footer.php"); ?>












   
if ($_FILES['fileToUpload']["name"]=="") {

$update_user_profile_query = "UPDATE loginapp SET name = '$name', password = '$password',
email = '$email', image_file = '$image_file_view', company_name = '$company_name', department = '$department'
  WHERE id= '$id'";
$result= $connect->query($update_user_profile_query);


}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
  echo "File is an image - " . $check["mime"] . ".";
  $uploadOk = 1;
} else {
  echo "File is not an image.";
  $uploadOk = 0;
}


// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
 echo "Sorry, your file is too large.";
 $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
 $uploadOk = 0;
}



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 
// if everything is ok, try to upload file
} else {
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

  $update_user_profile_query = "UPDATE loginapp SET name = '$name', password = '$password',
  email = '$email', image_file = '$image_file', company_name = '$company_name', department = '$department'
    WHERE id= '$id'";

$result = mysqli_query($connect, $update_user_profile_query);
 } else {
   echo "<script>alert('File did not upload')</script>";
  //  header("refresh:0.2; url=dashboard.php");
 }
}
confirmQuery($result);
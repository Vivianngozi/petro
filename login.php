<?php include "includes/header.php"; ?>
<?php include "loginstyle.php"; ?>
<?php

$email = $password = "";
$email_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty(trim($_POST["email"]))){
    $email_err = "Please enter your email";
  } else {
    $email = trim($_POST['email']);
  }

  if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password";
  } else {
    $password = trim($_POST['password']);
  }

  if(empty($username_err) && empty($password_err)){
    $sql = "SELECT id, email, password FROM loginapp WHERE email = ?" ;

    if($prepare = mysqli_prepare($connect, $sql)){
      mysqli_stmt_bind_param($prepare, "s", $param_email);
      $param_email = $email;

      if(mysqli_stmt_execute($prepare)) {

        mysqli_stmt_store_result($prepare);

        if(mysqli_stmt_num_rows($prepare) == 1) {
          mysqli_stmt_bind_result($prepare, $id, $username, $hashed_password);
          
          if(mysqli_stmt_fetch($prepare)){

            if(password_verify($password, $hashed_password)){
              session_start();

              $_SESSION['loggedin']= true;
              $_SESSION['id'] = $id;
              $_SESSION['email'] = $email;

              header("location:index.php");

            }else{
              // Display an error message if password is not valid
              $password_err = "The password you entered was not valid.";
          }
          }
        }else{
          // Display an error message if username doesn't exist
          $email_err = "No account found with that username.";
      }
      }else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($prepare);
  }
}
  mysqli_close($connect);


}
?>
 
  <div class="transbox ">
  <div class="wrapper"> 
   
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <img src="./images/FUTO_logo_main.png" class="center">
    
      <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
        <span class="span">
        <i class="far fa-user"></i>
      </span>
      <input type="text" class= "select" placeholder="Email Address" value="<?php echo $email; ?>" name="email">
      <span class="help-block color"><?php echo $email_err; ?></span>
  </div>
  
    <br><div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <span class="span">
        <i class="fas fa-key"></i>
      </span>
      <input type="password" class="select" placeholder="Password" value="<?php echo $password; ?>" name="password">
      <span class="help-block color"><?php echo $password_err; ?></span>
    </div>

    <div class="text-center">

    <br><button type="submit" class="btn color btn-lg">Submit</button>
  </div>

    <p>Don't have an account? <a href="signUp.php">Sign Up</a></p>
  </form>

</div>
  </div>

<?php include "includes/script.php"; ?>
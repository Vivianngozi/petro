<?php include "includes/header.php"; ?>
<?php include "loginstyle.php"; ?>

<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ){
  header("location: index.php");
  exit;
}

$username = $name = $email = $department = $password = $confirm_password = "";
$username_err = $name_err = $email_err = $department_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty(trim($_POST['username'])) || empty(trim($_POST['name'])) || empty(trim($_POST['email'])) || empty(trim($_POST['department']))) {
    $username_err = "Please enter your username";
    $name_err = "Please enter your name";
    $email_err ="Please enter your email";
    $department_err ="Please enter your department";
  } else {
    $sql = "SELECT id FROM loginapp WHERE username = ? AND name =? AND email = ? AND department = ?";
    if($prepare = mysqli_prepare($connect, $sql)) {
      mysqli_stmt_bind_param($prepare, "ssss", $param_username, $param_name, $param_email, $param_department);

      $param_username =trim($_POST['username']);
      $param_name =trim($_POST['name']);
      $param_email = trim($_POST['email']);
      $param_department = trim($_POST['department']);

      if(mysqli_stmt_execute($prepare)) {
        mysqli_stmt_store_result($prepare);

        if(mysqli_stmt_num_rows($prepare) == 1) {
          $username_err = "This username is already taken";
          $name_err = "This name is already taken";
          $email_err = "This email is already taken";
        } else {
          $username = trim($_POST['username']);
          $name = trim($_POST['name']);
          $email = trim($_POST['email']);
          $department = trim($_POST['department']);
        } 
      }else {
        echo "Oops! something when wrong, try again later";
      }
      mysqli_stmt_close($prepare);
    }
  }

  if(empty(trim($_POST['password']))){
    $password_err = "Please enter the password";
  } elseif(strlen(trim($_POST['password'])) < 5) {
    $password_err = "Password must be more than five characters";
  } else {
    $password = trim($_POST['password']);
  }

  if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Please input password again.";
    } else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($password_err) && ($password != $confirm_password)){
    $confirm_password_err = "Password did not match.";
    }
    }
    // Check input errors before inserting in database
    if(empty($username_err) && empty($name_err) && empty($email_err) && empty($department_err) && empty($password_err) && empty($confirm_password_err)){
    // Prepare an insert statement
    $sql = "INSERT INTO loginapp (username, name, email, department, password) VALUES (?, ?, ?, ?,?)";
    if($prepare = mysqli_prepare($connect, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($prepare, "sssss", $param_username, $param_name, $param_email, $param_department, 
    $param_password);
    // Set parameters
    $param_username = $username;
    $param_name = $name;
    $param_email = $email;
    $param_department = $department;
    $param_password = password_hash($password, PASSWORD_DEFAULT);
    // Creates a password hash
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($prepare)){
    // Redirect to login page
    header("location: login.php");
    } else{
    echo "Something went wrong. Please try again later.";
    }
    // Close statement
    mysqli_stmt_close($prepare);
    }
    }
    // Close connection
    mysqli_close($connect);
    }
?>
<div class="transbox ">
  
  <div class="wrapper">    
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="change">
  <img src="./images/FUTO_logo_main.png" class="center">
  <div >
      <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <span class="span">
        <i class="far fa-user"></i>
      </span>
      <input type="text" class= "select" placeholder="Username" name="username" value="<?php
echo $username; ?>">
<span class="help-block color"><?php echo $username_err; ?></span>
      
    </div>
  </div>

  <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
        <span class="span">
        <i class="far fa-user"></i>
      </span>
      <input type="text" class= "select" placeholder=" Enter your full name" name="name" value="<?php
echo $name; ?>">
<span class="help-block color"><?php echo $name_err; ?></span>
      
    </div>

  </div>
    <div >
      <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
        <span class="span">
        <i class="fas fa-envelope-open-text"></i>
      </span>
      <input type="email" class= "select" placeholder="Email Address" name="email" value="<?php
echo $email; ?>">
<span class="help-block color"><?php echo $email_err; ?></span>
      
    </div>
  </div>
  
  <div >
      <div class="form-group <?php echo (!empty($department_err)) ? 'has-error' : ''; ?>">
        <span class="span">
        <i class="fas fa-envelope-open-text"></i>
      </span>
      <input type="text" class= "select" placeholder="Department" name="department" value="<?php
echo $department; ?>">
<span class="help-block color"><?php echo $department_err; ?></span>
      
    </div>
  </div>
  
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <span class="span">
        <i class="fas fa-key"></i>
      </span>
      <input type="password" class=" select" placeholder="Password" name="password" value="<?php
echo $password; ?>">
    </div>
    <span class="help-block color"><?php echo $password_err; ?></span>
    
    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
      <span class="span">
        <i class="fas fa-key"></i>
      </span>
      <input type="password" class=" select" placeholder="Confirm Password" name="confirm_password" value="<?php
echo $confirm_password; ?>">
<span class="help-block color"><?php echo $confirm_password_err; ?></span>
    </div>

    <div class="text-center">

    <button type="submit" class="btn btn-danger btn-lg" class="change">Submit</button>
  </div>

    <p>Already have an account? <a href="login.php" class="change">Login</a></p>
  </form>

</div>
  </div>
  
  <?php include "includes/script.php"; ?>
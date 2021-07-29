<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
      <!-- Main Sidebar Container -->
 <?php include "includes/sidebar.php"; ?>
 
 <?php
    if (isset($_SESSION["username"])) {
      $username = $_SESSION["username"];

      $query = "SELECT * FROM student_input WHERE username = '$username' ";

      $select_profile = mysqli_query($connect, $query);

      while($row = mysqli_fetch_array($select_profile)) {
          $student_id = $row['student_id'];
          $username = $row['username'];
          $title = $row['title'];
          $subtitle= $row['subtitle'];
          $equipment = $row['equipment'];
          $formular = $row['formular'];
          $reading = $row['reading'];
          $working = $row['working'];
          $date = $row['date'];
      }
    }
 
?>
<?php

if(isset($_POST['submit']))
{
  
   $title = mysqli_real_escape_string($connect, trim($_POST['title']));
   $subtitle = mysqli_real_escape_string($connect, trim($_POST['subtitle']));
   $equipment = mysqli_real_escape_string($connect, trim($_POST['equipment']));
   $formular = mysqli_real_escape_string($connect, trim($_POST['formular']));
   $reading = mysqli_real_escape_string($connect, trim($_POST['reading']));
   $working = mysqli_real_escape_string($connect, trim($_POST['working']));
   $date = mysqli_real_escape_string($connect, trim($_POST['date']));
  

 

  
   $update_user_input_query = "UPDATE student_input SET title = '$title', subtitle = '$subtitle',
   equipment = '$equipment', formular = '$formular', reading = '$reading', working = '$working', date = '$date'
     WHERE student_id= '$student_id'";

$result = mysqli_query($connect, $update_user_input_query);
confirmQuery($result);

// header("location:work_inputdate.php");

   }

  


?>
<div class="content-wrapper ">
<section class="content">
      <div class="container-fluid">
     
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Put in your data</h3>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                <input type="hidden" name="id" class="form-control" value="<?php echo $student_id; ?>" >
            </div> 
            <div class="form-group">
                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" >
            </div> 
            <div class="form-group">
                <input type="date" name="date" class="form-control" value="<?php echo $date; ?>" >
            </div> 

                  <div class="form-group">
    <label for="project">Project</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title" name="title" value="<?php echo $title; ?>" ><br>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="sub-title" name="subtitle" value="<?php echo $subtitle; ?>">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Equipment Used</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="equipment"><?php echo $equipment; ?></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Formulars</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="formular"><?php echo $formular; ?></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Readings</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="reading"><?php echo $reading; ?></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Workings/ Results</label><br>
    <label for="exampleFormControlTextarea1"><a href="calculator.php">Click here for calculator</a></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="working"><?php echo $working; ?></textarea>
  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
            <button class="btn btn-secondary" type="submit" name="submit">Submit</button>
                </div>
              </form>
            </div>
        </div>
        </div>
      </div>
  </section>
</div>


<?php include "includes/footer.php"; ?>
<?php include "includes/script.php"; ?>
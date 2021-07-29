<?php include "includes/header.php"; ?>
  <!-- Main Sidebar Container -->
  <?php include "includes/navbar.php"; ?>
<?php include "includes/sidebar.php"; ?>

<?php
    if (isset($_SESSION["username"])) {
      $username = $_SESSION["username"];
  
 
    }
 ?>

 <?php
 
 if(isset($_POST['submit'])){
  // $email = mysqli_real_escape_string($connect, trim($_POST['email']));
  // $student_id = mysqli_real_escape_string($connect, trim($_POST['student_id']));
  $title = mysqli_real_escape_string($connect, trim($_POST['title']));
  $subtitle = mysqli_real_escape_string($connect, trim($_POST['subtitle']));
  $equipment = mysqli_real_escape_string($connect, trim($_POST['equipment']));
  $formular = mysqli_real_escape_string($connect, trim($_POST['formular']));
  $reading = mysqli_real_escape_string($connect, trim($_POST['reading']));
  $working = mysqli_real_escape_string($connect, trim($_POST['working']));
  $date = mysqli_real_escape_string($connect, trim($_POST['date']));

  $insert_user_profile_query = "INSERT INTO student_input (username, title, subtitle, equipment, formular, reading, working, date)  VALUES ('$username', '$title', '$subtitle', '$equipment', '$formular', '$reading', '$working', '$date') ";
  

$result = mysqli_query($connect, $insert_user_profile_query);

confirmQuery($result);
 }
 

 ?>

       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
<section class="content">
      <div class="container-fluid">
        <div class="row mt-3">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Put in your data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
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
  
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title" name="title"><br>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="sub-title" name="subtitle">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Equipment Used
  
    </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="equipment"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Formulars</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="formular"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Readings</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="reading"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Workings/ Results</label><br>
    <label for="exampleFormControlTextarea1"><a href="calculator.php">Click here for calculator</a></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="working"></textarea>
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





<!-- /.content-wrapper -->

  

<?php include "includes/footer.php"; ?>
<?php include "includes/script.php"; ?>
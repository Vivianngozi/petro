<?php include "includes/header.php"; ?>

<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div> -->


<?php include "includes/navbar.php"; ?>
<!-- Main Sidebar Container -->
<?php include "includes/sidebar.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container-fluid  mt-5 ">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

<?php

  $username = $_SESSION['username'];

  $query = "SELECT * FROM student_input WHERE username = '$username' ";
  $select_all_post = mysqli_query($connect, $query);
  $post_count = mysqli_num_rows($select_all_post);
  echo "<h3>{$post_count}</h3>";

?>
                

                <p>Work Input</p>
              </div>
              <div class="icon">
              <i class="fas fa-sticky-note"></i>
              </div>
              <a href="work_input.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
  $query = "SELECT * FROM loginapp";
  $select_all_profile= mysqli_query($connect, $query);
  $profile_count = mysqli_num_rows($select_all_profile);
  echo "<h3>{$profile_count}</h3>";

?>

                <p>Total students</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="profile.php" class="small-box-footer">View your profile <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
</div>

<div class="container">
<div class="row">
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Count'],

<?php
   $element_text = ['Created Results', 'Registered Users'];
   $element_count = [$post_count, $profile_count];
   
   for ($i=0; $i < 2; $i++) { 
     echo "['{$element_text[$i]}'". " ," . "{$element_count[$i]}],";
   }







?>

          // ['Posts', 1000],

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
</div>
</div>
</div>
<!-- /.content-wrapper -->
<?php include "includes/footer.php"; ?>
<?php include "includes/script.php"; ?>

<?php include "includes/header.php"; ?>
  <!-- Main Sidebar Container -->
  <?php include "includes/navbar.php"; ?>
<?php include "includes/sidebar.php"; ?>

 <?php
    if (isset($_SESSION["username"])) {
      $username = $_SESSION["username"];
  $sql = "SELECT * FROM student_input WHERE username = '$username'";
  $query = mysqli_query($connect, $sql);
  
    }

 ?>

 

       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
       <section class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12 col-sm-12 p-5">
       <table id="example" class="display table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>title</th>
                <th>subtitle</th>
                <th>equipments</th>
                <th>readings</th>
                <th>Operation</th>
                
            </tr>
        </thead>
        <tbody>

        <?php
        
if(isset($query)){
while ($row = mysqli_fetch_assoc($query)) {
  # code..



?>
            <tr>
                <td><?php echo substr($row['date'], 0,10); ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['subtitle']; ?></td>
                <td><?php echo $row['equipment']; ?></td>
                <td><?php echo $row['reading']; ?></td>


                <form action="edit.php" method="post">
                <td><button class="btn btn-primary" name="edit" >Edit</button></td>
                </form>
            </tr>
            <?php
}
}
?>
        </tbody>
       </table>
       </div>
       </div>
</div>
       </section>


</div>





<!-- /.content-wrapper -->

  

<?php include "includes/footer.php"; ?>
<?php include "includes/script.php"; ?>
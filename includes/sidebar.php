<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="images/FUTO_logo_main.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">FUTO </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

<?php
    if (isset($_SESSION["username"])) {
      $username = $_SESSION["username"];

      $query = "SELECT * FROM loginapp WHERE username = '$username' ";

      $select_profile = mysqli_query($connect, $query);

      while($row = mysqli_fetch_array($select_profile)) {
          $id = $row['id'];
          $username = $row['username'];
          $image= $row['image_file'];

    ?>


      <div class="image">
        <img src="images/<?php echo $row['image_file']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="profile.php" class="d-block"><?php echo $row['name']; ?></a>
      </div>
    </div>

    <?php
      }
    }

    ?>

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              
            </p>
          </a>
          <!-- <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
          </ul> -->
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Forms
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="create.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create result</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="work_inputdate.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View result</p>
              </a>
            </li>
          
        
            <li class="nav-item">
              <a href="calculator.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Calculator</p>
              </a>
            </li>
            </ul>
          
        </li>

        <li class="nav-item">
          <a href="profile.php" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>Profile</p>

          </a>
        </li>
      </ul>
  
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<?php include "includes/header.php"; ?>
  <!-- Main Sidebar Container -->
  <?php include "includes/navbar.php"; ?>
<?php include "includes/sidebar.php"; ?>

 

       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Put in your data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                
                  <div class="form-group">
    <label for="project">Project</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title"><br>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="sub-title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">week</label>
    <select >
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Equipment Used</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Formulars</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Readings</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Workings/ Results</label><br>
    <label for="exampleFormControlTextarea1"><a href="calculator.php">Click here for calculator</a></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
            <button class="btn btn-secondary" type="submit">Submit</button>
  <button class="btn btn-secondary" type="print">Print</button>
                </div>
              </form>
            </div>
        </div>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Put in your data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                
                  <div class="form-group">
    <label for="project">Project</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title"><br>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="sub-title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">week</label>
    <select >
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Equipment Used</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Formulars</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Readings</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Workings/ Results</label><br>
    <label for="exampleFormControlTextarea1"><a href="calculator.php">Click here for calculator</a></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
            <button class="btn btn-secondary" type="submit">Submit</button>
  <button class="btn btn-secondary" type="print">Print</button>
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
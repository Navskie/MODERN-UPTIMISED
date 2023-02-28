<?php 
  include 'include/header.php';
  include 'include/sidebar.php';
?>

  <div id="main">
    <div class="container">
      <div class="row">




        <div class="col s12 m12 l3">
          <!-- CARD -->
            <div class="card recent-buyers-card animate fadeUp">
              <?php
                $codename = $_GET['code_name'];

                $code_sql = mysqli_query($connect, "SELECT * FROM code WHERE code_name = '$codename'");
                $code_info = mysqli_fetch_array($code_sql);

              ?>
              <div class="card-content">
                <h4 class="card-title mb-0">Regular Item Information</h4>
                <br>
                <div class="row">

                  <div class="col s12 m12 l12">
                    <form action="backend/code/code-setting.php?code_name=<?php echo $codename ?>" method="post">
                  </div>

                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <input placeholder="Unique Code (PN013)" id="first_name" type="text" class="validate" name="code_name" value="<?php echo $codename ?>">
                      <label for="first_name">Item Code</label>
                    </div>
                  </div>



                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <!-- <h6>Small</h6> -->
                      <div class="input-field">
                        <select class="select2-size-sm1 browser-default" id="small-select" name="category">
                          <option value="<?php echo $code_info['code_category'] ?>"><?php echo $code_info['code_category'] ?></option>
                          <option value="REGULAR">REGULAR</option>
                          <option value="BUNDLE">BUNDLE</option>
                        </select>
                      </div>
                    </div>
                  </div>



                  <div class="col s12 m12 l12">
                    <div class="input-field">
                      <button class="btn waves-effect orange waves-light right" name="save">Update <i class="material-icons left">send</i></button>
                      <br><br>
                    </div>
                    </form>
                  </div>




                </div>
              </div>
            </div>
          <!-- CARD END -->
        </div>





        <div class="col s12 m12 l9">
          <!-- CARD -->
            <div class="card recent-buyers-card animate fadeUp">
              <div class="card-content">
                <!-- <h4 class="card-title mb-0">Top Resellers</h4> -->

                <!-- Page Length Options -->
                <div class="row">
                  <div class="col s12">

                        <h4 class="card-title">Regular Item List</h4>
                        <div class="row">
                          <div class="col s12">
                            <table id="page-length-option" class="display">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Code</th>
                                  <th>Category</th>
                                  <th>Date Added</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                  $number = 1;
                                  $code_data = mysqli_query($connect, "SELECT * FROM code ORDER BY id DESC");
                                  foreach ($code_data as $data) {
                                    if ($data['code_category'] == 'BUNDLE') {
                                      $class = 'badge red';
                                    } else {
                                      $class = 'badge blue';
                                    }
                                ?>
                                <tr>
                                  <td><?php echo $number ?></td>
                                  <td><?php echo $data['code_name'] ?></td>
                                  <td><span class="<?php echo $class ?>"><?php echo $data['code_category'] ?></span></td>
                                  <td><?php echo $data['code_stamp'] ?></td>
                                  <td>
                                    <a href="code-setting.php?code_name=<?php echo $data['code_name'] ?>" class="btn waves-effect waves-light orange darken-1">Settings</a>
                                  </td>
                                </tr>
                                <?php 
                                  $number++;
                                  }
                                ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th>#</th>
                                  <th>Code</th>
                                  <th>Category</th>
                                  <th>Date Added</th>
                                  <th>Action</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>

                  </div>
                </div>
              </div>
            </div>
          <!-- CARD END -->
        </div>




      </div>
    </div>
  </div>
<?php 
  include 'include/footer.php'; 
?>
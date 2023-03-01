<!--  
    PROMO CATEGORIES:
  - (REGULAR)
  - (REBATABLE) - (TIEUP)
  - (BOGO) BUY ONE GET ONE - (BOGO FREE)
  - (BAGAF) BUY ANY GET ANY - (BAGAF FREE)
  - (B150) BUY 1, GET NEXT AT 50%
  - (B170) BUY 1, GET NEXT AT 70%

  Package=====
  code
  desc
  points
  category - rebatable etc
  exclusive - for reseller
  tag - website
  status
  Optional
  * reseller package
  * restrict
-->
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
                  if (isset($_POST['save'])) {
                    $bundle_code = $_POST['code'];
                    $bundle_name = $_POST['name'];
                    $bundle_point = $_POST['point'];
                    $bundle_category = $_POST['category'];
                    $bundle_tag = $_POST['tag'];
                    $bundle_status = $_POST['status'];
                    $bundle_earning = $_POST['earning'];
                    $bundle_setting = $_POST['setting'];

                    if ($bundle_category == 'BOGO') {
                      $bundle_category = 'BUY ONE GET ANY';
                    } elseif ($bundle_category == 'BAGAF') {
                      $bundle_category = 'BUY ANY GET ANY';
                    } elseif ($bundle_category == 'B150') {
                      $bundle_category = 'BUY ONE GET 50%';
                    } elseif ($bundle_category == 'B170') {
                      $bundle_category = 'BUY ONE GET 70%';
                    }

                    if ($bundle_code != '' && $bundle_point != '' && $bundle_name != '' && $bundle_category != '' && $bundle_status != '' && $bundle_setting != '') {
                      $bundle_code_check = mysqli_query($connect, "SELECT * FROM bundle WHERE bundle_code = '$bundle_code'");

                      if (mysqli_num_rows($bundle_code_check) < 1) {
                        $items_encoded = mysqli_query($connect, "INSERT INTO bundle (
                          bundle_code,
                          bundle_name,
                          bundle_points,
                          bundle_category,
                          bundle_tag,
                          bundle_status,
                          bundle_setting,
                          bundle_earning,
                          bundle_stamp
                        ) VALUES (
                          '$bundle_code',
                          '$bundle_name',
                          '$bundle_point',
                          '$bundle_category',
                          '$bundle_tag',
                          '$bundle_status',
                          '$bundle_setting',
                          '$bundle_earning',
                          '$stamp'
                        )");
                      } else {
                        echo '<div class="card-alert card red lighten-5">
                                <div class="card-content red-text">
                                  <p>System Error : This code is not available</p>
                                </div>
                                <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>';
                      }
                    } else {
                      echo '<div class="card-alert card red lighten-5">
                              <div class="card-content red-text">
                                <p>System Error : All fields are required</p>
                              </div>
                              <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>';
                    }
                  }
                ?>
              <div class="card-content">
                <h4 class="card-title mb-0">Bundle Item Information</h4>
                <br>
                <div class="row">

                  <div class="col s12 m12 l12">
                    <form action="bundle.php" method="post">
                  </div>

                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <select class="select2 browser-default" id="default-select" name="code">
                        <option value="">Select Item Code</option>
                        <?php
                          $code_sql = mysqli_query($connect, "SELECT * FROM code WHERE code_category = 'BUNDLE' ORDER BY id DESC");
                          foreach ($code_sql as $code_data) {
                        ?>
                        <option value="<?php echo $code_data['code_name'] ?>"><?php echo $code_data['code_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>





                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <input placeholder="Example (Vital Wash)" id="first_name" type="text" class="validate" name="name" autocomplete="OFF">
                      <label for="first_name">Item Name</label>
                    </div>
                  </div>




                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <input placeholder="Example (13)" id="first_name" type="text" class="validate" name="point" autocomplete="OFF">
                      <label for="first_name">Points</label>
                    </div>
                  </div>



                  
                  <!-- <div class="col s12 m12 l12"><hr><h4 class="card-title mb-0"><br>Regular Item Properties</h4></div> -->

                  <div class="col s12 m6 l6">
                    <div class="input-field">
                      <!-- <h6>Small</h6> -->
                      <div class="input-field">
                        <select class="select2-size-sm1 browser-default" id="small-select" name="category">
                          <option value="">Select Category</option>
                          <option value="REGULAR">REGULAR</option>
                          <option value="TIE UP">TIE UP</option>
                          <option value="REBATABLE">REBATABLE</option>
                          <option value="BOGO">BUY ONE GET ANY</option>
                          <option value="BAGAF">BUY ANY GET ANY</option>
                          <option value="B150">BUY ONE GET 50%</option>
                          <option value="B170">BUY ONE GET 70%</option>
                        </select>
                      </div>
                    </div>
                  </div>




                  <div class="col s12 m6 l6">
                    <div class="input-field">
                      <!-- <h6>Small</h6> -->
                      <div class="input-field">
                        <select class="select2-size-sm1 browser-default" id="small-select" name="tag">
                          <option value="">Select Tag</option>
                          <option value="Best Seller">Best Seller</option>
                          <!-- <option value="Best Seller">Best Seller</option> -->
                        </select>
                      </div>
                    </div>
                  </div>




                  <div class="col s12 m6 l6">
                    <div class="input-field">
                      <!-- <h6>Small</h6> -->
                      <div class="input-field">
                        <select class="select2-size-sm1 browser-default" id="small-select" name="status">
                          <option value="">Select Status</option>
                          <option value="Active">Active</option>
                          <option value="Deactive">Deactive</option>
                        </select>
                      </div>
                    </div>
                  </div>




                  <div class="col s12 m6 l6">
                    <!-- <h6>Small</h6> -->
                    <div class="input-field">
                      <select class="select2-size-sm1 browser-default" id="small-select" name="earning">
                        <option value="">Select Earning</option>
                        <option value="No Earnings">No Earnings</option>
                      </select>
                    </div>
                  </div>




                  <div class="col s12 m12 l12">
                    <!-- <h6>Small</h6> -->
                    <div class="input-field">
                      <select class="select2-size-sm1 browser-default" id="small-select" name="setting">
                        <option value="">Bundle Settings (Optional)</option>
                        <!-- <option value="">None</option> -->
                        <option value="RESELLER PACKAGE">RESELLER PACKAGE</option>
                        <option value="REGULAR PACKAGE">REGULAR PACKAGE</option>
                      </select>
                    </div>
                  </div>




                  <div class="col s12 m12 l12">
                    <div class="input-field">
                      <button class="btn waves-effect waves-light right" name="save">Save <i class="material-icons left">send</i></button>
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

                        <h4 class="card-title">Bundle Item List</h4>
                        <div class="row">
                          <div class="col s12">
                            <table id="page-length-option" class="display">
                              <thead>
                                <tr>
                                  <th>Code</th>
                                  <th>Name</th>
                                  <th>Category</th>
                                  <th>Tag</th>
                                  <th>Status</th>
                                  <th>Earning</th>
                                  <th>Bundle Setting</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $code_data = mysqli_query($connect, "SELECT * FROM bundle ORDER BY bundle_id DESC");
                                  foreach ($code_data as $data) {
                                ?>
                                <tr>
                                  <td><?php echo $data['bundle_code'] ?></td>
                                  <td><?php echo $data['bundle_name'] ?></td>
                                  <td><?php echo $data['bundle_category'] ?></td>
                                  <td><?php echo $data['bundle_tag'] ?></td>
                                  <td><?php echo $data['bundle_status'] ?></td>
                                  <td><?php echo $data['bundle_earning'] ?></td>
                                  <td><?php echo $data['bundle_setting'] ?></td>
                                  <td>
                                    <a href="bundle-setting.php?bundle_code=<?php echo $data['bundle_code'] ?>" class="btn waves-effect waves-light orange darken-1">Settings</a>
                                  </td>
                                </tr>
                                <?php 
                                  }
                                ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th>Code</th>
                                  <th>Name</th>
                                  <th>Category</th>
                                  <th>Tag</th>
                                  <th>Status</th>
                                  <th>Earning</th>
                                  <th>Bundle Setting</th>
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
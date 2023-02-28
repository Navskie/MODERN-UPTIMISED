<?php 
  include 'include/header.php';
  include 'include/sidebar.php';
?>
<!--  
  Regular=====
  code
  desc
  points
  category - rebatable etc
  exclusive - for reseller
  tag - website
  status - active
  Optional
  * restrict

  PROMO CATEGORIES:
  - (REGULAR)
  - (REBATABLE) - (TIEUP)
  - (BOGO) BUY ONE GET ONE - (BOGO FREE)
  - (BAGAF) BUY ANY GET ANY - (BAGAF FREE)
  - (B150) BUY 1, GET NEXT AT 50%
  - (B170) BUY 1, GET NEXT AT 70%
-->
  <div id="main">
    <div class="container">
      <div class="row">




        <div class="col s12 m12 l3">
          <!-- CARD -->
            <div class="card recent-buyers-card animate fadeUp">
            <?php
                  if (isset($_POST['save'])) {
                    $item_code = $_POST['code'];
                    $item_name = $_POST['name'];
                    $item_point = $_POST['point'];
                    $item_category = $_POST['category'];
                    $item_tag = $_POST['tag'];
                    $item_status = $_POST['status'];
                    $item_earning = $_POST['earning'];
                    $item_maincode = $_POST['item_maincode'];

                    if ($item_category == 'BOGO') {
                      $item_category = 'BUY ONE GET ANY';
                    } elseif ($item_category == 'BAGAF') {
                      $item_category = 'BUY ANY GET ANY';
                    } elseif ($item_category == 'B150') {
                      $item_category = 'BUY ONE GET 50%';
                    } elseif ($item_category == 'B170') {
                      $item_category = 'BUY ONE GET 70%';
                    }

                    if ($item_code != '' && $item_point != '' && $item_name != '' && $item_category != '' && $item_status != '') {
                      $item_code_check = mysqli_query($connect, "SELECT * FROM items WHERE item_code = '$item_code'");

                      if (mysqli_num_rows($item_code_check) < 1) {
                        $items_encoded = mysqli_query($connect, "INSERT INTO items (
                          item_code,
                          item_maincode,
                          item_name,
                          item_points,
                          item_category,
                          item_tag,
                          item_status,
                          item_earning,
                          item_stamp
                        ) VALUES (
                          '$item_code',
                          '$item_maincode',
                          '$item_name',
                          '$item_point',
                          '$item_category',
                          '$item_tag',
                          '$item_status',
                          '$item_earning',
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
                <h4 class="card-title mb-0">Regular Item Information</h4>
                <br>
                <div class="row">

                  <div class="col s12 m12 l12">
                    <form action="regular.php" method="post">
                  </div>

                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <select class="select2 browser-default" id="default-select" name="code">
                        <option value="">Select Item Code</option>
                        <?php
                          $code_sql = mysqli_query($connect, "SELECT * FROM code ORDER BY id DESC");
                          foreach ($code_sql as $code_data) {
                        ?>
                        <option value="<?php echo $code_data['code_name'] ?>"><?php echo $code_data['code_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>



                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <select class="select2 browser-default" name="item_maincode">
                        <optgroup label="Main Code">
                          <option value="">Select Main Code</option>
                          <?php
                            $code_sql = mysqli_query($connect, "SELECT * FROM code ORDER BY id DESC");
                            foreach ($code_sql as $code_data) {
                          ?>
                          <option value="<?php echo $code_data['code_name'] ?>"><?php echo $code_data['code_name'] ?></option>
                          <?php } ?>
                        </optgroup>
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

                        <h4 class="card-title">Regular Item List</h4>
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
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $code_data = mysqli_query($connect, "SELECT * FROM items ORDER BY item_id DESC");
                                  foreach ($code_data as $data) {
                                ?>
                                <tr>
                                  <td><?php echo $data['item_code'] ?></td>
                                  <td><?php echo $data['item_name'] ?></td>
                                  <td><?php echo $data['item_category'] ?></td>
                                  <td><?php echo $data['item_tag'] ?></td>
                                  <td><?php echo $data['item_status'] ?></td>
                                  <td><?php echo $data['item_earning'] ?></td>
                                  <td>
                                    <a href="regular-setting.php?item_code=<?php echo $data['item_code'] ?>" class="btn waves-effect waves-light orange darken-1">Settings</a>
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
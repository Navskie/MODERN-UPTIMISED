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
                  $item_code = $_GET['item_code'];
                  $regular_order_sql = mysqli_query($connect, "SELECT * FROM items WHERE item_code = '$item_code'");
                  $regular_data = mysqli_fetch_array($regular_order_sql);

                  if (isset($_POST['save'])) {
                    $item_name = $_POST['name'];
                    $item_point = $_POST['point'];
                    $item_category = $_POST['category'];
                    $item_tag = $_POST['tag'];
                    $item_status = $_POST['status'];
                    $item_earning = $_POST['earning'];

                    if ($item_category == 'BOGO') {
                      $item_category = 'BUY ONE GET ANY';
                    } elseif ($item_category == 'BAGAF') {
                      $item_category = 'BUY ANY GET ANY';
                    } elseif ($item_category == 'B150') {
                      $item_category = 'BUY ONE GET 50%';
                    } elseif ($item_category == 'B170') {
                      $item_category = 'BUY ONE GET 70%';
                    }

                    if ($item_point != '' && $item_name != '' && $item_category != '' && $item_tag != '' && $item_status != '' && $item_earning != '') {
                     
                          $items_encoded_sql = "UPDATE items SET
                            item_name = '$item_name',
                            item_points = '$item_point',
                            item_category = '$item_category',
                            item_tag = '$item_tag',
                            item_status = '$item_status',
                            item_earning = '$item_earning',
                            item_stamp = '$stamp'
                          WHERE 
                            item_code = '$item_code'
                          ";
                          $items_encoded = mysqli_query($connect, $items_encoded_sql);

                    ?>
                        <script>window.location.href = 'regular-setting.php?item_code=<?php echo $item_code ?>';</script>
                    <?php
                          // header('location: regular-setting.php?item_code='.$item_code.'');
                      
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
                    <form action="regular-setting.php?item_code=<?php echo $item_code ?>" method="post">
                  </div>

                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <input placeholder="Unique Code (PN013)" id="first_name" type="text" class="validate" name="code" value="<?php echo $regular_data['item_code'] ?>" disabled>
                      <label for="first_name">Item Code</label>
                    </div>
                  </div>



                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <input placeholder="Example (Vital Wash)" id="first_name" type="text" class="validate" name="name" value="<?php echo $regular_data['item_name'] ?>">
                      <label for="first_name">Item Name</label>
                    </div>
                  </div>



                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <input placeholder="Example (13)" id="first_name" type="text" class="validate" name="point" value="<?php echo $regular_data['item_points'] ?>">
                      <label for="first_name">Points</label>
                    </div>
                  </div>

                  <!-- <div class="col s12 m12 l12"><hr><h4 class="card-title mb-0"><br>Regular Item Properties</h4></div> -->

                  <div class="col s12 m6 l6">
                    <div class="input-field">
                      <!-- <h6>Small</h6> -->
                      <div class="input-field">
                        <select class="select2-size-sm1 browser-default" id="small-select" name="category">
                          <option value="<?php echo $regular_data['item_category'] ?>"><?php echo $regular_data['item_category'] ?></option>
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
                          <option value="<?php echo $regular_data['item_tag'] ?>"><?php echo $regular_data['item_tag'] ?></option>
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
                          <option value="<?php echo $regular_data['item_status'] ?>"><?php echo $regular_data['item_status'] ?></option>
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
                        <option value="<?php echo $regular_data['item_earning'] ?>"><?php echo $regular_data['item_earning'] ?></option>
                        <option value="No Earnings">No Earnings</option>
                      </select>
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

                  <div class="col s12 m12 l4">
                    <form action="" method="post">
                      <h6>Exclusive Item</h6>
                      <br>
                      <div class="input-field col s12 m6 l8">
                        <select class="icons">
                          <option value="" disabled selected>Choose Product</option>
                          <option value="" data-icon="assets/images/avatar/avatar-7.png" class="circle">example 1</option>
                          <option value="" data-icon="assets/images/avatar/avatar-5.png" class="circle">example 2</option>
                          <option value="" data-icon="assets/images/avatar/avatar-3.png" class="circle">example 3</option>
                        </select>
                        <label>Item Restriction</label>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <button class="btn waves-effect waves-light green">Add</button>
                      </div>
                    </form>
                  </div>

                  


                  <div class="col s12 m12 l4">
                    <form action="" method="post">
                      <h6>Exclusive Country</h6>
                      <br>
                      <div class="input-field col s12 m6 l8">
                        <select class="icons">
                          <option value="" disabled selected>Choose Country</option>
                          <option value="" class="circle">example 1</option>
                        </select>
                        <label>Country Restriction</label>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <button class="btn waves-effect waves-light green">Add</button>
                      </div>
                    </form>
                  </div>





                  <div class="col s12 m12 l4">
                    <form action="" method="post">
                      <h6>Exclusive Reseller</h6>
                      <br>
                      <div class="input-field col s12 m6 l8">
                        <select class="icons">
                          <option value="" disabled selected>Choose Product</option>
                          <option value="" data-icon="assets/images/avatar/avatar-7.png" class="circle">example 1</option>
                          <option value="" data-icon="assets/images/avatar/avatar-5.png" class="circle">example 2</option>
                          <option value="" data-icon="assets/images/avatar/avatar-3.png" class="circle">example 3</option>
                        </select>
                        <label>Partner Product</label>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <button class="btn waves-effect waves-light green">Add</button>
                      </div>
                    </form>
                  </div>




                  <div class="col s12 m12 l4">
                    <br>
                    <table class="Highlight bordered centered">
                      <tr>
                        <th>Code</th>
                        <th>Product Name</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td>UP001</td>
                        <td>Whitesahde</td>
                        <td>
                          <a class="btn-floating mb-1 btn-flat waves-effect waves-light pink accent-2 white-text">
                            <i class="material-icons">content_cut</i>
                          </a>
                        </td>
                      </tr>
                    </table>
                  </div>

                  


                  <div class="col s12 m12 l4">
                    <br>
                    <table class="Highlight bordered centered">
                      <tr>
                        <th>Country Name</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td>PHILIPPINES</td>
                        <td>
                          <a class="btn-floating mb-1 btn-flat waves-effect waves-light pink accent-2 white-text">
                            <i class="material-icons">content_cut</i>
                          </a>
                        </td>
                      </tr>
                    </table>
                  </div>





                  <div class="col s12 m12 l4">
                    <br>
                    <table class="Highlight bordered centered">
                      <tr>
                        <th>Code</th>
                        <th>Reseller</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td>RS12</td>
                        <td>UPTIDEMO</td>
                        <td>
                          <a class="btn-floating mb-1 btn-flat waves-effect waves-light pink accent-2 white-text">
                            <i class="material-icons">content_cut</i>
                          </a>
                        </td>
                      </tr>
                    </table>
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
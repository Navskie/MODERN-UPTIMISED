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
              $bundle_code = $_GET['bundle_code'];

              $regular_order_sql = mysqli_query($connect, "SELECT * FROM bundle WHERE bundle_code = '$bundle_code'");
              $regular_data = mysqli_fetch_array($regular_order_sql);
            ?>
              <div class="card-content">
                <h4 class="card-title mb-0">Bundle Item Information</h4>
                <br>
                <div class="row">

                  <div class="col s12 m12 l12">
                    <form action="backend/bundle/information.php?bundle_code=<?php echo $bundle_code ?>" method="post">
                  </div>

                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <input placeholder="Unique Code (PN013)" id="first_name" type="text" class="validate" name="code" value="<?php echo $regular_data['bundle_code'] ?>" disabled>
                      <label for="first_name">Item Code</label>
                    </div>
                  </div>




                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <input placeholder="Example (Vital Wash)" id="first_name" type="text" class="validate" name="name" value="<?php echo $regular_data['bundle_name'] ?>">
                      <label for="first_name">Item Name</label>
                    </div>
                  </div>



                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <input placeholder="Example (13)" id="first_name" type="text" class="validate" name="point" value="<?php echo $regular_data['bundle_points'] ?>">
                      <label for="first_name">Points</label>
                    </div>
                  </div>

                  <!-- <div class="col s12 m12 l12"><hr><h4 class="card-title mb-0"><br>Regular Item Properties</h4></div> -->

                  <div class="col s12 m6 l6">
                    <div class="input-field">
                      <!-- <h6>Small</h6> -->
                      <div class="input-field">
                        <select class="select2-size-sm1 browser-default" id="small-select" name="category">
                          <option value="<?php echo $regular_data['bundle_category'] ?>"><?php echo $regular_data['bundle_category'] ?></option>
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
                          <option value="<?php echo $regular_data['bundle_tag'] ?>"><?php echo $regular_data['bundle_tag'] ?></option>
                          <option value="None">None</option>
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
                          <option value="<?php echo $regular_data['bundle_status'] ?>"><?php echo $regular_data['bundle_status'] ?></option>
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
                        <option value="<?php echo $regular_data['bundle_earning'] ?>"><?php echo $regular_data['bundle_earning'] ?></option>
                        <option value="No Earnings">No Earnings</option>
                      </select>
                    </div>
                  </div>



                  <div class="col s12 m12 l12">
                    <!-- <h6>Small</h6> -->
                    <div class="input-field">
                      <select class="select2-size-sm1 browser-default" id="small-select" name="setting">
                        <option value="<?php echo $regular_data['bundle_setting'] ?>"><?php echo $regular_data['bundle_setting'] ?></option>
                        <!-- <option value="">None</option> -->
                        <option value="RESELLER PACKAGE">RESELLER PACKAGE</option>
                        <option value="REGULAR PACKAGE">REGULAR PACKAGE</option>
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

                  <div class="col s12 m12 l6">
                    <form action="backend/bundle/exclusive-item.php?bundle_code=<?php echo $bundle_code ?>" method="post">
                      <h6>Exclusive Item</h6>
                      <br>
                      <div class="input-field col s12 m6 l8">
                        <select class="select2 browser-default" id="default-select" name="itemcode">
                          <option value="">Select Item</option>
                          <?php 
                            $item_sql = mysqli_query($connect, "SELECT * FROM code WHERE code_name != '$bundle_code' ORDER BY id DESC");
                            foreach ($item_sql as $data_item) {
                          ?>
                          <option value="<?php echo $data_item['code_name'] ?>"><?php echo $data_item['code_name'] ?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <button class="btn waves-effect waves-light green" name="exclusive">Add</button>
                      </div>
                    </form>
                      <br>
                      <table class="Highlight bordered centered">
                        <tr>
                          <th>Code</th>
                          <th>Product Name</th>
                          <th>Action</th>
                        </tr>
                        
                          <?php
                            $exclusive_item_sql = mysqli_query($connect, "SELECT * FROM exclusive_item WHERE exclusive = '$bundle_code'");
                            foreach ($exclusive_item_sql as $data_ex_item) {
                          ?>
                          <tr>
                            <td><?php echo $data_ex_item['ex_code'] ?></td>
                            <td><?php echo $data_ex_item['ex_name'] ?></td>
                            <td>
                              <form action="backend/bundle/exclusive-item.php?bundle_code=<?php echo $bundle_code ?>&&id=<?php echo $data_ex_item['id'] ?>" method="post">
                                <button class="btn-floating mb-1 btn-flat waves-effect waves-light pink accent-2 white-text" name="delete">
                                  <i class="material-icons">content_cut</i>
                                </button>
                              </form>
                            </td>
                          </tr>
                          <?php } ?>
                        
                      </table>
                  </div>


                  

                  <div class="col s12 m12 l6">
                    <form action="backend/bundle/exclusive-country.php?bundle_code=<?php echo $bundle_code ?>" method="post">
                      <h6>Exclusive Country</h6>
                      <br>
                      <div class="input-field col s12 m6 l8">
                        <select class="select2 js-example-programmatic browser-default" id="programmatic-single" name="country">
                          <option value="">Select Country</option>
                          <?php
                            $country_sql = mysqli_query($connect, "SELECT * FROM upti_country_currency");
                            foreach ($country_sql as $data_country) {
                          ?>
                            <option value="<?php echo $data_country['cc_country'] ?>"><?php echo $data_country['cc_country'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="input-field col s12 m6 l4">
                        <button class="btn waves-effect waves-light green" name="exclusive">Add</button>
                      </div>
                    </form>
                      <br>
                      <table class="Highlight bordered centered">
                        <tr>
                          <th>Product Name</th>
                          <th>Action</th>
                        </tr>

                        <?php
                            $exclusive_item_sql = mysqli_query($connect, "SELECT * FROM exclusive_country WHERE exclusive = '$bundle_code'");
                            foreach ($exclusive_item_sql as $data_ex_item) {
                          ?>
                          <tr>
                            <td><?php echo $data_ex_item['ex_country'] ?></td>
                            <td>
                              <form action="backend/bundle/exclusive-country.php?bundle_code=<?php echo $bundle_code ?>&&id=<?php echo $data_ex_item['id'] ?>" method="post">
                                <button class="btn-floating mb-1 btn-flat waves-effect waves-light pink accent-2 white-text" name="delete">
                                  <i class="material-icons">content_cut</i>
                                </button>
                              </form>
                            </td>
                          </tr>
                        <?php } ?>
                      </table>
                  </div>



                  <div class="col s12 m12 l12"><br><hr><br></div>



                  <div class="col s12 m12 l4">
                    <form action="" method="post">
                      <div class="input-field col s12 m12 l12">
                        <select class="icons" name="country">
                          <option value="" disabled selected>Choose Country</option>
                          <?php
                            $country_sql = mysqli_query($connect, "SELECT * FROM upti_country_currency");
                            foreach ($country_sql as $data_country) {
                          ?>
                          <option value="<?php echo $data_country['cc_country'] ?>" class="circle"><?php echo $data_country['cc_country'] ?></option>
                          <?php } ?>
                        </select>
                        <!-- <label>Country Restriction</label> -->
                      </div>
                      <div class="input-field col s6 m6 l6">
                        <input placeholder="Price" id="first_name" type="text" class="validate" name="price" autocomplete="OFF">
                        <!-- <label for="first_name">Item Name</label> -->
                      </div>
                      <div class="input-field col s6 m6 l6">
                        <input placeholder="Earnings" id="first_name" type="text" class="validate" name="earning" autocomplete="OFF">
                        <!-- <label for="first_name">Item Name</label> -->
                      </div>
                      <div class="input-field col s12 m12 l12">
                        <button class="btn waves-effect waves-light right red">Submit Price</button>
                      </div>
                    </form>
                  </div>

                  <div class="col s12 m12 l8">
                  <h6>Product Price per Country</h6>
                    <br>
                    <table class="Highlight bordered centered">
                      <tr>
                        <th>Country</th>
                        <th>System Price</th>
                        <th>Earnings</th>
                        <th>Action</th>
                      </tr>
                      <?php
                        $price_sql = mysqli_query($connect, "SELECT * FROM upti_country WHERE country_code = '$bundle_code'");
                        foreach ($price_sql as $data_price) {
                      ?>
                      <tr>
                        <td><?php echo $data_price['country_name'] ?></td>
                        <td><?php echo $data_price['country_price'] ?></td>
                        <td><?php echo $data_price['country_php'] ?></td>
                        <td>
                          <a class="btn-floating mb-1 btn-flat waves-effect waves-light pink accent-2 white-text">
                            <i class="material-icons">content_cut</i>
                          </a>
                        </td>
                      </tr>
                      <?php
                        }
                      ?>
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
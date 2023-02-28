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
                    $code_name = $_POST['code_name'];

                    if ($code_name != '') {
                      $item_code_check = mysqli_query($connect, "SELECT * FROM code WHERE code_name = '$code_name'");

                      if (mysqli_num_rows($item_code_check) < 1) {
                        $items_encoded = mysqli_query($connect, "INSERT INTO code (
                          code_name,
                          code_stamp
                        ) VALUES (
                          '$code_name',
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
                <h4 class="card-title mb-0">Create Item Code</h4>
                <br>
                <div class="row">

                  <div class="col s12 m12 l12">
                    <form action="code.php" method="post">
                  </div>




                  <div class="col s12 m6 l12">
                    <div class="input-field">
                      <input placeholder="Enter Unique Item Code" id="code_name" type="text" class="validate" name="code_name" autocomplete="OFF">
                      <label for="code_name">Code Name</label>
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
                                  <th>Date Added</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $code_data = mysqli_query($connect, "SELECT * FROM code ORDER BY id DESC");
                                  foreach ($code_data as $data) {
                                ?>
                                <tr>
                                  <td><?php echo $data['code_name'] ?></td>
                                  <td><?php echo $data['code_stamp'] ?></td>
                                  <td>
                                    <a href="code-setting.php?code_name=<?php echo $data['code_name'] ?>" class="btn waves-effect waves-light orange darken-1">Settings</a>
                                  </td>
                                </tr>
                                <?php 
                                  }
                                ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th>Code</th>
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
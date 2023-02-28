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
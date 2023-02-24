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
-->
  <div id="main">
    <div class="container">
      <div class="row">




      <form action="" method="post">
        <div class="col s12 m12 l8">
          <!-- CARD -->
            <div class="card recent-buyers-card animate fadeUp">
              <div class="card-content">
                <h4 class="card-title mb-0">Regular Item Information</h4>
                <br><br>
                <div class="row">

                  <div class="col s12 m6 l4">
                    <div class="input-field">
                      <input placeholder="Unique Code (PN013)" id="first_name" type="text" class="validate">
                      <label for="first_name">Item Code</label>
                    </div>
                  </div>



                  <div class="col s12 m6 l4">
                    <div class="input-field">
                      <input placeholder="Example (Vital Wash)" id="first_name" type="text" class="validate">
                      <label for="first_name">Item Name</label>
                    </div>
                  </div>



                  <div class="col s12 m6 l4">
                    <div class="input-field">
                      <input placeholder="Example (13)" id="first_name" type="text" class="validate">
                      <label for="first_name">Points</label>
                    </div>
                  </div>



                  <div class="col s12 m6 l4">
                    <div class="input-field">
                      <!-- <h6>Small</h6> -->
                      <div class="input-field">
                        <select class="select2-size-sm browser-default" id="small-select">
                          <option value="">Select Category</option>
                          <option value="rectangle">Rectangle</option>
                        </select>
                      </div>
                    </div>
                  </div>



                  <div class="col s12 m6 l4">
                    <div class="input-field">
                      <!-- <h6>Small</h6> -->
                      <div class="input-field">
                        <select class="select2-size-sm2 browser-default" id="small-select2">
                          <option value="">Select Category</option>
                          <option value="rectangle">Rectangle</option>
                        </select>
                      </div>
                    </div>
                  </div>




                  <div class="col s12 m6 l4">
                    <div class="input-field">
                      <!-- <h6>Small</h6> -->
                      <div class="input-field">
                        <select class="select2-size-sm3 browser-default" id="small-select3">
                          <option value="">Select Category</option>
                          <option value="rectangle">Rectangle</option>
                        </select>
                      </div>
                    </div>
                  </div>




                </div>
              </div>
            </div>
          <!-- CARD END -->
        </div>





        <div class="col s12 m12 l4">
          <!-- CARD -->
            <div class="card recent-buyers-card animate fadeUp">
              <div class="card-content">
                <h4 class="card-title mb-0">Top Resellers</h4>


              </div>
            </div>
          <!-- CARD END -->
        </div>
      </form>




      </div>
    </div>
  </div>
<?php 
  include 'include/footer.php'; 
?>
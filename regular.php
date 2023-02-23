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
                      <select class="select2-customize-result browser-default" multiple="multiple"
                        id="select2-customize-result">
                        <optgroup label="Category">
                          <option value="romboid">Romboid</option>
                          <option value="trapeze">Trapeze</option>
                          <option value="triangle">Triangle</option>
                          <option value="polygon">Polygon</option>
                          <option value="red">Red</option>
                          <option value="green">Green</option>
                          <option value="blue">Blue</option>
                          <option value="purple">Purple</option>
                        </optgroup>
                      </select>
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
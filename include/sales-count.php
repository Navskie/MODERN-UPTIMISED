        <?php 
          // Pending Orders
          $pending_sql = mysqli_query($connect, "SELECT SUM(ol_php) AS pending_sum, COUNT(*) AS pending_count FROM upti_transaction INNER JOIN upti_order_list ON ol_poid = trans_poid WHERE trans_status = '$pending'");
          $pending_data = mysqli_fetch_array($pending_sql);

          $pending_count = $pending_data['pending_count'];
          $pending_sum = $pending_data['pending_sum'];
          // Pending Orders End





          // On Process Orders
          $onprocess_sql = mysqli_query($connect, "SELECT SUM(ol_php) AS onprocess_sum, COUNT(*) AS onprocess_count FROM upti_transaction INNER JOIN upti_order_list ON ol_poid = trans_poid WHERE trans_status = '$onprocess'");
          $onprocess_data = mysqli_fetch_array($onprocess_sql);

          $onprocess_count = $onprocess_data['onprocess_count'];
          $onprocess_sum = $onprocess_data['onprocess_sum'];
          // On Process Orders End





          // In Transit Orders
          $intransit_sql = mysqli_query($connect, "SELECT SUM(ol_php) AS intransit_sum, COUNT(*) AS intransit_count FROM upti_transaction INNER JOIN upti_order_list ON ol_poid = trans_poid WHERE trans_status = '$intransit'");
          $intransit_data = mysqli_fetch_array($intransit_sql);

          $intransit_count = $intransit_data['intransit_count'];
          $intransit_sum = $intransit_data['intransit_sum'];
          // In Transit Orders End





          // RTS Orders
          $rts_sql = mysqli_query($connect, "SELECT SUM(ol_php) AS rts_sum, COUNT(*) AS rts_count FROM upti_transaction INNER JOIN upti_order_list ON ol_poid = trans_poid WHERE trans_status = '$rts'");
          $rts_data = mysqli_fetch_array($rts_sql);

          $rts_count = $rts_data['rts_count'];
          $rts_sum = $rts_data['rts_sum'];
          // RTS Orders End
        ?>
        
        
        <div class="col s12 l8">
          <div class="row">


            <div class="col s12 l6">
              <div class="card padding-4 animate fadeLeft">
                <div class="row">
                  <div class="col s5 m5">
                      <h5 class="mb-0"><?php echo $pending_count ?></h5>
                      <p class="no-margin">Pending Orders</p>
                      <p class="mb-0 pt-8"><?php echo number_format($pending_sum, '2') ?></p>
                  </div>
                  <div class="col s7 m7 right-align">
                      <i class="material-icons background-round mt-5 mb-5 gradient-45deg-brown-brown gradient-shadow white-text">add_shopping_cart</i>
                      <!-- <p class="mb-0">Total Clients</p> -->
                  </div>
                </div>
              </div>
            </div>


            <div class="col s12 l6">
              <div class="card padding-4 animate fadeLeft">
                <div class="row">
                  <div class="col s5 m5">
                      <h5 class="mb-0"><?php echo $onprocess_count ?></h5>
                      <p class="no-margin">On Process Orders</p>
                      <p class="mb-0 pt-8"><?php echo number_format($onprocess_sum, '2') ?></p>
                  </div>
                  <div class="col s7 m7 right-align">
                      <i class="material-icons background-round mt-5 mb-5 gradient-45deg-blue-indigo gradient-shadow white-text">assignment_turned_in</i>
                      <!-- <p class="mb-0">Total Clients</p> -->
                  </div>
                </div>
              </div>
            </div>


            <div class="col s12 l6">
              <div class="card padding-4 animate fadeLeft">
                <div class="row">
                  <div class="col s5 m5">
                      <h5 class="mb-0"><?php echo $intransit_count ?></h5>
                      <p class="no-margin">In Transit Orders</p>
                      <p class="mb-0 pt-8"><?php echo number_format($intransit_sum, '2') ?></p>
                  </div>
                  <div class="col s7 m7 right-align">
                      <i class="material-icons background-round mt-5 mb-5 gradient-45deg-orange-deep-orange gradient-shadow white-text">directions_bus</i>
                      <!-- <p class="mb-0">Total Clients</p> -->
                  </div>
                </div>
              </div>
            </div>


            <div class="col s12 l6">
              <div class="card padding-4 animate fadeLeft">
                <div class="row">
                  <div class="col s5 m5">
                      <h5 class="mb-0"><?php echo $rts_count ?></h5>
                      <p class="no-margin">Return to Sender Orders</p>
                      <p class="mb-0 pt-8"><?php echo number_format($rts_sum, '2') ?></p>
                  </div>
                  <div class="col s7 m7 right-align">
                      <i class="material-icons background-round mt-5 mb-5 gradient-45deg-red-pink gradient-shadow white-text">redo</i>
                      <!-- <p class="mb-0">Total Clients</p> -->
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
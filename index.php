<?php 
  include 'include/header.php';
  include 'include/sidebar.php';
?>

  <div id="main">
    <div class="container">
      <div class="row">

        <!-- Sales Count ###### include/sales-count.php -->
        <?php require_once 'include/sales-count.php'; ?>
        <!-- Sales Count End ###### -->

        <div class="col s12 l4">
          <!-- Recent Buyers -->
          <div class="card recent-buyers-card animate fadeUp">
            <div class="card-content">
              <h4 class="card-title mb-0">Top Resellers</h4>
              <!-- <p class="medium-small pt-2">Today</p> -->

              <?php
                $loop = "SELECT users_name, SUM(ol_php) AS reseller_rank FROM upti_order_list INNER JOIN upti_users ON ol_reseller = users_code INNER JOIN upti_activities ON activities_poid = ol_poid WHERE users_role = 'UPTIRESELLER' AND users_status = 'Active' AND users_position = '' AND activities_caption = 'Order Delivered' AND activities_date BETWEEN '02-01-2023' AND '02-28-2023' GROUP BY ol_reseller ORDER BY reseller_rank DESC LIMIT 10";
                $loop_rank = mysqli_query($connect, $loop);
                // $rank_fetch = mysqli_fetch_array($loop_rank);

                foreach ($loop_rank as $rank_fetch) {
              ?>
              <ul class="collection mb-0">
                <li class="collection-item avatar">
                  <img src="assets/images/avatar/avatar-5.png" alt="" class="circle">
                  <p class="font-weight-600"><?php echo $rank_fetch['users_name'] ?></p>
                  <p class="medium-small"><?php echo $rank_fetch['reseller_rank'] ?></p>
                  <a href="#!" class="secondary-content"><i class="material-icons">star_border</i></a>
                </li>
              </ul>
              <?php } ?>

            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
<?php 
  include 'include/footer.php'; 
?>
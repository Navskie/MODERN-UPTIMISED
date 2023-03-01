<?php 

    include '../../resource/connect.php';

    $bundle_code = $_GET['bundle_code'];

    if (isset($_POST['save'])) {
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

      if ($bundle_point != '' && $bundle_name != '' && $bundle_category != '' && $bundle_status != '') {
        
            $items_encoded_sql = "UPDATE bundle SET
              bundle_setting = '$bundle_setting',
              bundle_name = '$bundle_name',
              bundle_points = '$bundle_point',
              bundle_category = '$bundle_category',
              bundle_tag = '$bundle_tag',
              bundle_status = '$bundle_status',
              bundle_earning = '$bundle_earning',
              bundle_stamp = '$stamp'
            WHERE 
              bundle_code = '$bundle_code'
            ";
            $items_encoded = mysqli_query($connect, $items_encoded_sql);

      ?>
          <script>window.location.href = '../../bundle-setting.php?bundle_code=<?php echo $bundle_code ?>';</script>
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
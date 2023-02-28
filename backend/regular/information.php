<?php 

    include '../../resource/connect.php';

    $item_code = $_GET['item_code'];

    if (isset($_POST['save'])) {
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

      if ($item_point != '' && $item_name != '' && $item_category != '' && $item_status != '') {
        
            $items_encoded_sql = "UPDATE items SET
              item_maincode = '$item_maincode',
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
          <script>window.location.href = '../../regular-setting.php?item_code=<?php echo $item_code ?>';</script>
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
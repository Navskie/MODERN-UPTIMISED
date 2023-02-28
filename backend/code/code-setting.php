<?php 

  include '../../resource/connect.php';

  $codename = $_GET['code_name'];

  if (isset($_POST['save'])) {
    $code_name = $_POST['code_name'];

    if ($code_name != '') {
     
          $code_encoded_sql = "UPDATE code SET
            code_name = '$code_name',
            code_stamp = '$stamp'
          WHERE 
            code_name = '$codename'
          ";
          $code_encoded = mysqli_query($connect, $code_encoded_sql);

          $code_items_sql = mysqli_query($connect, "UPDATE items SET item_code = '$code_name' WHERE item_code = '$codename'");

    ?>
        <script>window.location.href = '../../code-setting.php?code_name=<?php echo $code_name ?>';</script>
    <?php                      
    } else {
    ?>
        <script>alert('System Error : All fields are required');window.location.href = '../../code-setting.php?code_name=<?php echo $code_name ?>';</script>
    <?php
      // echo '<div class="card-alert card red lighten-5">
      //         <div class="card-content red-text">
      //           <p>System Error : All fields are required</p>
      //         </div>
      //         <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
      //           <span aria-hidden="true">×</span>
      //         </button>
      //       </div>';
    }
  }

?>
<?php 

  include '../../resource/connect.php';

  $bundle_code = $_GET['bundle_code'];

  if (isset($_POST['exclusive'])) {
    $country = $_POST['country'];

    $exclusive_sql = mysqli_query($connect, "INSERT INTO exclusive_country (exclusive, ex_country, ex_stamp) VALUES ('$bundle_code', '$country', '$stamp')");
  
  ?>
  <!-- <script>window.location.href = '../../bundle-setting.php?bundle_code=<?php echo $bundle_code ?>';</script> -->
  <?php

  }

  if (isset($_POST['delete'])) {
    $id = $_GET['id'];

    $delete_sql = mysqli_query($connect, "DELETE FROM exclusive_country WHERE id = '$id'");
  
  ?>
  <script>window.location.href = '../../bundle-setting.php?bundle_code=<?php echo $bundle_code ?>';</script>
  <?php

  }

?>
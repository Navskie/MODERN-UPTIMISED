<?php 

  include '../../resource/connect.php';

  $item_code = $_GET['item_code'];

  if (isset($_POST['exclusive'])) {
    $country = $_POST['country'];

    $exclusive_sql = mysqli_query($connect, "INSERT INTO exclusive_country (exclusive, ex_country, ex_stamp) VALUES ('$item_code', '$country', '$stamp')");
  
  ?>
  <script>window.location.href = '../../regular-setting.php?item_code=<?php echo $item_code ?>';</script>
  <?php

  }

  if (isset($_POST['delete'])) {
    $id = $_GET['id'];

    $delete_sql = mysqli_query($connect, "DELETE FROM exclusive_country WHERE id = '$id'");
  
  ?>
  <script>window.location.href = '../../regular-setting.php?item_code=<?php echo $item_code ?>';</script>
  <?php

  }

?>
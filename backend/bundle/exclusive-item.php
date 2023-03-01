<?php 

  include '../../resource/connect.php';

  $bundle_code = $_GET['bundle_code'];

  if (isset($_POST['exclusive'])) {
    $itemcode = $_POST['itemcode'];

    $get_item_name = mysqli_query($connect, "SELECT * FROM items WHERE item_code = '$itemcode'");
    $get_item_name_fetch = mysqli_fetch_array($get_item_name);

    $name = $get_item_name_fetch['item_name'];

    $exclusive_sql = mysqli_query($connect, "INSERT INTO exclusive_item (exclusive, ex_code, ex_name, ex_stamp) VALUES ('$bundle_code', '$itemcode', '$name', '$stamp')");
  
  ?>
  <script>window.location.href = '../../bundle-setting.php?bundle_code=<?php echo $bundle_code ?>';</script>
  <?php

  }

  if (isset($_POST['delete'])) {
    $id = $_GET['id'];

    $delete_sql = mysqli_query($connect, "DELETE FROM exclusive_item WHERE id = '$id'");
  
  ?>
  <script>window.location.href = '../../bundle-setting.php?bundle_code=<?php echo $bundle_code ?>';</script>
  <?php

  }

?>
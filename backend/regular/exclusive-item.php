<?php 

  include '../../resource/connect.php';

  $item_code = $_GET['item_code'];

  if (isset($_POST['exclusive'])) {
    $itemcode = $_POST['itemcode'];

    $get_item_name = mysqli_query($connect, "SELECT * FROM items WHERE item_code = '$itemcode'");
    $get_item_name_fetch = mysqli_fetch_array($get_item_name);

    $name = $get_item_name_fetch['item_name'];

    $exclusive_sql = mysqli_query($connect, "INSERT INTO exclusive_item (exclusive, ex_code, ex_name, ex_stamp) VALUES ('$item_code', '$itemcode', '$name', '$stamp')");
  
  ?>
  <script>window.location.href = '../../regular-setting.php?item_code=<?php echo $item_code ?>';</script>
  <?php

  }

  if (isset($_POST['delete'])) {
    $id = $_GET['id'];

    $delete_sql = mysqli_query($connect, "DELETE FROM exclusive_item WHERE id = '$id'");
  
  ?>
  <script>window.location.href = '../../regular-setting.php?item_code=<?php echo $item_code ?>';</script>
  <?php

  }

?>
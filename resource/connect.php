<?php

  // $connect = mysqli_connect('localhost', 'u708090748_uptimised', '@User2022', 'u708090748_uptimisedph'); 
  $connect = mysqli_connect('localhost', 'root', '', 'uptimisedph');

  $pending = 'Pending';
  $onprocess = 'On Process';
  $intransit = 'In Transit';
  $delivered = 'Delivered';
  $canceled = 'Canceled';
  $rts = 'RTS';

  date_default_timezone_set('Asia/Manila');
  $date = date("m-d-Y");
  $time = date('h:i:sa');

  $stamp = $date. ' - ' .$time;

?>
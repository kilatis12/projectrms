<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'rms-database';

  $conn = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }

  if(isset($_POST['button'])){

    $newstatus = $_POST['option-status'];
    $aid = $_POST['a_id'];

    echo $newstatus;
    echo $aid;

    $queryUpdateStatus = "UPDATE applicants SET a_status ='$newstatus' WHERE application_ID ='$aid'";
    $sqlUpdateStatus = mysqli_query($conn, $queryUpdateStatus);

    echo "<script> alert('status updated'); window.location.href='../applicants.php';</script>";
  }

?>

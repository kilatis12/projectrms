<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'rms-database';

  $conn = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }

  $aid = $_REQUEST['a_id'];

  echo $aid;

  $queryDeleteApp = "DELETE FROM applicants where application_ID = '$aid'";
  $sqlDeleteApp = mysqli_query($conn, $queryDeleteApp);

  echo "<script> alert('Application deleted'); window.location.href='../applicants.php';</script>";
 // ?>

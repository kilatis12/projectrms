<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'rms-database';

  $conn = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }

  if(isset($_POST['create'])){

    $name = $_POST['employee'];
    $user = $_POST['adminuser'];
    $password = $_POST['adminpassword'];
    $date = date("Y-m-d");

    $queryCreateAdmin = "INSERT INTO admin VALUES(null, '$name', '$user', '$password','$date')";
    $sqlCreateAdmin = mysqli_query($conn, $queryCreateAdmin);

    echo "<script> alert('status updated'); window.location.href='../settings.php';</script>";

  }


?>

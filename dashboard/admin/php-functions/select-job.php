<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'rms-database';

  $conn = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }
    session_start();
    if(isset($_POST['select-job'])){
      $_SESSION['jobid'] = $_POST['job-title'];
      echo "<script>window.location.href='../applicants.php';</script>";
    }

 ?>

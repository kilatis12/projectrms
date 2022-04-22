<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'rms-database';

  $conn = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }

  if(isset($_POST['edit-status'])){
    $jobid = $_POST['job_id'];
    $status = $_POST['status'];

    $queryEdit = "UPDATE jobs SET status= '$status' WHERE job_ID = '$jobid'";
    $sqlEdit = mysqli_query($conn, $queryEdit);

    echo "<script> alert('status updated'); window.location.href='../joboptions.php';</script>";
  }



?>

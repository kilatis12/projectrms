<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'rms-database';

  $conn = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }

  $jobid = $_REQUEST['jobid'];

  $queryDeleteJob = "DELETE FROM jobs where job_ID = '$jobid'";
  $sqlDeleteJob = mysqli_query($conn, $queryDeleteJob);

  echo "<script> alert('deleted successfully'); window.location.href='../joboptions.php';</script>";
 ?>

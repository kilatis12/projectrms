<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'rms-database';

  $conn = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }

  if(isset($_POST['new-job'])){

    $title = $_POST['title'];
    $description = $_POST['Description'];
    $salary = $_POST['range'];
    $requirements = $_POST['requirements'];
    $jobtype = $_POST['job-type'];
    $date = date("Y-m-d H:i:s");

  $queryNewJob = "INSERT INTO jobs VALUES(null, '$title', '$description', '$salary', '$requirements', '$jobtype', 'active','$date')";
  $sqlNewJob = mysqli_query($conn, $queryNewJob);

  echo "<script> alert('Added successfully'); window.location.href='../joboptions.php';</script>";

}


?>

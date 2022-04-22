<?php

  require ('../php-functions/database.php');

  if(isset($_POST['view'])){

    $job_ID = $_POST['job_ID'];

    $queryDisplayJob = "SELECT * FROM jobs where job_ID = '$job_ID'";
    $sqlDisplayJob = mysqli_query($conn, $queryDisplayJob);

    echo "<script>window.location.href='../dashboard/jobdetails.php';</script>";
  }
?>

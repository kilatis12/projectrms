<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'rms-database';

  $conn = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }

  $queryActiveCampaign = "SELECT * FROM jobs where status = 'active'";
  $sqlActiveCampaign = mysqli_query($conn, $queryActiveCampaign);

  $queryInactiveCampaign = "SELECT * FROM jobs where status = 'inactive'";
  $sqlInactiveCampaign = mysqli_query($conn, $queryInactiveCampaign);

  $queryJobs = "SELECT * FROM jobs order by job_id";
  $sqlJobs = mysqli_query($conn, $queryJobs);
?>

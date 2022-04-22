<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'rms-database';

  $conn = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }

  $queryAccountsReg = "SELECT COUNT(userid) as total from accounts";
  $sqlAccountsReg = mysqli_query($conn, $queryAccountsReg);

  $queryApplicationSub = "SELECT COUNT(application_ID) as total from applicants";
  $sqlApplicationSub = mysqli_query($conn, $queryApplicationSub);

  $queryJobCampaign = "SELECT COUNT(job_ID) as total from jobs";
  $sqlJobCampaign = mysqli_query($conn, $queryJobCampaign);

  $queryPendingApp = "SELECT COUNT(a_status) as total from applicants where a_status = 'pending'";
  $sqlPendingApp = mysqli_query($conn, $queryPendingApp);
 ?>

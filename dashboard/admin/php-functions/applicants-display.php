<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'rms-database';

  $conn = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }


  $queryApplicants = "SELECT applicants.job_ID, applicants.application_ID, applicants.date, applicants.a_status, accounts.userID, accounts.firstname, accounts.lastname, file_upload.file from applicants inner join file_upload on applicants.user_ID = file_upload.user_ID inner join accounts on file_upload.user_ID = accounts.userID";
  $sqlApplicants = mysqli_query($conn, $queryApplicants);


?>

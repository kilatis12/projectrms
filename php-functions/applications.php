<?php

  require ('../php-functions/database.php');

  $queryApplicants = "SELECT * FROM applicants INNER JOIN jobs ON applicants.job_ID = jobs.job_ID ORDER BY applicants.application_ID";
  $sqlApplicants = mysqli_query($conn, $queryApplicants);

 ?>

<?php
  require ('../php-functions/database.php');

  $queryJobs = "SELECT * FROM jobs";
  $sqlJobs = mysqli_query($conn, $queryJobs);

 ?>

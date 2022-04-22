<?php

  require ('../php-functions/database.php');

  if(isset($_POST['cancel'])){
    $application_ID = $_POST['application_ID'];

    $queryCancel = "DELETE FROM applicants WHERE application_ID = '$application_ID'";
    $sqlCancel = mysqli_query($conn, $queryCancel);

    echo "<script> alert('Application canceled'); window.location.href='../dashboard/user.php';</script>";
  }

 ?>

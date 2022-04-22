<?php
  session_start();
  require ('../php-functions/database.php');

  if(isset($_POST['apply'])){
    $job_ID = $_POST['job_ID'];
    $user_ID = $_POST['user_ID'];
    $coverletter = $_POST['coverletter'];
    $date = date("Y-m-d");

    $queryApply = "INSERT INTO applicants values (null, '$job_ID', '$user_ID', '$coverletter','pending','$date')";
    $sqlApply = mysqli_query($conn, $queryApply);

    echo "<script> alert('Application submitted'); window.location.href='../dashboard/user.php';</script>";
  }

 ?>

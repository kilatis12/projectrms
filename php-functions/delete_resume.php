<?php

  require ('../php-functions/database.php');

  if(isset($_POST['delete_resume'])) {

    $userID = $_POST['user_ID'];
    $filename = $_POST['filename'];
    $path = "upload/";
    $dir = $path.$filename;

    unlink($dir);

    $queryDelete_resume = "DELETE FROM file_upload WHERE user_ID = '$userID'";
    $sqlDelete_resume = mysqli_query($conn, $queryDelete_resume);


    echo "<script> alert('deleted'); window.location.href='../dashboard/user.php';</script></script>";

  }
 ?>

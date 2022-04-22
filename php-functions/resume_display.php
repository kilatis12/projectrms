<?php
  require ('../php-functions/database.php');

  $userID = $_SESSION['userID'];

  $queryResumeDisplay = "SELECT * FROM file_upload WHERE user_ID = '$userID'";
  $sqlResumeDisplay = mysqli_query($conn, $queryResumeDisplay);

 ?>

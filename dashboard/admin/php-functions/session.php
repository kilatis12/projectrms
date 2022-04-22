<?php

  session_start();

  if($_SESSION['admin-status'] == 'false' || empty($_SESSION['admin-status'])){
    $_SESSION['admin-status'] = 'false';
  }

  if($_SESSION['status'] == 'correct'){
    header ("location: /rms-company/dashboard/user.php");
  }
 ?>

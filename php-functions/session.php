<?php

  session_start();

  if($_SESSION['admin-status'] == 'true'){
    header ("location: /rms-company/dashboard/admin/dashboard.php");
  }

  if($_SESSION['status'] == 'false' || empty($_SESSION['status'])){
    $_SESSION['status'] = 'false';
  }

  if($_SESSION['status'] == 'true'){
    header ("location: /rms-company/dashboard/user.php");
  }


 ?>

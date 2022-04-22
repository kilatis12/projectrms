<?php
  session_start();

  $_SESSION['admin-status'] = 'false';
  unset($_SESSION['userID']);
  header ('Location: /rms-company/index.php');
  session_destroy()
 ?>

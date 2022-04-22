<?php
  session_start();

  $_SESSION['status'] = 'false';
  header ('Location: /rms-company/pages/login.php');
  session_destroy()
 ?>

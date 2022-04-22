<?php

  require ('../php-functions/database.php');

  $queryProfile = "SELECT * FROM accounts";
  $sqlProfile = mysqli_query($conn, $queryProfile);
  
 ?>

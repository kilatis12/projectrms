<?php
  require('../php-functions/database.php');
  require('../php-functions/session.php');

  if(isset($_POST['button'])){

    $email = $_POST['emailad'];
    $password = $_POST['pass'];


    $queryValidate = "SELECT * FROM accounts WHERE email = '$email' AND password = '$password' ";
    $queryAdmin = "SELECT * FROM admin WHERE adminuser = '$email' AND adminpass = '$password' ";
    $sqlValidate = mysqli_query($conn, $queryValidate);
    $sqlAdminValidate = mysqli_query($conn, $queryAdmin);
    $accountsResult = mysqli_fetch_assoc($sqlValidate);
    $_SESSION['userID'] = $accountsResult['userID'];
    $_SESSION['jobid'] = null;


    if(mysqli_num_rows($sqlValidate) > 0){
      $_SESSION['status'] = 'true';
      echo "<script> window.location.href='../dashboard/user.php';</script>";
    }
    elseif(mysqli_num_rows($sqlAdminValidate) > 0){
      $_SESSION['admin-status'] = 'true';
      echo "<script> alert(' ADMIN '); window.location.href='../dashboard/admin/dashboard.php';</script>";
    }
    else {
      $_SESSION['status'] = 'false';
      echo "<script>alert('Invalid credentials'); window.location.href='login.php';</script>";
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="reglog.css">
  <title>Log in</title>
</head>
<body>
  <header class="navbar">
      <div>
      <a href="../index.php"><h1 class="weblogo">Company</h1></a>
      </div>
  </header>
  <div class="signup-column">
        <form class="signup-form" action="login.php" method="post">
          <img src="../images/login.png" alt="logo">
          <div class="signup-box">
          <label for="emailad">Email</label>
          <input type="text" name="emailad" value="" required placeholder="abc@xyz.com">
          <label for="pass">Password</label>
          <input type="password" name="pass" value="" required placeholder="">
          <button type="submit" name="button">Log In</button>
          </div>
          <p>don`t have an account?</p>
          <button class="notregistered" type="button" onclick="window.location.href='signup.php'" name="button">Sign up</button>
        </form>
  </div>

</body>
</html>

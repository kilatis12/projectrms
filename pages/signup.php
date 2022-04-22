<?php
  require('../php-functions/session.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="reglog.css">
  <title>Sign up</title>
</head>
<body>
  <header class="navbar">
      <div>
      <a href="../index.php"><h1 class="weblogo">Company</h1></a>
      </div>
  </header>
  <div class="signup-column">
        <form class="signup-form" action="../php-functions/signup.php" method="post">
          <img src="../images/signup.png" alt="logo">
          <div class="signup-box">
          <label for="fname" style="  text-align: left;">Firstname</label>
          <input type="text" name="fname" value="" required>
          <label for="lname">Lastname</label>
          <input type="text" name="lname" value="" required>
          <label for="age">Age</label>
          <input type="text" name="age" value="" maxlength="3" required>
          <label for="date-of-birth">Date of Birth</label>
          <input type="date" name="date-of-birth" value="" required>
          <label for="gender">Gender</label>
          <input type="text" name="gender" value="" required>
          <label for="address">Address</label>
          <input type="text" name="address" value="" required>
          <label for="school">University/College</label>
          <input type="text" name="school" value="" required>
          <label for="emailad">Email</label>
          <input type="email" name="emailad" value="" required placeholder="abc@xyz.com">
          <label for="pass">Password</label>
          <input type="password" name="pass" value="" required placeholder="">
          <label for="pass-retype">Retype Password</label>
          <input type="password" name="pass-retype" value="" required placeholder="">
          <button type="submit" name="sbutton">Signup</button>
          <a href="login.php">Already have an account ? Log in here.</a>
          </div>
        </form>
  </div>

</body>
</html>

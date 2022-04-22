<!-- <?php
  require('./php-functions/session.php');
 ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Company Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="script.js" defer charset="utf-8"></script>
  <script src="https://kit.fontawesome.com/3538880d88.js" defer crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles.css">
<body id="home">
  <header class="navbar">
      <div id="navlogo">
      <a href="index.php"><h1 class="weblogo">Company</h1></a>
      </div>
      <button id="btn" type="button" name="button"><i class="fa-solid fa-bars"></i></button>
      <div class="navbuttons">
      <a id="navbutton" class="navbutton" href="pages/login.php">Login</a>
      <a class="navbutton" href="pages/signup.php">Signup</a>
      <a class="navbutton" href="#Contact">Contact Us</a>
      <a class="navbutton" href="#About">About</a>
      <a class="navbutton" href="#home">Home</a>
      <button id="ex" type="button" name="button"><i class="fa-solid fa-x"></i></button>
      </div>
  </header>
  <div class="introduction">
    <h1>Hiring the best people.</h1>
    <h2>Join us and send your application today!</h2>
    <a class="getstartedbutton" href="pages/signup.php">Get Started.</a>
    <div class="divimg">
      <img src="images/frontline.png" alt="" style="width: 120px; height: 120px;">
    </div>
  </div>

  <div id="About" class="aboutpage">
    <div>
      <h1>About</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nobis, non placeat dicta, ducimus aliquid laboriosam temporibus est molestiae, modi voluptatum repellendus porro ea illum quidem voluptate voluptatem! Ipsam quidem unde esse odio ipsa eos est soluta consequuntur. Fuga perspiciatis tempore inventore. Explicabo modi soluta fugit ipsa hic accusamus expedita.</p>
      <h1>Mission</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque reprehenderit ea sunt magnam labore suscipit incidunt, perferendis ipsa cum nesciunt autem, placeat temporibus rerum. Nesciunt asperiores eum cupiditate, qui omnis, consequuntur corporis expedita necessitatibus error deleniti in. Rerum cupiditate repellat quod maxime dolorem, velit distinctio praesentium nostrum, necessitatibus reiciendis quam?</p>
    </div>
    <div class="aboutimage">
      <img src="images/people.png" alt="people" style=" width: 30rem;">
    </div>
  </div>
  <div id="Contact" class="contactus">
    <h1>Contact</h1>
    <hr>
    <div class="logo">
      <a href="https://www.facebook.com" target="_blank"><img src="images/facebook.png" alt="Facebook"></a>
      <a href="https://mail.google.com/mail/u/lee@example.org/?view=cm&to=rms@gmail.com" target="_blank"><img src="images/gmail.png" alt="Gmail"></a>
      <a href="https://www.linkedin.com/" target="_blank"><img src="images/linkedin.png" alt="Linkedin"></a>
      <hr>
    </div>
  </div>
  <footer>
    <p>Company 2022®</p>
  </footer>
</body>
</html>

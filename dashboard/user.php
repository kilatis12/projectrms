<?php
  session_start();
  require ('../php-functions/jobs.php');
  require ('../php-functions/profile.php');
  require ('../php-functions/applications.php');
  require ('../php-functions/resume_display.php');



  if($_SESSION['status'] == 'false' || empty($_SESSION['status'])){
    header ('Location: /rms-company/index.php');
    session_destroy();
  }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="user.css">
  <script src="user.js" charset="utf-8" defer></script>
  <script src="https://kit.fontawesome.com/3538880d88.js" defer crossorigin="anonymous"></script>
  <title>Company</title>
</head>
<body>
  <header class="navbar">
    <div id="navlogo">
      <a href="user.php" style="text-decoration:none;"><h1 class="weblogo">Company</h1></a>
    </div>
    <button id="btn" type="button" name="button"><i class="fa-solid fa-circle-chevron-down"></i></button>
    <div class="navbuttons">
      <a class="navbutton" data-tab-target="#Profile-Settings">Profile Settings</a>
      <a class="navbutton" data-tab-target="#Job-Applications">Job Applications</a>
      <a class="navbutton" data-tab-target="#Jobs-Available">Jobs Available</a>
    </div>
    <form class="logout" action="/rms-company/php-functions/logout.php" method="post">
        <input type="submit" name="logout" value="Log Out">
    </form>
  </header>
<!--------------------------------------------------------------------------------------------------------------------------------->
  <div class="tab-content">
<!--------------------------------------------------------------------------------------------------------------------------------->
    <div id="Jobs-Available" class="tab active " data-tab-content>
      <p class="title-tab">Jobs Available</p>
      <hr>
      <div class="grid-content">

        <?php while($results = mysqli_fetch_assoc($sqlJobs)) {
          $userID = $_SESSION['userID'];
          if($results['status'] == 'active'){?>
            <div class="wrapper-1">
              <div class="contents-1">
                <h1 style="text-transform: uppercase;"><?php echo $results['title']?></h1>
                <p style="font-size:0.9rem;">Job ID: <?php echo $results['job_ID']?></p>
                <h2>Description:</h2>
                <span class="desc" style="font-size: 0.8rem;"><?php echo $results['description']?></span>
                <form class="" action="jobdetails.php" method="post">
                <input type="hidden" name="job_ID" value="<?php echo $results['job_ID']?>">
                <button class="view" type="submit" name="view">View more details</button>
                </form>
              </div>
            </div>
      <?php }}?>

      </div>
    </div>
<!--------------------------------------------------------------------------------------------------------------------------------->
    <div id="Job-Applications" class="tab" data-tab-content>
      <p class="title-tab">Job Applications</p>
      <hr>
      <?php while($results = mysqli_fetch_assoc($sqlApplicants)) {
      $userID = $_SESSION['userID'];
      if($results['user_ID'] == $userID ){?>
      <div class="wrapper-2">
        <div class="contents-2">
          <h1><?php echo $results['title']?></h1>
          <p>Application ID: <?php echo $results['application_ID']?></p>
          <p>Job ID: <?php echo $results['job_ID']?></p>
          <p>Status: <?php echo $results['a_status']?></p>
          <form class="" action="../php-functions/delete_app.php" method="post">
          <input type="hidden" name="application_ID" value="<?php echo $results['application_ID']?>">
          <button class="view1" type="submit" name="cancel">Cancel Application</button>
          </form>
        </div>
      </div>
      <?php }}?>
    </div>
<!--------------------------------------------------------------------------------------------------------------------------------->
    <div id="Profile-Settings" class="tab-profile" data-tab-content>
      <p class="title-tab">Profile settings</p>
      <hr>
        <div class="grid-content-1">
          <?php while($results = mysqli_fetch_assoc($sqlProfile)) {
          $userID = $_SESSION['userID'];
          if($results['userID'] == $userID ){?>
          <div class="wrapper-3">
            <div class="contents-3">
              <h2>Profile</h2>
              <h5>user ID: <?php echo $results['userID']?></h5>
              <h5 style="text-transform: capitalize;">First name: <?php echo $results['firstname']?></h5>
              <h5 style="text-transform: capitalize;">Last name: <?php echo $results['lastname']?></h5>
              <h5 style="text-transform: capitalize;">Age: <?php echo $results['age']?></h5>
              <h5 style="text-transform: capitalize;">Gender: <?php echo $results['gender']?></h5>
              <h5 style="text-transform: capitalize;">Address: <?php echo $results['address']?></h5>
              <h5 style="text-transform: capitalize;">University/College: <?php echo $results['school']?></h5>
              <form class="resume" action="../php-functions/resume_upload.php" method="post" enctype="multipart/form-data">
                <label for="resume"><i title="Accepted files: .docx and .pdf only | File size less than 5mb" style="color:#FF0055; cursor:pointer; margin-right: .2rem;" class="fa-solid fa-circle-info"></i>Resume:</label>
                <input type="file" class="file-upload" name="resume_file"  value="">
                <input type="hidden" name="user_ID" value="<?php echo $_SESSION['userID']?>">
                <button type="submit" name="resume">Go</button>
              </form>
              <?php while($results1 = mysqli_fetch_assoc($sqlResumeDisplay)) {
              $userID1 = $_SESSION['userID'];
              if($results1['user_ID'] == $userID1 ){?>
              <h5>View Resume: <a href="/rms-company/php-functions/upload/<?php echo $results1['file']; ?>" ><?php echo $results1['file']; ?></a></h5>
              <form class="" action="../php-functions/delete_resume.php" method="post">
              <input type="hidden" name="filename" value="<?php echo $results1['file']; ?>">
              <input type="hidden" name="user_ID" value="<?php echo $results1['user_ID']; ?>">
              <button class="deletebutton" type="submit" name="delete_resume">Delete Resume</button>
              <p style="color:red;">Notice: Please delete the existing resume first before uploading new one.</p>
              </form>
            <?php }}?>
            </div>
          </div>

          <div class="wrapper-4">
            <div class="contents-3">
              <h2>Security</h2>
              <h5>Email address: <?php echo $results['email']?></h5>
              <h5>Password: <input type="password" name="password" value="<?php echo $results['password']?>"></h5>
              </form>
            </div>
          </div>
        <?php }}?>
        </div>
    </div>
<!--------------------------------------------------------------------------------------------------------------------------------->
  </div>
<!--------------------------------------------------------------------------------------------------------------------------------->
  <footer> <p>Company 2022</p> </footer>
</body>
</html>

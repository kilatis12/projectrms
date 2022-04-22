<?php

  session_start();
  require ('../php-functions/database.php');

  if($_SESSION['status'] == 'false' || empty($_SESSION['status'])){
    header ('Location: /rms-company/index.php');
    session_destroy();
  }

  if(isset($_POST['view'])){

    $job_ID = $_POST['job_ID'];

    $querydisplayjob = "SELECT * FROM jobs WHERE job_ID = '$job_ID'";
    $sqldisplayjob = mysqli_query($conn, $querydisplayjob);
  }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Details</title>
  <link rel="stylesheet" href="jobdetails.css">
  <script src="jobdetails.js" charset="utf-8" defer></script>
</head>
<body>
  <div id="navlogo">
    <a href="user.php" style="text-decoration:none;"><h1 class="weblogo">Company</h1></a>
  </div>
  <div class="details">
    <?php while($results = mysqli_fetch_assoc($sqldisplayjob)){?>
    <h1><?php echo $results['title']?></h1>
    <h5 style="color:#FFB4CD;">JOB ID: <?php echo $results['job_ID']?> | Date posted: <?php echo $results['date']?></h5>
    <h3>Description</h3>
    <p><?php echo $results['description']?></p>
    <div class="more-details">
      <div class="cards-1">
        <h5>Requirements</h5>
        <ul>
          <li><p><?php echo $results['requirements']?></p></li>
        </ul>
      </div>
      <div class="cards-2">
        <h5>More details</h5>
        <ul>
          <li><p>Salary Range: <?php echo $results['salary']?></p></li>
          <li><p>Job Type: <?php echo $results['jobtype']?></p></li>
        </ul>
      </div>
    </div>
    <form class="" action="../php-functions/job_apply.php" method="post">
    <label style="margin-top: 1rem; " for="coverletter">Coverletter</label>
    <a class="coverletterdetails" href="https://en.wikipedia.org/wiki/Cover_letter" target="_blank">more details about coverletter click here.</a>
    <textarea style="padding: 1rem 1rem; margin-bottom: 1rem;" name="coverletter" rows="8" cols="80" required='' minlength="50" oninvalid="this.setCustomValidity('Your cover letter is too short.')" placeholder="Provide your cover letter with a minimum of 20words."></textarea>
    <input type="hidden" name="job_ID" value="<?php echo $results['job_ID']?>">
    <input type="hidden" name="user_ID" value="<?php echo $_SESSION['userID']?>">
    <button style="padding-top:1rem; padding-bottom:1rem;" type="submit" name="apply">Submit Application</button>
    <a class="cancel" style="margin-bottom: 2rem; margin-top: 1rem; padding: .5rem .5rem;" href="user.php" >cancel application</a>
    </form>
    <?php }?>
  </div>
</body>
</html>

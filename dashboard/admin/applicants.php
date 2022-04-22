<?php
  require('php-functions/job-campaigns.php');
  require('php-functions/applicants-display.php');
  require('php-functions/edit-a-status.php');
  session_start();


  if($_SESSION['admin-status'] == 'false' || empty($_SESSION['admin-status'])){
    header ('Location: /rms-company/pages/login.php');
    session_destroy();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/3538880d88.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/3-applicants.css">
  <link rel="stylesheet" href="css/1-dashboard-modal.css">
  <script src="js/add-job.js" defer charset="utf-8"></script>
  <title>Admin</title>
</head>
<body>
  <div class="navigations">
    <nav>
      <ul>
        <div class="logo">
          <a href="#">Company</a>
        </div>
        <li><a href="dashboard.php">Dashboard<i class="fa-solid fa-house-user"></i></a></li>
        <li><a href="joboptions.php">Job Options<i class="fa-solid fa-briefcase"></i></a></li>
        <li><a href="applicants.php">Applicants<i class="fa-solid fa-user-tie"></i></a></li>
        <li><a href="settings.php">Accounts Option<i class="fa-solid fa-gear"></i></a></li>
        <div class="add_job">
          <button class="button open-button"><i class="fa-solid fa-circle-plus" style="margin-right:5px; font-size: 15px;"></i>New Job</button>
        </div>

      </ul>
      <ul>
        <li><a class="logout" href="php-functions/logout.php">Logout<i class="fa-solid fa-right-from-bracket"></i></a></li>
      </ul>
    </nav>
  </div>

  <div class="content">
    <div class="title">
      <h1><i class="fa-solid fa-user-tie"></i>applicants</h1>
      <div class="wrapper">

        <div class="job-container">
          <div class="job-title">
            <h1>Select Job</h1>
            <form class="" action="php-functions/select-job.php" method="post">
              <select class="" name="job-title">
                <?php  while($results = mysqli_fetch_assoc($sqlJobs)){
                if($results['status'] == 'active'){?>
                <option type="submit" value="<?php echo $results['job_ID']?>" ><?php echo $results['title']?></option>
                <?php }}?>
              </select>
              <button type="submit" name="select-job"><i style="color:#48C9B0;" class="fa-solid fa-right-to-bracket"></i></button>
              <h1>Job ID: <?php echo $_SESSION['jobid']?></h1>
            </form>
          </div>
          <?php while($results1 = mysqli_fetch_assoc($sqlApplicants)) {
          if($results1['job_ID'] == $_SESSION['jobid']){?>
          <div class="applicants">
            <p><?php echo $results1['application_ID']?></p>
            <p><?php echo $results1['firstname']?> <?php echo $results1['lastname']?></p>
            <p><?php echo $results1['date']?></p>
            <form class="status" action="php-functions/edit-a-status.php" method="post">
              <p><strong><?php echo $results1['a_status']?></strong></p>
              <input type="hidden" name="a_id" value="<?php echo $results1['application_ID']?>">
              <select class="" name="option-status">
                <option value="pending">Select Option</option>
                <option value="Resume Screening">Resume Screening</option>
                <option value="For voice-call screening">For voice-call screening</option>
                <option value="You Failed voice-call process">You Failed voice-call screening</option>
                <option value="Assesment Test">Assesment Test</option>
                <option value="Assesment Test Failed">Assesment Test Failed</option>
                <option value="Scheduled for personal interview">Scheduled for personal interview</option>
                <option value="You failed the interview">You failed the interview</option>
                <option value="Job offer in process">Job offer in process</option>
              </select>
              <button type="submit" onclick="return confirm('Press OK to update')" title="submit" name="button"><i style="color:#48C9B0;" class="fa-solid fa-right-to-bracket"></i></button>
            </form>
            <p><a href="/rms-company/php-functions/upload/<?php echo $results1['file']; ?>" target="_blank"><i style="color:#48C9B0;" title="Download Resume" class="fa-solid fa-file"></i></a><a href="#"><i style="color:#48C9B0" title="View Profile" class="fa-solid fa-arrow-up-right-from-square"></i></a><a onclick="return confirm('are you sure?')" href="php-functions/delete-application.php?a_id=<?php echo $results1['application_ID']?>"><i style="color:#FF0055" title="Delete application" class="fa-solid fa-trash-can"></i></a></p>
          </div>
        <?php }}?>
        </div>


      </div>
    </div>


    <dialog class="new-job" id="modal">
      <form action="php-functions/newjob.php" method="post">
        <button type="button" class="close-button"><i class="fa-solid fa-rectangle-xmark"></i></button>
        <label for="title">title</label>
        <input type="text" name="title" value="" required>
        <label for="title">Description</label>
        <textarea name="Description" rows="12" cols="80" required></textarea>
        <label for="title">Salary Range</label>
        <input type="text" name="range" value="" placeholder="20000 - 25000" required>
        <label for="title">Requirements</label>
        <input type="text" name="requirements" value="" required>
        <label for="title">Job type</label>
        <input type="text" name="job-type" value="" placeholder="part-time/full-time" required>
        <button class="submit-new-job" type="submit" name="new-job">Submit</button>
      </form>
    </dialog>

  </div>


</body>
</html>

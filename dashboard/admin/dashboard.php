<?php
  session_start();
  require('php-functions/counts.php');
  require('php-functions/job-campaigns.php');


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
  <title>Admin</title>
  <link rel="stylesheet" href="css/1-dashboard.css">
  <link rel="stylesheet" href="css/1-dashboard-modal.css">
  <script src="https://kit.fontawesome.com/3538880d88.js" crossorigin="anonymous"></script>
  <script src="js/add-job.js" defer charset="utf-8"></script>
</head>
<body>
  <div class="navigations">
    <nav>
      <ul>
        <button type="button" id="btn" name="button"><i class="fa-solid fa-ellipsis"></i></button>
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
      <h1><i class="fa-solid fa-chart-simple"></i> REPORTS</h1>
    </div>
    <div class="cards-div">

      <div class="cards">
        <?php  while($results = mysqli_fetch_assoc($sqlAccountsReg)){?>
        <h1>Accounts Registered</h1>
        <p><?php echo $results['total']?></p>
        <?php }?>
      </div>

      <div class="cards">
        <?php  while($results = mysqli_fetch_assoc($sqlApplicationSub)){?>
        <h1>Applications Submitted</h1>
        <p><?php echo $results['total']?></p>
        <?php }?>
      </div>

      <div class="cards">
        <?php  while($results = mysqli_fetch_assoc($sqlJobCampaign)){?>
        <h1>Active Campaigns</h1>
        <p><?php echo $results['total']?></p>
        <?php }?>
      </div>

      <div class="cards">
        <?php  while($results = mysqli_fetch_assoc($sqlPendingApp)){?>
        <h1>Pending Applications</h1>
        <p><?php echo $results['total']?></p>
        <?php }?>
      </div>

    </div>

    <div class="table">
      <h1>Active Job Campaigns</h1>
      <table>
        <tr class="head">
            <td>Job ID</td>
            <td>Title</td>
            <td>Job type</td>
            <td>Status</td>
            <td>Date</td>
        </tr>
        <?php  while($results = mysqli_fetch_assoc($sqlActiveCampaign)){?>
        <tr>
            <td><?php echo $results['job_ID']?></td>
            <td><?php echo $results['title']?></td>
            <td><?php echo $results['jobtype']?></td>
            <td><?php echo $results['status']?></td>
            <td><?php echo $results['date']?></td>
        </tr>
        <?php }?>

      </table>
    </div>
    <div id="table" class="table">
      <h1>Inactive Job Campaigns</h1>
      <table>
        <tr class="head">
            <td>Job ID</td>
            <td>Title</td>
            <td>Job type</td>
            <td>Status</td>
            <td>Date</td>
        </tr>
        <?php  while($results = mysqli_fetch_assoc($sqlInactiveCampaign)){?>
        <tr>
            <td><?php echo $results['job_ID']?></td>
            <td><?php echo $results['title']?></td>
            <td><?php echo $results['jobtype']?></td>
            <td><?php echo $results['status']?></td>
            <td><?php echo $results['date']?></td>
        </tr>
        <?php }?>
      </table>
    </div>
  </div>

  <dialog class="new-job" id="modal">
    <form action="php-functions/newjob.php" method="post">
      <button type="button" class="close-button"><i class="fa-solid fa-rectangle-xmark"></i></button>
      <label for="title">title</label>
      <input type="text" name="title" value="" required>
      <label for="title">Description</label>
      <textarea name="Description" rows="40" cols="80" required></textarea>
      <label for="title">Salary Range</label>
      <input type="text" name="range" value="" placeholder="20000 - 25000" required>
      <label for="title">Requirements</label>
      <input type="text" name="requirements" value="" required>
      <label for="title">Job type</label>
      <input type="text" name="job-type" value="" placeholder="part-time/full-time" required>
      <button class="submit-new-job" type="submit" name="new-job">Submit</button>
    </form>
  </dialog>



</body>
</html>

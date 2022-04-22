<?php
  session_start();

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
  <script src="https://kit.fontawesome.com/3538880d88.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/2-joboptions.css">
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
      <h1><i class="fa-solid fa-briefcase"></i>Job Options</h1>
    </div>
    <div class="table">
      <h1>All jobs</h1>
      <table>
        <tr class="head">
            <td>Job ID</td>
            <td>Title</td>
            <td>Status</td>
            <td>Date</td>
            <td>Actions</td>
        </tr>
        <?php  while($results = mysqli_fetch_assoc($sqlJobs)){?>
        <tr>
            <td><?php echo $results['job_ID']?></td>
            <td><strong><?php echo $results['title']?></strong></td>
            <td>
              <form class="edit-job-status" action="php-functions/edit-job-status.php" method="post">
                <input type="hidden" name="job_id" value="<?php echo $results['job_ID']?>">
                <select class="" name="status">
                  <option style="color:#48C9B0;" value="active">Active</option>
                  <option style="color:#FF0055;" value="inactive">Inactive</option>
                </select>
                <button title="submit" onclick="return confirm('click OK to continue')" type="submit" name="edit-status"><i style="color:#48C9B0;" class="fa-solid fa-right-to-bracket"></i></button>
                <label style="color:#FF0055; margin-left:.5rem; font-weight:bold;" for="status"><?php echo $results['status']?></label>
              </form>
            </td>
            <td><?php echo $results['date']?></td>
            <td><a href="#"><i title="edit" style="color:#48C9B0" class="fa-solid fa-pen-to-square"></i></a><a href="php-functions/delete-jobs.php?jobid=<?php echo $results['job_ID']?>" onclick="return confirm('Press OK to delete')"><i title="delete" style="color:#FF0055" class="fa-solid fa-trash-can"></i></a></td>
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

</body>
</html>

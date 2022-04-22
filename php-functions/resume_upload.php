<?php

    require ('../php-functions/database.php');

    if(isset($_POST['resume']))
    {

     $userID = $_POST['user_ID'];
     $file = 'id'.$userID.$_FILES['resume_file']['name'];
     $file_loc = $_FILES['resume_file']['tmp_name'];
     $file_size = $_FILES['resume_file']['size'];
     $file_type = $_FILES['resume_file']['type'];
     $value = explode(".",$file);
     $file_ext = strtolower(array_pop($value));
     $valid_file_types = array("docx","pdf");
     $folder="upload/";

     /* new file size in KB */
     $new_size = $file_size/1024;

     /* make file name in lower case */
     $new_file_name = strtolower($file);
     /* make file name in lower case */
     $final_file=str_replace(' ','-',$new_file_name);

     try{
       if (in_array($file_ext,$valid_file_types) == false) {
         echo "<script> alert('File type not allowed'); window.location.href='../dashboard/user.php';</script>";
       }else if($new_size >= 5000){
         echo "<script> alert('File size too big'); window.location.href='../dashboard/user.php';</script>";
       }else{
         if(move_uploaded_file($file_loc,$folder.$final_file))
         {
          $queryResume="INSERT INTO file_upload VALUES('$userID','$final_file','$file_type','$new_size')";
          $sqlResume = mysqli_query($conn, $queryResume);
          echo "<script> alert('resume submitted'); window.location.href='../dashboard/user.php';</script>";
         }
         else
         {
          echo "<script> alert('Something went wrong'); window.location.href='../dashboard/user.php';</script>";
         }
       }
     }catch(mysqli_sql_exception $e){
       if ($e->getCode() === 1062) {
         echo "<script> alert('Please delete your existing resume.'); window.location.href='../dashboard/user.php';</script>";
       }else{
         throw $e;
       }

     }

    }

?>

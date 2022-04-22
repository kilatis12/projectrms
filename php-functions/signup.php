<?php

  require('../php-functions/database.php');

  if(isset($_POST['sbutton'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $age = $_POST['age'];
    $birthdate = $_POST['date-of-birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $school = $_POST['school'];
    $email = $_POST['emailad'];
    $password =  $_POST['pass'];
    $retypepass = $_POST['pass-retype'];

    if($password != $retypepass){
      echo "<script> alert('Password do not match'); window.location.href='../pages/signup.php';</script>";
    }else{
      
      try{
        $queryCreate = " INSERT INTO accounts values (null,  '$firstname','$lastname','$age','$birthdate','$gender','$address','$school','$email','$password')";
        $sqlCreate = mysqli_query($conn, $queryCreate);
        echo "<script> alert('Account created succesfully'); window.location.href='../pages/login.php';</script>";
      }catch(mysqli_sql_exception $e){
        if($e->getCode() === 1062){
          echo "<script> alert('Email already in use'); window.location.href='../pages/signup.php';</script>";
        }else{
          throw $e;
        }
      }
    }


  }

 ?>

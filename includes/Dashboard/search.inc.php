<?php

if(isset($_POST['search-submit'])){

  require '../dbh.inc.php';

  $registrationNumber = $_POST['regNo'];
  $rollNumber = $_POST['rollNo'];
  $studentName = $_POST['studentName'];
  $fatherName = $_POST['fatherName'];
  $branch = $_POST['branches'];
  $shift = $_POST['shifts'];
  $email = $_POST['email'];
  $contactNumber = $_POST['mobNo'];
  $dob = $_POST['dob'];
  $company = $_POST['companyName'];
  $address = $_POST['address'];


  else if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../PHP/Pages/dashboard.php?error=invalidEmail");
    exit();
  }























}
else{
  header("Location: ../../PHP/Pages/dashboard.php");
  exit();
}

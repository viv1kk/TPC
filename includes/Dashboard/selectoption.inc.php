<?php

// Dashboard


if(isset($_POST['branchName'])){
  require '../dbh.inc.php';
  $branch = $_POST['branchName'];
  $options = "";

  if($branch == 'CSE'){
    $sql = "SELECT DISTINCT company_name FROM companydb WHERE cse = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'ALL'>All</option>";
      $options .= "<option value = 'NONE'>None</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for CSE</option>";
    }
    echo $options;
    exit();
  }

  else if($branch == 'IT'){
    $sql = "SELECT DISTINCT company_name FROM companydb WHERE it = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());
    $branch = $_POST['branchName'];

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'ALL'>All</option>";
      $options .= "<option value = 'NONE'>None</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for IT</option>";
    }
    echo $options;
    exit();
  }

  else if($branch == 'ALL_BRANCH'){
    $sql = "SELECT DISTINCT company_name FROM companydb ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());
    $branch = $_POST['branchName'];

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }
      $options .= "<option value = 'ALL'>All</option>";
      $options .= "<option value = 'NONE'>None</option>";
    }
    echo $options;
    exit();
  }
  else{
    $options .= "<option value='NONE' selected disabled>NONE Available</option>";
    echo $options;
    exit();
  }
  exit();
}


// Enroll Student

if(isset($_POST['branchNameEn'])){
  require '../dbh.inc.php';
  $branch = $_POST['branchNameEn'];

  if($branch == 'cse'){
    $sql = "SELECT DISTINCT company_name FROM companydb WHERE cse = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());

    if(mysqli_num_rows($result) > 0){

      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'NONE'>NONE</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for CSE</option>";
    }
    echo $options;
    exit();
  }

  else if($branch == 'it'){
    $sql = "SELECT DISTINCT company_name FROM companydb WHERE it = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());
    $branch = $_POST['branchName'];

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'NONE'>NONE</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for IT</option>";
    }
    echo $options;
    exit();
  }
}

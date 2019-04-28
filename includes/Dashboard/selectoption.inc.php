<?php

// Dashboard


if(isset($_POST['branchName'], $_POST['session'])){
  require '../dbh.inc.php';

  $branch = $_POST['branchName'];
  $session = $_POST['session'];

  $options = "";

  if($branch == 'CSE'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE cse = 1 ORDER BY company_name ASC";
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
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE it = 1 ORDER BY company_name ASC";
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

  else if($branch == 'ELEX'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE elex = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'ALL'>All</option>";
      $options .= "<option value = 'NONE'>None</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for ELEX</option>";
    }
    echo $options;
    exit();
  }

  else if($branch == 'ELEC'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE elec = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'ALL'>All</option>";
      $options .= "<option value = 'NONE'>None</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for ELEC</option>";
    }
    echo $options;
    exit();
  }

  else if($branch == 'MECH_PRO'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE mech_pro = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'ALL'>All</option>";
      $options .= "<option value = 'NONE'>None</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for MECH_PRO</option>";
    }
    echo $options;
    exit();
  }

  if($branch == 'MECH_AUTO'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE mech_auto = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'ALL'>All</option>";
      $options .= "<option value = 'NONE'>None</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for MECH_AUTO</option>";
    }
    echo $options;
    exit();
  }

  if($branch == 'CIVIL'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE civil = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'ALL'>All</option>";
      $options .= "<option value = 'NONE'>None</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for CIVIL</option>";
    }
    echo $options;
    exit();
  }

  else if($branch == 'ALL_BRANCH'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session ORDER BY company_name ASC";
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
      $options .= "<option value='NONE' selected disabled>NONE Available</option>";

    }
    echo $options;
    exit();
  }
  else{
    echo $options;
    exit();
  }
  exit();
}


// Enroll Student

if(isset($_POST['branchNameEn'], $_POST['session'])){
  require '../dbh.inc.php';
  $session =  $_POST['session'];
  $branch = $_POST['branchNameEn'];

  if($branch == 'CSE'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE cse = 1 ORDER BY company_name ASC";
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

  else if($branch == 'IT'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE it = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());
    $branch = $_POST['branchNameEn'];

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

  else if($branch == 'ELEX'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE elex = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());
    $branch = $_POST['branchNameEn'];

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'NONE'>NONE</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for ELEX</option>";
    }
    echo $options;
    exit();
  }

  else if($branch == 'ELEC'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE elec = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());
    $branch = $_POST['branchNameEn'];

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'NONE'>NONE</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for ELEC</option>";
    }
    echo $options;
    exit();
  }

  else if($branch == 'MECH_PRO'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE mech_pro = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());
    $branch = $_POST['branchNameEn'];

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'NONE'>NONE</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for MECH_PRO</option>";
    }
    echo $options;
    exit();
  }

  else if($branch == 'MECH_AUTO'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE mech_auto = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());
    $branch = $_POST['branchNameEn'];

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'NONE'>NONE</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for MECH_AUTO</option>";
    }
    echo $options;
    exit();
  }

  else if($branch == 'CIVIL'){
    $sql = "SELECT DISTINCT company_name FROM companydb$session WHERE civil = 1 ORDER BY company_name ASC";
    $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());
    $branch = $_POST['branchNameEn'];

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='{$row['company_name']}'>{$row['company_name']}</option>/n";
      }

      $options .= "<option value = 'NONE'>NONE</option>";
    }
    else{
      $options .= "<option value='NONE' selected disabled>NONE Available for CIVIL</option>";
    }
    echo $options;
    exit();
  }  echo $options;
}

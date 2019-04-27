<?php

if(isset($_POST['branchDisabled'], $_POST['shiftDisabled'], $_POST['companyDisabled'], $_POST['userID'], $_POST['reg_no'], $_POST['roll_no'], $_POST['student_name'], $_POST['father_name'], $_POST['branch'], $_POST['shift'], $_POST['email'],
$_POST['contact_no'], $_POST['dob'], $_POST['company'], $_POST['address'])){


  require '../dbh.inc.php';


  $userID = $_POST['userID'];
  $registrationNumber = $_POST['reg_no'];
  $rollNumber = $_POST['roll_no'];
  $studentName = $_POST['student_name'];
  $fatherName = $_POST['father_name'];

  $branch = $_POST['branch'];
  $branchDisabled = 0;

  $shift = $_POST['shift'];
  $shiftDisabled = 0;

  $email = $_POST['email'];
  $contactNumber = $_POST['contact_no'];
  $dob = $_POST['dob'];

  $company = $_POST['company'];
  $companyDisabled = 0;

  $address = $_POST['address'];





  $errorEmail = false;
  $errorReg = false;
  $errorRoll = false;
  $errorCont = false;



  if($_POST['branchDisabled'] == "true"){
    $branchDisabled = 1;
  }
  else{
    $branchDisabled = 0;
  }

  if($_POST['shiftDisabled'] == "true"){
    $shiftDisabled = 1;
  }
  else{
    $shiftDisabled = 0;
  }

  if($_POST['companyDisabled'] == "true"){
    $companyDisabled = 1;
  }
  else{
    $companyDisabled = 0;
  }

  // Error email


  if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){

    echo "<script>
    email = document.getElementById('mail');
    email.setAttribute('class','form-control is-invalid');
    </script>";

    $errorEmail = true;
  }
  else{
    echo "<script>
    email = document.getElementById('mail');
    email.setAttribute('class','form-control');
    </script>";

    $errorEmail = false;
  }


  // Error Registration Number


  if(!empty($registrationNumber) && strlen($registrationNumber) != 8){

    echo "<script>
    regNo = document.getElementById('regNo');
    regNo.setAttribute('class','form-control is-invalid');
    </script>";

    $errorReg = true;
  }
  else{
    echo "<script>
    regNo = document.getElementById('regNo');
    regNo.setAttribute('class','form-control');
    </script>";

    $errorReg = false;
  }


  // Error Roll Number


  if(!empty($rollNumber) && strlen($rollNumber) != 11){

    echo "<script>
    rollNo = document.getElementById('rollNo');
    rollNo.setAttribute('class','form-control is-invalid');
    </script>";

    $errorRoll = true;
  }
  else{
    echo "<script>
    rollNo = document.getElementById('rollNo');
    rollNo.setAttribute('class','form-control');
    </script>";

    $errorRoll = false;
  }


  // Error Contact Number


  if(!empty($contactNumber) && strlen($contactNumber) != 10){

    echo "<script>
    mob_No = document.getElementById('mob_no');
    mob_No.setAttribute('class','form-control is-invalid');
    </script>";

    $errorCont = true;
  }
  else{
    echo "<script>
    mob_No = document.getElementById('mob_no');
    mob_No.setAttribute('class','form-control');
    </script>";

    $errorCont = false;
  }


  if(!$errorEmail && !$errorReg && !$errorRoll && !$errorCont){



    // REGISTRAION NUMBER


    if(!empty($registrationNumber) && !$errorReg){
      $sql = "SELECT user_ID, reg_no FROM studentdb WHERE reg_no = '$registrationNumber';";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($row['user_ID'] !== $userID){
          echo "<script>
          $.notify('Failed! This Registration Number Belongs to someone else.');
          </script>";
          exit();

        }
      }

      else{
        $sqlUpdate = "UPDATE studentdb SET reg_no = '$registrationNumber' WHERE user_ID = $userID;";
        if(mysqli_query($conn, $sqlUpdate)){
          echo "<script>
          $.notify('Registration Number Edited Successfully.','success');
          </script>";
        }
        else{
          echo "<script>
          $.notify('Failed to edit Registration Number.');
          </script>";
          exit();
        }
      }
    }



    // ROLL NUMBER



    if(!empty($rollNumber) && !$errorRoll){
      $sql = "SELECT user_ID, roll_no FROM studentdb WHERE roll_no = '$rollNumber';";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($row['user_ID'] !== $userID){
          echo "<script>
          $.notify('Failed! This Roll Number Belongs to someone else.');
          </script>";
          exit();
        }
      }
      else{
        $sqlUpdate = "UPDATE studentdb SET roll_no = '$rollNumber' WHERE user_ID = $userID;";
        if(mysqli_query($conn, $sqlUpdate)){
          echo "<script>
          $.notify('Roll Number Edited Successfully.','success');
          </script>";
        }
        else{
          echo "<script>
          $.notify('Failed to edit Roll Number.');
          </script>";
          exit();
        }
      }
    }



    // STUDENT NAME



    if(!empty($studentName)){
      $studentName = strtoupper($studentName);
      $sqlUpdate = "UPDATE studentdb SET student_name = '$studentName' WHERE user_ID = $userID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Student Name Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Student Name.');
        </script>";
        exit();
      }
    }


    // FATHER NAME



    if(!empty($fatherName)){
      $fatherName = strtoupper($fatherName);
      $sqlUpdate = "UPDATE studentdb SET father_name = '$fatherName' WHERE user_ID = $userID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Father Name Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Father Name.');
        </script>";
        exit();
      }
    }


    // Branch

    if(!empty($branch) && $branchDisabled === 0){
      $branch = strtoupper($branch);

      $sqlUpdate = "UPDATE studentdb SET branch = '$branch' WHERE user_ID = $userID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Branch Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Branch.');
        </script>";
        exit();
      }
    }


    // Shift


    if(!empty($shift) && $shiftDisabled === 0){
      $shift = strtoupper($shift);

      $sqlUpdate = "UPDATE studentdb SET shift = '$shift' WHERE user_ID = $userID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Shift Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Shift.');
        </script>";
        exit();
      }
    }



    // Email

    if(!empty($email) && !$errorEmail){
      $sql = "SELECT user_ID, email FROM studentdb WHERE user_ID = $userID;";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($row['user_ID'] !== $userID){
          echo "<script>
          $.notify('Failed! This Email Belongs to someone else.');
          </script>";
          exit();
        }
      }
      else{
        $sqlUpdate = "UPDATE studentdb SET email = '$email' WHERE user_ID = $userID;";
        if(mysqli_query($conn, $sqlUpdate)){
          echo "<script>
          $.notify('Email Edited Successfully.','success');
          </script>";
        }
        else{
          echo "<script>
          $.notify('Failed to edit Email.');
          </script>";
          exit();
        }
      }
    }


    // Contact Number



    if(!empty($contactNumber) && !$errorCont){
      $sql = "SELECT user_ID, contact_no FROM studentdb WHERE contact_no = '$contactNumber';";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($row['user_ID'] !== $userID){
          echo "<script>
          $.notify('Failed! This Contact Number Belongs to someone else.');
          </script>";
          exit();
        }
      }
      else{
        $sqlUpdate = "UPDATE studentdb SET contact_no = '$contactNumber' WHERE user_ID = $userID;";
        if(mysqli_query($conn, $sqlUpdate)){
          echo "<script>
          $.notify('Edited Contact Number Successfully','success');
          </script>";
        }
        else{
          echo "<script>
          $.notify('Failed to edit Contact Number.');
          </script>";
          exit();
        }
      }
    }



    // Date of Birth



    if(!empty($dob)){
      $sqlUpdate = "UPDATE studentdb SET dob = '$dob' WHERE user_ID = $userID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('DOB Edited Successfully.','success');

        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit DOB.');

        </script>";
        exit();
      }
    }



    //COMPANY

    if($company == 'NONE'){
      $sqlUpdate = "UPDATE studentdb SET company = NULL WHERE user_ID = $userID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Company Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Company.');
        </script>";
        exit();
      }
      // $company = NULL;
    }
else
    if(!empty($company) && $company != NULL && $companyDisabled === 0){
      $company = strtoupper($company);

      $sqlUpdate = "UPDATE studentdb SET company = '$company' WHERE user_ID = $userID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Company Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Company.');
        </script>";
        exit();
      }
    }


    //Address



    if(!empty($address)){
      $address = strtoupper($address);

      $sqlUpdate = "UPDATE studentdb SET address = '$address' WHERE user_ID = $userID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Address Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Address.');
        </script>";
        exit();
      }
    }
  }
}
else{
  echo "<script>
  $.notify('Whoops! Sompething went Wrong.');
  </script>";
}

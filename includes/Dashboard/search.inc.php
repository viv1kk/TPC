<?php
if(isset($_POST['regNo'], $_POST['rollNo'], $_POST['studentName'], $_POST['fatherName'], $_POST['branches'], $_POST['shifts'],
$_POST['email'], $_POST['mobNo'], $_POST['dob'], $_POST['companyName'], $_POST['address'])){

  require "../dbh.inc.php";

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

  $sql = "";


  $errorReg = false;
  $errorRoll = false;
  $errorEmail = false;
  $errorCont = false;


  // Error Registration Number


  if(!empty($registrationNumber) && strlen($registrationNumber) != 8){
    echo "<script>
    regNo = document.getElementById('reg_no');
    regNo.setAttribute('class','form-control is-invalid');
    </script>";

    $errorReg = true;

    echo "<script>
    document.getElementById('jumbot').style.display = 'none';
    </script>";
  }
  else{
    echo "<script>
    regNo = document.getElementById('reg_no');
    regNo.setAttribute('class','form-control');
    </script>";

    $errorReg = false;
  }


  // Error Email Number


  if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<script>
    mail = document.getElementById('mail');
    mail.setAttribute('class','form-control is-invalid');
    </script>";

    $errorEmail = true;

    echo "<script>
    document.getElementById('jumbot').style.display = 'none';;
    </script>";
  }
  else{
    echo "<script>
    mail = document.getElementById('mail');
    mail.setAttribute('class','form-control');
    </script>";

    $errorEmail = false;
  }


  // Error Roll number


  if(!empty($rollNumber) && strlen($rollNumber) != 11){
    echo "<script>
    rollNo = document.getElementById('roll_no');
    rollNo.setAttribute('class','form-control is-invalid');
    </script>";

    $errorRoll = true;

    echo "<script>
    document.getElementById('jumbot').style.display = 'none';
    </script>";
  }
  else{
    echo "<script>
    rollNo = document.getElementById('roll_no');
    rollNo.setAttribute('class','form-control');
    </script>";

    $errorRoll = false;
  }


  // Error Contact Number


  if(!empty($contactNumber) && strlen($contactNumber) != 10){
    echo "<script>
    cont = document.getElementById('mob_no');
    cont.setAttribute('class','form-control is-invalid');
    </script>";

    $errorCont = true;

    echo "<script>
    document.getElementById('jumbot').style.display = 'none';
    </script>";
  }
  else{
    echo "<script>
    cont = document.getElementById('mob_no');
    cont.setAttribute('class','form-control');
    </script>";

    $errorCont = false;
  }


  if(!$errorReg && !$errorRoll && !$errorEmail && !$errorCont){

    if($registrationNumber != "" ||
    $rollNumber != "" ||
    $studentName != "" ||
    $fatherName != "" ||
    $branch != "" ||
    $shift != "" ||
    $email != "" ||
    $contactNumber != "" ||
    $dob != "" ||
    $company != "" ||
    $address != ""){


      if(empty($registrationNumber)){
        $registrationNumber = NULL;
      }
      if(empty($rollNumber)){
        $rollNumber = NULL;
      }
      if(empty($email)){
        $email = NULL;
      }
      if(empty($contactNumber)){
        $contactNumber = NULL;
      }


      // SEARCH BY A Particular Student

      if(!empty($reqistrationNumber) || !empty($rollNumber) || !empty($email) || !empty($contactNumber)){
        $sql = "SELECT * FROM studentdb WHERE reg_no = '$registrationNumber' OR roll_no = '$rollNumber' OR email = '$email' OR contact_no = '$contactNumber';";
      }


      // SEARCH BY MULTIPLE STUDENTS

      else{

        $sql .= "SELECT * FROM studentdb WHERE ";

        // branch

        if($branch == 'ALL_BRANCH'){
          $sql .= " (branch IS NOT NULL OR branch IS NULL) ";
        }
        else{
          $sql .= " branch = '$branch' ";
        }

        // shift

        if($shift == 'BOTH_12'){
          $sql .= " AND (shift = 'SHIFT_1' OR shift = 'SHIFT_2') ";
        }
        else if($shift == 'ALL'){
          $sql .= " AND (shift IS NOT NULL OR shift IS NULL) ";
        }
        else{
          $sql .= "AND shift ='$shift' ";
        }

        // Company

        if($company == 'ALL'){
          $sql .= " AND (company IS NOT NULL OR company IS NULL) ";
        }
        else if($company == 'NONE'){
          $sql .= " AND company IS NULL ";
        }
        else{
          $sql .= " AND company = '$company' ";
        }

        // Student name

        if(!empty($studentName)){
          $studentName = strtoupper($studentName);
          $sql .= " AND student_name = '$studentName' ";
        }

        // Father name

        if(!empty($fatherName)){
          $fatherName = strtoupper($fatherName);
          $sql .= " AND father_name = '$fatherName' ";
        }

        // date of birth

        if(!empty($dob)){
          $sql .= " AND dob = '$dob' ";
        }

        // address

        if(!empty($address)){
          $sql .= " AND address = '$address';";
        }
        $sql .=";";
        // echo $sql;
      }


      $result = mysqli_query($conn, $sql);

      if(file_exists('../../Scripts/results.json')){
        unlink('../../Scripts/results.json');
      }
      $fp = fopen('../../Scripts/results.json', 'w');


      if(mysqli_num_rows($result) > 0){
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
          $rows[] = $row;
          echo "<script>
          document.getElementById('jumbot').style.display = 'flow-root';
          </script>";
        }

        fwrite($fp, json_encode($rows));
        fclose($fp);
      }
      else{
        echo "<script>
        document.getElementById('jumbot').style.display = 'none';
        </script>";
      }
    }
  }
}

else{
  echo "<script>
  $.notify('Error: Something Went Wrong');
  </script>";
}

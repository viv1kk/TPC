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

    echo "<script>
    document.getElementById('jumbot').style.display = 'flow-root';
    </script>";

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

      if(!empty($reqistrationNumber) || !empty($rollNumber)){
        $sql = "SELECT * FROM studentdb WHERE reg_no = '$registrationNumber' OR roll_no = '$rollNumber'";
      }

      else{
        $sql = "SELECT * FROM studentdb WHERE
        (branch = '$branch' OR
          shift = '$shift' OR
          company = '$company') AND
          (reg_no = '$registrationNumber' OR
            roll_no = '$rollNumber' OR
            student_name = '$studentName' OR
            father_name = '$fatherName' OR
            email = '$email' OR
            contact_no = '$contactNumber' OR
            dob = '$dob' OR
            address = '$address');";
          }

          $result = mysqli_query($conn, $sql);

          if(mysqli_num_rows($result) > 0){
            $rows = array();
            while($row = mysqli_fetch_assoc($result)){
              $rows[] = $row;
            }

            unlink('../../Scripts/results.json');
            $fp = fopen('../../Scripts/results.json', 'w');
            fwrite($fp, json_encode($rows));
            fclose($fp);

          }
        }
      }
    }

    else{
      echo "<script>
        let para = document.getElementById('para');
        para.innerHTML = 'Error: Something Went Wrong';
      </script>";
    }

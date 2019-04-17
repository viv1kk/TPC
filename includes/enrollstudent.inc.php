<?php
if(isset($_POST['enroll-submit'])){

  require 'dbh.inc.php';

  $registrationNumber = $_POST['reg_no'];
  $rollNumber = $_POST['roll_no'];
  $studentName = $_POST['student_name'];
  $fatherName = $_POST['father_name'];
  $branch = $_POST['branch'];
  $shift = $_POST['shift'];
  $email = $_POST['email'];
  $contactNumber = $_POST['contact_no'];
  $dob = $_POST['dob'];
  $company = $_POST['company'];
  $address = $_POST['address'];


  if(empty($registrationNumber) && empty($rollNumber)){
    header("Location: ../PHP/Pages/enrollstudent.php?error=both_registation_number_and_roll_number_cannot_be_empty");
    exit();
  }
  else if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../PHP/Pages/enrollstudent.php?error=invalidEmail");
    exit();
  }

  else{
    $sql = 'SELECT reg_no FROM studentdb WHERE reg_no=?';
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../PHP/Pages/enrollstudent.php?error=sqlerror");
      exit();
    }
    else{
      $reg = $stmt;
      mysqli_stmt_bind_param($reg,"s",$registrationNumber);
      mysqli_stmt_execute($reg);
      mysqli_stmt_store_result($reg);

      $regResult = mysqli_stmt_num_rows($reg);
      if($regResult > 0){
        header("Location: ../PHP/Pages/enrollstudent.php?error=registration_number_already_exists");
        exit();
      }
      else{
        $sql = 'SELECT roll_no FROM studentdb WHERE roll_no=?';
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../PHP/Pages/signup.php?error=sqlerror");
          exit();
        }
        else{
          $roll = $stmt;
          mysqli_stmt_bind_param($roll, "s", $rollNumber);
          mysqli_stmt_execute($roll);
          mysqli_stmt_store_result($roll);

          $rollResult = mysqli_stmt_num_rows($roll);

          if($rollResult > 0){
            header("Location: ../PHP/Pages/enrollstudent.php?error=roll_number_already_exists");
            exit();
          }
          else{
            $sql = 'SELECT email FROM studentdb WHERE email=?';
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../PHP/Pages/signup.php?error=sqlerror");
              exit();
            }
            else{
              $em = $stmt;
              mysqli_stmt_bind_param($em, "s", $email);
              mysqli_stmt_execute($em);
              mysqli_stmt_store_result($em);

              $rollResult = mysqli_stmt_num_rows($em);

              if($rollResult > 0){
                header("Location: ../PHP/Pages/enrollstudent.php?error=email_already_exists");
                exit();
              }
              else{
                $sql = 'SELECT contact_no FROM studentdb WHERE contact_no=?';
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                  header("Location: ../PHP/Pages/signup.php?error=sqlerror");
                  exit();
                }
                else{
                  $contNo = $stmt;
                  mysqli_stmt_bind_param($contNo, "s", $contactNumber);
                  mysqli_stmt_execute($contNo);
                  mysqli_stmt_store_result($contNo);

                  $contResult = mysqli_stmt_num_rows($contNo);

                  if($contNoResult > 0){
                    header("Location: ../PHP/Pages/enrollstudent.php?error=contact_number_already_exists");
                    exit();
                  }
                  else{
                    $sql = 'INSERT INTO studentdb (reg_no, roll_no, student_name, father_name, branch, shift, email, contact_no, dob, company, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                      header("Location: ../PHP/Pages/enrollstudent.php?error=sqlerror");
                      exit();
                    }
                    else{
                      mysqli_stmt_bind_param($stmt,"sssssssssss", $registrationNumber, $rollNumber, strtoupper($studentName), strtoupper($fatherName), strtoupper($branch), strtoupper($shift), $email, $contactNumber, $dob, strtoupper($company), $address);
                      mysqli_stmt_execute($stmt);
                      header("Location: ../PHP/Pages/enrollstudent.php?enroll=success");
                      exit();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

else{
  header("Location: ../PHP/Pages/enrollstudent.php");
  exit();
}

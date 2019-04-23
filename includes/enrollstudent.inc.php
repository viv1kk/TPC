<?php

if(isset($_POST['reg_no'], $_POST['roll_no'], $_POST['student_name'], $_POST['father_name'], $_POST['branch'], $_POST['shift'], $_POST['email'],
$_POST['contact_no'], $_POST['dob'], $_POST['company'], $_POST['address'])){


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




if(empty($registrationNumber)){
  $registrationNumber = NULL;
}
if(empty($rollNumber)){
  $rollNumber = NULL;
}
if(empty($studentName)){
  $studentName = NULL;
}
if(empty($fatherName)){
  $fatherName = NULL;
}
if(empty($branch)){
  $branch = NULL;
}
if(empty($shift)){
  $shift = NULL;
}
if(empty($email)){
  $email = NULL;
}
if(empty($contactNumber)){
  $contactNumber = NULL;
}
if(empty($dob)){
  $dob = NULL;
}
if(empty($company) || $company == 'none'){
  $company = NULL;
}
if(empty($address)){
  $address = NULL;
}



  $errorEmpty = false;
  $errorEmail = false;
  $errorReg = false;
  $errorRoll = false;
  $errorCont = false;



  // Error Empty


  if(empty($registrationNumber) && empty($rollNumber)){

    echo "<script>
    para = document.getElementById('para');
    para.innerHTML = 'Both Registration Number and Roll Number fields cannot be empty';
    </script>";

    $errorEmpty = true;
  }
  else{
    echo "<script>
    para = document.getElementById('para');
    para.innerHTML = '';
    </script>";

    $errorEmpty = false;
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


  if(!$errorEmpty && !$errorEmail && !$errorReg && !$errorRoll && !$errorCont){

    $sql = 'SELECT reg_no FROM studentdb WHERE reg_no=?';
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){

      echo "<script>
      para = document.getElementById('para');
      para.innerHTML = 'SQL Error';
      </script>";
      exit();
    }
    else{

      echo "<script>
      para = document.getElementById('para');
      para.innerHTML = '';
      </script>";

      $reg = $stmt;
      mysqli_stmt_bind_param($reg,"s",$registrationNumber);
      mysqli_stmt_execute($reg);
      mysqli_stmt_store_result($reg);

      $regResult = mysqli_stmt_num_rows($reg);
      if($regResult > 0){

        echo "<script>
        para = document.getElementById('para');
        para.innerHTML = 'Registration Number already exists';
        </script>";

        exit();
      }
      else{

        echo "<script>
        para = document.getElementById('para');
        para.innerHTML = '';
        </script>";
        $sql = 'SELECT roll_no FROM studentdb WHERE roll_no=?';
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){

          echo "<script>
          para = document.getElementById('para');
          para.innerHTML = 'SQL Error';
          </script>";

          exit();
        }
        else{

          echo "<script>
          para = document.getElementById('para');
          para.innerHTML = '';
          </script>";

          $roll = $stmt;
          mysqli_stmt_bind_param($roll, "s", $rollNumber);
          mysqli_stmt_execute($roll);
          mysqli_stmt_store_result($roll);

          $rollResult = mysqli_stmt_num_rows($roll);

          if($rollResult > 0){
            echo "<script>
            para = document.getElementById('para');
            para.innerHTML = 'Roll Number already exists';
            </script>";

            exit();
          }
          else{

            echo "<script>
            para = document.getElementById('para');
            para.innerHTML = '';
            </script>";

            $sql = 'SELECT email FROM studentdb WHERE email=?';
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){

              echo "<script>
              para = document.getElementById('para');
              para.innerHTML = 'SQL Error';
              </script>";

              exit();
            }
            else{

              echo "<script>
              para = document.getElementById('para');
              para.innerHTML = '';
              </script>";

              $em = $stmt;
              mysqli_stmt_bind_param($em, "s", $email);
              mysqli_stmt_execute($em);
              mysqli_stmt_store_result($em);

              $rollResult = mysqli_stmt_num_rows($em);

              if($rollResult > 0){

                echo "<script>
                para = document.getElementById('para');
                para.innerHTML = 'Email already exists';
                </script>";

                exit();
              }
              else{

                echo "<script>
                para = document.getElementById('para');
                para.innerHTML = '';
                </script>";

                $sql = 'SELECT contact_no FROM studentdb WHERE contact_no=?';
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){

                  echo "<script>
                  para = document.getElementById('para');
                  para.innerHTML = 'SQL Error';
                  </script>";
                  exit();
                }
                else{

                  echo "<script>
                  para = document.getElementById('para');
                  para.innerHTML = '';
                  </script>";

                  $contNo = $stmt;
                  mysqli_stmt_bind_param($contNo, "s", $contactNumber);
                  mysqli_stmt_execute($contNo);
                  mysqli_stmt_store_result($contNo);

                  $contResult = mysqli_stmt_num_rows($contNo);

                  if($contResult > 0){

                    echo "<script>
                    para = document.getElementById('para');
                    para.innerHTML = 'Contact Number already exists';
                    </script>";
                    exit();
                  }
                  else{

                    echo "<script>
                    para = document.getElementById('para');
                    para.innerHTML = '';
                    </script>";

                    $sql = 'INSERT INTO studentdb (reg_no, roll_no, student_name, father_name, branch, shift, email, contact_no, dob, company, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)){

                      echo "<script>
                      para = document.getElementById('para');
                      para.innerHTML = 'SQL Error';
                      </script>";

                      exit();
                    }
                    else{

                      if(!$studentName == NULL){
                        $studentName = strtoupper($studentName);
                      }
                      if(!$fatherName == NULL){
                        $fatherName = strtoupper($fatherName);
                      }
                      if(!$fatherName == NULL){
                        $fatherName = strtoupper($fatherName);
                      }
                      if(!$branch == NULL){
                        $branch = strtoupper($branch);
                      }
                      if(!$shift == NULL){
                        $shift = strtoupper($shift);
                      }
                      if(!$company == NULL){
                        $company = strtoupper($company);
                      }

                      mysqli_stmt_bind_param($stmt,"sssssssssss", $registrationNumber, $rollNumber, $studentName, $fatherName, $branch, $shift, $email, $contactNumber, $dob, $company, $address);
                      mysqli_stmt_execute($stmt);

                      echo "<script>
                      para = document.getElementById('para');
                      para.style.color = 'green';
                      para.innerHTML = 'Success';
                      </script>";
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
  echo "<script>
  para = document.getElementById('para');
  para.innerHTML = 'Whoops! Sompething went Wrong.';
  </script>";
  exit();
}

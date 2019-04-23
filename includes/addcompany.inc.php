<?php

if(isset($_POST['comp_name'], $_POST['email'], $_POST['contact_no'])){

  require 'dbh.inc.php';

  $companyName = $_POST['comp_name'];
  $email = $_POST['email'];
  $contactNumber = $_POST['contact_no'];
  $cse =  0;
  $it = 0;


  if(isset($_POST['branch_cse']) && $_POST['branch_cse'] == "true"){
    $cse = 1;

  }else{
    $cse = 0;
  }

  if(isset($_POST['branch_it']) && $_POST['branch_it'] == "true"){
    $it = 1;
  }else{
    $it = 0;
  }


  $errorEmpty = false;
  $errorEmail = false;
  $errorCont = false;
  $errorCheckbox = false;


  // Error Empty


  if(empty($companyName)){

    echo "<script>
    company = document.getElementById('company');
    company.setAttribute('class','form-control is-invalid');
    </script>";

    $errorEmpty = true;
  }
  else{
    echo "<script>
    company = document.getElementById('company');
    company.setAttribute('class','form-control');
    </script>";

    $errorEmpty = false;
  }


  //Error Email

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


  // Error Checkbox

  if($cse == 0 && $it == 0){

    echo "<script>
    para = document.getElementById('para');
    para.innerHTML = 'Select atleast one Branch';
    </script>";

    $errorCheckbox = true;
  }
  else{
    echo "<script>
    para = document.getElementById('para');
    para.innerHTML = '';
    </script>";

    $errorCheckbox = false;
  }


// Error Contact Number

if(!empty($contactNumber) && strlen($contactNumber) != 10){

echo "<script>
mob_no = document.getElementById('mob_no');
mob_no.setAttribute('class','form-control is-invalid');
</script>";

$errorCont = true;
}
else{

  echo "<script>
  mob_no = document.getElementById('mob_no');
  mob_no.setAttribute('class','form-control');
  </script>";

  $errorCont = false;
}




  if(empty($email)){
    $email = NULL;
  }
  if(empty($contactNumber)){
    $contactNumber = NULL;
  }




if(!$errorEmpty && !$errorEmail && !$errorCont && !$errorCheckbox){
  $sql = 'SELECT company_name FROM companydb WHERE company_name=?;';
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

      $comp = $stmt;
      mysqli_stmt_bind_param($comp,"s",$companyName);
      mysqli_stmt_execute($comp);
      mysqli_stmt_store_result($comp);

      $compResult = mysqli_stmt_num_rows($comp);
      if($compResult > 0){

        echo "<script>
        para = document.getElementById('para');
        para.innerHTML = 'Company with this name already exists';
        </script>";

        exit();
      }
      else{

        echo "<script>
        para = document.getElementById('para');
        para.innerHTML = '';
        </script>";

        $sql = 'SELECT company_email FROM companydb WHERE company_email=?';
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

          $compName = $stmt;
          mysqli_stmt_bind_param($compName, "s", $email);
          mysqli_stmt_execute($compName);
          mysqli_stmt_store_result($compName);

          $compNameResult = mysqli_stmt_num_rows($compName);

          if($compNameResult > 0){

            echo "<script>
            para = document.getElementById('para');
            para.innerHTML = 'Company E-mail already exists';
            </script>";

            exit();
          }
          else{

            echo "<script>
            para = document.getElementById('para');
            para.innerHTML = '';
            </script>";

            $sql = 'SELECT company_contact_number FROM companydb WHERE company_contact_number=?';
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){

              echo "<script>
              para = document.getElementById('para');
              para.innerHTML = 'SQL Error';
              </script>";
              exit();
            }
            else{
              $compContNo = $stmt;
              mysqli_stmt_bind_param($compContNo, "s", $contactNumber);
              mysqli_stmt_execute($compContNo);
              mysqli_stmt_store_result($compContNo);

              $compContResult = mysqli_stmt_num_rows($compContNo);

              if($compContResult > 0){

                echo "<script>
                para = document.getElementById('para');
                para.innerHTML = 'Company with this contact number already exists';
                </script>";

                exit();
              }
              else{

                echo "<script>
                para = document.getElementById('para');
                para.innerHTML = '';
                </script>";

                $sql = 'INSERT INTO companydb (company_name, company_email, company_contact_number, cse, it) VALUES (?, ?, ?, ?, ?)';
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){

                  echo "<script>
                  para = document.getElementById('para');
                  para.innerHTML = 'SQL Error';
                  </script>";

                  exit();
                }
                else{

                  $companyName = strtoupper($companyName);
                  mysqli_stmt_bind_param($stmt,"sssss", $companyName, $email, $contactNumber, $cse, $it);
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
else{
  echo "<script>
  para = document.getElementById('para');
  para.innerHTML = 'Whoops! Something went Wrong.';
  </script>";
  exit();
}

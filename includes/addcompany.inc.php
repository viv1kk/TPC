<?php
if(isset($_POST['company-submit'])){

  require 'dbh.inc.php';

  $companyName = $_POST['comp_name'];
  $email = $_POST['email'];
  $contactNumber = $_POST['contact_no'];
  $cse = 0;
  $it = 0;

  if(isset($_POST['branch_cse']) && $_POST['branch_cse'] == 'cse'){
    $cse = 1;

  }else{
    $cse = 0;
  }

  if(isset($_POST['branch_it']) && $_POST['branch_it'] == 'it'){
    $it = 1;
  }else{
    $it = 0;
  }

  if(empty($companyName)){
    header("Location: ../PHP/Pages/addcompany.php?error=company_name_cannot_be_empty");
    exit();
  }
  else if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../PHP/Pages/addcompany.php?error=invalidEmail");
    exit();
  }
  else if($cse == 0 && $it == 0){
    header("Location: ../PHP/Pages/addcompany.php?error=select_atleast_one_branch");
    exit();
  }
  else{
    $sql = 'SELECT company_name FROM companydb WHERE company_name=?';
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../PHP/Pages/addcompany.php?error=sqlerror");
      exit();
    }
    else{
      $comp = $stmt;
      mysqli_stmt_bind_param($comp,"s",$companyName);
      mysqli_stmt_execute($comp);
      mysqli_stmt_store_result($comp);

      $compResult = mysqli_stmt_num_rows($comp);
      if($compResult > 0){
        header("Location: ../PHP/Pages/addcompany.php?error=company_name_already_exists");
        exit();
      }
      else{
        $sql = 'SELECT company_email FROM companydb WHERE company_email=?';
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../PHP/Pages/addcompany.php?error=sqlerror");
          exit();
        }
        else{
          $compName = $stmt;
          mysqli_stmt_bind_param($compName, "s", $email);
          mysqli_stmt_execute($compName);
          mysqli_stmt_store_result($compName);

          $compNameResult = mysqli_stmt_num_rows($compName);

          if($compNameResult > 0){
            header("Location: ../PHP/Pages/addcompany.php?error=company_email_already_exists");
            exit();
          }
          else{
            $sql = 'SELECT company_contact_number FROM companydb WHERE company_contact_number=?';
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../PHP/Pages/addcompany.php?error=sqlerror");
              exit();
            }
            else{
              $compContNo = $stmt;
              mysqli_stmt_bind_param($compContNo, "s", $contactNumber);
              mysqli_stmt_execute($compContNo);
              mysqli_stmt_store_result($compContNo);

              $compContResult = mysqli_stmt_num_rows($compContNo);

              if($compContResult > 0){
                header("Location: ../PHP/Pages/enrollstudent.php?error=company_contact_number_already_exists");
                exit();
              }
              else{
                $sql = 'INSERT INTO companydb (company_name, company_email, company_contact_number, cse, it) VALUES (?, ?, ?, ?, ?)';
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                  header("Location: ../PHP/Pages/addcompany.php?error=sqlerror");
                  exit();
                }
                else{
                  mysqli_stmt_bind_param($stmt,"sssss", strtoupper($companyName), $email, $contactNumber, $cse, $it);
                  mysqli_stmt_execute($stmt);
                  header("Location: ../PHP/Pages/addcompany.php?addcompany=success");
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
  header("Location: ../PHP/Pages/addcompany.php");
  exit();
}

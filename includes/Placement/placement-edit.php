<?php

if(isset($_POST['session'], $_POST['companyID'], $_POST['compName'],   $_POST['dop'], $_POST['salary'], $_POST['place'], $_POST['doj'], $_POST['batch'], $_POST['website'], $_POST['cont_person'],
$_POST['email_1'], $_POST['contact_no_1'], $_POST['email_2'], $_POST['contact_no_2'])){

  require '../dbh.inc.php';
// $_POST['compAddress'],
  $session = $_POST['session'];
  $companyID = $_POST['companyID'];
  $companyName = $_POST['compName'];
  $address = $_POST['compAddress'];
  $dop = $_POST['dop'];
  $salary = $_POST['salary'];
  $place = $_POST['place'];
  $doj = $_POST['doj'];
  $batch = $_POST['batch'];
  $website = $_POST['website'];
  $email_1 = $_POST['email_1'];
  $contactNumber_1 = $_POST['contact_no_1'];
  $email_2 = $_POST['email_2'];
  $contactNumber_2 = $_POST['contact_no_2'];


  $branch = 0;
  $cse =  0;
  $it = 0;
  $elex = 0;
  $elec = 0;
  $mech_pro = 0;
  $mech_auto = 0;
  $civil = 0;



  if(isset($_POST['branch']) && $_POST['branch'] == "true"){
    $branch = 1;
  }
  else{
    $branch = 0;
  }

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

  if(isset($_POST['branch_elex']) && $_POST['branch_elex'] == "true"){
    $elex = 1;
  }else{
    $elex = 0;
  }

  if(isset($_POST['branch_elec']) && $_POST['branch_elec'] == "true"){
    $elec = 1;
  }else{
    $elec = 0;
  }

  if(isset($_POST['branch_mechpro']) && $_POST['branch_mechpro'] == "true"){
    $mech_pro = 1;
  }else{
    $mech_pro = 0;
  }

  if(isset($_POST['branch_mechauto']) && $_POST['branch_mechauto'] == "true"){
    $mech_auto = 1;
  }else{
    $mech_auto = 0;
  }

  if(isset($_POST['branch_civil']) && $_POST['branch_civil'] == "true"){
    $civil = 1;
  }else{
    $civil = 0;
  }


  // $errorEmpty = false;
  $errorEmail = false;
  $errorEmail1 = false;
  $errorCont = false;
  $errorCont1 = false;
  $errorCheckbox = false;
  //Error Email

  if(!empty($email_1) && !filter_var($email_1, FILTER_VALIDATE_EMAIL)){
    echo "<script>
    email1 = document.getElementById('email1');
    email1.setAttribute('class','contents form-control is-invalid');
    </script>";

    $errorEmail = true;
  }
  else{

    echo "<script>
    email1 = document.getElementById('email1');
    email1.setAttribute('class','contents form-control');
    </script>";

    $errorEmail = false;
  }


  if(!empty($email_2) && !filter_var($email_2, FILTER_VALIDATE_EMAIL)){
    echo "<script>
    email2 = document.getElementById('email2');
    email2.setAttribute('class','contents form-control is-invalid');
    </script>";

    $errorEmail1 = true;
  }
  else{

    echo "<script>
    email2 = document.getElementById('email2');
    email2.setAttribute('class','contents form-control');
    </script>";

    $errorEmail1 = false;
  }


  // Error Checkbox

  if($cse == 0 && $it == 0 && $elex == 0 && $elec == 0 && $mech_pro == 0 && $mech_auto == 0 && $civil == 0 && $branch == 1){

    echo "<script>
    $.notify('Select atleast one Branch');
    </script>";

    $errorCheckbox = true;
  }
  else{

    $errorCheckbox = false;
  }


  // Error Contact Number

  if(!empty($contactNumber_1) && strlen($contactNumber_1) != 10){

    echo "<script>
    mob_no1 = document.getElementById('cont_num_1');
    mob_no1.setAttribute('class','contents form-control is-invalid');
    </script>";

    $errorCont = true;
  }
  else{

    echo "<script>
    mob_no1 = document.getElementById('cont_num_1');
    mob_no1.setAttribute('class','contents form-control');
    </script>";

    $errorCont = false;
  }


  if(!empty($contactNumber_2) && strlen($contactNumber_2) != 10){

    echo "<script>
    mob_no2 = document.getElementById('cont_num_2');
    mob_no2.setAttribute('class','contents form-control is-invalid');
    </script>";

    $errorCont1 = true;
  }
  else{

    echo "<script>
    mob_no2 = document.getElementById('cont_num_2');
    mob_no2.setAttribute('class','contents form-control');
    </script>";

    $errorCont1 = false;
  }


  if(empty($companyName)){
    $companyName = NULL;
  }
  if(empty($address)){
    $address = NULL;
  }
  if(empty($dop)){
    $dop = NULL;
  }
  if(empty($salary)){
    $salary = NULL;
  }
  if(empty($place)){
    $place = NULL;
  }
  if(empty($doj)){
    $doj = NULL;
  }
  if(empty($batch)){
    $batch = NULL;
  }
  if(empty($website)){
    $website = NULL;
  }
  if(empty($contactPerson)){
    $contactPerson = NULL;
  }
  if(empty($email_1)){
    $email_1 = NULL;
  }

  if(empty($contactNumber_1)){
    $contactNumber_1 = NULL;
  }

  if(empty($email_2)){
    $email_2 = NULL;
  }

  if(empty($contactNumber_2)){
    $contactNumber_2 = NULL;
  }



  if(!$errorEmail && !$errorCont && !$errorEmail1 && !$errorCont1 && !$errorCheckbox){


    if(!empty($companyName)){
      $companyName = strtoupper($companyName);

      $sql = "SELECT company_ID, company_name FROM companydb$session WHERE compay_name = '$companyName';";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($row['company_ID'] !== $companyID){
          echo "<script>
          $.notify('Failed! Company with this name Already exist.');
          </script>";
          exit();
        }
      }

      else{
        $sqlUpdate = "UPDATE companydb$session SET company_name = '$companyName' WHERE company_ID = $companyID;";
        if(mysqli_query($conn, $sqlUpdate)){
          echo "<script>
          $.notify('Company Name Edited Successfully.','success');
          </script>";
        }
        else{
          echo "<script>
          $.notify('Failed to edit Company Name.');
          </script>";
          exit();
        }
      }
    }








    if(!empty($address)){
      $address = strtoupper($address);
      $sqlUpdate = "UPDATE companydb$session SET company_address = '$address' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Company Address Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Company Address.');
        </script>";
        exit();
      }
    }



    if(!empty($dop)){
      $sqlUpdate = "UPDATE companydb$session SET date_of_placement = '$dop' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Date of Placement Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Date of Placement.');
        </script>";
        exit();
      }
    }



    if(!empty($salary)){
      $sqlUpdate = "UPDATE companydb$session SET salary = '$salary' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Salary Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Salary.');
        </script>";
        exit();
      }
    }




    if(!empty($place)){
      $sqlUpdate = "UPDATE companydb$session SET place_of_placement = '$place' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Place of Placement Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Place of Placement.');
        </script>";
        exit();
      }
    }




    if(!empty($doj)){
      $sqlUpdate = "UPDATE companydb$session SET date_of_joining= '$doj' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Date of Joining Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Date of Joining.');
        </script>";
        exit();
      }
    }






    if(!empty($batch)){
      $sqlUpdate = "UPDATE companydb$session SET batch = '$batch' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Batch Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Salary.');
        </script>";
        exit();
      }
    }




    if(!empty($website)){
      $sqlUpdate = "UPDATE companydb$session SET website = '$website' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Website Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Website.');
        </script>";
        exit();
      }
    }





    if(!empty($website)){
      $sqlUpdate = "UPDATE companydb$session SET website = '$website' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Website Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Website.');
        </script>";
        exit();
      }
    }





    if(!empty($contactPerson)){
      $sqlUpdate = "UPDATE companydb$session SET contact_person = '$contactPerson' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Website Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Website.');
        </script>";
        exit();
      }
    }




    if(!empty($email_1)){
      $sqlUpdate = "UPDATE companydb$session SET email_1 = '$email_1' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Email 1 Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Email 1.');
        </script>";
        exit();
      }
    }




    if(!empty($contactPerson_1)){
      $sqlUpdate = "UPDATE companydb$session SET contact_no_1 = '$contactNumber_1' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Contact No. 1 Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Contact No 1.');
        </script>";
        exit();
      }
    }






    if(!empty($email_2)){
      $sqlUpdate = "UPDATE companydb$session SET email_2 = '$email_2' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Email 2 Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Email 2.');
        </script>";
        exit();
      }
    }





    if(!empty($contactPerson_2)){
      $sqlUpdate = "UPDATE companydb$session SET contact_no_2 = '$contactNumber_2' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Contact No. 2 Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Contact No 2.');
        </script>";
        exit();
      }
    }






    if(!empty($contactPerson_2)){
      $sqlUpdate = "UPDATE companydb$session SET contact_no_2 = '$contactNumber_2' WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Contact No. 2 Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
        $.notify('Failed to edit Contact No 2.');
        </script>";
        exit();
      }
    }


    if(!empty($branch == 1)){
      $sqlUpdate = "UPDATE companydb$session SET cse = $cse, it = $it, elex = $elex, elec = $elec, mech_pro = $mech_pro, mech_auto = $mech_auto, civil = $civil WHERE company_ID = $companyID;";
      if(mysqli_query($conn, $sqlUpdate)){
        echo "<script>
        $.notify('Branch Edited Successfully.','success');
        </script>";
      }
      else{
        echo "<script>
                console.log({$cse},{$it}, {$elex}, {$elec}, {$mech_pro}, {$mech_auto}, {$civil});
        $.notify('Failed to edit Branch.');
        </script>";
        exit();
      }
    }

  }
}
else{
  echo "<script>
    $.notify('Whoops! Something went Wrong.');
    </script>";
    exit();
  }

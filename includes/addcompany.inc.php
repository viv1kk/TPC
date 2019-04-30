<?php

if(isset($_POST['session'], $_POST['comp_name'], $_POST['address'], $_POST['dop'], $_POST['salary'], $_POST['place'], $_POST['doj'], $_POST['batch'], $_POST['website'], $_POST['cont_person'], $_POST['email_1'], $_POST['contact_no_1'], $_POST['email_2'], $_POST['contact_no_2'])){

  require 'dbh.inc.php';

  $session = $_POST['session'];
  $companyName = $_POST['comp_name'];
  $address = $_POST['address'];
  $dop = $_POST['dop'];
  $salary = $_POST['salary'];
  $place = $_POST['place'];
  $doj = $_POST['doj'];
  $batch = $_POST['batch'];
  $website = $_POST['website'];
  $contactPerson = $_POST['cont_person'];
  $email_1 = $_POST['email_1'];
  $contactNumber_1 = $_POST['contact_no_1'];
  $email_2 = $_POST['email_2'];
  $contactNumber_2 = $_POST['contact_no_2'];

  $cse =  0;
  $it = 0;
  $elex = 0;
  $elec = 0;
  $mech_pro = 0;
  $mech_auto = 0;
  $civil = 0;



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


  $errorEmpty = false;
  $errorEmail = false;
  $errorEmail1 = false;
  $errorCont = false;
  $errorCont1 = false;
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

  if(!empty($email_1) && !filter_var($email_1, FILTER_VALIDATE_EMAIL)){
    echo "<script>
    email1 = document.getElementById('mail1');
    email1.setAttribute('class','form-control is-invalid');
    </script>";

    $errorEmail = true;
  }
  else{

    echo "<script>
    email1 = document.getElementById('mail1');
    email1.setAttribute('class','form-control');
    </script>";

    $errorEmail = false;
  }


  if(!empty($email_2) && !filter_var($email_2, FILTER_VALIDATE_EMAIL)){
    echo "<script>
    email2 = document.getElementById('mail2');
    email2.setAttribute('class','form-control is-invalid');
    </script>";

    $errorEmail1 = true;
  }
  else{

    echo "<script>
    email2 = document.getElementById('mail2');
    email2.setAttribute('class','form-control');
    </script>";

    $errorEmail1 = false;
  }


  // Error Checkbox

  if($cse == 0 && $it == 0 && $elex == 0 && $elec == 0 && $mech_pro == 0 && $mech_auto == 0 && $civil == 0){

    echo "<script>

    Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      type: 'error',
      title: 'Select Atleast one Branch!'});

    // $.notify('Select atleast one Branch');
    </script>";

    $errorCheckbox = true;
  }
  else{

    $errorCheckbox = false;
  }


  // Error Contact Number

  if(!empty($contactNumber_1) && strlen($contactNumber_1) != 10){

    echo "<script>
    mob_no1 = document.getElementById('mob_no1');
    mob_no1.setAttribute('class','form-control is-invalid');
    </script>";

    $errorCont = true;
  }
  else{

    echo "<script>
    mob_no1 = document.getElementById('mob_no1');
    mob_no1.setAttribute('class','form-control');
    </script>";

    $errorCont = false;
  }


  if(!empty($contactNumber_2) && strlen($contactNumber_2) != 10){

    echo "<script>
    mob_no2 = document.getElementById('mob_no2');
    mob_no2.setAttribute('class','form-control is-invalid');
    </script>";

    $errorCont1 = true;
  }
  else{

    echo "<script>
    mob_no2 = document.getElementById('mob_no2');
    mob_no2.setAttribute('class','form-control');
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



  if(!$errorEmpty && !$errorEmail && !$errorCont && !$errorEmail1 && !$errorCont1 && !$errorCheckbox ){

    $sql = "SELECT company_name FROM companydb$session WHERE company_name = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){

      echo "<script>

      Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      Toast.fire({
        type: 'error',
        title: 'SQL Error!'});


      // $.notify('SQL Error!');
      </script>";
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $companyName);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);

      $result = mysqli_stmt_num_rows($stmt);
      if($result > 0){
        echo "<script>

        Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'error',
          title: 'Company with this name already exists.'});

        // $.notify('Company with this name already exists.');
        </script>";
        exit();
      }
      else{
        $sql = "SELECT email_1, email_2 FROM companydb$session WHERE email_1 = ? OR email_1 = ? OR email_2 = ? OR email_2 =?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){

          echo "<script>

          Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          Toast.fire({
            type: 'error',
            title: 'SQL Error!'});


          // $.notify('SQL Error');
          </script>";
          exit();
        }
        else{
          mysqli_stmt_bind_param($stmt, "ssss", $email_1, $email_2, $email_1, $email_2);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);

          $result = mysqli_stmt_num_rows($stmt);

          if($result > 0){
            echo "<script>

            Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            Toast.fire({
              type: 'error',
              title: 'Company with this Email already exists'});

            // $.notify('Company with this Email already exists');
            </script>";
            exit();
          }
          else{
            $sql = "SELECT contact_no_1, contact_no_2 FROM companydb$session WHERE contact_no_1 = ? OR contact_no_1 = ? OR contact_no_2 = ? OR contact_no_2 = ?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){

              echo "<script>

              Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              Toast.fire({
                type: 'error',
                title: 'SQL Error!'});


              // $.notify('SQL Error');
              </script>";
              exit();
            }
            else{
              mysqli_stmt_bind_param($stmt, "ssss", $contactNumber_1, $contactNumber_2, $contactNumber_1, $contactNumber_2);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_store_result($stmt);

              $result = mysqli_stmt_num_rows($stmt);

              if($result > 0){
                echo "<script>

                Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
                });
                Toast.fire({
                  type: 'error',
                  title: 'Company with this Contact Number already exists'});

                // $.notify('Company with this Contact Number already exists');
                </script>";
                exit();
              }
              else{

                $sql = "INSERT INTO companydb$session (company_name, company_address, date_of_placement, salary, place_of_placement, date_of_joining, batch, website, contact_person, email_1, contact_no_1, email_2, contact_no_2, cse, it, elex, elec, mech_pro, mech_auto, civil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){

                  echo "<script>

                  Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });
                  Toast.fire({
                    type: 'error',
                    title: 'SQL Error!'});

                  // $.notify('SQL Error');
                  </script>";
                  exit();
                }
                else{

                  if(!empty($companyName)){
                    $companyName = strtoupper($companyName);
                  }
                  if(!empty($companyAddress)){
                    $companyAddress = strtoupper($companyAddress);
                  }
                  if(!empty($place)){
                    $place = strtoupper($place);
                  }
                  if(!empty($contactPerson)){
                    $contactPerson = strtoupper($contactPerson);
                  }

                  mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $companyName, $address, $dop, $salary, $place, $doj, $batch, $website, $contactPerson, $email_1, $contactNumber_1, $email_2, $contactNumber_2, $cse, $it, $elex, $elec, $mech_pro, $mech_auto, $civil);
                  mysqli_stmt_execute($stmt);

                  echo "<script>

                  Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });
                  Toast.fire({
                    type: 'success',
                    title: 'Company Added Successfully!'});

                  // $.notify('Company Added Successfully!','success');
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

  Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    type: 'error',
    title: 'Whoops! Something went Wrong.'});

  // $.notify('Whoops! Something went Wrong.');
  </script>";
  exit();
}

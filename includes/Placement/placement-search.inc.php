<?php
if(isset($_POST['session'], $_POST['company'], $_POST['website'], $_POST['email'], $_POST['contactNumber'], $_POST['branches'], $_POST['batch'], $_POST['place'], $_POST['dop'], $_POST['doj'])){

  require "../dbh.inc.php";

  $session = $_POST['session'];
  $company = $_POST['company'];
  $website = $_POST['website'];
  $email = $_POST['email'];
  $contactNumber = $_POST['contactNumber'];
  $branches = $_POST['branches'];
  $batch = $_POST['batch'];
  $place = $_POST['place'];
  $dop = $_POST['dop'];
  $doj = $_POST['doj'];

  $sql = "";

  $errorEmail = false;
  $errorCont = false;


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



  if(!$errorEmail && !$errorCont){

    if($company != "" ||
    $website != "" ||
    $email != "" ||
    $contactNumber != "" ||
    $branches != "" ||
    $place != "" ||
    $dop != "" ||
    $doj!= ""){


      if(empty($company)){
        $company = NULL;
      }
      if(empty($website)){
        $website = NULL;
      }
      if(empty($email)){
        $email = NULL;
      }
      if(empty($contactNumber)){
        $contactNumber = NULL;
      }



      if(!empty($company) || !empty($website) || !empty($email) || !empty($contactNumber)){
        if(!empty($company)){
          $company = strtoupper($company);
        }
        $sql = "SELECT * FROM companydb$session WHERE company_name = '$company' OR website = '$website' OR email_1 = '$email' OR email_2 = '$email' OR contact_no_1 = '$contactNumber' OR contact_no_1 = '$contactNumber';";
      }
      else{

        $sql = "SELECT * FROM companydb$session WHERE ";

        //BRANCHES


        if($branches == 'ALL_BRANCH'){
          $sql .= " ( cse = 0 OR cse = 1 OR it = 0 OR it = 1 OR elex = 0 OR elex = 1 OR elec = 0 OR elec = 1 OR mech_pro = 0 OR mech_auto = 1 OR civil = 0 OR civil = 1 ) ";
        }
        else{
          $branches = strtolower($branches);
          $sql .= " {$branches} = 1 ";
        }


        // batch


        if(!empty($batch)){
          $sql .= " AND batch = '$batch' ";
        }

        //place

        if(!empty($place)){
          $place = strtoupper($place);
          $sql .= " AND place_of_placement = '$place' ";
        }

        //salary

        if(!empty($salary)){
          $sql .= " AND salary = '$salary' ";
        }

        // dop

        if(!empty($dop)){
          $sql .= " AND dop = '$dop' ";
        }

        // doj

        if(!empty($doj)){
          $sql .= " AND doj = '$doj' ";

        }
        $sql .= ";";
        // echo $sql;
      }

      $result = mysqli_query($conn, $sql);

      if(file_exists('../../Scripts/placementSearch.json')){
        unlink('../../Scripts/placementSearch.json');
      }
      $fp = fopen('../../Scripts/placementSearch.json','w');




      if(mysqli_num_rows($result) > 0){
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
          $rows[] = $row;
          echo "<script>
          document.getElementById('jumbot').style.display = 'flow-root';
          </script>";
        }


        if(file_exists('../../Scripts/placementStudent.json')){
          unlink('../../Scripts/placementStudent.json');
        }
        $fps = fopen('../../Scripts/placementStudent.json','w');

        $sqlstd = "SELECT company, student_name, roll_no FROM studentdb$session;";

        $resultstd = mysqli_query($conn, $sqlstd);



        if(mysqli_num_rows($resultstd) > 0){
          $rowsstd = array();
          while($rowstd = mysqli_fetch_assoc($resultstd)){
            $rowsstd[] = $rowstd;
            // echo "<script>
            // document.getElementById('jumbot').style.display = 'flow-root';
            // </script>";
          }

          fwrite($fps, json_encode($rowsstd));
          fclose($fps);
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

  echo "<script>console.log('Heyy');</script>";
}
else{
  echo "<script>console.log('Byee');</script>";
}

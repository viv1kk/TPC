<?php
if(isset($_POST['session'], $_POST['companyID'], $_POST['companyName'])){

  require "../dbh.inc.php";

  $session = $_POST['session'];
  $companyID = (int) $_POST['companyID'];
  $companyName = $_POST['companyName'];


  // echo $companyName;



  $sql = "SELECT * FROM companydb$session WHERE company_ID = '$companyID';";
  $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());

  if(mysqli_num_rows($result) > 0){
    $data = "";
    while($row = mysqli_fetch_assoc($result)){

      $arr = json_encode($row);

      $data .= "<script>";
            $data .= "arr = $arr;

      details = [];
      details1 = [];

//Values

  // console.log(arr);

            Object.keys(arr).forEach(function(key) {
            details.push(arr[key]);
            });

//Columns
            Object.keys(arr).forEach(function(key) {
            details1.push(key);
            });

            det = document.querySelectorAll('.col-md-7');
            // console.log(details);


            branchArr = [];
            for(i = 14; i < details.length; i++){
              if(details[i] == 1){
                branchArr.push(details1[i]);
              }
            }
            det[14].innerHTML = branchArr.toString().toUpperCase();

            for(let i = 0; i < details.length-8; i++){
              det[i].innerHTML = details[i+1];
            }";

            $data .= "</script>";
          }





          if(!empty($companyName)){
            $sql = "SELECT student_name, roll_no FROM studentdb$session WHERE company = '$companyName';";
            $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());




            if(mysqli_num_rows($result) > 0){

              $arrayStd = array();
              $data1 = "";
              while($rows = mysqli_fetch_assoc($result)){
                  $arrayStd[] = $rows;
              }
              $arrayStd = json_encode($arrayStd);

              $data1 .= "<script>";
              $data1 .= "

              arrayStd = $arrayStd;

              // console.log(arrayStd);

              details2 = [];


              for (let i = 0; i < arrayStd.length; i++){
                // details2.push('[');
                details2.push('['+arrayStd[i]['student_name'], arrayStd[i]['roll_no']+ '] ');
                // details2.push('],');
              }

              // console.log(details2);
                det[13].innerHTML = details2.toString().toUpperCase();
              // console.log(details2.toString().toUpperCase());

              ";


              $data1 .= "</script>";

              echo $data1;



              // echo mysqli_num_rows($result);
            }
          }
          // echo "<script>console.log(companyName);</script>";
          echo $data;
          exit();
        }

          else{
            echo "<script>
            $.notify('No Company Found');
        </script>";
            exit();
          }
          exit();

        }
        else{
          echo "<script>
          $.notify('Error! Something went Wrong.');
          </script>";
          exit();
        }

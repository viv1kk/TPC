<?php
if(isset($_POST['session'], $_POST['companyID'])){

  require "../dbh.inc.php";

  $session = $_POST['session'];
  $companyID = (int) $_POST['companyID'];
  // echo $userID;



  $sql = "SELECT * FROM companydb$session;";
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

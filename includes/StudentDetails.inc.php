<?php
if(isset($_GET['userID'])){
  require "dbh.inc.php";

  $userID = (int) $_GET['userID'];
  echo $userID;

  $sql = "SELECT user_ID FROM studentdb WHERE user_ID = '$userID';";
  $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());
  echo($sql);

  if(mysqli_num_rows($result) > 0){
    // echo "ifsq";
    // header("Location: StudentDetails.php?userID=12");
    exit();
  }
  else{
    // echo "elsesqs";
    // header("Location: StudentDetails.php?error=sqlerror");
    exit();
  }
  // exit();

}
else{
  echo "NONO";
  exit();
}

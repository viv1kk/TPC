<?php

if(isset($_POST['signin-submit'])){

  require 'dbh.inc.php';

  $mailuid = $_POST['uidormail'];
  $pwd = $_POST['inputPassword'];

  if(empty($mailuid) || empty($pwd)){
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else{
    $sql = "SELECT * FROM users WHERE username=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt,"ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if($row = mysqli_fetch_assoc($result)){
        $pwdCheck = password_verify($pwd, $row['pwd']);
        if($pwdCheck == false){
          header("Location: ../index.php?error=wrongpassword");
          exit();
        }
        else if($pwdCheck == true){
          session_start();
          $_SESSION['userid'] = $row['userid'];
          $_SESSION['usernm'] = $row['username'];

          header("Location: ../PHP/Pages/dashboard.php");
          exit();
        }
        else{
          header("Location: ../index.php?error=wrongpassword");
          exit();
        }
      }
      else{
        header("Location: ../index.php?error=nouser");
        exit();
      }
    }
  }

}
else{
  header("Location: ../index.php");
  exit();
}

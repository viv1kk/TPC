<?php
if(isset($_POST['signup-submit'])){

  require 'dbh.inc.php';

  $usernm = $_POST['inputUsername'];
  $email = $_POST['inputEmail'];
  $password = $_POST['password'];
  $passrepeat = $_POST['repeatPassword'];

  if(empty($usernm) || empty($email) || empty($password) || empty($passrepeat)){
    header("Location: ../PHP/Pages/signup.php?error=emptyfields&inputUsername=".$usernm.'&inputEmail='.$email);
    exit();
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../PHP/Pages/signup.php?error=invalidEmail&inputUsername=".$usernm);
    exit();
  }
  else if(!preg_match("/^[a-zA-Z0-9]*$/", $usernm)){
    header("Location: ../PHP/Pages/signup.php?error=invalidinputUsername&inputEmail=".$email);
    exit();
  }
  else if($password !== $passrepeat){
    header("Location: ../PHP/Pages/signup.php?error=checkPassword");
    exit();
  }

  else{
    $sql = "SELECT username FROM users WHERE username=?";
    $stmt = mysqli_stmt_init($conn);


    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../PHP/Pages/signup.php?error=sqlerror");
      exit();
    }
        else{
      $us = $stmt;
      mysqli_stmt_bind_param($us, "s", $usernm);
      mysqli_stmt_execute($us);
      mysqli_stmt_store_result($us);

      $resultCheck = mysqli_stmt_num_rows($us);
      if($resultCheck > 0){
        header("Location: ../PHP/Pages/signup.php?error=usernmtaken");
        exit();
      }
      else{
        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../PHP/Pages/signup.php?error=sqlerror");
          exit();
        }
            else{
        $em = $stmt;
        mysqli_stmt_bind_param($em, "s", $email);
        mysqli_stmt_execute($em);
        mysqli_stmt_store_result($em);

        $resCheck = mysqli_stmt_num_rows($em);

        if($resCheck > 0){
          header("Location: ../PHP/Pages/signup.php?error=emailtaken");
          exit();
        }
        else{

          $sql = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);

          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../PHP/Pages/signup.php?error=sqlerror");
            exit();
          }
          else{
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $usernm, $email, $hashedPwd);
            mysqli_stmt_execute($stmt);
            header("Location: ../index.php?signup=success");
            exit();
          }
          exit();
        }
        exit();
      }
      exit();
    }
  }
}
  mysqli_start_close($stmt);
  mysqli_close($conn);

}
else{
  header("Location: ../PHP/Pages/signup.php");
  exit();
}

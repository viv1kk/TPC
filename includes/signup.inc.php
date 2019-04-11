<?php
if(isset($_POST['signup-submit'])){

  require 'dbh.inc.php';

  $username = $_POST['inputUsername'];
  $email = $_POST['inputEmail'];
  $password = $_POST['password'];
  $passrepeat = $_POST['repeatPassword'];

   if(empty($username) || empty($email) || empty($password) || empty($passrepeat)){
     header("Location: ../signup.php?error=emptyfields&inputUsername=".$username.'&inputEmail='.$email);
     exit();
   }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     header("Location: ../signup.php?error=invalidEmails&inputUsername=".$username);
     exit();
   }
   else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
     header("Location: ../signup.php?error=invalidinputUsername&inputEmail=".$email);
     exit();
   }
   else if($password !== $passrepeat){
     header("Location: ../signup.php?error=checkPassword");
     exit();
   }
   else{
     $sql = "SELECT username FROM users WHERE username=?";
     $stmt = mysqli_stmt_init($conn);

     if(!mysqli_stmt_prepare($stmt, $sql)){
       header("Location: ../signup.php?error=sqlerror");
       exit();
     }
     else{
       mysqli_stmt_bind_param($stmt, "s", $username);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_store_result($stmt);
       $resultCheck = mysqli_stmt_num_rows($stmt);

       if($resultCheck >0){
         header("Location: ../signup.php?error=usernametaken");
         exit();
       }
       else{

        $sql = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else{
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../signup.php?signup=success");
          exit();
        }
       }
     }
   }
     mysqli_start_close($stmt);
     mysqli_close($conn);

}
else{
  header("Location: ../signup.php");
  exit();
}

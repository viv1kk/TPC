<?php
session_start();
   // restrict access through directURL
   if(!isset($_SESSION['userid'])){
   }
   else{
     header('Location: PHP/Pages/dashboard.php');
     exit();
   }
 ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign In: TPC</title>

  <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">

  <!-- Bootstrap core CSS -->
  <!-- Custom styles for this template -->
  <link href="./Stylesheet/style-login.css" rel="stylesheet">
</head>
<body class="bg-light">

<header class="page-header">
  <nav class="navbar navbar-expand-xl navbar-dark mb-5">
    <div class= "container">

      <?php
          if(isset($_SESSION['userid'])){
            echo '
      <a class="navbar-brand " href="PHP/Pages/dashboard.php" ><h1 class="h2">Training And Placement Cell</h1></a>';
    }
      else{
        echo '
  <a class="navbar-brand " href="#" ><h1 class="h2">Training And Placement Cell</h1></a>';
      }
      ?>

      <?php
          if(isset($_SESSION['userid'])){
            echo '      <form class="form-inline" action="includes/signout.inc.php">
                    <button class="btn btn-outline-light my-2 my-sm-0">Sign Out</button>
                  </form>';
          }
          else{
            echo '      <form class="form-inline" action="PHP/Pages/signup.php">
                    <button class="btn btn-outline-light my-2 my-sm-0">Sign Up</button>
                  </form>';
          }
       ?>

    </div>
  </nav>
</header>

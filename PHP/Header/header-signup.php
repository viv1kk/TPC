<?php
  session_start();
 ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign Up: TPC</title>

  <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.min.css">

  <!-- Bootstrap core CSS -->


  <!-- Custom styles for this template -->
  <link href="../../Stylesheet/style-login.css" rel="stylesheet">
</head>
<body class="bg-light">

<header class="page-header">
  <nav class="navbar navbar-expand-xl navbar-dark mb-5">
    <div class= "container">
      <a class="navbar-brand " href="#" ><h1 class="h2">Training And Placement Cell</h1></a>

      <?php
          if(isset($_SESSION['userid'])){
            echo '      <form class="form-inline" action="../../includes/signout.inc.php">
                    <button class="btn btn-outline-light my-2 my-sm-0">Sign Out</button>
                  </form>';
          }
          else{
            echo '      <form class="form-inline" action="../../index.php">
                    <button class="btn btn-outline-light my-2 my-sm-0">Sign In</button>
                  </form>';
          }
       ?>

    </div>
  </nav>
</header>

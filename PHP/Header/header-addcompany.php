<?php
  session_start();

  // restrict access through directURL

  if(!isset($_SESSION['userid'])){
    header('Location: ../../index.php');
    exit();
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Add Company</title>

  <!-- Bootstrap core CSS -->
  <link href="../../Bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->

  <link href="../../Stylesheet/companyadd.css" rel="stylesheet">
</head>

<body class="bg-light">

  <nav class="navbar navbar-expand-xl navbar-dark mb-1">
    <div class= "container">
      <a class="navbar-brand " href="dashboard.php" ><h1 class="h2">Training And Placement Cell</h1></a>

    <div class="navbar navbar-collapse ">
      <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link ml-4 " href="enrollstudent.php">Enroll a Student</a>
      </li>

      <li class="nav-item">
        <a class="nav-link ml-3 text-white" href="#">Add a Company for Placement</a>
      </li>
    </ul>
    <form class="form-inline" action="../../includes/signout.inc.php">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Sign Out</button>
    </form>
  </div>
</div>
</nav>

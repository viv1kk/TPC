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
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Student Details</title>

  <!-- Bootstrap core CSS -->
  <link href="../../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../Stylesheet/studentdetails.css" rel="stylesheet">

  <!-- Custom styles for this template -->
</head>

<body class="bg-light">

<header class="page-header">
  <nav class="navbar navbar-expand-xl navbar-dark mb-5 ">
    <div class= "container">
      <a class="navbar-brand" id='dashboard'><h1 class="h2">Training And Placement Cell</h1></a>

    <div class="navbar navbar-collapse">
      <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link ml-4" id="enroll_student">Enroll a Student</a>
      </li>

      <li class="nav-item dropdown ml-4">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Placement
        </a>
        <div class="dropdown-menu ml-3" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" id= "search_company">Search a Company</a>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item" id= "add_company">Add a Company for Placement</a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link ml-3" id="add_company">Add a Company for Placement</a>
      </li> -->
    </ul>
    <form class="form-inline" action="../../includes/signout.inc.php">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Sign Out</button>
    </form>
  </div>
</div>
</nav>
</header>

<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystemtpc";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
  echo "<script>
    para = document.getElementById('para');
    para.innerHTML = 'Error: Something went Wrong with Database.';
  </script>";
  die("Connection Failed: ".mysqli_connect_error());
}

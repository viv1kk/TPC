<?php

require "../dbh.inc.php";

$options = "";
$sql = "SELECT * FROM session;";
$result = mysqli_query($conn, $sql);



if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $options .= "<a class='dropdown-item' href='dashboard.php?session={$row['session']}'>{$row['session']}</a>";
  }
}
else{
  $options .= "<a class='dropdown-item text-muted' href='#'>No session created</a>";
}

echo $options;




if(isset($_POST['session'])){
  $session = $_POST['session'];

  if(empty($session) || $session == 'null'){
    $sql = 'SELECT MAX(session) AS sessionm FROM session;';
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      if(!empty($row['sessionm'])){
        echo "<script>window.location = 'dashboard.php?session={$row['sessionm']}'</script>";
      }
    }
  }
}

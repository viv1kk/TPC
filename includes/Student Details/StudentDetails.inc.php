<?php
if(isset($_POST['userID'])){

  require "../dbh.inc.php";

  $userID = (int) $_POST['userID'];
  // echo $userID;

  $sql = "SELECT * FROM studentdb WHERE user_ID = '$userID';";
  $result = mysqli_query($conn, $sql) or die("Connection Failed: ".mysqli_connect_error());

  if(mysqli_num_rows($result) > 0){
    $data = "";
    while($row = mysqli_fetch_assoc($result)){

      $arr = json_encode($row);

      $data .= "<script>";
      $data .= "arr = $arr;

            details = [];

            Object.keys(arr).forEach(function(key) {
            details.push(arr[key]);
            });

            det = document.querySelectorAll('.col-md-7');
            for(let i = 0; i < details.length; i++){
              det[i].innerHTML = details[i+1];
            }";

      $data .= "</script>";
    }
    echo $data;

    exit();
  }

  else{
    echo "<script>
    $.notify('No Student Found');
</script>";
    exit();
  }
  exit();

}
else{
  echo "<script>
  $.notify('Error! Something went Wrong.');
  </script>";
  exit();
}

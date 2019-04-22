<?php
// if(isset($_POST['search-submit'])){
// if(isset($_POST['regNo'], $_POST['rollNo'], $_POST['studentName'], $_POST['fatherName'], $_POST['branches'], $_POST['shifts'],
 // $_POST['email'], $_POST['mobNo'], $_POST['dob'], $_POST['companyName'], $_POST['address'])){
   require "../dbh.inc.php";

  echo "HELLO";


  $registrationNumber = $_POST['regNo'];
  $rollNumber = $_POST['rollNo'];
  $studentName = $_POST['studentName'];
  $fatherName = $_POST['fatherName'];
  $branch = $_POST['branches'];
  $shift = $_POST['shifts'];
  $email = $_POST['email'];
  $contactNumber = $_POST['mobNo'];
  $dob = $_POST['dob'];
  $company = $_POST['companyName'];
  $address = $_POST['address'];



  $table_row = "<table id='dtBasicExample' class='table table-striped table-responsive table-bordered table-lg table-hover'>

           <thead class='table table-dark width-100%'>
            <tr class='dnd-moved'>
              <th class='th-sm'>Registration Number
              </th>
              <th class='th-sm'>Roll Number
              </th>
              <th class='th-sm'>Student's Name
              </th>
              <th class='th-sm'>Father's Name
              </th>
              <th class='th-sm'>Branch
              </th>
              <th class='th-sm'>Name
              </th>
              <th class='th-sm'>Shift
              </th>
              <th class='th-sm'>Email
              </th>
              <th class='th-sm'>Contact Number
              </th>
              <th class='th-sm'>DOB
              </th>
              <th class='th-sm'>Company
              </th>
              <th class='th-sm'>Address
              </th>
            </tr>
          </thead>
          <tbody>";









  if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../PHP/Pages/enrollstudent.php?error=invalidEmail");
    exit();
  }

  else if($registrationNumber != "" ||
          $rollNumber != "" ||
          $studentName != "" ||
          $fatherName != "" ||
          $branch != "" ||
          $shift != "" ||
          $email != "" ||
          $contactNumber != "" ||
          $dob != "" ||
          $company != "" ||
          $address != ""){



            $sql = "SELECT * FROM studentdb WHERE
                    reg_no = '$registrationNumber' OR
                    roll_no = '$rollNumber' OR
                    student_name = '$studentName' OR
                    father_name = '$fatherName' OR
                    branch = '$branch' OR
                    shift = '$shift' OR
                    email = '$email' OR
                    contact_no = '$contactNumber' OR
                    dob = '$dob' OR
                    company = '$company' OR
                    address = '$address';";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
              $rows = array();
              while($row = mysqli_fetch_assoc($result)){

                $rows[] = $row;

                $table_row .=  "<tr class='dnd-moved'>
                            <td>{$row['reg_no']}</td>
                            <td>{$row['roll_no']}</td>
                            <td>{$row['student_name']}</td>
                            <td>{$row['father_name']}</td>
                            <td>{$row['branch']}</td>
                            <td>{$row['shift']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['contact_no']}</td>
                            <td>{$row['dob']}</td>
                            <td>{$row['company']}</td>
                            <td>{$row['address']}</td>
                            </tr>";
              }



              $fp = fopen('../../Scripts/results.json', 'w');

              fwrite($fp, json_encode($rows));
              fclose($fp);
              // echo $table_row;
            }
  }










$table_row .= "        </tbody>
        <tfoot class='table table-dark'>
          <tr class='dnd-moved'>
          <th >Registration Number
          </th>
          <th >Roll Number
          </th>
          <th>Student's Name
          </th>
          <th>Father's Name
          </th>
          <th>Branch
          </th>
          <th>Name
          </th>
          <th>Shift
          </th>
          <th>Email
          </th>
          <th>Contact Number
          </th>
          <th>DOB
          </th>
          <th>Company
          </th>
          <th>Address
          </th>
        </tfoot>
      </table>";




echo $table_row;

  // exit();
// }
// else{
//   echo "HEY";
//   exit();
// }

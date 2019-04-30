<?php
if(isset($_POST['year'])){

  require "../dbh.inc.php";

  $year = $_POST['year'];

  if(!empty($year) && strlen($year) != 4){
    echo "<script>
    Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      type: 'error',
      title: 'Enter year Correctly.'});
      </script>";
      exit();
    }
    else{
      $sql = "SELECT * FROM session WHERE session ='$year'";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0){
        echo "<script>
        Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          type: 'error',
          title: 'This Session already exists!'});
          </script>";
          exit();
        }
        else{


// CREATE STUDENT DATABASE


          $sql = "CREATE TABLE studentdb$year(
            user_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
            reg_no int(8) UNSIGNED DEFAULT NULL,
            roll_no bigint(11) UNSIGNED DEFAULT NULL,
            student_name tinytext,
            father_name tinytext,
            branch tinytext,
            shift tinytext,
            email tinytext,
            contact_no bigint(10) DEFAULT NULL,
            dob date DEFAULT NULL,
            company tinytext,
            address text,
            PRIMARY KEY (user_ID),
            UNIQUE KEY reg_no (reg_no),
            UNIQUE KEY roll_no (roll_no)

          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
          ";

          if(mysqli_query($conn, $sql)){

                echo "<script>

                console.log('New Student Database Created Successfully!');


                // Toast = Swal.mixin({
                //   toast: true,
                //   position: 'top-end',
                //   showConfirmButton: false,
                //   timer: 3000
                // });
                // Toast.fire({
                //   type: 'success',
                //   title: 'New Student Database Created Successfully!'});
                  </script>";

            }
            else{
              echo "<script>

              console.log('Failed to create New Student Database!');

              Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
              Toast.fire({
                type: 'error',
                title: 'Failed to create New Session!'});
                </script>";
                exit();
              }


// CREATE COMPANY Database


              $sql = "CREATE TABLE companydb$year (
                company_ID INT(9) UNSIGNED NOT NULL AUTO_INCREMENT ,
                 company_name TINYTEXT NOT NULL ,
                 company_address TINYTEXT DEFAULT NULL ,
                 date_of_placement DATE DEFAULT NULL ,
                 salary TINYTEXT DEFAULT NULL ,
                 place_of_placement TINYTEXT DEFAULT NULL ,
                 date_of_joining DATE DEFAULT NULL ,
                 batch TINYTEXT  DEFAULT NULL ,
                 website TINYTEXT DEFAULT NULL ,
                 contact_person TINYTEXT  DEFAULT NULL ,
                 email_1 TINYTEXT DEFAULT NULL ,
                 contact_no_1 BIGINT(10) DEFAULT NULL ,
                 email_2 TINYTEXT DEFAULT NULL ,
                 contact_no_2 BIGINT(10) DEFAULT NULL ,
                 cse BOOLEAN NULL ,
                 it BOOLEAN NULL ,
                 elex BOOLEAN NULL ,
                 elec BOOLEAN NULL ,
                 mech_pro BOOLEAN NULL ,
                 mech_auto BOOLEAN NULL ,
                 civil BOOLEAN NULL,
                 PRIMARY KEY (company_ID),
                 UNIQUE company_name (company_name(255)),
                 UNIQUE email_1 (email_1(255)),
                 UNIQUE contact_no_1 (contact_no_1),
                 UNIQUE email_2 (email_2(255)),
                 UNIQUE contact_no_2 (contact_no_2)) ENGINE = InnoDB
              ";


              if(mysqli_query($conn, $sql)){
                echo "<script>

                console.log('Company Database Created Successfully!');

                // Toast = Swal.mixin({
                //   toast: true,
                //   position: 'top-end',
                //   showConfirmButton: false,
                //   timer: 3000
                // });
                // Toast.fire({
                //   type: 'success',
                //   title: 'Added New Session Successfully!'});
                  </script>";


                  $sql = "INSERT INTO session (session) VALUES ('$year');";
                  if(mysqli_query($conn, $sql)){
                    echo "<script>
                    Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    });
                    Toast.fire({
                      type: 'success',
                      title: 'New Session Added Successfully!'});
                      </script>";
                  }else{
                    echo "<script>
                    Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    });
                    Toast.fire({
                      type: 'error',
                      title: 'Failed to create New Session!'});
                      </script>";
                      exit();
                  }

              }
              else{
                echo "<script>

                  console.log('Failed to create Company Database!');

                // Toast = Swal.mixin({
                //   toast: true,
                //   position: 'top-end',
                //   showConfirmButton: false,
                //   timer: 3000
                // });
                // Toast.fire({
                //   type: 'error',
                //   title: 'Failed to create New Session!'});
                  </script>";
                  exit();
              }
            }
          }
        }
        else{
          echo "<script>
          Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          Toast.fire({
            type: 'error',
            title: 'Something went Wrong!'});
            </script>";
        }

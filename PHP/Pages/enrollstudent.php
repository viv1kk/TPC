<?php
require "../Header/header-enrollstudent.php"
?>


<main>
  <div class="jumbotron mb-1 row justify-content-center" id="wrapper">
    <div class="container-fluid row justify-content-center">
  <div class="col-mb-6 order-md-1 justify-content-center">
        <form class="needs-validation">
          <h4 class="mb-3 h4 text-muted">Enroll a Student</h4>

          <!-- first row -->

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="reg_no">Registration Number</label>
              <input type="number" pattern="[0-9]{8,8}"class="form-control" placeholder="Registration Number"  name="reg_no" id="regNo">
              <div class="invalid-feedback">
                Please enter a valid Registration Number for search updates.
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label for="roll_no">Roll Number</label>
              <input  type="number" class="form-control" placeholder="Roll Number" name="roll_no" id="rollNo">
              <div class="invalid-feedback">
                Please enter a valid Roll Number for search updates.
              </div>
            </div>
          </div>

          <!-- second row -->

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="studentName">Student's name</label>
              <input type="text" class="form-control" id="studentName" placeholder="Student's name" name="student_name">
            </div>

            <div class="col-md-6 mb-3">
              <label for="fatherName">Father's name</label>
              <input type="text" class="form-control" id="fatherName" placeholder="Father's name" name="father_name">
            </div>
          </div>

          <!-- third row -->

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="branch">Branch</label>
              <select class="custom-select" name="branch" id="branch_select">
                <option value="CSE">Computer Science And Engineering</option>
                <option value="IT">Information Technology</option>
                <option value='ELEX'>Electronics Engineering</option>
                <option value='ELEC'>Electrical Engineering</option>
                <option value='MECH_PRO'>Mechanical Production</option>
                <option value='MECH_AUTO'>Mechanical Automobile</option>
                <option value='CIVIL'>Civil Engineering</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="shift">Shift</label>
              <select class="custom-select" id="shifts" name="shift">
                <option value="SHIFT_1">Shift I</option>
                <option value="SHIFT_2">Shift II</option>
                <option value="OTHER">Other Institutes</option>
              </select>
            </div>
          </div>

          <!-- fourth row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="mail" placeholder="student@example.com" name="email">
              <div class="invalid-feedback">
                Please enter a valid E-mail address for search updates.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="mob_no">Contact Number</label>
              <input type="number" class="form-control" id="mob_no" placeholder="Contact Number" name="contact_no">
              <div class="invalid-feedback">
                Please enter a valid Mobile number.
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="company">DOB</label>
              <input type="date" class="form-control" name="dob" id= "dateofb">
            </div>

            <div class="col-md-6 mb-3">
              <label for="company">Company</label>
              <select class="custom-select" name="company" id="company_select">
                <?php
                  require "../../includes/Dashboard/selectoption.inc.php";
                  echo $options;
                ?>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" placeholder="1234 Main St"id="addr">
          </div>

          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" name="enroll-submit" id="enroll-submit" type="button">Enroll</button>
        </form>
      </div>
      <div id="contain">
      </div>
    </div>
  </div>
</main>

<?php
require "../footer/footer-enrollstudent.php"
?>

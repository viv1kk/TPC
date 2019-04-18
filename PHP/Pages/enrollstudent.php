<?php
require "../Header/header-enrollstudent.php"
?>


<main>
  <div class="jumbotron mb-1 row justify-content-center" id="wrapper">
    <div class="container-fluid row justify-content-center">
  <div class="col-mb-6 order-md-1 justify-content-center">

        <form class="needs-validation" action="../../includes/enrollstudent.inc.php" method="post">
          <h4 class="mb-3 h4">Enroll a Student:</h4>

          <!-- first row -->

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="reg_no">Registration Number</label>
              <input type="number" pattern="[0-9]{8,8}"class="form-control" placeholder="Registration Number"  name="reg_no" value="">
            </div>

            <div class="col-md-6 mb-3">
              <label for="roll_no">Roll Number</label>
              <input  type="number" class="form-control" placeholder="Roll Number" name="roll_no" value="">
            </div>
          </div>

          <!-- second row -->

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="studentName">Student's name</label>
              <input type="text" class="form-control" id="studentName" placeholder="Student's name" name="student_name" value="">
            </div>

            <div class="col-md-6 mb-3">
              <label for="fatherName">Father's name</label>
              <input type="text" class="form-control" id="fatherName" placeholder="Father's name" name="father_name" value="">
            </div>
          </div>

          <!-- third row -->

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="branch">Branch</label>
              <select class="custom-select" name="branch">
                <option value="cse">Computer Science And Engineering</option>
                <option value="it">Information Technology</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="shift">Shift</label>
              <select class="custom-select"  name="shift">
                <option value="shift_1">Shift I</option>
                <option value="shift_2">Shift II</option>
                <option value="shift_3">Other Institutes</option>
              </select>
            </div>
          </div>

          <!-- fourth row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" placeholder="student@example.com" name="email">
            </div>
            <div class="col-md-6 mb-3">
              <label for="mob_no">Contact Number</label>
              <input type="number" class="form-control" placeholder="Contact Number" name="contact_no">
            </div>
          </div>

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="company">DOB</label>
              <input type="date" class="form-control" name="dob">
            </div>

            <div class="col-md-6 mb-3">
              <label for="company">Company</label>
              <select class="custom-select" name="company">
                <option value="com1">xyz</option>
                <option value="com2">zxy</option>
                <option value="com3">yzx</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" placeholder="1234 Main St">
          </div>

          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" name="enroll-submit" type="submit">Enroll</button>
        </form>
      </div>
    </div>
  </div>
</main>

<?php
require "../footer/footer-enrollstudent.php"
?>

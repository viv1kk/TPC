<?php
require "../Header/header-studentdetails.php";
?>

<main>
  <div class="container-fluid" style="width:90vw">

    <div class="row">
      <div class="col">

        <h4 class="text-muted text-left mb-3">Student Details</h4>
      </div>
      <div class="col">
        <h4 class="text-muted text-left mb-3">Edit Student Details</h4>
      </div>
    </div>
    <div class="row justify-content-center">

      <div class="jumbotron mr-1" style="height:100%">
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Registration Number</div>
          <div class="col-md-7 themed-grid-col">.col-md-4</div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Roll Number</div>
          <div class="col-md-7 themed-grid-col">.col-md-8</div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Student Name</div>
          <div class="col-md-7 themed-grid-col">.col-md-8</div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Father Name</div>
          <div class="col-md-7 themed-grid-col">.col-md-8</div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Branch</div>
          <div class="col-md-7 themed-grid-col">.col-md-8</div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Shift</div>
          <div class="col-md-7 themed-grid-col">.col-md-8</div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Email</div>
          <div class="col-md-7 themed-grid-col">.col-md-8</div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Contact Number</div>
          <div class="col-md-7 themed-grid-col">.col-md-8</div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Date of Birth</div>
          <div class="col-md-7 themed-grid-col">.col-md-8</div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Company</div>
          <div class="col-md-7 themed-grid-col">.col-md-8</div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Address</div>
          <div class="col-md-7 themed-grid-col">.col-md-8</div>
        </div>
      </div>

      <div class="jumbotron ml-3" style="padding:3em">
        <form class="needs-validation">

          <p id="para" class="lead text-center"></p>

          <div class="row" style="padding:2em 0 0">
            <div class="col-md-6 mb-1">
              <label for="reg_no">Registration Number</label>
              <input type="number" pattern="[0-9]{8,8}"class="form-control" placeholder="Registration Number"  name="reg_no" id="regNo" disabled>
              <div class="invalid-feedback">
                Please enter a valid Registration Number for search updates.
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label for="roll_no">Roll Number</label>
              <input  type="number" class="form-control" placeholder="Roll Number" name="roll_no" id="rollNo" disabled>
              <div class="invalid-feedback">
                Please enter a valid Roll Number for search updates.
              </div>
            </div>
          </div>

          <!-- second row -->

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="studentName">Student's name</label>
              <input type="text" class="form-control" id="studentName" placeholder="Student's name" name="student_name" disabled>
            </div>

            <div class="col-md-6 mb-3">
              <label for="fatherName">Father's name</label>
              <input type="text" class="form-control" id="fatherName" placeholder="Father's name" name="father_name" disabled>
            </div>
          </div>

          <!-- third row -->

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="branch">Branch</label>
              <select class="custom-select" name="branch" id="branch_select" disabled>
                <option value="cse">Computer Science And Engineering</option>
                <option value="it">Information Technology</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="shift">Shift</label>
              <select class="custom-select" id="shifts" name="shift" disabled>
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
              <input type="email" class="form-control" id="mail" placeholder="student@example.com" name="email" disabled>
              <div class="invalid-feedback">
                Please enter a valid E-mail address for search updates.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="mob_no">Contact Number</label>
              <input type="number" class="form-control" id="mob_no" placeholder="Contact Number" name="contact_no" disabled>
              <div class="invalid-feedback">
                Please enter a valid Mobile number.
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="company">DOB</label>
              <input type="date" class="form-control" name="dob" id= "dateofb" disabled>
            </div>

            <div class="col-md-6 mb-3">
              <label for="company">Company</label>
              <select class="custom-select" name="company" id="company_select" disabled>
                <?php
                require "../../includes/Dashboard/selectoption.inc.php";
                echo $options;
                ?>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" placeholder="1234 Main St" id="addr" disabled>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" name="enroll-submit" id="edit-submit" type="button" disabled>Edit Student Details</button>
        </form>
      </div>
    </div>
  </div>
</div>
</main>

<?php
require "../footer/footer-studentdetails.php"
?>

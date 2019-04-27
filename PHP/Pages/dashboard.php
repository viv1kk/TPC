<?php
require "../Header/header-dashboard.php";
?>

<main>
  <div class="container">

    <form class="needs-validation">
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">

          <!-- number of columns selected -->

          <h4 class="d-flex justify-content-between align-items-center mb-4">
            <span class="text-muted text-center">Columns for the Table</span>
            <span class="badge badge-primary badge-pill" id="columns">2</span>
          </h4>

          <ul class="mb-3">
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_user_ID" value="user_ID" checked disabled>
                <label class="custom-control-label" for="col_reg_no">User ID</label>
              </div>
            </li>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_reg_no" value="reg_no" checked>
                <label class="custom-control-label" for="col_reg_no">Registration Number</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_roll_no" value="roll_no">
                <label class="custom-control-label" for="col_roll_no">Roll Number</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_std_name" value="student_name">
                <label class="custom-control-label" for="col_std_name">Student's Name</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_fat_name" value="father_name">
                <label class="custom-control-label" for="col_fat_name">Father's Name</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_Branch" value="branch">
                <label class="custom-control-label" for="col_Branch">Branch</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_shift" value="shift">
                <label class="custom-control-label" for="col_shift">Shift</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_email" value="email">
                <label class="custom-control-label" for="col_email">Email</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_cont_no" value="contact_no">
                <label class="custom-control-label" for="col_cont_no">Contact Number</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_dob" value="dob">
                <label class="custom-control-label" for="col_dob">DOB</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_comp" value="company">
                <label class="custom-control-label" for="col_comp">Company</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_addr" value="address">
                <label class="custom-control-label" for="col_addr">Address</label>
              </div>
            </li>
          </ul>
        </div>

        <!-- information for search -->

        <div class="col-md-8 order-md-1">
          <!-- <h4 class="mb-4 text-muted">Search for a Student</h4> -->

          <!-- first row -->


        <h4 class="mt-1 text-muted">Search a particular student</h4>
        <hr class="m-4">

          <div class="row mt-4">
            <div class="col-md-6 mb-3">
              <label for="reg_no">Registration Number</label>
              <input type="number" class="form-control" id="reg_no" placeholder="Registration Number" name="regNo">
              <div class="invalid-feedback">
                Please enter a valid Registration Number for search updates.
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label for="roll_no">Roll Number</label>
              <input type="number" class="form-control" id="roll_no" placeholder="Roll Number" name="rollNo">
              <div class="invalid-feedback">
                Please enter a valid Roll Number for search updates.
              </div>
            </div>
          </div>

          <!-- second row -->

          <div class="row md-4">
            <div class="col-md-6 mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="mail" placeholder="student@example.com" name="email">
              <div class="invalid-feedback">
                Please enter a valid E-mail address for search updates.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="mob_no">Contact Number</label>
              <input type="number" class="form-control" id="mob_no" placeholder="Contact Number" name="mobNo">
              <div class="invalid-feedback">
                Please enter a valid Mobile number.
              </div>
            </div>
          </div>


          <h4 class="mt-3 text-muted">Search multiple students</h4>

          <hr class="m-4">

          <!-- third row -->

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="branch">Branch</label><br>
              <select class="custom-select" id="branch" name="branches">
                <option value="ALL_BRANCH">All branches</option>
                <option value="CSE">Computer Science And Engineering</option>
                <option value="IT">Information Technology</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="shift">Shift</label>
              <select class="custom-select" id="shift" name="shifts">
                <option value="BOTH_12">Both Shift I & Shift II</option>
                <option value="SHIFT_1">Shift I</option>
                <option value="SHIFT_2">Shift II</option>
                <option value="OTHER">Other Institutes</option>
                <option value="ALL">All</option>
              </select>
            </div>
          </div>

          <!-- fourth row -->


          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="studentName">Student's name</label>
              <input type="text" class="form-control" id="studentName" placeholder="Student's name" name="studentName">
            </div>

            <div class="col-md-6 mb-3">
              <label for="fatherName">Father's name</label>
              <input type="text" class="form-control" id="fatherName" placeholder="Father's name" name="fatherName">
            </div>
          </div>


          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="company">DOB</label>
              <input type="date" class="form-control" id="dateofb" name="dob">
            </div>

            <div class="col-md-6 mb-3">
              <label for="company">Company</label>
              <select class="custom-select" id="company" placeholder="No Company Available" name="companyName">
                <?php
                require "../../includes/Dashboard/selectoption.inc.php";
                echo $options;
                ?>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="addr" placeholder="1234 Main St" name="address">
          </div>

          <hr class="mb-4">

          <!-- ninth row -->

          <button class="btn btn-primary btn-lg btn-block" id="search" name="search-submit" type="button">Search</button>
        </div>
      </div>
    </form>
  </div>
  <hr class="m-4">

  <!-- Jumbotron needed to be hidden  -->

  <div class="jumbotron mb-2" id="jumbot">
    <div class="container-fluid row justify-content-center" id="contain">
    </div>
  </div>
</main>

<?php
require "../footer/footer-dashboard.php"
?>

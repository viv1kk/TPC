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

      <div class="jumbotron mr-1" style="height:100%;">
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Registration Number</div>
          <div class="col-md-7 themed-grid-col" id= "register"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Roll Number</div>
          <div class="col-md-7 themed-grid-col" id= "roll"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Student Name</div>
          <div class="col-md-7 themed-grid-col" id= "student"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Father Name</div>
          <div class="col-md-7 themed-grid-col" id= "father"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Branch</div>
          <div class="col-md-7 themed-grid-col" id= "bran"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Shift</div>
          <div class="col-md-7 themed-grid-col" id= "shif"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Email</div>
          <div class="col-md-7 themed-grid-col" id= "stdMail"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Contact Number</div>
          <div class="col-md-7 themed-grid-col" id= "contact"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Date of Birth</div>
          <div class="col-md-7 themed-grid-col" id= "date"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Company</div>
          <div class="col-md-7 themed-grid-col" id= "comp"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Address</div>
          <div class="col-md-7 themed-grid-col" id= "stdAddr"></div>
          <div id='code'>
        </div>
      </div>
      </div>

      <div class="jumbotron ml-3" style="padding:2em;">
        <h5 class="text-muted text-left mb-2">Select the fields you want to edit
          <span class="badge badge-primary badge-pill ml-3" id="columns">0</span></h5>
          <br>
          <div class="row">
            <div class="col-md-5 custom-control custom-checkbox mb-3" style="padding-left: 5em">
              <input type="checkbox" class="custom-control-input is-valid" id="col_reg_no" value="reg_no">
              <label class="custom-control-label" for="col_reg_no">Registration Number</label>
            </div>
            <div class="col-md-4 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_roll_no" value="roll_no">
              <label class="custom-control-label" for="col_roll_no">Roll Number</label>
            </div>
            <div class="col-md-3 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_std_name" value="student_name">
              <label class="custom-control-label" for="col_std_name">Student's Name</label>
            </div>
          </div>


          <div class="row">

            <div class="col-md-5 custom-control custom-checkbox mb-3" style="padding-left: 5em">
              <input type="checkbox" class="custom-control-input is-valid" id="col_fat_name" value="father_name">
              <label class="custom-control-label" for="col_fat_name">Father's Name</label>
            </div>
            <div class="col-md-4 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_Branch" value="branch">
              <label class="custom-control-label" for="col_Branch">Branch</label>
            </div>
            <div class="col-md-3 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_shift" value="shift">
              <label class="custom-control-label" for="col_shift">Shift</label>
            </div>
          </div>



          <div class="row">
            <div class="col-md-5 custom-control custom-checkbox mb-3" style="padding-left: 5em">
              <input type="checkbox" class="custom-control-input is-valid" id="col_email" value="email">
              <label class="custom-control-label" for="col_email">Email</label>
            </div>
            <div class="col-md-4 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_cont_no" value="contact_no">
              <label class="custom-control-label" for="col_cont_no">Contact Number</label>
            </div>
            <div class="col-md-3 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_dob" value="dob">
              <label class="custom-control-label" for="col_dob">DOB</label>
            </div>
          </div>


          <div class="row">
            <div class="col-md-5 custom-control custom-checkbox mb-3" style="padding-left: 5em">
              <input type="checkbox" class="custom-control-input is-valid" id="col_comp" value="company">
              <label class="custom-control-label" for="col_comp">Company</label>
            </div>
            <div class="col-md-4 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_addr" value="address">
              <label class="custom-control-label" for="col_addr">Address</label>
            </div>
            <div class="col">

            </div>

        </div>

        <h5 class="text-muted text-left mt-3 ">Enter the Details</h5>
        <!-- <br> -->

        <form class="needs-validation">

          <div class="row">
            <div class="col-md-6 mb-1">
              <label for="reg_no">Registration Number</label>
              <input type="number" pattern="[0-9]{8,8}"class="form-control" placeholder="Registration Number"  name="reg_no" id="regNo" >
              <div class="invalid-feedback">
                Please enter a valid Registration Number for search updates.
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label for="roll_no">Roll Number</label>
              <input  type="number" class="form-control" placeholder="Roll Number" name="roll_no" id="rollNo" >
              <div class="invalid-feedback">
                Please enter a valid Roll Number for search updates.
              </div>
            </div>
          </div>

          <!-- second row -->

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="studentName">Student's name</label>
              <input type="text" class="form-control" id="studentName" placeholder="Student's name" name="student_name" >
            </div>

            <div class="col-md-6 mb-3">
              <label for="fatherName">Father's name</label>
              <input type="text" class="form-control" id="fatherName" placeholder="Father's name" name="father_name" >
            </div>
          </div>

          <!-- third row -->

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="branch">Branch</label>
              <select class="custom-select" name="branch" id="branch_select" >
                <option value="cse">Computer Science And Engineering</option>
                <option value="it">Information Technology</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="shift">Shift</label>
              <select class="custom-select" id="shifts" name="shift" >
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
              <input type="email" class="form-control" id="mail" placeholder="student@example.com" name="email" >
              <div class="invalid-feedback">
                Please enter a valid E-mail address for search updates.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="mob_no">Contact Number</label>
              <input type="number" class="form-control" id="mob_no" placeholder="Contact Number" name="contact_no" >
              <div class="invalid-feedback">
                Please enter a valid Mobile number.
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="company">DOB</label>
              <input type="date" class="form-control" name="dob" id= "dateofb" >
            </div>

            <div class="col-md-6 mb-3">
              <label for="company">Company</label>
              <select class="custom-select" name="company" id="company_select" >
                <?php
                require "../../includes/Dashboard/selectoption.inc.php";
                echo $options;
                ?>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" placeholder="1234 Main St" id="addr" >
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" name="enroll-submit" id="edit-submit" type="button" >Edit Student Details</button>
        </form>
        <div id="editCode">
        </div>
      </div>
    </div>
  </div>
</div>
</main>

<?php
require "../footer/footer-studentdetails.php"
?>

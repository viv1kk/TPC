<?php
require "../Header/header-dashboard.php";
?>

<main>
  <div class="container">

    <form class="needs-validation" novalidate>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">

          <!-- number of columns selected -->

          <h4 class="d-flex justify-content-between align-items-center mb-4">
            <span class="text-muted text-center">Columns for the Table</span>
            <span class="badge badge-primary badge-pill" id="columns">1</span>
          </h4>

          <ul class="mb-3">
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_reg_no" value="Registration Number" checked>
                <label class="custom-control-label" for="col_reg_no">Registration Number</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_roll_no" value="Roll Number">
                <label class="custom-control-label" for="col_roll_no">Roll Number</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_std_name" value="Student's Name">
                <label class="custom-control-label" for="col_std_name">Student's Name</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_fat_name" value="Father's Name">
                <label class="custom-control-label" for="col_fat_name">Father's Name</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_Branch" value="Branch">
                <label class="custom-control-label" for="col_Branch">Branch</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_shift" value="Shift">
                <label class="custom-control-label" for="col_shift">Shift</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_email" value="Email">
                <label class="custom-control-label" for="col_email">Email</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_cont_no" value="Contact Number">
                <label class="custom-control-label" for="col_cont_no">Contact Number</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_dob" value="DOB">
                <label class="custom-control-label" for="col_dob">DOB</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_comp" value="Company">
                <label class="custom-control-label" for="col_comp">Company</label>
              </div>
            </li>
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_addr" value="Address">
                <label class="custom-control-label" for="col_addr">Address</label>
              </div>
            </li>
          </ul>
        </div>

        <!-- information for search -->

        <div class="col-md-8 order-md-1">
          <h4 class="mb-4">Search for a Student:</h4>

          <!-- first row -->

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="reg_no">Registration Number</label>
              <input type="number" class="form-control" id="reg_no" placeholder="Registration Number" value="">
            </div>

            <div class="col-md-6 mb-3">
              <label for="roll_no">Roll Number</label>
              <input type="number" class="form-control" id="roll_no" placeholder="Roll Number" value="">
            </div>
          </div>

          <!-- second row -->

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="studentName">Student's name</label>
              <input type="text" class="form-control" id="studentName" placeholder="Student's name" value="">
            </div>

            <div class="col-md-6 mb-3">
              <label for="fatherName">Father's name</label>
              <input type="text" class="form-control" id="fatherName" placeholder="Father's name" value="">
            </div>
          </div>

          <!-- third row -->

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="branch">Branch</label><br>
              <select class="custom-select" id="branch">
                <option value="all_branch">All branches</option>
                <option value="cse">Computer Science And Engineering</option>
                <option value="it">Information Technology</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="shift">Shift</label>
              <select class="custom-select" id="shift">
                <option valut="both_12">Both Shift I & Shift II</option>
                <option value="shift_1">Shift I</option>
                <option value="shift_2">Shift II</option>
                <option value="shift_3">Other Institutes</option>
                <option value="select_all">All</option>
              </select>
            </div>
          </div>

          <!-- fourth row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="student@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for search updates.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="mob_no">Contact Number</label>
              <input type="number" class="form-control" id="mob_no" placeholder="Contact Number">
              <div class="invalid-feedback">
                Please enter a valid mobile number.
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="company">DOB</label>
              <input type="date" class="form-control" id="email">
            </div>

            <div class="col-md-6 mb-3">
              <label for="company">Company</label>
              <select class="custom-select" id="company" placeholder="No Company Available">
                <!-- <option value="com1">xyz</option>
                <option value="com2">zxy</option>
                <option value="com3">yzx</option> -->
                <?php
                  require "../../includes/dbh.inc.php";
                  require "../../includes/Dashboard/selectoption.inc.php";
                  echo $options;
                ?>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
          </div>

          <hr class="mb-4">

          <!-- ninth row -->

          <button class="btn btn-primary btn-lg btn-block" type="submit">Search</button>
        </div>
      </div>
    </form>
  </div>
  <hr class="m-4">

  <!-- Jumbotron needed to be hidden  -->

  <div class="jumbotron mb-2">
    <div class="container-fluid row justify-content-center">
      <!-- <table id="dtBasicExample" class="table table-striped table-responsive table-bordered table-lg table-hover"> -->
      <!-- bootstrap class  table-responsive can be added -->
      <!-- <thead class="table table-dark width-100%">
      <tr class="dnd-moved">
      <th class="th-sm">Name
    </th>
    <th class="th-sm">Position
  </th>
  <th class="th-sm">Office
</th>
<th class="th-sm">Age
</th>
<th class="th-sm">Start date
</th>
<th class="th-sm">Salary
</th>
</tr>
</thead>
<tbody>
<tr class="dnd-moved">
<td>Tiger Nixon</td>
<td>System Architect</td>
<td>Edinburgh</td>
<td>61</td>
<td>2011/04/25</td>
<td>$320,800</td>
</tr>
<tr class="dnd-moved">
<td>Garrett</td>
<td>Accountant</td>
<td>Tokyo</td>
<td>63</td>
<td>2011/07/25</td>
<td>$170,750</td>
</tr>
<tr class="dnd-moved">
<td>Ashton Cox</td>
<td>Junior Technical Author</td>
<td>San Francisco</td>
<td>66</td>
<td>2009/01/12</td>
<td>$86,000</td>
</tr>
<tr class="dnd-moved">
<td>Colleen Hurst</td>
<td>Javascript Developer</td>
<td>San Francisco</td>
<td>39</td>
<td>2009/09/15</td>
<td>$205,500</td>
</tr>
</tbody>
<tfoot class="table table-dark">
<tr class="dnd-moved">
<th>Name
</th>
<th>Position
</th>
<th>Office
</th>
<th>Age
</th>
<th>Start date
</th>
<th>Salary
</th>
</tr>
</tfoot>
</table> -->
</div>
</div>
</main>

<?php
require "../footer/footer-dashboard.php"
?>

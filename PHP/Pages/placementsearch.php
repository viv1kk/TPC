<?php
require "../Header/header-placementsearch.php";
?>

<main>
  <div class="container">

    <form class="needs-validation">
      <div class="row mt-5">
        <div class="col-md-4 order-md-2 mb-4">

          <!-- number of columns selected -->

          <h4 class="d-flex justify-content-between align-items-center mb-4">
            <span class="text-muted text-center">Columns for the Table</span>
            <span class="badge badge-primary badge-pill" id="columns">2</span>
          </h4>

          <ul class="mb-3">
            <li class="d-flex justify-content-between lh-condensed">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input is-valid" id="col_company_ID" value="company_ID" checked disabled>
                <label class="custom-control-label" for="col_company_ID">Company ID</label>
              </div>
            </li>
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_company_name" value="company_name" checked>
              <label class="custom-control-label" for="col_company_name">Company Name</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_company_address" value="company_address">
              <label class="custom-control-label" for="col_company_address">Company Address</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_dop" value="date_of_placement">
              <label class="custom-control-label" for="col_dop">Date of Placement</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_salary" value="salary">
              <label class="custom-control-label" for="col_salary">Salary</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_place" value="place_of_placement">
              <label class="custom-control-label" for="col_place">Place of Placement</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_doj" value="date_of_joining">
              <label class="custom-control-label" for="col_doj">Date of Joining</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_batch" value="batch">
              <label class="custom-control-label" for="col_batch">Batch</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_website" value="website">
              <label class="custom-control-label" for="col_website">Website</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_person" value="contact_person">
              <label class="custom-control-label" for="col_person">Contact Person</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_contact_no_1" value="contact_no_1">
              <label class="custom-control-label" for="col_contact_no_1">Contact Number 1</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_email_1" value="email_1">
              <label class="custom-control-label" for="col_email_1">Email 1</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_contact_no_2" value="contact_no_2">
              <label class="custom-control-label" for="col_contact_no_2">Contact Number 2</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_email_2" value="email_2">
              <label class="custom-control-label" for="col_email_2">Email 2</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_students" value="students">
              <label class="custom-control-label" for="col_students">Students</label>
            </div>
          </li>
          <li class="d-flex justify-content-between lh-condensed">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input is-valid" id="col_branches" value="branches">
              <label class="custom-control-label" for="col_branches">Branches</label>
            </div>
          </li>
        </ul>
      </div>

      <!-- information for search -->

      <div class="col-md-8 order-md-1">
        <!-- <h4 class="mb-4 text-muted">Search for a Student</h4> -->

        <!-- first row -->


        <h4 class="mt-1 text-muted">Search a particular Company</h4>
        <hr class="m-4">

        <div class="row mt-4">
          <div class="col-md-6 mb-3">

            <label for="comp_name">Name of the Company</label>
            <input type="text" class="form-control" id= "company" name="comp_name" placeholder="Company">

          </div>

          <div class="col-md-6 mb-3">
            <label for="website">Website</label>
            <input type="text" id="web" class="form-control" placeholder="Website" name="website">
          </div>
        </div>

        <!-- second row -->

        <div class="row md-4">
          <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="mail" name="email" placeholder="company@example.com">
            <div class="invalid-feedback">
              Please enter a valid E-mail
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="contact_no">Contact Number</label>
            <input type="number" id="mob_no" class="form-control" placeholder="Contact Number" name="contact_no">
            <div class="invalid-feedback">
              Please enter a valid Mobile Number
            </div>
          </div>
        </div>


        <h4 class="mt-3 text-muted">Search multiple Companies</h4>

        <hr class="m-4">

        <!-- third row -->

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="branch">Branch</label><br>
            <select class="custom-select" id="branch" name="branches">
              <option value="ALL_BRANCH">All branches</option>
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
            <label for="batches">Batch</label>
            <input type="text" id="batch" class="form-control" placeholder="Batch" name="batches">
          </div>
        </div>

        <!-- fourth row -->

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="placeofp">Place of Placement</label>
            <input type="text" id="place" class="form-control" placeholder="Place of Placement" name="placeofp">
          </div>

          <div class="col-md-6 mb-3">
            <label for="sal">Salary</label>
            <input type="text" id="salary" class="form-control" placeholder="Salary" name="sal">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="dateofp">Date of Placement</label>
            <input type="date" id="dop" class="form-control" placeholder="Date of Placement" name="dateofp">
          </div>

          <div class="col-md-6 mb-3">

            <label for="dateofj">Date of Joining</label>
            <input type="date" id="doj" class="form-control" placeholder="Date of Placement" name="dateofj">
          </div>
        </div>
        <!-- ninth row -->
        <hr class="mb-4">

        <button class="btn btn-primary btn-lg btn-block" id="search" name="search-company" type="button">Search</button>
      </div>
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
require "../footer/footer-placementsearch.php"
?>

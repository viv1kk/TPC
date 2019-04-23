<?php
require "../Header/header-addcompany.php"
?>

<main>
  <div class="jumbotron mb-0 ">
    <div class="container-fluid row justify-content-center">
      <div class="col-md-6 order-md-3 justify-content-center">
            <p id="para" class="lead text-center" style= "color:red"></p>
        <form class="needs-validation">
          <h4 class="mb-3 h4 text-muted">Add the Company</h4>

          <div class="mb-3">
            <label for="comp_name">Name of the Company</label>
            <input type="text" class="form-control" id= "company" name="comp_name" placeholder="Company">
            <div class="invalid-feedback">
              Please enter name of the Company
            </div>
          </div>

          <div class="row">
            <div class= "col-md-6 mb-4">
              <label for="comp_name">Email</label>
              <input type="email" class="form-control" id="mail" name="email" placeholder="company@example.com">
              <div class="invalid-feedback">
                Please enter a valid E-mail
              </div>
            </div>
            <div class= "col-md-6 mb-4">
              <label for="mob_no">Contact Number</label>
              <input type="number" id="mob_no" class="form-control" placeholder="Contact Number" name="contact_no">
              <div class="invalid-feedback">
                Please enter a valid Mobile Number
              </div>
            </div>
          </div>

          <div class="mb-3">

            <h4 class="d-flex justify-content-between align-items-center mb-4">
              <span class="text-muted text-center">Select the Branches:</span>
              <span class="badge badge-primary badge-pill" id = "branch" >1</span>
            </h4>

            <ul class="mb-3">
              <li class="d-flex justify-content-between lh-condensed">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input is-valid" name="branch_cse" id="branch_cse" value="cse" checked>
                  <label class="custom-control-label" for="branch_cse">Computer Science And Engineering</label>
                </div>
              </li>
              <li class="d-flex justify-content-between lh-condensed">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input is-valid" name="branch_it" id="branch_it" value="it">
                  <label class="custom-control-label" for="branch_it">Information Technology</label>
                </div>
              </li>
            </ul>
            <hr class="md-3">
            <button class="btn btn-primary" name="company-submit" id="add-company" type="button">Add Company</button>
          </div>
        </form>
        <div id="contain">
        </div>
      </div>
    </div>
    <div class="mt-4"></div>
  </div>
</main>


<?php
require "../Footer/footer-addcompany.php"
?>

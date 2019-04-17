<?php
require "../Header/header-addcompany.php"
?>

<main>
  <div class="jumbotron mb-0">
    <div class="container-fluid row justify-content-center">
      <div class="col-md-6 order-md-3">
        <form class="needs-validation" action="../../includes/addcompany.inc.php" method="post">
          <h4 class="mb-3 h4">Add the Company:</h4>

          <div class="mb-3">
            <label for="comp_name">Name of the Company</label>
            <input type="text" class="form-control" name="comp_name" placeholder="Company">
          </div>

          <div class="row">
            <div class= "col-md-6 mb-4">
              <label for="comp_name">Email</label>
              <input type="email" class="form-control" name="email" placeholder="company@example.com">
            </div>
            <div class= "col-md-6 mb-4">
              <label for="mob_no">Contact Number</label>
              <input type="number" id="mob_no" class="form-control" placeholder="Contact Number" name="contact_no">
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
                  <input type="checkbox" class="custom-control-input is-valid" value="cse" name="branch_cse" id="branch_cse" checked>
                  <label class="custom-control-label" for="branch_cse">Computer Science And Engineering</label>
                </div>
              </li>
              <li class="d-flex justify-content-between lh-condensed">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input is-valid" value="it" name="branch_it" id="branch_it">
                  <label class="custom-control-label" for="branch_it">Information Technology</label>
                </div>
              </li>
            </ul>
            <hr class="md-3">
            <button class="btn btn-primary" name="company-submit" type="submit">Add Company</button>
          </div>
        </form>
      </div>
    </div>
    <div class="mt-4"></div>
  </div>
</main>


<?php
require "../Footer/footer-addcompany.php"
?>

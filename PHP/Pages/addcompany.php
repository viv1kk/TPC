<?php
  require "../Header/header-addcompany.php"
?>

<main>

  <div class="jumbotron mb-0">
    <div class="container-fluid row justify-content-center">
      <div class="col-md-6 order-md-1">
        <h4 class="mb-3 h4">Add the Company:</h4>


        <div class="mb-5">

          <label for="comp_name">Name of the Company:</label>
          <input type="text" class="form-control" id="comp_name" placeholder="Company" value="">
        </div>

        <div class="mb-3">

          <form class="was-validated">
            <h4 class="d-flex justify-content-between align-items-center mb-4">
              <span class="text-muted text-center">Select the Branches:</span>
              <span class="badge badge-primary badge-pill" id = "branch" >0</span>
            </h4>

            <ul class="mb-3">
              <li class="d-flex justify-content-between lh-condensed">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" name="branch" id="branch_cse">
                  <label class="custom-control-label" for="branch_cse">Computer Science And Engineering</label>
                </div>
              </li>
              <li class="d-flex justify-content-between lh-condensed">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" name="branch" id="branch_it">
                  <label class="custom-control-label" for="branch_it">Information Technology</label>
                </div>
              </li>
            </ul>
            <hr class="md-4">
            <button class="btn btn-primary"  type="submit">Add Company</button>
          </form>
        </div>

      </div>
    </div>
  </div>
  <div class="jumbotron ml-1"></div>
</main>


<?php
  require "../Footer/footer-addcompany.php"
?>

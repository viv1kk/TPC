<?php
require "../Header/header-addcompany.php"
?>

<main>
  <div class="jumbotron mb-0 ">
    <div class="container-fluid row justify-content-center">
      <div class="col-md-10 order-md-3 justify-content-center">
        <form class="needs-validation">
          <h4 class="mb-3 h4 text-muted">Add the Company</h4>
          <div class="row">

            <div class="col-md-6 mb-4">
              <label for="comp_name">Name of the Company</label>
              <input type="text" class="form-control" id= "company" name="comp_name" placeholder="Company">
              <div class="invalid-feedback">
                Please enter name of the Company
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <label for="comp_addr">Company Address</label>
              <input type="text" class="form-control" id= "companyAddr" name="comp_addr" placeholder="Company Address">
            </div>
          </div>


          <div class="row">
            <div class= "col-md-3 mb-4">
              <label for="dateofp">Date of Placement</label>
              <input type="date" id="dop" class="form-control" placeholder="Date of Placement" name="dateofp">
            </div>
            <div class= "col-md-3 mb-4">
              <label for="sal">Salary</label>
              <input type="text" id="salary" class="form-control" placeholder="Salary" name="sal">
            </div>
            <div class= "col-md-6 mb-4">
              <label for="placeofp">Place of Placement</label>
              <input type="text" id="place" class="form-control" placeholder="Place of Placement" name="placeofp">
            </div>
          </div>

          <div class="row">
            <div class= "col-md-3 mb-4">
              <label for="dateofj">Date of Joining</label>
              <input type="date" id="doj" class="form-control" placeholder="Date of Placement" name="dateofj">
            </div>
            <div class= "col-md-3 mb-4">
              <label for="batches">Batch</label>
              <input type="text" id="batch" class="form-control" placeholder="Batch" name="batches">
            </div>
            <div class= "col-md-3 mb-4">
              <label for="website">Website</label>
              <input type="text" id="web" class="form-control" placeholder="Website" name="website">
            </div>
            <div class= "col-md-3 mb-4">
              <label for="contactPerson">Contact Person Name</label>
              <input type="text" id="person" class="form-control" placeholder="Contact Person Number" name="contactPerson">
            </div>
          </div>


          <div class="row">
            <div class= "col-md-3 mb-4">
              <label for="email1">Email</label>
              <input type="email" class="form-control" id="mail1" name="email1" placeholder="company@example.com">
              <div class="invalid-feedback">
                Please enter a valid E-mail
              </div>
            </div>
            <div class= "col-md-3 mb-4">
              <label for="contact_no1">Contact Number</label>
              <input type="number" id="mob_no1" class="form-control" placeholder="Contact Number" name="contact_no1">
              <div class="invalid-feedback">
                Please enter a valid Mobile Number
              </div>
            </div>
            <div class= "col-md-3 mb-4">
              <label for="email2">Email <span class='text-muted'>(other)</span></label>
              <input type="email" class="form-control" id="mail2" name="email2" placeholder="company@example.com">
              <div class="invalid-feedback">
                Please enter a valid E-mail
              </div>
            </div>
            <div class= "col-md-3 mb-4">
              <label for="contact_no2">Contact Number <span class='text-muted'>(other)</span></label>
              <input type="number" id="mob_no2" class="form-control" placeholder="Contact Number" name="contact_no2">
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


            <div class="row">

              <div class="col-md-4 mb-2">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input is-valid" name="branch_cse" id="branch_cse" value="cse" checked>
                  <label class="custom-control-label" for="branch_cse">Computer Science And Engineering</label>
                </div>
              </div>

              <div class="col-md-4 mb-2">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input is-valid" name="branch_it" id="branch_it" value="it">
                  <label class="custom-control-label" for="branch_it">Information Technology</label>
                </div>
              </div>

              <div class="col-md-4 mb-2">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input is-valid" name="branch_elex" id="branch_elex" value="elex">
                  <label class="custom-control-label" for="branch_elex">Electronics Engineering</label>
                </div>
              </div>
            </div>



            <div class="row">

              <div class="col-md-4 mb-2">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input is-valid" name="branch_elec" id="branch_elec" value="elec">
                  <label class="custom-control-label" for="branch_elec">Electrical Engineering</label>
                </div>
              </div>

              <div class="col-md-4 mb-2">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input is-valid" name="branch_mechpro" id="branch_mechpro" value="mech_pro">
                  <label class="custom-control-label" for="branch_mechpro">Mechanical Production</label>
                </div>
              </div>

              <div class="col-md-4 mb-2">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input is-valid" name="branch_mechauto" id="branch_mechauto" value="mech_auto">
                  <label class="custom-control-label" for="branch_mechauto">Mechanical Automobile</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-4">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input is-valid" name="branch_civil" id="branch_civil" value="civil">
                  <label class="custom-control-label" for="branch_civil">Civil Engineering</label>
                </div>
              </div>
            </div>
          </div>
          <hr class="md-3">
          <button class="btn btn-primary" name="company-submit" id="add-company" type="button">Add Company</button>
        </div>
      </form>
      <div id="contain">
      </div>
    </div>
  </div>
</div>
</main>


<?php
require "../Footer/footer-addcompany.php"
?>

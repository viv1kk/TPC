<?php
require "../Header/header-placementdetails.php";
?>

<main>
  <div class="container-fluid" style="width:90vw">

    <div class="row">
      <div class="col">

        <h4 class="text-muted text-left mb-3">Placement Details</h4>
      </div>
      <div class="col">
        <h4 class="text-muted text-left mb-3">Edit Placement Details</h4>
      </div>
    </div>
    <div class="row justify-content-center">

      <div class="jumbotron mr-1" style="height:100%;">
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Company Name</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Company Address</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Date of Placement</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Salary</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Place of Placement</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Date of Joining</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Batch</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Website</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Contact Person</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Email 1</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Contact Number 1</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Email 2</div>
          <div class="col-md-7 themed-grid-col"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Contact Number 2</div>
          <div class="col-md-7 themed-grid-col"id= "contact_no_2"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Students</div>
          <div class="col-md-7 themed-grid-col" id= "students"></div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 themed-grid-col">Branches</div>
          <div class="col-md-7 themed-grid-col" id= "branch"></div>
          <div id='code'>
          </div>
        </div>
      </div>



      <div class="jumbotron ml-3" style="padding:2em;">
        <h5 class="text-muted text-left mb-2">Select the fields you want to edit
          <span class="badge badge-primary badge-pill ml-3" id="columns">0</span></h5>
          <br>
          <div class="row">
            <div class="col-md-5 custom-control custom-checkbox mb-3" style="padding-left: 4em">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_comp" value="company_name">
              <label class="custom-control-label" for="col_comp">Company Name</label>
            </div>
            <div class="col-md-4 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_comp_addr" value="company_address">
              <label class="custom-control-label" for="col_comp_addr">Company Address</label>
            </div>
            <div class="col-md-3 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_dop" value="date_of_placement">
              <label class="custom-control-label" for="col_dop">Date of placement</label>
            </div>
          </div>

<!-- <p class = "apple"></p> -->
          <div class="row">

            <div class="col-md-5 custom-control custom-checkbox mb-3" style="padding-left: 4em">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_salary" value="salary">
              <label class="custom-control-label" for="col_salary">Salary</label>
            </div>
            <div class="col-md-4 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_place" value="place_of_placement">
              <label class="custom-control-label" for="col_place">Place of Placement</label>
            </div>
            <div class="col-md-3 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_doj" value="date_of_joining">
              <label class="custom-control-label" for="col_doj">Date of Joining</label>
            </div>
          </div>



          <div class="row">
            <div class="col-md-5 custom-control custom-checkbox mb-3" style="padding-left: 4em">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_batch" value="batch">
              <label class="custom-control-label" for="col_batch">Batch</label>
            </div>
            <div class="col-md-4 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_website" value="website">
              <label class="custom-control-label" for="col_website">Website</label>
            </div>
            <div class="col-md-3 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_cont_person" value="contact_person">
              <label class="custom-control-label" for="col_cont_person">Contact Person</label>
            </div>
          </div>


          <div class="row">
            <div class="col-md-5 custom-control custom-checkbox mb-3" style="padding-left: 4em">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_email_1" value="email_1">
              <label class="custom-control-label" for="col_email_1">Email 1</label>
            </div>
            <div class="col-md-4 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_cont_1" value="contact_no_1">
              <label class="custom-control-label" for="col_cont_1">Contact Number 1</label>
            </div>
            <div class="col-md-3 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_email_2" value="email_2">
              <label class="custom-control-label" for="col_email_2">Email 2</label>
            </div>
          </div>

          <div class="row">
            <div class="col-md-5 custom-control custom-checkbox mb-3" style="padding-left: 4em">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_cont_2" value="contact_no_2">
              <label class="custom-control-label" for="col_cont_2">Contact Number 2</label>
            </div>
            <div class="col-md-4 custom-control custom-checkbox mb-3">
              <input type="checkbox" class="columns custom-control-input is-valid" id="col_branch" value="branch">
              <label class="custom-control-label" for="col_branch">Branch</label>
            </div>
            <div class="col-md-3 custom-control custom-checkbox mb-3">
            </div>
          </div>


          <h5 class="text-muted text-left mt-3 ">Enter the Details</h5>
          <!-- <br> -->

          <form class="needs-validation">

            <div class="row mt-4">
              <div class="col-md-6 mb-1">
                <label for="company_name">Company Name</label>
                <input type="text" class="contents form-control" placeholder="Company Name"  name="company_name" id="comp">
              </div>

              <div class="col-md-6 mb-3">
                <label for="company_adderss">Company Address</label>
                <input  type="text" class="contents form-control" placeholder="Company Address" name="company_adderss" id="addrs">
              </div>
            </div>

            <!-- second row -->

            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="dop">Date of Placement</label>
                <input type="date" class="contents form-control" id="dop" placeholder="Date of Placement" name="date_of_placement">
              </div>

              <div class="col-md-6 mb-3">
                <label for="sal">Salary</label>
                <input type="text" class="contents form-control" id="sal" placeholder="Salary" name="salary">
              </div>
            </div>

            <!-- third row -->

            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="place">Place of Placement</label>
                <input type="text" class="contents form-control" id="place" placeholder="Place of Placement" name="place_of_placement">
              </div>

              <div class="col-md-6 mb-3">
                <label for="doj">Date of Joining</label>
                <input type="date" class="contents form-control" id="doj" placeholder="Date of Joining" name="date_of_joining">
              </div>
            </div>

            <!-- fourth row -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="batches">Batch</label>
                <input type="text" class="contents form-control" id="batches" placeholder="Batch" name="batch" >
              </div>
              <div class="col-md-6 mb-3">
                <label for="web">Website</label>
                <input type="text" class="contents form-control" id="web" placeholder="Website" name="website" >
              </div>
            </div>

            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="cont_person">Contact Person</label>
                <input type="text" class="contents form-control" placeholder="Contact Person" name="contact_person" id= "cont_person" >
              </div>

              <div class="col-md-6 mb-3">
                <label for="email1">Email 1</label>
                <input type="email" class="contents form-control" placeholder="Email 1" name="email_1" id= "email1" >
                <div class="invalid-feedback">
                  Please enter a valid Email.
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="cont_num_1">Contact Number 1</label>
                <input type="number" class="contents form-control" placeholder="Contact Number 1" name="contact_number_1" id= "cont_num_1" >
                <div class="invalid-feedback">
                  Please enter a valid Contact Number.
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="email2">Email 2</label>
                <input type="email" class="contents form-control" placeholder="Email 2" name="email_2" id= "email2" >
                <div class="invalid-feedback">
                  Please enter a valid Email.
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="cont_num_2">Contact Number 2</label>
                <input type="number" class="contents form-control" placeholder="Contact Number 2" name="contact_number_2" id= "cont_num_2" >
                <div class="invalid-feedback">
                  Please enter a valid Contact Number.
                </div>
              </div>

              <div class="col-md-6 mb-3">
              </div>




              <div class="mb-3 mt-3">

                <h4 class="d-flex justify-content-between align-items-center mb-4">
                  <span class="text-muted text-center">Select the Branches:</span>
                </h4>


                <div class="row">

                  <div class="col-md-4 mb-2">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="brah custom-control-input is-valid" name="branch_cse" id="branch_cse" value="cse">
                      <label class="custom-control-label" for="branch_cse">Computer Science And Engineering</label>
                    </div>
                  </div>

                  <div class="col-md-4 mb-2">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="brah custom-control-input is-valid" name="branch_it" id="branch_it" value="it">
                      <label class="custom-control-label" for="branch_it">Information Technology</label>
                    </div>
                  </div>

                  <div class="col-md-4 mb-2">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="brah custom-control-input is-valid" name="branch_elex" id="branch_elex" value="elex">
                      <label class="custom-control-label" for="branch_elex">Electronics Engineering</label>
                    </div>
                  </div>
                </div>



                <div class="row">

                  <div class="col-md-4 mb-2">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="brah custom-control-input is-valid" name="branch_elec" id="branch_elec" value="elec">
                      <label class="custom-control-label" for="branch_elec">Electrical Engineering</label>
                    </div>
                  </div>

                  <div class="col-md-4 mb-2">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="brah custom-control-input is-valid" name="branch_mechpro" id="branch_mechpro" value="mech_pro">
                      <label class="custom-control-label" for="branch_mechpro">Mechanical Production</label>
                    </div>
                  </div>

                  <div class="col-md-4 mb-2">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="brah custom-control-input is-valid" name="branch_mechauto" id="branch_mechauto" value="mech_auto">
                      <label class="custom-control-label" for="branch_mechauto">Mechanical Automobile</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mb-4">
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="brah custom-control-input is-valid" name="branch_civil" id="branch_civil" value="civil">
                      <label class="custom-control-label" for="branch_civil">Civil Engineering</label>
                    </div>
                  </div>
                </div>
              </div>





            </div>
            <hr class="mb-4">
          </form>
            <button class="btn btn-primary btn-lg btn-block" name="enroll-submit" id="edit-submit" type="button" >Edit Placeent Details</button>
          <div id="editCode">
          </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
  </main>

  <?php
  require "../footer/footer-placementdetails.php";
  ?>

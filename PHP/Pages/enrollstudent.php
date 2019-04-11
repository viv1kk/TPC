<?php
require "../Header/header-enrollstudent.php"
?>


<main>

  <div class="jumbotron mb-1">
    <div class="container-fluid row justify-content-center">
  <div class="col-md-6 order-md-1">
    <h4 class="mb-3 h4">Enroll a Student:</h4>


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
        <!-- <div class="invalid-feedback">
        Valid first name is required.
      </div> -->
    </div>

    <div class="col-md-6 mb-3">
      <label for="fatherName">Father's name</label>
      <input type="text" class="form-control" id="fatherName" placeholder="Father's name" value="">
      <!-- <div class="invalid-feedback">
      Valid last name is required.
    </div> -->
  </div>

  </div>


  <!-- third row -->


  <form class="needs-validation" novalidate>
  <div class="row">



    <div class="col-md-6 mb-3">
      <label for="branch">Branch</label>
      <select class="custom-select" id="branch">
        <option value="cse">Computer Science And Engineering</option>
        <option value="it">Information Technology</option>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label for="shift">Shift</label>
      <select class="custom-select" id="shift">
        <option value="shift_1">Shift I</option>
        <option value="shift_2">Shift II</option>
        <option value="shift_3">Other Institutes</option>
      </select>
    </div>

  </div>



  <!-- fourth row -->
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="you@example.com">
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
      <select class="custom-select" id="company">
        <option value="com1">xyz</option>
        <option value="com2">zxy</option>
        <option value="com3">yzx</option>
      </select>
    </div>
  </div>


  <div class="mb-3">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
    <!-- <div class="invalid-feedback">
    Please enter the address.
  </div> -->
  </div>


  <!-- fifth row -->


  <div class="mb-3">
  <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
  <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
  </div>


  <hr class="mb-4">


  <!-- ninth row -->

  <button class="btn btn-primary btn-lg btn-block" type="submit">Enroll</button>
  </form>
  </div>
  </div>
  </div>
</main>


<?php
require "../footer/footer-enrollstudent.php"
?>

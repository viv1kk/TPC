// Validation for Registration Number

document.addEventListener("DOMContentLoaded", function(event) {

  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });





  //AJAX for getting company Names

// ON LOAD EVENT
  let branch = $("#branch_select").val();
  // console.log(branch);
  $.post("../../includes/Dashboard/selectoption.inc.php",{
      branchNameEn: branch
  },(data, status)=>{
    $("#company_select").html(data);
      console.log(data);
  });

  //ON CHANGE EVENT

  $("#branch_select").change(()=>{
    let branch = $("#branch_select").val();
    // console.log(branch);
    $.post("../../includes/Dashboard/selectoption.inc.php",{
        branchNameEn: branch
    },(data, status)=>{
      $("#company_select").html(data);
        console.log(data);
    });
  });






  let regNo = document.getElementsByName('reg_no')[0];
  regNo.addEventListener('input',()=>{
    if (regNo.name == "reg_no" && regNo.value.length != 8 && !regNo.value.length == 0){
      regNo.setCustomValidity('Registration Number must be of 8 digits e.g. 12345678');
      console.log(regNo.value.length);
    }else{
      regNo.setCustomValidity('');
    }
  });

  // Validation for Roll Number
  let rollNo = document.getElementsByName('roll_no')[0];
  rollNo.addEventListener('input',()=>{
    if (rollNo.name == "roll_no" && rollNo.value.length != 11 && !rollNo.value.length == 0){
      rollNo.setCustomValidity('Roll Number must be of 11 digits e.g. 12345678901');
      console.log(rollNo.value.length);
    }else{
      rollNo.setCustomValidity('');
    }
  });

  // Validation for Contact Number
  let contactNo = document.getElementsByName('contact_no')[0];
  contactNo.addEventListener('input',()=>{
    if (contactNo.name == "contact_no" && contactNo.value.length != 10 && !contactNo.value.length == 0){
      contactNo.setCustomValidity('Contact Number must be of 10 digits e.g. 1234567890');
      console.log(contactNo.value.length);
    }else{
      contactNo.setCustomValidity('');
    }
  });
});

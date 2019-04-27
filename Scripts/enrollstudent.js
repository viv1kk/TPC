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
    });
  });



  let email;
  let regNo;
  let rollNo;
  let mob_No;


  $('#enroll-submit').unbind("click").click(()=>{
    $.post("../../includes/enrollstudent.inc.php",{
      reg_no: $('#regNo').val(),
      roll_no: $('#rollNo').val(),
      student_name: $('#studentName').val(),
      father_name: $('#fatherName').val(),
      branch: $('#branch_select').val(),
      shift: $('#shifts').val(),
      email: $('#mail').val(),
      contact_no: $('#mob_no').val(),
      dob: $('#dateofb').val(),
      company: $('#company_select').val(),
      address: $('#addr').val()
    },(data)=>{
      $('#contain').html(data);
      console.log(data);
    });
  });

});

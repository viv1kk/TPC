document.addEventListener("DOMContentLoaded", function(event) {

  let url_string = window.location.href;
  let url = new URL(url_string);

  let session = url.searchParams.get("session");

  console.log(session);

  let enroll_student = "enrollstudent.php?session="+session;
  let add_company = "addcompany.php?session="+session;
  let dashboard = "dashboard.php?session="+session;
  let search_company = "placementsearch.php?session="+session;


  $("#enroll_student").attr("href", enroll_student);
  $("#add_company").attr("href", add_company);
  $("#dashboard").attr("href", dashboard);
  $("#search_company").attr("href", search_company);


  let arr = [];
  let details = [];


  //COMPANY
  // ON LOAD EVENT
  let branch = $("#branch_select").val();
  $.post("../../includes/Dashboard/selectoption.inc.php",{
    session:session,
    branchNameEn: branch
  },(data, status)=>{
    $("#company_select").html(data);
  });

  // ON CHANGE EVENT
  $("#branch_select").change(()=>{
    let branch = $("#branch_select").val();
    $.post("../../includes/Dashboard/selectoption.inc.php",{
      session:session,
      branchNameEn: branch
    },(data, status)=>{
      $("#company_select").html(data);
    });
  });


  // let url_string = window.location.href;
  // let url = new URL(url_string);
  let userID = url.searchParams.get("userID");
  // console.log(userID);

  let paraDetails;

  let det = document.querySelectorAll('.col-md-7');


  function stdDetails(){

    $.post("../../includes/Student Details/StudentDetails.inc.php",{
      session:session,
      userID: userID
    },(data, status)=>{

      $("#code").html(data);
      setTimeout(stdDetails, 2000);

    });
  }
  stdDetails();

  let inp = document.querySelector('.needs-validation').elements;
  for(let i = 0; i < inp.length; i++){
    inp[i].disabled = true;
  }


  let subButton = document.querySelector('#edit-submit');

  //Initially

  subButton.disabled = true;


  let checkboxColumn = document.querySelectorAll('.custom-control-input');

  let increment = 0;

  for(let i = 0; i < checkboxColumn.length; i++){
    checkboxColumn[i].addEventListener('change', ()=>{

      if(checkboxColumn[i].checked){

        increment++;
        inp[i].disabled = false;
      }
      else{
        increment--;
        inp[i].disabled = true;
        inp[i].value = "";
      }
      document.getElementById('columns').innerHTML = parseInt(increment);

      if(increment == 0){
        subButton.disabled = true;
      }
      else{
        subButton.disabled = false;
      }
    });
  }


  $('#edit-submit').unbind("click").click(()=>{

    $.post("../../includes/Student Details/EditDetails.inc.php",{
      session:session,
      userID: userID,
      reg_no: $('#regNo').val(),
      roll_no: $('#rollNo').val(),
      student_name: $('#studentName').val(),
      father_name: $('#fatherName').val(),
      branch: $('#branch_select').val(),
      branchDisabled: inp[4].disabled,
      shift: $('#shifts').val(),
      shiftDisabled: inp[5].disabled,
      email: $('#mail').val(),
      contact_no: $('#mob_no').val(),
      dob: $('#dateofb').val(),
      company: $('#company_select').val(),
      companyDisabled: inp[9].disabled,
      address: $('#addr').val()
    },(data)=>{
      $('#editCode').html(data);
      console.log(data);
    });
  });
});

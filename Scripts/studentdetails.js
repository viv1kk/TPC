document.addEventListener("DOMContentLoaded", function(event) {

  let arr = [];
  let details = [];



  //COMPANY
  // ON LOAD EVENT
  let branch = $("#branch_select").val();
  $.post("../../includes/Dashboard/selectoption.inc.php",{
    branchNameEn: branch
  },(data, status)=>{
    $("#company_select").html(data);
  });

  // ON CHANGE EVENT
  $("#branch_select").change(()=>{
    let branch = $("#branch_select").val();
    $.post("../../includes/Dashboard/selectoption.inc.php",{
      branchNameEn: branch
    },(data, status)=>{
      $("#company_select").html(data);
    });
  });




  let url_string = window.location.href;
  let url = new URL(url_string);
  let userID = url.searchParams.get("userID");
  // console.log(userID);

  let paraDetails;

  let det = document.querySelectorAll('.col-md-7');


  function stdDetails(){

    $.post("../../includes/Student Details/StudentDetails.inc.php",{
      userID: userID
    },(data, status)=>{

      $("#code").html(data);
      // setTimeout(stdDetails, 2000);
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
      userID: userID,
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
      $('#editCode').html(data);
      console.log(data);
    });
  });







});

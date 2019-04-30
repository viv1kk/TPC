document.addEventListener("DOMContentLoaded", function(event) {

  let url_string = window.location.href;
  let url = new URL(url_string);

  let session = url.searchParams.get("session");

  console.log(session);

  let enroll_student = "enrollstudent.php?session="+session;
  let add_company = "addcompany.php?session="+session;
  let search_company = "placementsearch.php?session="+session;
  let dashboard = "dashboard.php?session="+session;


  $("#enroll_student").attr("href", enroll_student);
  $("#add_company").attr("href", add_company);
  $("#search_company").attr("href", search_company);
  $("#dashboard").attr("href", dashboard);


  let arr = [];
  let details = [];
  let branchArr = [];



  let companyID = url.searchParams.get("companyID");
  // console.log(userID);

  let paraDetails;

  let det = document.querySelectorAll('.col-md-7');


  function compDetails(){

    $.post("../../includes/Placement/placement-details.inc.php",{
      session:session,
      companyID: companyID
    },(data, status)=>{

      $("#code").html(data);
      setTimeout(compDetails, 2000);

    });
  }
  compDetails();



  let inp = document.querySelectorAll('.contents');
  for(let i = 0; i < inp.length; i++){
    inp[i].disabled = true;
  }


  let subButton = document.querySelector('#edit-submit');

  //Initially

  subButton.disabled = true;


  let checkboxBranch = document.querySelectorAll('.brah');
  for(let i = 0; i < checkboxBranch.length; i++){
    checkboxBranch[i].disabled = true;
  }

  let checkboxColumn = document.getElementsByClassName('columns');








  let increment = 0;

  for(let i = 0; i < checkboxColumn.length; i++){
    checkboxColumn[i].addEventListener('change', ()=>{

      if(checkboxColumn[i].checked){
        increment++;


        if(i == checkboxColumn.length-1){
          for(let j = 0; j < checkboxBranch.length; j++){
            checkboxBranch[j].disabled = false;
          }
        }
        else{
          inp[i].disabled = false;
        }
      }
      else{
        increment--;
        if(i == checkboxColumn.length-1){
          for(let j = 0; j < checkboxBranch.length; j++){
              checkboxBranch[j].disabled = true;
          }
        }
        else{
          inp[i].disabled = true;
          inp[i].value = "";
        }
      }




      document.getElementById('columns').innerHTML = parseInt(increment);

      // console.log(increment);
      if(increment == 0){
        subButton.disabled = true;
      }
      else{
        subButton.disabled = false;
      }
    });
  }






  let  branch = false, cse = false, it=false, elex = false, elec = false, mech_pro = false, mech_auto = false, civil = false;

    // let checkboxBranch = document.querySelectorAll('.brah');

  // console.log(checkboxBranch.length);


    for(let i = 0; i < checkboxBranch.length; i++){
      checkboxBranch[i].addEventListener('change', ()=>{

        if(document.getElementById('col_branch').checked){
          branch = true;
        }
        else{
          branch = false;
        }

        if(document.getElementById('branch_cse').checked){
          cse = true;
        }
        else{
          cse = false;
        }

        if(document.getElementById('branch_it').checked){
          it = true;
        }
        else{
          it = false;
        }

        if(document.getElementById('branch_elex').checked){
          elex = true;
        }
        else{
          elex = false;
        }

        if(document.getElementById('branch_elec').checked){
          elec = true;
        }
        else{
          elec = false;
        }

        if(document.getElementById('branch_mechpro').checked){
          mech_pro = true;
        }
        else{
          mech_pro = false;
        }

        if(document.getElementById('branch_mechauto').checked){
          mech_auto = true;
        }
        else{
          mech_auto = false;
        }

        if(document.getElementById('branch_civil').checked){
          civil = true;
        }
        else{
          civil = false;
        }
      });
    }










  $('#edit-submit').unbind("click").click(()=>{
    console.log(session);
    // console.log( $('#addrs').val());
    $.post("../../includes/Placement/placement-edit.php",{
      session:session,
      companyID: companyID,
      compName: $('#comp').val(),
      compAddress: $('#addrs').val(),
      dop: $('#dop').val(),
      salary:$('#sal').val(),
      place: $('#place').val(),
      doj: $('#doj').val(),
      batch: $('#batches').val(),
      website: $('#web').val(),
      cont_person: $('#cont_person').val(),
      email_1: $('#email1').val(),
      contact_no_1: $('#cont_num_1').val(),
      email_2: $('#email2').val(),
      contact_no_2: $('#cont_num_2').val(),
      branch: branch,
      branch_cse: cse,
      branch_it: it,
      branch_elex: elex,
      branch_elec: elec,
      branch_mechpro: mech_pro,
      branch_mechauto: mech_auto,
      branch_civil: civil
    },(data)=>{
      $('#editCode').html(data);
      console.log(data);
    });
  });
});

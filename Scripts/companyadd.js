// Number Badge will increment as the user selects the Branches

document.addEventListener("DOMContentLoaded", function(event) {


  let url_string = window.location.href;
  let url = new URL(url_string);

  let session = url.searchParams.get("session");

  console.log(session);

  let enroll_student = "enrollstudent.php?session="+session;
  let dashboard = "dashboard.php?session="+session;

  $("#enroll_student").attr("href", enroll_student);
  $("#dashboard").attr("href", dashboard);


  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });


let cse = true, it=false, elex = false, elec = false, mech_pro = false, mech_auto = false, civil = false;

  let checkboxBranch = document.querySelectorAll('.custom-control-input');

  let increment = 1;
  for(let i = 0; i < checkboxBranch.length; i++){
    checkboxBranch[i].addEventListener('change', ()=>{
      if(checkboxBranch[i].checked)
      increment++;
      else
      increment--;

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

      document.getElementById('branch').innerHTML = parseInt(increment);
    });
  }


  let para;
  let email1;
  let mob_No1;
  let email12;
  let mob_No2;
  let company;
  let Toast;


  $('#add-company').unbind("click").click(()=>{
    $.post("../../includes/addcompany.inc.php",{
      session:session,
      comp_name: $('#company').val(),
      address: $('#companyAddr').val(),
      dop: $('#dop').val(),
      salary: $('#salary').val(),
      place: $('#place').val(),
      doj: $('#doj').val(),
      batch: $('#batch').val(),
      website: $('#web').val(),
      cont_person: $('#person').val(),
      email_1: $('#mail1').val(),
      contact_no_1: $('#mob_no1').val(),
      email_2: $('#mail2').val(),
      contact_no_2: $('#mob_no2').val(),
      branch_cse: cse,
      branch_it: it,
      branch_elex: elex,
      branch_elec: elec,
      branch_mechpro: mech_pro,
      branch_mechauto: mech_auto,
      branch_civil: civil
    },(data)=>{
      $('#contain').html(data);
      console.log(data);
    });
  });
});

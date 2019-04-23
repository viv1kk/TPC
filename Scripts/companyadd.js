// Number Badge will increment as the user selects the Branches

document.addEventListener("DOMContentLoaded", function(event) {

  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });


  let checkboxBranch = document.querySelectorAll('.custom-control-input');
  let increment = 1;
  for(let i = 0; i < checkboxBranch.length; i++){
    checkboxBranch[i].addEventListener('change', ()=>{
      if(checkboxBranch[i].checked)
      increment++;
      else
      increment--;
      document.getElementById('branch').innerHTML = parseInt(increment);
    });
  }


  let para;
  let email;
  let company;
  let mob_No;



  $('#add-company').unbind("click").click(()=>{
    $.post("../../includes/addcompany.inc.php",{
      comp_name: $('#company').val(),
      email: $('#mail').val(),
      contact_no: $('#mob_no').val(),
      branch_cse: $('#cse').val(),
      branch_it: $('#it').val()
    },(data)=>{
      $('#contain').html(data);
      console.log(data);
    });
  });
});

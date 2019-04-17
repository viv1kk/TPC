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

  let contactNo = document.querySelector('#mob_no');
  contactNo.addEventListener('input',()=>{
    if (contactNo.value.length != 10 && !contactNo.value.length == 0){
      contactNo.setCustomValidity('Contact Number must be of 10 digits e.g. 1234567890');
    }else{
      contactNo.setCustomValidity('');
    }
  });
});

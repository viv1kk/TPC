// Number Badge will increment as the user selects the Branches

let checkboxBranch = document.querySelectorAll('.custom-control-input');

// console.log(checkboxBranch.length);
let increment = 0;

for(let i = 0; i < checkboxBranch.length; i++){
  checkboxBranch[i].addEventListener('change', ()=>{

    if(checkboxBranch[i].checked)
      increment++;
    else
      increment--;

    document.getElementById('branch').innerHTML = parseInt(increment);
  });
}

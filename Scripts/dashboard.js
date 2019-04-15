// Table Spacifications



$(document).ready(()=>{
$('#dtBasicExample').DataTable({
  "paging":false,
  "ordering":true,
  "info":true,
  "searching":false,
});
$('.dataTables_length').addClass('bs-select');
});

$('#dtBasicExample').dragableColumns();




// Number Badge will increment as the user selects the Branches


let checkboxColumn = document.querySelectorAll('.custom-control-input');

// console.log(checkboxColumn.length);
let increment = 0;

for(let i = 0; i < checkboxColumn.length; i++){
  checkboxColumn[i].addEventListener('change', ()=>{

    if(checkboxColumn[i].checked)
      increment++;
    else
      increment--;
      document.getElementById('columns').innerHTML = parseInt(increment);
    // console.log(i,increment);
  });
}

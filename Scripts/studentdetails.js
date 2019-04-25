document.addEventListener("DOMContentLoaded", function(event) {


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
//
//
//  var x = document.querySelector('.needs-validation').elements;
//  console.log(x);
// for(let i = 0; i < x.length-1;i++){
//   x[i].addEventListener("dblclick",()=>{
//     console.log(x[i]);
//     x[i].disabled = false;
//   });
//
//   }

});

// Table Spacifications

document.addEventListener("DOMContentLoaded", function(event) {
  // Number Badge will increment as the user selects the Branches

  let checkboxColumn = document.querySelectorAll('.custom-control-input');

  let increment = 1;

  for(let i = 0; i < checkboxColumn.length; i++){
    checkboxColumn[i].addEventListener('change', ()=>{

      if(checkboxColumn[i].checked)
      increment++;
      else
      increment--;
      document.getElementById('columns').innerHTML = parseInt(increment);
    });
  }



//AJAX for getting company Names

// ON LOAD EVENT
let branch = $("#branch").val();
$.post("../../includes/Dashboard/selectoption.inc.php",{
    branchName: branch
},(data, status)=>{
  $("#company").html(data);
});

// ON CHANGE EVENT
$("#branch").change(()=>{
  let branch = $("#branch").val();
  $.post("../../includes/Dashboard/selectoption.inc.php",{
      branchName: branch
  },(data, status)=>{
    $("#company").html(data);
  });
});





  // 
  // let checkboxValues = [];
  //
  // document.querySelector('.needs-validation').addEventListener("submit",(e)=>{
  //   e.preventDefault();
  //
  //   $('#dtBasicExample').DataTable().destroy('#dtBasicExample');
  //
  //   getCheckboxValues();
  //   if(checkboxValues.length > 0)
  //   generate_table();
  //   else
  //   console.log("No Column Selected");
  //
  //   jumbo = document.querySelector('.jumbotron');
  //   jumbo.style.display = 'block';
  //
  // });



  function getCheckboxValues(){
    checkboxValues.length = 0;
    for(let i = 0; i < checkboxColumn.length; i++){
      if(checkboxColumn[i].checked){
        let val = checkboxColumn[i].value;
        checkboxValues.push(val);
      }
    }
    console.log(checkboxValues);
  }


  // DYNAMIC TABLE

  function generate_table() {


    console.log("Table");
    // get the reference for the body
    var body = document.querySelector(".container-fluid");

    // creates a <table> element and a <tbody> element
    var tbl = document.createElement("table");
    tbl.setAttribute("class","table table-striped table-responsive table-bordered table-lg table-hover");
    tbl.setAttribute("id","dtBasicExample");



    var tblHead = document.createElement("thead");
    tblHead.setAttribute("class","table table-dark width-100%");

    var row = document.createElement("tr");
    row.setAttribute("class","dnd-moved");

    for (var j = 0; j < checkboxValues.length; j++) {
      // Create a <td> element and a text node, make the text
      // node the contents of the <td>, and put the <td> at
      // the end of the table row
      var cell = document.createElement("th");
      cell.setAttribute("class","th-sm");

      var cellText = document.createTextNode(checkboxValues[j]);

      cell.appendChild(cellText);
      row.appendChild(cell);
    }
    tblHead.appendChild(row);



    var tblBody = document.createElement("tbody");

    // creating all cells
    for (var i = 0; i < 5 ; i++) {
      // creates a table row
      row = document.createElement("tr");
      row.setAttribute("class","dnd-moved");

      for (var j = 0; j <  checkboxValues.length; j++) {
        // Create a <td> element and a text node, make the text
        // node the contents of the <td>, and put the <td> at
        // the end of the table row
        cell = document.createElement("td");
        cellText = document.createTextNode("cell in row "+i+", column "+j);
        cell.appendChild(cellText);
        row.appendChild(cell);
      }

      // add the row to the end of the table body
      tblBody.appendChild(row);
    }



    var tblFoot = document.createElement("tfoot");
    tblFoot.setAttribute("class","table table-dark");

    row = document.createElement("tr");
    row.setAttribute("class","dnd-moved");


    for (var j = 0; j < checkboxValues.length; j++) {
      // Create a <td> element and a text node, make the text
      // node the contents of the <td>, and put the <td> at
      // the end of the table row
      cell = document.createElement("th");
      cellText = document.createTextNode(checkboxValues[j]);
      cell.appendChild(cellText);
      row.appendChild(cell);
    }
    tblFoot.appendChild(row);

    // put the <tbody> in the <table>
    tbl.appendChild(tblHead);
    tbl.appendChild(tblBody);
    tbl.appendChild(tblFoot);
    // appends <table> into <body>
    body.appendChild(tbl);
    // sets the border attribute of tbl to 2;
    //   tbl.setAttribute("class","table table-striped table-responsive table-bordered table-lg table-hover");


    // DATA TABLES

    $('#dtBasicExample').DataTable({
      "paging":false,
      "ordering":true,
      "info":true,
      "searching":false,
    });
    $('.dataTables_length').addClass('bs-select');

    // dragableColumns
    $('#dtBasicExample').dragableColumns();
}



});

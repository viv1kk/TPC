// Table Spacifications

document.addEventListener("DOMContentLoaded", function(event) {

  // used in php form validation

  let regNo;
  let rollNo;
  let cont;

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


  let checkboxValues = [];
  let rowVal = [];

  $('#search').unbind("click").click(()=>{
    $.post("../../includes/Dashboard/search.inc.php",{
      regNo: $('#reg_no').val(),
      rollNo: $('#roll_no').val(),
      studentName: $('#studentName').val(),
      fatherName: $('#fatherName').val(),
      branches: $('#branch').val(),
      shifts: $('#shift').val(),
      email: $('#mail').val(),
      mobNo: $('#mob_no').val(),
      dob: $('#dateofb').val(),
      companyName: $('#company').val(),
      address: $('#addr').val()
    },(data)=>{

      getCheckboxValues();

      fetch("../../Scripts/results.json")
      .then((resp)=>{
        return resp.json();
      })
      .then((data)=>{
        $('#dtBasicExample').DataTable().destroy('#dtBasicExample');
        if(checkboxValues.length > 0){
          rowVal = [];
          generate_table(data);


          let tableInfo = document.getElementById('dtBasicExample').childNodes[1];
          // console.log(tableInfo.rows.length);
          for(let i = 0; i < tableInfo.rows.length; i++){
            // console.log(i);
            let rowInfo = tableInfo.childNodes[i];
            rowInfo.addEventListener("click", ()=>{
              console.log(rowVal[i][0]);
              // let linkStd = "../../includes/StudentDetails.inc.php?userID="+rowVal[i][0];
              let linkStd = "StudentDetails.php";

              window.open(linkStd, '_blank');
              // console.log("HELLO"+i);
              // console.log(rowInfo.cells.length);
            });
          }
        }
        else
        console.log("No Column Selected");
        tblrowval = false;
      });
      $('#contain').html(data);
    });
  });



  function getCheckboxValues(){
    checkboxValues.length = 0;
    for(let i = 0; i < checkboxColumn.length; i++){
      if(checkboxColumn[i].checked){
        let val = checkboxColumn[i].value;
        let name = checkboxColumn[i].name;
        checkboxValues.push(val);
      }
    }
  }


  // DYNAMIC TABLE

  function generate_table(data) {


    // keys

    let keys = [];
    let values = [];
    let obj, x;

    obj = data[0];
    for(x in obj){
      keys.push(x);
    }
    // values

    let objects, y;
    objects = data;


    for(var i = 0; i<data.length; i++){
      var cells = [];
      for(y in objects[i]){
        cells.push(objects[i][y])
      }
      values.push(cells);
    }



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
    for (var i = 0; i < data.length ; i++) {
      // creates a table row
      row = document.createElement("tr");
      row.setAttribute("class","dnd-moved");

      for (var j = 0; j <  checkboxValues.length; j++) {
        // Create a <td> element and a text node, make the text
        // node the contents of the <td>, and put the <td> at
        // the end of the table row
        for(var k = 0; k < keys.length; k++){
          //checkboxValues

          if(checkboxValues[j] == keys[k]){

            cell = document.createElement("td");
            cellText = document.createTextNode(values[i][k]);
            cell.appendChild(cellText);
            row.appendChild(cell);
          }
        }
      }

      // add the row to the end of the table body
      tblBody.appendChild(row);
    }
    rowVal = values;
    console.log(keys);
    console.log(values);


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


    // DATA TABLES

    if(checkboxValues.length > 0)
    {
      $('#dtBasicExample').DataTable({
        "paging":false,
        "ordering":true,
        "info":true,
        "searching":false,
      });
      $('.dataTables_length').addClass('bs-select');
    }
    // dragableColumns
    $('#dtBasicExample').dragableColumns();
  }
});

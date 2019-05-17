document.addEventListener("DOMContentLoaded", function(event) {

  let url_string = window.location.href;
  let url = new URL(url_string);

  let session = url.searchParams.get("session");

  console.log(session);

  let dashboard = "dashboard.php?session="+session;
  let add_company = "addcompany.php?session="+session;
  let enroll_student = "enrollstudent.php?session="+session;

  $("#dashboard").attr("href", dashboard);
  $("#add_company").attr("href", add_company);
  $("#enroll_student").attr("href", enroll_student);


  let checkboxColumn = document.querySelectorAll('.custom-control-input');

  let increment = 2;
  for(let i = 0; i < checkboxColumn.length; i++){
    checkboxColumn[i].addEventListener('change', ()=>{

      if(checkboxColumn[i].checked)
      increment++;
      else
      increment--;
      document.getElementById('columns').innerHTML = parseInt(increment);
    });
  }





  let checkboxValues = [];

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





// columns, rows, placementStudent, placementSearch, searchKeys

let hor, ver, ps, psh, sk;


  $('#search').unbind("click").click(()=>{
    getCheckboxValues()
    // console.log(checkboxValues);
    $.post("../../includes/Placement/placement-search.inc.php",{
      session:session,
      company: $('#company').val(),
      website: $('#web').val(),
      email: $('#mail').val(),
      contactNumber: $('#mob_no').val(),
      branches: $('#branch').val(),
      batch: $('#batch').val(),
      place: $('#place').val(),
      dop: $('#dop').val(),
      doj: $('#doj').val(),
    },(data)=>{

      grabJSON();



      $('#contain').html(data);
      // console.log(data);
    });
  });





  function grabJSON(){

    let placementSearch = {};
    let placementStudent = {};
    let placement = {};

    fetch("../../Scripts/placementSearch.json")
    .then((respSearch)=>{
      return respSearch.json();
    })
    .then((search)=>{

      placementSearch = search;
      // console.log(placementSearch);




      fetch("../../Scripts/placementStudent.json")
      .then((respStudent)=>{
        return respStudent.json();
      })
      .then((student)=>{


        placementStudent = student;
        // console.log(placementStudent);

        // console.log(placementSearch.length);

        /////////// SEPARATING KEYS FORM JSON TO NEW ARRAY

        let searchKeys = [];
        let obj, x;

        obj = placementSearch[0];
        for(x in obj){
          searchKeys.push(x);
        }

        // console.log(searchKeys);

        //////////////////////////////////////////////////////
        let checkboxColumn = document.querySelectorAll('.custom-control-input');

        let columns = [];
        let rows = [];


        for(let i=0; i<searchKeys.length-7; i++){
          columns.push(searchKeys[i]);
        }

        // columns.push('students');

        //

        for(var i = 0; i < placementSearch.length; i++){
          var cells = [];
          // for(var j = 0; j < searchKeys.length-7; j++){
          for(y in placementSearch[i]){
            cells.push(placementSearch[i][y]);
          }
          rows.push(cells);
        }

        console.log(searchKeys);



        hor = columns;
        ver = rows;
        ps = placementStudent;
        psh = placementSearch;
        sk = searchKeys;

        generate_table(hor, ver, ps, psh, sk);

        // generate_table(columns, rows, placementStudent, placementSearch,searchKeys);
        let tableInfo = document.getElementById('dtBasicExample').childNodes[1];
        // console.log(tableInfo.rows.length);
        for(let i = 0; i < tableInfo.rows.length; i++){
          let rowInfo = tableInfo.childNodes[i];
          rowInfo.addEventListener("click", ()=>{
            let comp = parseInt(rowInfo.childNodes[0].innerHTML);
            // let url = window.location.href;
            let linkStd = "placement-details.php?session="+session+"&companyID="+comp;
            window.open(linkStd, '_blank');
          });
        }
      });
    });
  }

  function generate_table(columns, rows, placementStudent, placementSearch, searchKeys) {

    // get the reference for the body
    var body = document.querySelector(".container-fluid");

    // creates a <table> element and a <tbody> element
    var tbl = document.createElement("table");
    tbl.setAttribute("class","table table-striped table-responsive table-bordered table-lg table-hover");
    tbl.setAttribute("id","dtBasicExample");
    tbl.setAttribute("border","2");


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



    // console.log(columns.length);



    var tblBody = document.createElement("tbody");
    // console.log(rows[0][1]);
    // console.log(placementStudent[0]['company']);

    // creating all cells
    for (var i = 0; i < rows.length ; i++) {
      // creates a table row
      row = document.createElement("tr");
      row.setAttribute("class","dnd-moved");

      for (var j = 0; j < checkboxValues.length; j++) {

        if(checkboxValues[j] == "students" || checkboxValues[j] == 'branches'){
          if(checkboxValues[j] == 'students'){
            cell = document.createElement("td");

            let stdName = [];
            console.log(checkboxValues[j]);
            // stdName.length = 0;

            for(var l = 0; l < placementStudent.length ; l++){
              if(rows[i][1] == placementStudent[l]['company']){
                // console.log(rows[i][1]);
                stdName.push(placementStudent[l]["student_name"]);
              }
            }
            cellText = document.createTextNode(stdName.toString());
            console.log(stdName.toString());
            cell.appendChild(cellText);
            row.appendChild(cell);
          }


          if(checkboxValues[j] == 'branches'){
            cell = document.createElement("td");

            var  branchChk = [];
            for (m = 14; m <rows[i].length; m++){
              // console.log(m);
              // console.log(row[i][m]);
              // console.log(rows[i].length)

              if(rows[i][m] == 1){
                branchChk.push(searchKeys[m]);
              }
            }
            // console.log(branchChk);
            cellText = document.createTextNode(branchChk.toString().toUpperCase());
            // console.log(branchChk.toString());
            cell.appendChild(cellText);
            row.appendChild(cell);
          }
        }


        for(var k = 0; k < columns.length; k++){

          //checkboxValues

          if(checkboxValues[j] == columns[k]){
            cell = document.createElement("td");
            cellText = document.createTextNode(rows[i][j]);

            cell.appendChild(cellText);
            row.appendChild(cell);
          }
        }
        // console.log(values[i][0])
      }
      // add the row to the end of the table body
      tblBody.appendChild(row);
    }
    // console.log(keys);
    // console.log(values);




    var tblFoot = document.createElement("tfoot");
    tblFoot.setAttribute("class","table table-dark");

    row = document.createElement("tr");
    row.setAttribute("class","dnd-moved");


    for (var j = 0; j < checkboxValues.length; j++) {
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



  let prnt = document.getElementById("print");
  prnt.addEventListener("click", ()=>{


    function printData()
    {
       var divToPrint=document.getElementById("dtBasicExample");
       newWin= window.open("");
       newWin.document.write(divToPrint.outerHTML);
       newWin.print();
       newWin.close();
    }

    printData();

  });
});

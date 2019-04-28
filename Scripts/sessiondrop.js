//add a new style 'foo'
$(document).ready(()=>{

  let sessionYear;
  let url_string = window.location.href;
  let url = new URL(url_string);

  let session = url.searchParams.get("session");

  // console.log(session);

let enroll_student = "enrollstudent.php?session="+session;
let add_company = "addcompany.php?session="+session;

  $("#enroll_student").attr("href", enroll_student);
  $("#add_company").attr("href", add_company);

  $.post("../../includes/Session/session-content.inc.php",{
    session:session
  },(data)=>{
    $('#sessionContent').html(data);
    console.log(data);
  });


  $('#navbarDropdown').click(()=>{

    $.post("../../includes/Session/session-content.inc.php",{

    },(data)=>{
      $('#sessionContent').html(data);
      console.log(data);
    });
  });

  $('#create').click((e)=>{
    //add a new style 'foo'
    Swal.fire({
      title: 'Create New Session',
      input: 'number',
      inputAttributes: {
        maxlength: '4'
      },
      showCancelButton: true,
      confirmButtonText: 'Create',
      showLoaderOnConfirm: true,
      preConfirm: (year) => {
        if(year.length == 4){
          sessionYear = 0;
          sessionYear = year;
          return true;
        }else{
          Swal.showValidationMessage('Enter year Correctly');
          return false;
        }
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'New Session Added Successfully'
        });

        // ON CHANGE EVENT
        $.post("../../includes/Session/sessionyear.inc.php",{
          year: sessionYear
        },(data, status)=>{
          let Toast;
          $("#codes").html(data);
          // console.log(data);
        });

        // console.log(sessionYear);
      }
    });
  });




});

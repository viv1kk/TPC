$(document).ready(()=>{

  let url_string = window.location.href;
  let url = new URL(url_string);

  let session = url.searchParams.get("session");

  console.log(session);

  // let enroll_student = "enrollstudent.php?session="+session;
  let search_company = "placementsearch.php?session="+session;


    // $("#enroll_student").attr("href", enroll_student);
    $("#search_company").attr("href", search_company);
});

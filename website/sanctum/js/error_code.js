

const params = new URLSearchParams(window.location.search)
for (const param of params) {
  if(param[0].toString()==="error_call_back" && param[1].toString()==="email_exist")
  {
    //alert("Account already exists with this email.");
    document.getElementById('error_msg').innerHTML="*This Email is already registered with us.";
    $('#myModal').modal('show');
    $("#tab-2").prop("checked", true);
    break;
  }
  else if(param[0].toString()==="error_call_back" && param[1].toString()==="invalid_input")
  {
    document.getElementById('error_invalid').innerHTML="*Incorrect Id or Password.";
    $('#myModal').modal('show');
    $("#tab-1").prop("checked", true);
    break;
  }
}
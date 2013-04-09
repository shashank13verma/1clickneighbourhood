//login Email Validate
function fncEmValidate()
{
	var x=document.getElementById('email').value;
	if(x==null || x==""){
		$('#divEmail').html("Invalid Email");

	}
	else if(!(x.match(/^([a-zA-Z0-9_\-]+)(\.[a-zA-Z0-9_\-]+)*@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/))){
		$('#divEmail').html("Invalid Email");
	}
	else{
		$('#divEmail').html("");
	}
		
		
}

//login Password Validate

function fncPassValidate()
{
	var x=document.getElementById('password').value;
	if(x==null || x==""){
		$('#divPass').html("Invalid Password");
		
	}
	else if(!(x.match(/^[a-zA-Z0-9]+$/))){
		$('#divPass').html("Invalid Password");
		return false;
	}
	else{
		$('#divPass').html("");
	}

}



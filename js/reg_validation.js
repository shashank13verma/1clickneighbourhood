
function fncEmailValidate()
{
	var x = document.getElementById("email_address").value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (x==null || x==""){
		document.getElementById("err1").innerHTML = "Required";
		return false;
	}
	else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
		document.getElementById("err1").innerHTML=" Not a Valid Email Address";
		return false;
				
	}
	else
	{
		document.getElementById("err1").innerHTML="";
		return true;
	}
	
}

function fncReEmailValidate()
{

	var x = document.getElementById("email_address").value;
	var y = document.getElementById("email_address_check").value;
	if(y==null || y==""){
		document.getElementById("err2").innerHTML="Email doesn't match";
		return false;

	}

	else if((x!=y)){
		document.getElementById("err2").innerHTML="Email doesn't match";
		return false;
		
	}
	else{
		document.getElementById("err2").innerHTML="";
		return true;
		
		
	}
}


function fncPassValidate(){
	var x = document.getElementById("password").value;
	if (x==null || x=="")
	{
		document.getElementById("err3").innerHTML="Required";
		return false;
	}
	else if(!(x.match(/^[a-zA-Z0-9]+$/)))
	{
		document.getElementById("err3").innerHTML="No Special characters";
		return false;
	}
	else{
		document.getElementById("err3").innerHTML="";
		return true;
	}
}

function fncRePassValidate()
{
	var x = document.getElementById("password").value;
	var y = document.getElementById("conpassword").value;
	if(y==null || y==""){
		document.getElementById("err4").innerHTML="Password doesn't match";
		return false;

	}
	else if ((x!=y)){
		document.getElementById("err4").innerHTML="Password doesn't match";
		return false;
	}
	else{
		document.getElementById("err4").innerHTML="";
		return true;
	}
	
}

function fncSocValidate1()
{
	var x = document.getElementById("socdrp").value;
	if (x==0){
		document.getElementById("err5").innerHTML="Required";
		return false;
	}
	else{
		document.getElementById("err5").innerHTML="";
		return true;
	
	}
	
}

function fncBlockValidate()
{
	var x = document.getElementById("blodrp").value;
	if (x==0){
		document.getElementById("err6").innerHTML="Required";
		return false;
	}
	else{
		document.getElementById("err6").innerHTML="";
		return true;
	}
	
	
}

function fncTowerValidate()
{
	var x = document.getElementById("towdrp").value;
	if (x==0){
		document.getElementById("err7").innerHTML="Required";
		return false;
	}
	else{
		document.getElementById("err7").innerHTML="";
		return true;
	
	}
	
}

function fncFloorValidate()
{
	var x = document.getElementById("flodrp").value;
	if (x==0){
		document.getElementById("err8").innerHTML="Required";
		return false;
	}
	else{
		document.getElementById("err8").innerHTML="";
		return true;
	}
	
}

function fncFlatValidate()
{
	
	var x = document.getElementById("fladrp").value;
	if (x==0){
		document.getElementById("err9").innerHTML="Required";
		return false;
	}
	else{
		document.getElementById("err9").innerHTML="";
		return true;
	
	}
	
}

function fncFirstValidate()
{
	var x = document.getElementById("first_name").value;
	if (x==null || x=="")
	{
		document.getElementById("err10").innerHTML="Required";
		return false;
	}
	else if(!(x.match(/^[a-zA-Z0-9]+$/)))
	{
		document.getElementById("err10").innerHTML="Only Alphanumeric values";
		return false;
	}
	else{
		document.getElementById("err10").innerHTML="";
		return true;
	}
	
	
}

function fncLastValidate()
{
	var x = document.getElementById("last_name").value;
	if (x==null || x=="")
	{
		document.getElementById("err11").innerHTML="Required";
		return false;
	}
	else if(!(x.match(/^[a-zA-Z0-9]+$/)))
	{
		document.getElementById("err11").innerHTML="Only alphanumeric values";
		return false;
	}
	else{
		document.getElementById("err11").innerHTML="";
		return true;
	}
	
	
}

function fncPhoneValidate()
{
	var x = document.getElementById("phone").value;
	if(x==null || x==""){
		document.getElementById("err12").innerHTML="Required";
		return false;
		
	}
	else{
		document.getElementById("err12").innerHTML="";
		return true;
	}
}

function fncMobileValidate(){
	var x=document.getElementById("mobile").value;
	if(!(x.match(/^[0-9]+$/))){
		document.getElementById("err15").innerHTML="Only Digits";
		return false;
	}
	else{
		document.getElementById("err15").innerHTML="";
		return true;
	}
	
}

function fncDOBValidate()
{
	
	var x = document.getElementById("dobdrp").value;
	
	if(x==0){
		document.getElementById("err13").innerHTML="DOB Must be Filled out";
		return false;
		}
	else{
		document.getElementById("err13").innerHTML="";
		return true;
	}

}

function fncOccValidation()
{
	var x = document.getElementById("occdrp").value;
	if(x==0){
		
		document.getElementById("err14").innerHTML="Required";
		return false;
		}
	else{
		document.getElementById("err14").innerHTML="";
		return true;
		
	}
}

function fncTermsValidation()
{
	

	
			if(fncEmailValidate() && fncReEmailValidate() && fncPassValidate() && fncRePassValidate() 
					&& fncFirstValidate() && fncLastValidate() && fncPhoneValidate() 
					&& fncOccValidation()){
					return 1;

			}
			else{
				alert("Enter all Mandatory Fields Correctly");

			}
				

	
}


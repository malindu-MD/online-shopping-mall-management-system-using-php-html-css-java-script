function checkpassword()
{
	var v1=document.getElementById("pwd1").value;
	var v2=document.getElementById("pwd2").value;
	
	if(v1 != v2)
	{
		document.getElementById("messages").innerHTML="*Password mismatch";
		return false;
	}
}	
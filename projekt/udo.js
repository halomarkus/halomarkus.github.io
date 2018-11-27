function formularAusgabe()
{
var myName=document.formular.name.value;
var myPassword=document.formular.passwort.value;
var myColor=document.formular.suesse.value;
if(myColor.value==="suess")
	alert("Rot");
else if(myColor.value==="halbtrocken")
	alert("grün");
else
	alert("egal");
if(isNaN(myPassword))
	alert("String");
alert("Password: "+myPassword.text.value);
else
	alert("Zahl");

if(isNaN(myName))
	alert("String");
alert("Name: "+myName);
else
	alert("Zahl");
}
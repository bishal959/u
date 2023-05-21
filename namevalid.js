function validname(){
	var username=document.getElementById('username').value;

	if(username.length==0) {
		showmessage("please enter user name","errorname","red");
		return false;
		}
	else if(username.length<3) {
		showmessage("not enough character","errorname","red");
		return false;
		}
	else if(!username.match(/^[a-zA-Z]{3,30}\s{1}[a-zA-Z]{3,30}$/)) {
		showmessage("please enter first name and last name with space","errorname","red");
		return false;
		}
	else{
		showmessage("valid user name","errorname","green");
		return true;
		}

}
function validpass(){
	var password=document.getElementById('password').value;

	if(password.length==0) {
		showmessage("please enter password","errorpass","red");
		return false;
		}
	else if(password.length<7) {
		showmessage("not enough character","errorpass","red");
		return false;
		}
	
	else{
		showmessage("valid password","errorpass","green");
		return true;
		}

}
function validemail(){
	var umail=document.getElementById('uemail').value;

	if(umail.length==0) {
		showmessage("please enter email","erroremail","red");
		return false;
		}
	
	
	else{
		showmessage("valid email","erroremail","green");
		return true;
		}

}
function phonevalid()
{
	var pnum=document.getElementById('phone').value;

	if(pnum.length==0)
	{
		showmessage("Please enter your phone no.","errorphone","red");
		return false;
	}
	else if(!pnum.match(/^[0-9]*$/))
	{
		showmessage("please enter number only","errorphone","red");
		return false;
	}
	else if(pnum.substr(0,2)!="98")
	{
		showmessage("The number must start with 98","errorphone","red");
		return false;	
	}
	else if(pnum.length!=10)
	{
		showmessage("Enter 10 digits number","errorphone","red");
		return false;
	}
	else
	{
		showmessage("valid phone number","errorphone","green");
		return true;
	}

}
function validradio(){
	var radio1=document.getElementById('radio').checked;
	if(radio1==true){
		showmessage("thank you for your information","errradio","green");
		return true;

	}
	else{
		showmessage("you can't proceed this item","errradio","red");
		return false;
	}


}

function validcomment(){

	var comment=document.getElementById('comment').value;
	var required=40;

	var left=required-comment.length;
	if(left>0){

		showmessage(left+""+"charater required","errorTerm","red");
		return false;

	}else{

		showmessage("valid comment","errorTerm","green");
		return true;
	}


}
function showmessage(message,location,color){
	document.getElementById(location).innerHTML=message;
	document.getElementById(location).style.color=color;
}
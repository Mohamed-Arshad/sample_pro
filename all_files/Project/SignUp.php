<?php
	session_start();
	if(isset($_POST["signsubmit"])){
		$fname=$_POST["txt_f_name"];
		$lname=$_POST["txt_l_name"];
		$email=$_POST["txt_email"];
		$telno=$_POST["txt_telno"];
		$password=$_POST["txt_new_pwrd"];
		$nic=$_POST["txt_nic"];
		$address=$_POST["txt_address"];
		$gender=$_POST["rdo_gender"];
		$vkey=rand(10000,99999);
		
		$con= mysqli_connect("localhost","arshad","project","arshad_db");
		if(!$con)
			{
				die("Cannot connect to DB server");
			}
			
		$sql="SELECT * FROM customer WHERE email='".$email."' and valid='true';";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){
			header('Location:redirect.php');
			exit();
		}else{
			$sql="SELECT * FROM customer WHERE email='".$email."' and valid='false';";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				$sql="DELETE FROM customer WHERE email = '".$email."'";
				$result=mysqli_query($con,$sql);
			}
			
			$sql="INSERT INTO customer VALUES ('".$fname."','".$lname."','".$email."','".$telno."','".$password."','".$nic."','".$address."','".$gender."','".$vkey."','false');";
		
			$insert=mysqli_query($con,$sql);
			if(mysqli_errno($con)){
					die("cannot insert");
			}
			//include 'sndmail.php';
			//sendmail($email,$vkey);
			//echo 'success';
			$_SESSION["email"]=$email;
			$_SESSION["vkey"]=$vkey;
			$_SESSION["fname"]=$fname;
			header('Location:sndmail.php');
			exit();
			}
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up</title>

<script src="jquery-3.3.1.min.js"></script>
<link href="SignupCss.css" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript">

	function validFname(){
		var name=document.getElementById("txt_f_name").value;
		if(name=="")
		{
			document.getElementById("errfnnme").innerHTML="*Enter your first name";
			document.getElementById("txt_f_name").style.backgroundColor="#6FF";
			return false;
		}
		else if(!/^[a-zA-z]+$/.test(name))
		{
			document.getElementById("errfnnme").innerHTML="*Enter a valid name";
			document.getElementById("txt_f_name").style.backgroundColor="#6FF";
			return false;
		}else{
				document.getElementById("errfnnme").innerHTML="";
				document.getElementById("txt_f_name").style.backgroundColor="#FFF";
				return true;
			}
	}
	function validLname(){
		var name=document.getElementById("txt_lst_name").value;
		if(name=="")
		{
			document.getElementById("errlstnme").innerHTML="*Enter your last name";
			document.getElementById("txt_lst_name").style.backgroundColor="#6FF";
			return false;
		}
		else if(!/^[a-zA-z]+$/.test(name))
		{
			document.getElementById("errlstnme").innerHTML="*Enter a valid name";
			document.getElementById("txt_lst_name").style.backgroundColor="#6FF";
			return false;
		}
		document.getElementById("errlstnme").innerHTML="";
		document.getElementById("txt_lst_name").style.backgroundColor="#FFF";
		return true;
	}
	function validpassword(x){
		var pword=document.getElementById("txt_new_pwrd").value;
		var confirmpword=document.getElementById("txt_conf_pwrd").value;
		var lenpword=pword.length;
		
		document.getElementById("errconfpword").innerHTML="";
		document.getElementById("errconfpword").style.color="#F00";
		document.getElementById("txt_conf_pwrd").style.backgroundColor="#FFF";
		
		if(lenpword<8)
		{
			document.getElementById("errpword").innerHTML="*Password should be more than 8 charecters";
			document.getElementById("txt_new_pwrd").style.backgroundColor="#6FF";
			return false;
		}
		document.getElementById("txt_new_pwrd").style.backgroundColor="#FFF";
		document.getElementById("errpword").innerHTML="";
		if(!x)
		{
			return false;
		}
		
		if(pword!=confirmpword)
		{
			document.getElementById("errconfpword").innerHTML="*Password don't match";
			document.getElementById("txt_new_pwrd").style.backgroundColor="#6FF";
			document.getElementById("txt_conf_pwrd").style.backgroundColor="#6FF";
			return false;
		}
		document.getElementById("txt_new_pwrd").style.backgroundColor="#FFF";
		document.getElementById("txt_conf_pwrd").style.backgroundColor="#FFF";
		document.getElementById("errconfpword").style.color="#396";
		document.getElementById("errconfpword").innerHTML="Password match";
		return true;
	}
	
	function validcontact(){
		var no=document.getElementById("txt_telno").value;
		var len=no.length;
		if(isNaN(no) || len!=10)
		{
			document.getElementById("errtelno").innerHTML="*Enter a valid contact number";
			document.getElementById("txt_telno").style.backgroundColor="#6FF";
			return false;
		}
		document.getElementById("errtelno").innerHTML="";
		document.getElementById("txt_telno").style.backgroundColor="#FFF";
		return true;
	}
	
	function validemail()
	{
		var mail=document.getElementById("txt_email").value;
		var at=mail.indexOf("@");
		var dt=mail.lastIndexOf(".");
		var len =mail.length;
		if((at<2)||(dt-at<2)||(len-dt<2))
		{
			document.getElementById("errmail").innerHTML="*Enter a valid email address";
			document.getElementById("txt_email").style.backgroundColor="#6FF";
			return false;
		}
			document.getElementById("errmail").innerHTML="";
			document.getElementById("txt_email").style.backgroundColor="#FFF";
			
			 $(document).ready(
				function(){
							$.ajax({
										url:"verifyemail.php",
										method:"POST",
										data:$('#signform').serialize(),
										success: function(data){
												$('#errmail').html(data);
												var s=$('#errmail').html();
												s=s.substring(2,42);
												var d='*The Email you entered is already exists';
												if(s==d){
													//:)
												}
										}
							});
			});
			return true;
	}
	function validnic(){
		var nic=document.getElementById("txt_nic").value;
		var len=nic.length;
		if(!isNaN(nic) && len==12)
		{
			document.getElementById("errnic").innerHTML="";
			document.getElementById("txt_nic").style.backgroundColor="#FFF";
			return true;
			
		}else if(len==10 && nic.charAt(9).toUpperCase()=="V" && !isNaN(nic.substring(0,9)))
		{
			document.getElementById("errnic").innerHTML="";
			document.getElementById("txt_nic").style.backgroundColor="#FFF";
			return true;
		}else
		{
			document.getElementById("errnic").innerHTML="*Enter a valid NIC number";
			document.getElementById("txt_nic").style.backgroundColor="#6FF";
			return false;
		}
	}
	function validaddress(){
		var address=document.getElementById("txt_address").value;
		if(address=="")
		{
			document.getElementById("erraddress").innerHTML="*Enter your Address";
			document.getElementById("txt_address").style.backgroundColor="#6FF";
			return false;
		}
		document.getElementById("erraddress").innerHTML="";
		document.getElementById("txt_address").style.backgroundColor="#FFF";
		return true;
	}
	function validgender(){
		var male=document.getElementById("rdomale").checked;
		var female=document.getElementById("rdofemale").checked;
		if(male==0 && female==0)
		{
			document.getElementById("errgender").innerHTML="*Select your gender";
			return false;
		}
		document.getElementById("errgender").innerHTML="";
		return true;
	}
	/*function validdate(){
		var date=document.getElementById("dte_dob").value;
		if(date==""){
			document.getElementById("errdate").innerHTML="*Enter your date of birth";
			document.getElementById("dte_dob").style.backgroundColor="#6FF";
			return false;
		}
		return true;
	}*/
	function validate(){
		var x=document.getElementsByClassName("errr");
		var y=document.getElementsByClassName("signupfields");
		
		for(var i=0;i<x.length;i++){
			x[i].innerHTML="";
		}
		for(var i=0;i<y.length;i++){
			y[i].style.backgroundColor="#FFF";
		}
		
		if(validFname() && validLname() && validemail() && validcontact() && validpassword(1) && validnic() && validaddress() && 
		validgender()/* && validdate()*/)
		{		
			//
		}
		else
		{
			event.preventDefault();
		}
	}
	
	/*$(document).ready(
	function(){
			$('#signsubmit').click(function() {
				validate();	
				})
		});*/		
	function reseter(){
		var x=document.getElementsByClassName("errr");
		var y=document.getElementsByClassName("signupfields");
		
		for(var i=0;i<x.length;i++){
			x[i].innerHTML="";
		}
		for(var i=0;i<y.length;i++){
			y[i].style.backgroundColor="#FFF";
		}
		}

</script>
</head>

<body>
	<table class="header">
    	<tr>
    		<td>
       			<a href="call-a-doc.html"><img src="finallogo.png" height="150" width="200"/></a>
             </td><td><div class="non"></div><a href="call-a-doc.html"><h1>The DocWeb</h1></a>
            </td>
            <td align="right" width="850">
				<form method="post" >
            				<div>
							<label for="txtUserName">Username :</label>
							<input class="log" id="txtUserName" type="text" name="username">
                            </div><br><div>
							<label for="txtPassword">Password :</label>
							<input class="log" id="txtPassword" type="password" name="password">
                            </div><br>
                            <input type="submit" value="Login" name="logsubmit">
                            <a href="" ><i>Forgotten password?</i></a>
             	</form>
             </td></tr></table>
			<h3>
    			<ul>
				  <li>
                    	<a href="call-a-doc.html">Home</a>
                    </li>
				  <li class="dropdown">
					    <a>Services</a>
                        
					    <div class="dropdown-content">
					      <a href="">Call-a-Doc</a>
					      <a href="">Book-a-Doc</a>
					      <a href="">Book CheckUps</a>
					 	</div>
                        
                     </li>
				  <li>
                    	<a href="">Contact Us</a>
                     </li>
			   	  <li style="float:right">
                    	<a href="">About Us</a>
                    </li>
              </ul>
       	</h3>
        
<div class="signup">
<form action="" method="post" id="signform">
<h1 class="headsignup" align="center">Sign Up</h1>
<table align="center">
	<tr>
    	<td>First Name :</td>
    	<td><input name="txt_f_name" id="txt_f_name" type="text" placeholder="first name" class="signupfields" onkeyup="validFname()"/>
        <div class="errr" id="errfnnme"></div>
        </td>
   		<td width="200" align="right"> Last Name :</td><td><input name="txt_l_name" id="txt_lst_name" type="text" placeholder="last name" class="signupfields" onkeyup="validLname()"/><div class="errr" id="errlstnme"></div></td>
    </tr>
    <tr>
    	<td>Email :</td>
    	<td><input name="txt_email" id="txt_email" type="text" placeholder="Email address" class="signupfields" onkeyup="validemail()"/><div class="errr" id="errmail"></div></td>
    </tr>
    <tr>
    	<td>Contact No :</td>
    	<td><input name="txt_telno" id="txt_telno" type="text"  placeholder="Contact number" maxlength="10" class="signupfields" onkeyup="validcontact()"/><div class="errr" id="errtelno"></div></td>
    </tr>
    <tr>
    	<td>New Password :</td><td><input name="txt_new_pwrd" id="txt_new_pwrd" type="password" class="signupfields" onkeyup="validpassword(0)"/><div class="errr" id="errpword"></div></td>
    </tr>
    <tr>
    	<td>Confirm Password :</td><td><input name="txt_conf_pwrd" id="txt_conf_pwrd" type="password" class="signupfields" onkeyup="validpassword(1)"/><div class="errr" id="errconfpword"></div></td>
    </tr>
    <tr>
    	<td>NIC No :</td><td><input name="txt_nic" id="txt_nic" type="text" placeholder="NIC No" class="signupfields" onkeyup="validnic()"/><div class="errr" id="errnic"></div></td>
    <tr>
    	<td>Address :</td>
    	<td><textarea name="txt_address" id="txt_address" cols="40" rows="3" placeholder="Address" class="signupfields" onkeyup="validaddress()"></textarea><div class="errr" id="erraddress"></div></td>
    </tr>
    <tr>
    	<td>Gender :</td>
    	<td>	
        	<table>
    			<tr>
                	<td><label><input name="rdo_gender" type="radio" id="rdomale" value="male"  />Male</label></td>
                    <td><label><input name="rdo_gender" type="radio" id="rdofemale" value="female" />Female</label></td>
                </tr>
                <tr><td><div class="errr" id="errgender"></div></td></tr>
			</table>
         </td>
     </tr>
  <!--   <tr>
    	 <td>Date of Birth :</td>
   		 <td><input type="date" name="dte_dob" id="dte_dob" min="1900-01-01" class="signupfields"/><div class="errr" id="errdate"></div>
         <script language="javascript" type="text/javascript">
		 var today=new Date();
		 var year=today.getFullYear();
		 var month=today.getMonth()+1;
		 var day=today.getDate();
		 if(month<10){
		 	month="0"+month;
		 }
		 if(day<10){
			day="0"+day;
		 }
		 var date=year+"-"+month+"-"+day;
		 document.getElementById("dte_dob").setAttribute("max",date);
		 </script>
         </td>
     </tr> -->
     <tr><td height="30"></td></tr>
     <tr>
     	<td> <input type="submit" value="Sign Up" name="signsubmit" id="signsubmit" onclick="validate()"/></td>
        <td><input type="reset" onclick="reseter()"/></td>
     </tr>
</table>
</form>
</div>
</body>
</html>

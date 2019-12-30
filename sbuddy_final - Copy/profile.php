<?php
session_start();
if(!isset($_SESSION["email"])){
	header('Location:signup.php');
	}
if(isset($_POST["logout"])){
		session_destroy();
		header('Location:signup.php');
	}
$email=$_SESSION["email"];
//$email="it18103700@my.sliit.lk";
$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
if(isset($_POST["signsubmit"])){
		$no = count(glob("Images/"."*"));
		$no=$no+1;
		$image ="Images/".$no.".".pathinfo($_FILES["fileImage"]["name"], PATHINFO_EXTENSION);
		
		if(move_uploaded_file($_FILES["fileImage"]["tmp_name"],$image)){
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->update(['email' => $email], ['$set' => ["propic" => $no.".JPG"]]);
		$con->executeBulkWrite('sbuddy.users', $bulk);
		}
	}

$filter = [ 'email' => $email ]; 
$query = new MongoDB\Driver\Query($filter);     
$res = $con->executeQuery("sbuddy.users", $query);
$val = current($res->toArray());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="Signupcss.css" />
<link rel="stylesheet" href="Demo2css.css" />
<title>profile</title>
<script src="jquery-3.3.1.min.js"></script>
<script type="text/javascript" language="javascript">
function validFname(){
	try{
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
	}catch(ex){
			return true;
		}
	}
	function validLname(){
		try{
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
		}catch(ex){return true;}
	}
	function validcontact(){
		try{
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
		}catch(ex){return true;}
	}
	function validnic(){
		try{
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
		}}catch(ex){return true;}
	}
	function validaddress(){
		try{
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
		}catch(ex){return true;}
	}
	function validgender(){
		try{
		var male=document.getElementById("rdomale").checked;
		var female=document.getElementById("rdofemale").checked;
		if(male==0 && female==0)
		{
			document.getElementById("errgender").innerHTML="*Select your gender";
			return false;
		}
		document.getElementById("errgender").innerHTML="";
		return true;
		}catch(ex){return true;}
	}
	function validdate(){
		try{
		var date=document.getElementById("dte_dob").value;
		if(date==""){
			document.getElementById("errdate").innerHTML="*Enter your date of birth";
			document.getElementById("dte_dob").style.backgroundColor="#6FF";
			return false;
		}
		document.getElementById("errdate").innerHTML="";
		document.getElementById("dte_dob").style.backgroundColor="#FFF";
		return true;
		}catch(ex){return true;}
	}
	function validpassword(){
		try{
		var pword=document.getElementById("txt_new_pwrd").value;
		var lenpword=pword.length;
		if(lenpword<8)
		{
			document.getElementById("errpword").innerHTML="*Password should be more than 8 charecters";
			document.getElementById("txt_new_pwrd").style.backgroundColor="#6FF";
			return false;
		}
		document.getElementById("txt_new_pwrd").style.backgroundColor="#FFF";
		document.getElementById("errpword").innerHTML="";
		return true;
		}catch(ex){return true;}
	}
function showfile(){
	document.getElementById('signsubmit').disabled=false;
	}
function showfname(){
	document.getElementById('fn').innerHTML="<input name='txt_f_name' id='txt_f_name' type='text' value='' class='signupfields' onkeyup='validFname()'/>";
	document.getElementById('signsubmit').disabled=false;
	}
function showlname(){
	document.getElementById('ln').innerHTML="<input name='txt_l_name' id='txt_lst_name' type='text' value='' class='signupfields' onkeyup='validLname()'/>";
	document.getElementById('signsubmit').disabled=false;
	}

function showcontact(){
	document.getElementById('tl').innerHTML="<input name='txt_telno' id='txt_telno' type='text'  placeholder='Contact number' maxlength='10' class='signupfields' onkeyup='validcontact()' value='' />";
	document.getElementById('signsubmit').disabled=false;
	}
function shownic(){
	document.getElementById('nicc').innerHTML="<input name='txt_nic' id='txt_nic' type='text' class='signupfields' onkeyup='validnic()' value='' />";
	document.getElementById('signsubmit').disabled=false;
	}
function showaddress(){
	document.getElementById('add').innerHTML="<textarea name='txt_address' id='txt_address' cols='40' rows='3' class='signupfields' onkeyup='validaddress()'></textarea>";
	document.getElementById('signsubmit').disabled=false;
	}
function showgender(){
	document.getElementById('rdmal').innerHTML="<label><input name='rdo_gender' type='radio' id='rdomale' value='male'/>Male</label>";
	document.getElementById('rdfemal').innerHTML="<label><input name='rdo_gender' type='radio' id='rdofemale' value='female' />Female</label>";
	document.getElementById('signsubmit').disabled=false;
	}
function showdob(){
			document.getElementById('dob').innerHTML="<input type='date' class='signupfields' name='dte_dob' id='dte_dob' min='1900-01-01' />";
			
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
		 document.getElementById("dte_dob").style.borderColor="#999";
		 
		 document.getElementById('signsubmit').disabled=false;
	}
function showpassword(){
	document.getElementById('pwr').innerHTML="<input name='txt_new_pwrd' id='txt_new_pwrd' type='password' class='signupfields'  onkeyup='validpassword()' />";
	document.getElementById('signsubmit').disabled=false;
	}
	function validate(){
		var x=document.getElementsByClassName("errr");
		var y=document.getElementsByClassName("signupfields");
		
		for(var i=0;i<x.length;i++){
			x[i].innerHTML="";
		}
		for(var i=0;i<y.length;i++){
			y[i].style.backgroundColor="#FFF";
		}
		
		if(validFname() && validLname() && validcontact() && validnic() && validaddress() && 
		validgender() && validdate()&& validpassword() )
		{	
		$(document).ready(
		function(){
			
					var mail=document.getElementById('em').innerText;
					
					try{
					var value1=document.getElementById("txt_f_name").value;
 					$.ajax({
	  					url: "update.php",
     					type: "POST",
      					data: { email: mail , data1: value1, tname:"fname"  },
      					success: function(result) {
          								 // do something here
		   								//$('#ser').html(result);
		   
      							}
						 })
					}catch(ex){}
					
					try{
					var value1=document.getElementById("txt_l_name").value;
 					$.ajax({
	  					url: "update.php",
     					type: "POST",
      					data: { email: mail , data1: value1, tname:"lname"  },
      					success: function(result) {
          								 // do something here
		   								//$('#ser').html(result);
		   
      							}
						 })
					}catch(ex){}
					
					try{
					var value1=document.getElementById("txt_telno").value;
 					$.ajax({
	  					url: "update.php",
     					type: "POST",
      					data: { email: mail , data1: value1, tname:"telno"  },
						 })
					}catch(ex){}
					
					try{
					var value1=document.getElementById("txt_nic").value;
 					$.ajax({
	  					url: "update.php",
     					type: "POST",
      					data: { email: mail , data1: value1, tname:"nic"  },
						 })
					}catch(ex){}
					
					try{
					var value1=document.getElementById("txt_address").value;
 					$.ajax({
	  					url: "update.php",
     					type: "POST",
      					data: { email: mail , data1: value1, tname:"address" },
						 })
					}catch(ex){}
					
					try{
					var value1="female";
					if(document.getElementById("rdomale").checked)
						value1="male";
 					$.ajax({
	  					url: "update.php",
     					type: "POST",
      					data: { email: mail , data1: value1, tname:"gender"  },
						 })
					}catch(ex){}
					
					try{
					var value1=document.getElementById("dte_dob").value;
 					$.ajax({
	  					url: "update.php",
     					type: "POST",
      					data: { email: mail , data1: value1, tname:"dob"  },
						 })
					}catch(ex){}
					
					try{
					var value1=document.getElementById("txt_new_pwrd").value;
 					$.ajax({
	  					url: "update.php",
     					type: "POST",
      					data: { email: mail , data1: value1, tname:"password"  },
						 })
					}catch(ex){}
		});
		
		}
		else
		{
			alert("not done"); 
			event.preventDefault();
		}
	}

</script>
</head>

<body>
<table height="20">
<div class="he">
   <div class="headerr">
    
       			<a href=""><img src="SLIIT.png" height="150" width="200"/></a>
   </div>
    
    <div class="sbud">
             	
             	<h1>S-Buddy</h1>
    </div>
    
    <div class="HeaderLogout" >            						        <form method="post">
            	<input type="submit" value="Logout" name="logout">        </form>
    
   </div>
</div>
  
   
 
    	<div class="barCreate">
        <br />
       	<hr />
        	<ul>
				  <li><a href="FMyZoneList.php">Zone</a></li>
                  <li><a href="">BuddyList</a></li>
				  <li><a href="sliit_servise.php">Services</a> </li>
                  <li><a href="chat.php">Message</a></li>
                  <li><a href="notification.php">Notification</a></li>
                  <li style="float:right"><a class="active" href="profile.php">Profile</a></li>
			</ul>
       <hr />
       </div>
       </table>
       <table align="center" height="250">
       	<tr>
        	<td><img class="pf" src=<?php echo "Images/".$val->propic;?> height="200" width="250" /></td>
            <td>Add new profile pic<br /><form method="post" enctype="multipart/form-data" id="signform"><input type="file" name="fileImage" id="fileImage"  onclick="showfile()"/></td>
        </tr></table>
        
        <div class="signup">

<table align="center">
	<tr>
    	<td width="109">First Name :</td>
    	<td width="259"><div id="fn"><?php echo $val->fname;?></div>
        <div class="errr" id="errfnnme"></div>
        </td><td width="29"><p class="editp" onclick="showfname()" ><u>edit</u></p></td>
   		<td width="200" align="right"> Last Name :</td><td width="54"><div id="ln"><?php echo $val->lname;?></div><div class="errr" id="errlstnme"></div></td>
        <td width="57"><p class="editp" onclick="showlname()" ><u>edit</u></p></td>
    </tr>
    <tr>
    	<td>Email :</td>
    	<td><div id="em"><?php echo $val->email;?></div><div class="errr" id="errmail"></div></td>
        <td></td>
    </tr>
    <tr>
    	<td>Contact No :</td>
    	<td><div id="tl"><?php echo $val->telno;?></div><div class="errr" id="errtelno"></div></td>
        <td><p class="editp" onclick="showcontact()" ><u>edit</u></p></td>
    </tr>
   <!-- <tr>
    	<td>Password :</td><td><input name="txt_new_pwrd" id="txt_new_pwrd" type="password" class="signupfields" onkeyup="validpassword(0)"/><div class="errr" id="errpword"></div></td>
    </tr>
    
    <tr>
    	<td>Confirm Password :</td><td><input name="txt_conf_pwrd" id="txt_conf_pwrd" type="password" class="signupfields" onkeyup="validpassword(1)"/><div class="errr" id="errconfpword"></div></td>
    </tr>-->
    
    <tr>
    	<td>NIC No :</td><td><div id="nicc"><?php echo $val->nic;?></div><div class="errr" id="errnic"></div></td>
        <td><p class="editp" onclick="shownic()" ><u>edit</u></p></td>
    </tr>    
    <tr>
    	<td>Address :</td>
    	<td><div id="add"><?php echo $val->address;?></div><div class="errr" id="erraddress"></div></td>
        <td><p class="editp" onclick="showaddress()" ><u>edit</u></p></td>
    </tr>
    <tr>
    	<td>Gender :</td>
    	<td>	
        	<table>
    			<tr>
                	<td><div id="rdmal"><?php echo $val->gender;?></div></td>
                    <td><div id="rdfemal"></div></td>
                </tr>
                <tr><td><div class="errr" id="errgender"></div></td></tr>
			</table>
         </td><td><p class="editp" onclick="showgender()" ><u>edit</u></p></td>
     </tr>
   <tr>
    	 <td>Date of Birth :</td>
   		 <td><div id="dob"><?php echo $val->dob;?></div><div class="errr" id="errdate"></div>
         </td><td><p class="editp" onclick="showdob()" ><u>edit</u></p></td>
     </tr>
     <tr><td>Password :</td><td><div id="pwr"></div><div class="errr" id="errpword"></div></td><td><p class="editp" onclick="showpassword()" ><u>edit</u></p></td></tr>
     <tr>
     	<td> <input type="submit" value="Save changes" name="signsubmit" id="signsubmit" onclick="validate()" disabled="disabled"/></td>
     </tr>
</table>
</form>
</div>
</body>
</html>
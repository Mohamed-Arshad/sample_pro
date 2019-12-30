<?php
	if(isset($_POST["submit"])){//getting data
		$nic=$_POST["txtnic"];
		$address=$_POST["txtaddress"];
		$telno=$_POST["txtcontactno"];
		$impect=$_POST["Aimpect"];
		
		$no = count(glob("Images/"."*"));
		$no1=$no+1;
		$Nicimage ="Images/".$no1.".".pathinfo($_FILES["nicpic"]["name"], PATHINFO_EXTENSION);
		//$Nicimage="Images/".basename($_FILES["nicpic"]["name"]);
		move_uploaded_file($_FILES["nicpic"]["tmp_name"],$Nicimage);
		
		$no = count(glob("Images/"."*"));
		$no2=$no+1;
		$Accimage ="Images/".$no2.".".pathinfo($_FILES["accphoto"]["name"], PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["accphoto"]["tmp_name"],$Accimage);
		
		$con=mysqli_connect("localhost","root","","accident");
		$sql="INSERT INTO `accident`(`Nic`, `Nic_pic`, `Location`, `Location_pic`, `Impect`, `Contact_No`) VALUES ('".$nic."','".$Nicimage."','".$address."','".$Accimage."','".$impect."','".$telno."')";
		mysqli_query($con,$sql);
		header('Location:Home.html');
		
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report anaccident</title>
<link rel="stylesheet" href="report.css" />
<script language="javascript" type="text/javascript">
function validnic(){
		var nic=document.getElementById("txtnic").value;
		var len=nic.length;
		if(!isNaN(nic) && len==12)
		{
			document.getElementById("errnic").innerHTML="";
			return true;
			
		}else if(len==10 && nic.charAt(9).toUpperCase()=="V" && !isNaN(nic.substring(0,9)))
		{
			document.getElementById("errnic").innerHTML="";
			return true;
		}else
		{
			document.getElementById("errnic").innerHTML="*Enter a valid NIC number";
			return false;
		}
	}

function validcontact(){
		var no=document.getElementById("txtcontactno").value;
		var len=no.length;
		if(isNaN(no) || len!=10)
		{
			document.getElementById("errtelno").innerHTML="*Enter a valid contact number";
			return false;
		}
		document.getElementById("errtelno").innerHTML="";
		return true;
	}

function validimpect(){
		var low=document.getElementById("rdo1").checked;
		var medium=document.getElementById("rdo2").checked;
		var high=document.getElementById("rdo1").checked;
		if(low==0 && medium==0 && high==0)
		{
			document.getElementById("errimpect").innerHTML="*Select Accident impect";
			return false;
		}
		document.getElementById("errimpect").innerHTML="";
		return true;
	}

function validnicpic(){
	var path=document.getElementById("nicpic").value;
	var len=path.length;
	var subs=path.substring(len-3,len);
	if(path==""){
		document.getElementById("errnicpic").innerHTML="*Nic picture required";
		return false;
		}
	if(subs=="JPG" || subs=="PNG"){
		document.getElementById("errnicpic").innerHTML="";
		return true;
		}
		document.getElementById("errnicpic").innerHTML="*Please upload JPG or PNG format pictures";
		return false;
	}
	
function validacc(){
	var path=document.getElementById("accphoto").value;
	var len=path.length;
	var subs=path.substring(len-3,len);
	if(path==""){
		document.getElementById("erraccpic").innerHTML="*Accident picture required";
		return false;
		}
	if(subs=="JPG" || subs=="PNG"){
		document.getElementById("erraccpic").innerHTML="";
		return true;
		}
		document.getElementById("erraccpic").innerHTML="*Please upload JPG or PNG format pictures";
		return false;
	
	}

function validaddress(){
		var address=document.getElementById("txtaddress").value;
		if(address=="")
		{
			document.getElementById("erraddress").innerHTML="*Enter Accident Address";
			return false;
		}
		document.getElementById("erraddress").innerHTML="";
		return true;
	}

function validate(){
		if(validnic() && validnicpic() && validaddress() && validacc() && validimpect() && validcontact())
		{		
			alert("data uploded successfully");
			
		}
		else
		{
			event.preventDefault();
		}
	}
</script>
</head>

<body>
<h1 align="center">Report an accident</h1>
<form method="post" enctype="multipart/form-data">
	<table align="center" border="0">
		<tr align="center" height="75">
			<td><b>NIC No:</b></td>
            <td><input type="text" name="txtnic" id="txtnic" onkeyup="validnic()" /><div class="err" id="errnic"></div></td>
            <td><b>NIC pic:</b></td><td><input type="file" name="nicpic" id="nicpic"/><div class="err" id="errnicpic"></div></td>
         </tr>
         <tr align="center" height="75">
         	<td><b>Accident Location:</b></td><td><textarea name="txtaddress" id="txtaddress" cols="40" rows="3" ></textarea>
            <div class="err" id="erraddress"></div></td>
            <td><b>Accident Photo:</b></td><td><input type="file" name="accphoto" id="accphoto"/>
            							<div class="err" id="erraccpic"></div></td>
         </tr>
         <tr>
         	<td><b>Accident Impect: </b></td><td>Low<input type="radio" name="Aimpect" id="rdo1" value="Low"/><br />
            									Medium<input type="radio" name="Aimpect" id="rdo2" value="Medium"/><br />
                                                High<input type="radio" name="Aimpect" id="rdo3" value="High"/><br />
                                                <div class="err" id="errimpect"></div></td>
         </tr>
         <tr align="center" height="75">
         		<td><b>Contact No: </b></td><td> <input type="text" name="txtcontactno" id="txtcontactno"  onkeyup="validcontact()"/><div class="err" id="errtelno"></div></td>
         </tr>
         <tr align="center" height="75">
         		<td></td><td><input type="submit" name="submit" id="submit" value="Submit" onclick="validate()" /></td>
         </tr>
         </table>
         </form>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
session_start();
if(isset($_SESSION["user"])){
	header('Location:adcustomer.php');
	}
if(isset($_POST["login"])){
	$email=$_POST["email"];
	$password=$_POST["password"];
	
	$con= mysqli_connect("localhost","arshad","project","arshad_db");
		if(!$con)
			{
				die("Cannot connect to DB server");
			}
			
		$sql="SELECT * FROM Admin WHERE email='".$email."' and password='".$password."';";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){
			$_SESSION["user"]=$email;
			header('Location:adcustomer.php');
		}else{
			$_SESSION["incorrectlogin"]="true";
			}
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="logincss.css" type="text/css" rel="stylesheet" />
</head>

<body>
		<table class="header">
    	<tr>
    		<td>
       			<a href=""><img src="finallogo.png" height="150" width="200"/></a>
             </td><td width="1125"><div class="non"></div><a href=""><h1>The DocWeb</h1></a>
            </td>
            </tr></table>
			<h3>
    			<ul>
				  <li>
                    	<a href="">CustomerDetails</a>
                    </li>
				 
				  <li>
                    	<a href="">DoctorDetails</a>
                     </li>
                    <li>
                    	<a href="">ChecUps</a>
                     </li>
			   	  <li style="float:right">
                    	<a href="">Create a Admin</a>
                    </li>
              </ul>
       	</h3>
        <div class="loginpcg" align="center">
        					<div class="non"></div><div class="non"></div><div class="errr">
                            <?php if(isset($_SESSION["incorrectlogin"])){
								echo "*Incorrect email or password.Please try again.";
								unset($_SESSION['incorrectlogin']);
								}
							?></div><br />
        					<form method="post" >
            				<div>
							<label for="txtUserName">Username :</label>
							<input class="log" id="txtUserName" type="text" name="email">
                            </div><br><div>
							<label for="txtPassword">Password :</label>
							<input class="log" id="txtPassword" type="password" name="password">
                            </div><br>
                            <input type="submit" value="Login" name="login">
                            <div class="non"></div>
             	</form>
         </div>
</body>
</html>

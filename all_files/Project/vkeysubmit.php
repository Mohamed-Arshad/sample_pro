<?php 
	session_start();
	$email=$_SESSION["email"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>verify email</title>
<link href="logincss.css" type="text/css" rel="stylesheet" />
</head>

<body>
		<table class="header">
    	<tr>
    		<td>
       			<a href="call-a-doc.html"><img src="finallogo.png" height="150" width="200"/></a>
             </td><td width="1125"><div class="non"></div><a href="call-a-doc.html"><h1>The DocWeb</h1></a>
            </td>
            </tr></table>
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
        <div class="loginpcg" align="center">
        					<div class="non"></div><div class="non"></div><br />
        					<form method="post" >
                            <h2>Please enter the verification key that we have send to your email</h2><br />
            				<div>
							<label for="txtUserName">key :</label>
							<input class="log" id="key" type="text" name="key">
                            </div><br>
                            <input type="submit" value="submit" name="submit">
                            <div class="errr"><?php
								if(isset($_POST["submit"])){
			$vkey=$_POST["key"];
			$con= mysqli_connect("localhost","arshad","project","arshad_db");
			if(!$con)
			{
				die("Cannot connect to DB server");
			}
			$sql="SELECT * FROM customer WHERE email='".$email."' and vkey='".$vkey."';";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				$sql="UPDATE customer SET valid = 'true' WHERE email = '".$email."';";
				$result=mysqli_query($con,$sql);
				header('Location:Thankyou.php');
				exit();
			}else{
				echo '*You have entered the wrong key please enter the correct key';
			}
		}
							 ?></div>
                            <div class="non"></div>
                            <div class="non"></div>
             	</form>
         </div>
</body>
</html>

<html>
<?php 
session_start();
if(isset($_SESSION["user"])){
	header('Location:home.php');
	}
if(isset($_POST["login"])){
	$email=$_POST["email"];
	$password=$_POST["password"];
	
	$con= mysqli_connect("localhost","arshad","project","arshad_db");
		if(!$con)
			{
				die("Cannot connect to DB server");
			}
			
		$sql="SELECT * FROM customer WHERE email='".$email."' and password='".$password."';";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){
			$_SESSION["user"]=$email;
			header('Location:home.php');
		}else{
			$_SESSION["incorrectlogin"]="true";
			header('Location:login.php');
			}
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" type="text/css" href="doc.css"/>
</head>
<body>
		<table class="header">
    	<tr>
    		<td>
       			<a href="call-a-doc.html"><img src="finallogo.png" height="150" width="200"/></a>
             </td><td><div class="non"></div><a href="call-a-doc.html"><h1>The DocWeb</h1></a>
            </td>
            <td align="right" width="800">
				<form method="post" >
            				<div>
							<label for="txtUserName">Username :</label>
							<input class="log" id="txtUserName" type="text" name="email">
                            </div><br><div>
							<label for="txtPassword">Password :</label>
							<input class="log" id="txtPassword" type="password" name="password">
                            </div><br><div align="right">
                            <input type="submit" value="Login" name="login">
                            <a href="" ><i>Forgotten password?</i></a>
                            <br>
                            Don't have an account?<a href="SignUp.php"><i>Sign Up!</i></a></div>
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
                    
                <marquee scrollamount="20" direction="left">
        		<img src="doc1.jpg" height="250" width="400" />
      			</marquee>
</body>
</html>
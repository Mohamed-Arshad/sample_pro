<html>
<?php 
session_start();
if(!isset($_SESSION["user"])){
	header('Location:adminlogin.php');
	}
if(isset($_POST["logout"])){
	session_destroy();
	header('Location:adminlogin.php');
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
            	<form method="post">
            	<input type="submit" value="Logout" name="logout">
                <a href=""><img src="pro_icon.png" height="100" width="100"/></a>
                </form>
             </td></tr></table>
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
                    	<a href="createadmin.php">Create a Admin</a>
                    </li>
             </ul>
       	</h3>
        <form method="post">
        	Email :<input class="log" type="text" name="email">
            password :<input class="log" type="password" name="password">
            <input type="submit" name="signup">
        </form>
        <?php 
		if(isset($_POST["signup"])){
	$email=$_POST["email"];
	$password=$_POST["password"];
	
	$con= mysqli_connect("localhost","arshad","project","arshad_db");
		if(!$con)
			{
				die("Cannot connect to DB server");
			}
			
		$sql="INSERT INTO admin VALUES ('".$email."','".$password."');";
		$result=mysqli_query($con,$sql);
		if(mysqli_errno($con)){
					die("cannot insert");
			}else{
				echo 'You have registered success fully';
				}
	}
		?>
</body>
</html>
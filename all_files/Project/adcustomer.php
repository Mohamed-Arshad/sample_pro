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
        <b>Serch User By</b><br>
        Name:
        <input type="radio" name="serchby" value="fname">
        Email:
        <input type="radio" name="serchby" value="email" >
        Contact No:
        <input type="radio" name="serchby" value="telno">
        <input class="log" type="text" name="text" placeholder="Serch">
        <input type="submit" name="serch" value="Serch">
        </form>
        <?php 
			if(isset($_POST["serch"])){
					$serchby=$_POST["serchby"];
					$text=$_POST["text"];
		
					$con= mysqli_connect("localhost","arshad","project","arshad_db");
					if(!$con)
					{
						die("Cannot connect to DB server");
					}
			
					$sql="SELECT * FROM customer WHERE ".$serchby." LIKE '%".$text."%';";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){
			echo "<table border='2' align='center'><tr align='center'><td>First Name</td><td>Last Name</td><td>Email</td><td>Tel No</td><td>NIC</td><td>Address</td><td>Gender</td></tr>";
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr align='center'><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["email"]."</td><td>".$row["telno"]."</td><td>".$row["nic"]."</td><td>".$row["address"]."</td><td>".$row["gender"]."</td></tr>";
				}
			echo "</table>";
		}else{
			echo "No results found.";
				}
			}
		?>
</body>
</html>
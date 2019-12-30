<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	$con= mysqli_connect("localhost","arshad","project","arshad_db");
		if(!$con)
			{
				die("Cannot connect to DB server");
			}
	$sql="SELECT * FROM customer WHERE email='".$_POST["txt_email"]."' and valid='true';";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
			echo '*The Email you entered is already exists';
		}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>verify email</title>
</head>

<body>
</body>
</html>
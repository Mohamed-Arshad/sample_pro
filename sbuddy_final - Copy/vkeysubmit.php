<?php 
	session_start();
	$email=$_SESSION["email"];
	$vkey=$_SESSION["vkey"]
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>verify email</title>
<link href="Signupcss.css" type="text/css" rel="stylesheet" />
<link href="logincss.css" type="text/css" rel="stylesheet" />
</head>

<body>
		<table class="header">
    	<tr>
    		<td width="200">
       			<a href=""><img src="SLIIT.png" height="150" width="250"/></a>
             </td><td width="195"><div class="non"></div><a href=""><h1>S-Buddy</h1></a>
            </td>
            <td align="right" width="920">
				
             </td></tr></table>
			
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
			$vkeytxt=$_POST["key"];
			$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			if(!$con)
			{
				die("Cannot connect to DB server");
			}
			if($vkey==$vkeytxt){
				$bulk = new MongoDB\Driver\BulkWrite;
				$bulk->update(['email' => $email], ['$set' => ['valid' => 1]]);
    			$con->executeBulkWrite('sbuddy.users', $bulk);
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

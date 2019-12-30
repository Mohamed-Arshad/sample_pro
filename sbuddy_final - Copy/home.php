<?php
session_start();
if(!isset($_SESSION["email"])){
	header('Location:signup.php');
	}
if(isset($_POST["logout"])){
		session_destroy();
		header('Location:signup.php');
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="Demo2css.css" />
<title>zone</title>
</head>

<body>
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
				  <li><a class="active" href="home.php">Zone</a></li>
                  <li><a href="">BuddyList</a></li>
				  <li><a href="sliit_servise.php">Services</a> </li>
                  <li><a href="../chat/index.php">Message</a></li>
                  <li><a href="">Notification</a></li>
                  <li style="float:right"><a href="profile.php">Profile</a></li>
			</ul>
       <hr />
       </div>
</body>
</html>
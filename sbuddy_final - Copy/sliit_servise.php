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
<title>SLIIT Servises</title>
<link rel="stylesheet" href="Demo2css.css" />
<script language="javascript" type="text/javascript">
function chcnull(){
	var complain=document.getElementById("complain").value;
	if(complain==""){
		alert ("complain box is empty");
		event.preventDefault();
		}
	}
</script>
</head>

<body>
<table><tr><td width="1500">
<div>
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
				  <li><a class="active" href="sliit_servise.php">Services</a> </li>
                  <li><a href="chat.php">Message</a></li>
                  <li><a href="notification.php">Notification</a></li>
                  <li style="float:right"><a href="profile.php">Profile</a></li>
			</ul>
       <hr />
       </div></td></tr><tr><td>
       <h3>Inquaries</h3><form method="post" enctype="multipart/form-data">
       <textarea name="complain"  id="complain" cols="40" rows="3" placeholder="Enter your complains"></textarea>
       <br />make complain with an attachment<input type="file" name="fileImage2" id="fileImage2"/>
       <input type="submit" name="inquary" onclick="chcnull()" value="submit">
       </form>
       <?php 
	   if(isset($_POST["inquary"])){
		$data=$_POST["complain"];
		$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");//connecting
		$bulk = new MongoDB\Driver\BulkWrite;
		$date=date("y.m.d");
		
		$doc = ['_id' => new MongoDB\BSON\ObjectID, 'data' => $data, 'type' => 'text', 'date'=> $date];
		$image =pathinfo($_FILES["fileImage2"]["name"], PATHINFO_EXTENSION);
			if($image!=NULL){
				$no = count(glob("Images/"."*"));
				$no=$no+1;
				$image ="Images/".$no.".".pathinfo($_FILES["fileImage2"]["name"], PATHINFO_EXTENSION);
				move_uploaded_file($_FILES["fileImage2"]["tmp_name"],$image);
				$doc = ['_id' => new MongoDB\BSON\ObjectID, 'data' => $data, 'type' => 'image', 'image' => $no.".JPG"];	
			}
    	$bulk->insert($doc);
    	$con->executeBulkWrite('sbuddy.complain', $bulk);
		echo "<script>alert('your complain made successfully')</script>";
		}
	   ?>
       <hr />
       </td></tr><tr><td></td></tr></table><table><tr><td height="100" width="1500">
       <div>
       <?php
						$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
						$query = new MongoDB\Driver\Query([]);     
    					$res = $con->executeQuery("sbuddy.AdminPost", $query);
						$i=0;
						foreach($res as $row){
							$arr[$i]=$row;
							$i++;
							}
						foreach(array_reverse($arr) as $row){
							if($row->type=="text"){
								echo "<img src='SLIIT.png' height='60' width='60'>"." SLIIT<br>";
								echo "<div class='data'>$row->data</div>"."<hr>";
								}else{
									$pic=$row->image;
									echo "<img src='SLIIT.png' height='60' width='60'>"." SLIIT<br>";
									echo "<img src='Images/$pic' height='200' width='250' align='middle'>"."<br>";
									echo "<div class='data'>$row->data</div>"."<hr>";
									}
							}
					?>
       </div></td></tr></table>
</body>
</html>
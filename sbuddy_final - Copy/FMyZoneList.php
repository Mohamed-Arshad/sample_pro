<?php
	session_start();
	if(!isset($_SESSION["email"])){
		header('Location:signup.php');
	}
	if(isset($_POST["logout"])){
		session_destroy();
		header('Location:signup.php');
	}
	
	$email=$_SESSION["email"];

	$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$filter = [ 'email' => $email ];
	$query = new MongoDB\Driver\Query($filter);     
	$res = $con->executeQuery("sbuddy.users", $query);
	$val = current($res->toArray());
	
	$id=$val->email;
	
	
	

?>	




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSSZone.css" />
<script src="jquery-3.3.1.min.js"></script>
<title>Zone List</title>
<script language="javascript" type="text/javascript">

	/*function changePage(x)
	{
		var name1=document.getElementById(x).innerHTML;
			
			//alert (name1);
			$(document).ready(
			
				function(){
					//alert (name1);
							$.ajax({
									
										url:"directMember.php",
										method:"POST",
										data:{name:name1},
										success: function(data){
												$('#q').html(data);
												//alert (name1);
												//alert (data);
												//window.location.replace('FZone.php');
										}
										
							});
			}); 
		
	}*/
</script>

</head>

<body>
	<!--<div class="he">
   <div class="headerr">
    
       			<a href=""><img src="SLIIT.png" height="150" width="200"/></a>
    </div>
    
    <div class="sbud">
             	
             	<h2>S-Buddy</h2>
    </div>
    
    <div class="HeaderLogout" >            						        <form method="post">
            	<input type="submit" value="Logout" name="logout">        </form>
    
    </div>
    </div>-->
  
   
 <form  method="post" enctype="multipart/form-data" name="Getdata">
    	<div class="bar">
        <table align="center">
        <tr>
        <td>
        <div class="enq">
        	<ul>
				  <li><a  href="FMyZoneList.php" class="active lo" ><img src="iconsImg/zone.png" width="30" height="30" /></a></li>
                  <li><a href="" class="lo" ><img src="iconsImg/buddyList.png" width="30" height="30" /></a></li>
				  <li><a class="lo" href="sliit_servise.php"><img src="iconsImg/service.png" width="30" height="30" /></a> </li>
                  <li><a href="chat.php"  class="lo" ><img src="iconsImg/message.png" width="30" height="30" /></a></li>
                  <li><a href="notification.php"  class="lo" ><img src="iconsImg/notification.png" width="30" height="30" /></a></li>
                  <li style="float:right"><a href="" class="lo" ><button id="logout" name="logout" class="lob"><img src="iconsImg/logout.png" width="30" height="30"/></button></a></li>
                  <li style="float:right"><a  href="profile.php" class="lo"><img src="iconsImg/profile.png" width="30" height="30" /></a></li>
                  
			</ul>
            </div>
         </td>
         </tr>
         </table>
         </div> 
       
       <!--Side Part-->
        
       <table align="center" width="1500">
       <tr>
       <td> 
       <div class="z">
       <div class="ZoneSid">
       		<ul1>	
				 <li1><a href=""class="lo" ><img src="iconsImg/myZone.png" width="30" height="30"/></a><a class="a"> My Zone</a></li>
                 <li1><a href="FCreateZone.php" class="lo" ><img src="iconsImg/createZone.png" width="30" height="30" /></a><a href="FCreateZone.php" class="a">Create Zone</a></li>	  
                 <li1><a href="FSearchZone.php" class="lo" ><img src="iconsImg/searchZone.png" width="30" height="30" /></a><a href="FSearchZone.php" class="a">Search Zone</a></li>	  
            </ul1>
       	</div>
        </div>
        <!--Side Part finish-->
        
        <!--Middle-->
        
        
       	<div class="posts" >
       	<div class="edit"><a>Zone Lists</a></div>
        <hr class="editH">
       	<div class="k">
       		
       </div>
       
        
       <div class="Searched1">
       <?php
	   		$a=(String)$id;
			
	   		$filter = ['members' => [ '$regex'=> $a]  ];
			$query = new MongoDB\Driver\Query($filter);     
			$res = $con->executeQuery("sbuddy.zone", $query);
			//echo $filter;
			//$val = current($res->toArray());
	   		//echo "a";
			$count=0;
	   		foreach($res as $row)
			{
				$count++;
       		
       		echo "<div class='SearchedZoneImg'>
            	<a  onclick='changePage($count)' id='click'><img src='$row->image' width='50px' height='40px' /><a>
            </div>
            <div class='SearchedZoneName'>
            	<a  onclick='changePage($count)' id='".$count."'> $row->zName </a>
            </div>";
			}
        ?>  
        
            <!--<div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedZoneName">
            	<a>Dark Digit </a>
            </div>
            
            <div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            
            <div class="SearchedZoneName">
            	<a>Crashers </a>
            </div>
            
            <div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedZoneName">
            	<a>Dudes </a>
            </div>
           
            <div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedZoneName">
            	<a>Crazy Queens </a>
            </div>-->
             
            <hr class="editH" />
            
   			
    	</div>
        <hr class="editH">
       <div  id="qa">
       
       	<!--<a><textarea name="qwer" cols="" rows="" id="q"></textarea></a>
        <a href="FZone.php"> a </a><input name="btnPost" type="submit" value="POST" class="btnPost" /></a>-->
       
       </div>
       
       
       <?php
	   		
			
			$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			
			if (isset($_POST['btnPost'])) {
    			$name = $_POST['qwer'];
				
				$_SESSION["name"]=$name;
				//$_SESSION["zlist"]=true;
			
				/*$filter1 = [ 'zName' => [ '$regex'=> $name] ];
				$query1 = new MongoDB\Driver\Query($filter1);     
				$res1 = $con->executeQuery("sbuddy.zone", $query1);
				$val1 = current($res1->toArray());*/
			}
	   
	   ?>
       </form>
        
        <!--Middle finish-->
        
</body>
</html>

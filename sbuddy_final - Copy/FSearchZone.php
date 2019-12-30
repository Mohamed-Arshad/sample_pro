<?php
session_start();
if(!isset($_SESSION["email"])){
	header('Location:signup.php');
	}
if(isset($_POST["logout"])){
		session_destroy();
		header('Location:signup.php');
	}
	
	$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	if(isset($_POST["btnSearch"]))
	{
		
	}
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSSZone.css" />
<script src="jquery-3.3.1.min.js"></script>
<title>Search Zone</title>

<script type="text/javascript" language="javascript">

	function getZone()
	{	
		var name1=document.getElementById("txtSearch").value;
		
		$(document).ready(
				function(){
							$.ajax({
								
										url:"searchZone.php",
										method:"POST",
										data:{zName:name1},
										success: function(data){
												$('#Searched').html(data);
										}
							});
			}); 
	}


	/*function trans(x)
	{
		var name1=document.getElementById(x).innerHTML;
		
		//alert(name1);
		
		$(document).ready(
				function(){
					
							$.ajax({
								
										url:"directMember.php",
										method:"POST",
										data:{zname:name1},
										success: function(data){
												$('#d').html(data);
												//window.location.replace('FZone.php')
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
  
   
 <form name="posting" method="post" enctype="multipart/form-data">
<div class="bar">
        <table align="center">
        <tr>
        <td>
        <div class="enq">
        	<ul>
				  <li><a  href="FMyZoneList.php" class="lo active" ><img src="iconsImg/zone.png" width="30" height="30" /></a></li>
                  <li><a href="" class="lo" ><img src="iconsImg/buddyList.png" width="30" height="30" /></a></li>
				  <li><a class=" lo" href="sliit_servise.php"><img src="iconsImg/service.png" width="30" height="30" /></a> </li>
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
				 <li1><a href="FMyZoneList.php" class="lo" ><img src="iconsImg/myZone.png" width="30" height="30"/></a><a href="FMyZoneList.php" class="a"> My Zone</a></li>
                 <li1><a href="FCreateZone.php" class="lo" ><img src="iconsImg/createZone.png" width="30" height="30" /></a><a href="FCreateZone.php" class="a">Create Zone</a></li>	  
                 <li1><a href=""class="lo" ><img src="iconsImg/searchZone.png" width="30" height="30" /></a><a class="a">Search Zone</a></li>	  
            </ul1>
       	</div>
        </div>
        <!--Side Part finish-->
        
        <!--Middle-->
        
        
       	<div class="posts" >
       
       	<div class="k">
<form id="form1" name="form1" method="post" action="">
     			<label for="txtSearch"></label>
      			<input type="text" name="txtSearch" id="txtSearch" class="searchbar1" onkeyup="getZone()"/>
                
                 <input name="btnSearch" type="button" value="Search" class="btnSearch1"/>
   			 </form>
	   <div class="Searched1" id="Searched">
       		<!--<div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedZoneName">
            	<a>Crazy Dudes </a>
            </div>
            <div class="SearchedZoneAdd">
            	<input name="btnSearch" type="button" value="ADD" class="btnSearch1"/> 
            </div>
            <div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedZoneName">
            	<a>Dark Digit </a>
            </div>
            <div class="SearchedZoneAdd">
            	<input name="btnSearch" type="button" value="ADD" class="btnSearch1"/> 
            </div>
            <div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            
            <div class="SearchedZoneName">
            	<a>Crashers </a>
            </div>
            <div class="SearchedZoneAdd">
            	<input name="btnSearch" type="button" value="ADD" class="btnSearch1"/> 
            </div>
            <div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedZoneName">
            	<a>Dudes </a>
            </div>
            <div class="SearchedZoneAdd">
            	<input name="btnSearch" type="button" value="ADD" class="btnSearch1"/> 
            </div>
            <div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedZoneName">
            	<a>Crazy Queens </a>
            </div>
             <div class="SearchedZoneAdd">
            	<input name="btnSearch" type="button" value="ADD" class="btnSearch1"/> 
            </div>--->
            <hr class="editH" />
            
   			
</div>
	   <div id="d"></div>
       </form>
       
        
        <!--Middle finish-->
        
</body>
</html>

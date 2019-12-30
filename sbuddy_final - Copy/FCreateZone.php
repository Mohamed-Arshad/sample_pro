<?php
session_start();
	if(!isset($_SESSION["email"])){
	header('Location:signup.php');
	}

	
	if(isset($_POST["logout"])){
		session_destroy();
		header('Location:signup.php');
	}
/*if(isset($_POST["logout"])){
		session_destroy();
		header('Location:signup.php');
	}*/

	$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	if(isset($_POST["btnCreateZone"]))
	{
		$zName=$_POST["txtFirstName"];
		//$img = $_FILES['fileImage'];
		/*$path='uploads/';
		
		$img = $_FILES['fileImage']['name'];
		$tmp = $_FILES['fileImage']['tmp_name'];
		
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		$final_image = rand(1000,1000000).$img;
		
		
		$path = $path.strtolower($final_image); */
			
		$image="uploads/".basename($_FILES["fileImage"]["name"]);
		move_uploaded_file($_FILES["fileImage"]["tmp_name"],$image);
		/*$image="uploads/".basename($_FILES["fileImage"]["name"]);
				move_uploaded_file($_FILES["fileImage"]["tmp_name"],$image);*/
		/*$mem=$_POST["btnSearch"];*/
		
		//Getting members id
		$names=$_POST["mem"];
		$test = explode(',',$names);
		
		
		$length=count($test);
		/*echo "a";
		echo $length;
		echo $test[0];
		echo $test[1];
		echo $test[2];
		echo $test[3];
		echo $length;*/
		
		$id="";
		for($i=1;$i<$length;$i++)
		{
			${'name' . $i} = explode(' ',$test[$i]);
			/*echo ${'name' . $i}[0];
			echo ${'name' . $i}[1];
			echo ${'name' . $i}[2];
			echo ${'name' . $i}[3];*/
			
			
			
			${'filter' . $i} = ['$and'=>[['fname'=> ${'name' . $i}[1] ],['lname' => ${'name' . $i}[3]] ]];
		
    		${'query' . $i} = new MongoDB\Driver\Query(${'filter' . $i});     
    		${'result' . $i} = $con->executeQuery("sbuddy.users",${'query' . $i});
    	
			//${'result' . $i} = current(${'result' . $i}->toArray());
			foreach(${'result' . $i} as ${'row' . $i})
			{ 
				
				$id.=${'row' . $i}->email.",";
			}
			//$id.=${'result' . $i}.", ";
			
			
		
			$name=" ";
			
		}
		//echo $id;
		//////
		if(isset($_POST["rdoBtn1"])){
					$Type="Open";
				}	
		if(isset($_POST["rdoBtn2"])){
					$Type="Close";
				}	
				//$target_dir = "uploads/";
				//$target_file = $target_dir . basename($_FILES["fileImage"]["name"]);
/*$tag = $_REQUEST['username'];
$m = new MongoClient();   
$db = $m->test;      //mongo db name
$collection = $db->storeUpload; //collection name

//-----------converting into mongobinary data----------------

$document = array( "user_name" => $tag,"image"=>new MongoBinData(file_get_contents($target_file)));

//-----------------------------------------------------------
if($collection->save($document)) // saving into collection*/

				
		$bulk = new MongoDB\Driver\BulkWrite; 
		$IDD=new MongoDB\BSON\ObjectID;
    	$doc = ['_id' => $IDD, 'zName' => $zName, 'type' => $Type,'image'=>$image,'members'=>$id ,'Admin'=>$_SESSION['email']];
    	$bulk->insert($doc);
    	$con->executeBulkWrite('sbuddy.zone', $bulk);	
		
		$pb='sBuddy';
		$pd='Thanks For creating zone';
		$img='iconsImg/sb.PNG';
		$bulk = new MongoDB\Driver\BulkWrite; 
		$postID=new MongoDB\BSON\ObjectID;
    	$doc = ['_id' => $postID, 'postBy' => $pb,'postDes'=>$pd, 'posterImg' => $img,'postImage'=>'uploads/','postZone'=>$zName];
    	$bulk->insert($doc);
    	$con->executeBulkWrite('sbuddy.post', $bulk);
			
		//$_SESSION["idZone"]=$IDD;
		//$_SESSION["Zone"]=true;	
		//header('Location:FZone.php');
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSSZone.css" />
<script src="jquery-3.3.1.min.js"></script>
<title> Create Zone</title>

<script type="text/javascript" language="javascript">

	function getMembers()
	{	
		var name1=document.getElementById("txtMembers").value;
		
		$(document).ready(
				function(){
					
							$.ajax({
								
										url:"searchMember.php",
										method:"POST",
										data:{fname:name1},
										success: function(data){
												$('#add').html(data);
												
										}
							});
			}); 
	}
	
	
	function validateName()
	{
				var nam=document.getElementById("txtName").value;
				
				$(document).ready(
				function(){
					
							$.ajax({
								
										url:"validateName.php",
										method:"POST",
										data:{zName:nam},
										success: function(data){
												$('#view').html(data);
										}
							});
			}); 

	}
	
	/*function validFname(){
		var name=document.getElementById("txtName").value;
		if(name==null)
		{
			alert("Fill the name");	
		}
	}
	/*function validmem(){
		var name=document.getElementById("me").value;
		if(name==null)
		{
			alert("Fill the name");	
		}
	}*/
	
	/*function validate()
	{
		if(validFname() && validmem())
		{
		}
		else
		{
			alert("Fill the blanks");
			event.preventDefault();
		}
		
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
  
   
 <form name="CreateZoneForm" method="post" enctype="multipart/form-data">
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
				 <li1><a href="FMyZoneList.php" class="lo" ><img src="iconsImg/myZone.png" width="30" height="30"/></a><a href="FMyZoneList.php" class="a"> My Zone</a></li>
                 <li1><a href=""class="lo" ><img src="iconsImg/createZone.png" width="30" height="30" /></a><a  class="a">Create Zone</a></li>	  
                 <li1><a href="FSearchZone.php" class="lo" ><img src="iconsImg/searchZone.png" width="30" height="30" /></a><a href="FSearchZone.php" class="a">Search Zone</a></li>	  
            </ul1>
       	</div>
        </div>
        <!--Side Part finish-->
        
        <!--Middle-->
        
        <form name="CreateZoneForm" method="post" enctype="multipart/form-data">
       	<div class="createe" >
        <div class="ZoneName"><a>Create Zone</a></div>
        <hr class="editH">
        <div class="k">
       			 <table width="600" border="0" align="center" class="k">
  <tr>
    <td height="30"><b>Name</b></td>
    <td width="400"><input name="txtFirstName" id="txtName" type="text"  width="500" class="aa" onkeyup="validateName()"/></td>
    <td class="vi"><div class="vi" id="view"><a></a></div></td>
  </tr>
  <tr>
  <td><b>Image</b></td>
    <td><input name="fileImage" type="file" /></td>
  </tr>
  <tr>
    <td height="30"><b>Members<b></td>
    <td><label for="txtMembers"></label>
      <input type="text" name="txtMembers" id="txtMembers" class="aa" onkeyup="getMembers()"/></td>
      <td><input name="btnSearch" type="button" value="Search" class="btnSearch1"/> </td>
  </tr>
  <tr>
    <td></td>
    <td>
    <!-- Added members-->
    	<div class="AddedMember" id="AddedMembers">
        	<textarea name="mem" cols="32" rows="1" id="mem"></textarea>
            
        </div>
    </td>
  </tr>
  
  <tr>
  <td></td>
    <td>
    	<div class="addMem" id="add">
        	<!--add member will be display here-->
            <!--<div class="SearchedBuddyImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedBuddyName">
            	<a>Albert</a>
            </div>
            <div class="SearchedBuddyAdd">
            	<input name="btnSearch" type="button" value="ADD" class="btnSearch1"/> 
            </div>
            <div class="SearchedBuddyImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedBuddyName">
            	<a>mosat</a>
            </div>
            <div class="SearchedBuddyAdd">
            	<input name="btnSearch" type="button" value="ADD" class="btnSearch1"/> 
            </div>
            <div class="SearchedBuddyImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedBuddyName">
            	<a>Akeel</a>
            </div>
            <div class="SearchedBuddyAdd">
            	<input name="btnSearch" type="button" value="ADD" class="btnSearch1"/> 
            </div>
        </div>-->
        <hr />
        <div class="memberList" id="memberList">
        </div>
    </td>
  </tr>
  <!--<tr >
  <td class="freeSpace"></td>
    <td>
    </td>
  </tr>--->
  
  <tr>
  <td class="zoneType"><b><a class="zoneType">Zone Type</a></b></td>
    <td>
    	<input id="rdoBtnOpen" name="rdoBtn1" type="radio" value="Open" />Open
    	<input id="rdoBtnClose" name="rdoBtn2" type="radio" value="Closed" />Closed</td>
  </tr>
  </table>
                
      		 </div>
       <input name="btnCreateZone" type="submit" value="Create Zone" class="createButton" "/>

       	<hr class="editH">
     	</div>
        </form>
       
       
        
        <!--Middle finish-->
        
</body>
</html>
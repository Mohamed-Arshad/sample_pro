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
	//$filter="";
	//if($_SESSION["zlist"])
	//{
		//$id=$_SESSION["name"];
		//$filter = [ 'zName' => $id ];	
	//}else
	//if($_SESSION["Zone"]==false)
//	{
		$id=$_SESSION["unit"];
		echo $id;
		//echo $id;
		$filter = [ 'zName' => $id ];
	//$id=$_SESSION["name"];
	//echo $id1;
	
	//$filter = [ '_id' => $id ];
	//$filter = [ 'zName' => $id ];
	$query = new MongoDB\Driver\Query($filter);     
	$res = $con->executeQuery("sbuddy.zone", $query);
	$val = current($res->toArray());
	
	
	$ids=$val->members;
	/*}else
	{
		$name=$_SESSION["idone"];
		//echo $id;
		$filter = [ '_id' => $name ];
	//$id=$_SESSION["name"];
	//echo $id1;
	
	//$filter = [ '_id' => $id ];
	//$filter = [ 'zName' => $id ];
	$query = new MongoDB\Driver\Query($filter);     
	$res = $con->executeQuery("sbuddy.zone", $query);
	
	$val = current($res->toArray());
	/*foreach($res as $row)
	{
		$ids=$row>members;
	}
		$ids=$val>members;
	}*/
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSSZone.css" />
<title>Zone</title>

<script language="javascript" type="text/javascript">
	
	function changePage()
	{
		
		if(true)
		//window.location='http://localhost/project%20ppa/FMyZone.php';
			//{window.location.href = 'www.google.com';}
	}

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
				 <li1><a href="FMyZone.php" class="lo" ><img src="iconsImg/myZone.png" width="30" height="30"/></a><a href="FMyZone.php" class="a"> My Zone</a></li>
                 <li1><a href="FCreateZone.php" class="lo" ><img src="iconsImg/createZone.png" width="30" height="30" /></a><a href="FCreateZone.php" class="a">Create Zone</a></li>	  
                 <li1><a href="FSearchZone.php" class="lo" ><img src="iconsImg/searchZone.png" width="30" height="30" /></a><a href="FSearchZone.php" class="a">Search Zone</a></li>	  
            </ul1>
       	</div>
        </div>
        <!--Side Part finish-->
        
        <!--Middle-->
        
        
       	<div class="posts" >
        <div class="ZoneName"><a href="FMyZone.php" class="ZoneName" onclick="changePage()"><?php echo $val->zName;?></a>
        						<li5 style="float:right"><a href="" onclick="leave()"><img src="iconsImg/leave.png" width="30" height="30"/></a></li5>					
        </div>
        <hr class="editH">
        	<div class="ZoneImg">
        		<a href=""><img src="<?php echo "uploads/".$val->image;?>" height="150" width="150"/></a>
       		</div>
            <hr class="editH">
            
            <div class="ZonesList">
            <?php
           		$test = explode(',',$ids);
				/*echo "a";
				echo $test[0]." ";
				echo $test[1]." ";
				echo $test[2]." ";
				echo $test[3]." ";
				
				echo "a";*/
				$length=count($test);
				
				
				for($i=0;$i<$length-1;$i++)
				{
			//for($j=$length-1;$j>=1;$j--)
			//{     
					/*echo $test[$i];
					${'filter' . $i}= ['_id'=> $test[$i]];
		
    				${'query' . $i} = new MongoDB\Driver\Query(${'filter' . $i});     
    				${'result' . $i} = $con->executeQuery("sbuddy.users",${'query' . $i});
    	
					${'result' . $i} = current(${'result' . $i}->toArray());
					//foreach(${'result' . $i} as $row)
					//{		
					echo "aaqqq";
			//}
		
			
       		echo "<div class='SearchedZoneImg'>
            	<a><img src='uploads/'.${'result' . $i}->image/><a>
            </div>
            <div class='SearchedZoneName'>
            	<a>${'result' . $i}->fname ${'result' . $i}->lname</a>
            </div>
            <div class='SearchedBuddyAdd'>
            	<input name='btnSearch' type='button' value='Remove' class='btnSearch1'/> 
            </div>";*/
					
					$filter= ['email'=> $test[$i]];
		
    				$query = new MongoDB\Driver\Query($filter);     
    				$result= $con->executeQuery("sbuddy.users",$query);
    	
					$resul = current($result->toArray());
					//foreach($result as $row)
					//{		
					
			//}
		
			
       		echo "<div class='SearchedZoneImg'>
            	<a><img src='$resul->propic width='50px' height='40px'/><a>
            </div>
            <div class='SearchedZoneName'>
            	<a>$resul->fname $resul->lname</a>
            </div>
            <div class='SearchedBuddyAdd'>
            	<input name='btnSearch' type='button' value='Remove' class='btnSearch1'/> 
            </div>";
				//}
				
				}
			?>
           
            <!--<div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedZoneName">
            	<a>Arshad </a>
            </div>
            <div class="SearchedBuddyAdd">
            	<input name="btnSearch" type="button" value="Remove" class="btnSearch1"/> 
            </div>
            
            <div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            
            <div class="SearchedZoneName">
            	<a>Naveed </a>
            </div>
            <div class="SearchedBuddyAdd">
            	<input name="btnSearch" type="button" value="Remove" class="btnSearch1"/> 
            </div>
            
            <div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedZoneName">
            	<a>Nusly </a>
            </div>
            <div class="SearchedBuddyAdd">
            	<input name="btnSearch" type="button" value="Remove" class="btnSearch1"/> 
            </div>
            
            <div class="SearchedZoneImg">
            	<a><img src="" /><a>
            </div>
            <div class="SearchedZoneName">
            	<a>Haris </a>
            </div>
            <div class="SearchedBuddyAdd">
            	<input name="btnSearch" type="button" value="Remove" class="btnSearch1"/> 
            </div>-->
             
              			
    		</div>
        
        
         <hr class="editH">
        
        
        
        </form>
        
        
        <!--Middle finish-->
        
</body>
</html>

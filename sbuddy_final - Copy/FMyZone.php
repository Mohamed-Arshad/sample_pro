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
	

	if(isset($_POST["btnPost"]))
	{
		$filter = [ 'email' => $email ];
		$query = new MongoDB\Driver\Query($filter);     
		$res = $con->executeQuery("sbuddy.users", $query);
	
		$val = current($res->toArray());
	
		$fname=$val->fname;
		$lname=$val->lname;
		$pic='uploads/'.$val->propic;
	
		$des=$_POST['txtPostArea'];
		
		$image="uploads/".basename($_FILES["fileImage"]["name"]);
		move_uploaded_file($_FILES["fileImage"]["tmp_name"],$image);
		
		$id=$_SESSION["idZone"];
		$filter = [ '_id' => $id ];
		$query = new MongoDB\Driver\Query($filter);     
		$res = $con->executeQuery("sbuddy.zone", $query);
		$val = current($res->toArray());
	
		$zname=$val->zName;
		
		$pName=$fname." ".$lname;
		
		$bulk = new MongoDB\Driver\BulkWrite; 
		$postID=new MongoDB\BSON\ObjectID;
    	$doc = ['_id' => $postID, 'postBy' => $pName,'postDes'=>$des, 'posterImg' => $pic,'postImage'=>$image,'postZone'=>$zname];
    	$bulk->insert($doc);
    	$con->executeBulkWrite('sbuddy.post', $bulk);	
		
	}
	
	
		$id=$_SESSION["idZone"];
		$filter = [ '_id' => $id ];
		$query = new MongoDB\Driver\Query($filter);     
		$res = $con->executeQuery("sbuddy.zone", $query);
		$val = current($res->toArray());
	
		$zname=$val->zName;
	
	
	
	
	
	
	
	
	
	


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSSZone.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>MyZone</title>


<script language="javascript" type="text/javascript">
	function as()
	{
		alert("as");
	}
	
	function leave()
	{
		alert ("Are you sure you want to leave from the zone");
	}
	
	function loaderFun() {
  		var x = document.getElementById("loader");
  			if (x.style.display === "none") {
    			x.style.display = "block";
  			} else {
   				x.style.display = "none";
  		    }
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
  
   
 <form name="posting" method="post" enctype="multipart/form-data">
    	<div class="bar">
  
        <table align="center">
        <tr>
        <td>
        <div class="enq">
        	<ul>
				  <li>
                 <!-- <div class="scene">
                  <div class="box">
                  <div class="front face">  -->  
                  <a  href="" class="active lo" ><img src="iconsImg/zone.png" width="30" height="30" /></a>
                  <!--</div>
                  <div class="right face">
                  <p>ZoNe</p> 
                  </div>
                  
                  
                  
                  </div>
                  </div>-->
                  
                  </li>
                  
                  
                  
                  
                  <li><a href="FMyZoneList.php" class="lo" ><img src="iconsImg/buddyList.png" width="30" height="30" /></a></li>
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
                 <li1><a href="FCreateZone.php" class="lo" ><img src="iconsImg/createZone.png" width="30" height="30" /></a><a href="FCreateZone.php" class="a">Create Zone</a></li>	  
                 <li1><a href="FSearchZone.php" class="lo" ><img src="iconsImg/searchZone.png" width="30" height="30" /></a><a href="FSearchZone.php" class="a">Search Zone</a></li>	  
            </ul1>
       	</div>
        </div>
        <!--Side Part finish-->
        
        <!--Middle-->
        
        
       	<div class="postss" >
        <div class="ZoneName"><a href="FZone.php" class="ZoneName"><?php echo $val->zName;?></a>
        						<li5 style="float:right"><a href="" onclick="leave()"><img src="iconsImg/leave.png" width="30" height="30"/></a></li5> 
                               	
        </div>
        <hr />		
        <div class="postCreate">
       	  <a><textarea name="txtPostArea" cols="80" rows="3" class="postTxtArea"></textarea></a>
            
            <hr class="editH" />
            <a><input name="Image" type="image" src="iconsImg/postImage.png" width="40" height="20" border="0" class="y"/></a>
           <a> <input name="Video" type="image" value="video" src="iconsImg/postVideo.png" width="40" height="20" /></a>
           <a> <input name="File" type="image" src="iconsImg/postFile.png" width="40" height="20" border="0" /></a>
            <a><input name="fileImage" type="file" /></a>	
        </div>
        <div class="postBtn">
        	<input name="btnPost" type="submit" value="POST" class="btnPost"/>
        </div>
        
        
        <form name="postFeedback">
        <hr class="editH">
        <div class="k">
        <?php
			
			$filter = ['postZone' => $zname ];
			$query = new MongoDB\Driver\Query($filter);     
			$res = $con->executeQuery("sbuddy.post", $query);
			
			//$re = current($res->toArray());
			
			$i=0;
			
			foreach($res as $row)
			{
				$arr[$i]=$row;
				$i++;
			}
				foreach(array_reverse($arr) as $row)
				{
				$by=$row->postBy;
				
				$filter = ['email' => $by ];
				$query = new MongoDB\Driver\Query($filter);     
				$resu = $con->executeQuery("sbuddy.users", $query);
				
				/*foreach($resu as $rowu)
				{*/
				
        		
        
       		/*<div class="post-box">
       			<div class="poster-box-image-box">
       				 <img src="" />
       			</div>
        		<div class="poster-name">Team DD</div>
        		<span class="hour">1hr ago</span>
        		<div class="postDes">we are announcing that we are going to host a new website name sBuddy, which will  be useful to students to immitate.
        		</div> 
        		<hr />
        		<ul3>
        			<li3><a class="likeB">
                     <i class="fa fa-thumbs-up" style="font-size:48px;color:white" onclick=""></i>
                     </a></li3>
            		<li3><a class="commentB">Comment</a></li3>
            		<li3><a class="shareB">Share</a></li3>
          		</ul3>
        		<hr />
        		<div class="txtAreaComment">
        	
            		<table>
        			<tr>
        			<td>
        			<ul4>
        				<li4><textarea name="txtAreaComment" cols="55" rows="2"></textarea></li4>
                    </ul4>
        			</td>
        			
                    <td>
                    	<ul4>
        				<li4><input type="submit" name="btnAdd" id="btnAdd" value="ADD" class="btnadd"/></li4>
                        </ul4>
       				</td>
       				</tr>
       				</table>
       			
         		</div>
         		<hr />
         			<table width="300"	 border="0">
  						<tr>
    					<td rowspan="2" width="60">
    					<div class="commenterImg">
   							 <img src="20171108_123025.jpg" class="commenterImg"/>
    					</div>    
    					</td>
    
    					<td > <div class="commenterName"> Jolly Dolly </div> </td>
    					<td> <div class="Commenttime"> 1hr ago </div> </td>
  						</tr>
  						
                        <tr>
    					<td><div class="commentt"> waw nice </div> </td>
   						<td>&nbsp;</td>
   						</tr>
  
					</table>
       			<hr />
          		</div>
                </div>*/
				
                
               /* <!-- Post with image-->*/
			   if($row->postImage=='uploads/')
			   {
				 echo " <div class='post-box--wrapper'>
       			<div class='post-box'>
       			<div class='poster-box-image-box'>
       				<a> <img src='$row->posterImg' height='70' width='70' /></a>
       			</div>
        		<div class='poster-name'>$row->postBy</div>
				
        		
        		<div class='postDes'>$row->postDes
        		</div>
         
        		<hr />
        		</div>
				</div>";  
			   }else
			   {
               echo " <div class='post-box--wrapper'>
       			<div class='post-box'>
       			<div class='poster-box-image-box'>
       				<a> <img src='$row->posterImg' height='70' width='70' /></a>
       			</div>
        		<div class='poster-name'>$row->postBy</div>
				
        		
        		<div class='postDes'>$row->postDes
        		</div>
                <div class='postIm'>
                	<img src='$row->postImage' class='postImg'/>
    			</div> 
        		<hr />
        		</div>
				</div>";
			   }
			}
				?>
        			<!--<li3><a class="likeB">
                    <i class="fa fa-thumbs-up" style="font-size:48px;color:white" onclick="as()"></i>
                    </a></li3>
            		<li3><a class="commentB">Comment</a></li3>
            		<li3><a class="shareB">Share</a></li3>
          		</ul3>
        		<hr />
        		<div class="txtAreaComment">
        	
            		<table>
        			<tr>
        			<td>
        			<ul4>
        				<li4><textarea name="txtAreaComment" cols="55" rows="2"></textarea></li4>
                    </ul4>
        			</td>
        			
                    <td>
                    	<ul4>
        				<li4><input type="submit" name="btnAdd" id="btnAdd" value="ADD" class="btnadd"/></li4>
                        </ul4>
       				</td>
       				</tr>
       				</table>
       			
         		</div>
         		<hr />
         			<table width="300"	 border="0">
  						<tr>
    					<td rowspan="2" width="60">
    					<div class="commnterImg">
   							 <img src="20171108_123025.jpg" class="commenterImg"/>
    					</div>    
    					</td>
    
    					<td > <div class="commenterName"> Jolly Dolly </div> </td>
    					<td> <div class="Commenttime"> 1hr ago </div> </td>
  						</tr>
  						
                        <tr>
    					<td><div class="commentt"> waw nice </div> </td>
   						<td>&nbsp;</td>
   						</tr>
  
					</table>
       			<hr />
                
          		</div> 
                <div class="seemore">
                <a onclick="loaderFun()" >see more</a>
                </div>
           <div class="loader" id="loader">
        	<div class="dot d1"></div>
            <div class="dot d2"></div>
            <div class="dot d3"></div>
            <div class="dot d4"></div>
            <div class="dot d5"></div>
           </div>
            
          </div>
		  
        <!--- post with image Finish-->
        
       	
        
      	<hr class="down">	
        </form>
        </td>
        </tr>
        </table>
        <!--Middle finish-->
        
</body>
</html>

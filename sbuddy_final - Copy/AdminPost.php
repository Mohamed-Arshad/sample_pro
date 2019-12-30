<?php 
	if(isset($_POST["AbtnPost"])){//getting data
		$data=$_POST["txtAreaPost1"];
		$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");//connecting
		$bulk = new MongoDB\Driver\BulkWrite; 
		
		$doc = ['_id' => new MongoDB\BSON\ObjectID, 'data' => $data, 'type' => 'text'];
		$image =pathinfo($_FILES["fileImage1"]["name"], PATHINFO_EXTENSION);
			if($image!=NULL){
				$no = count(glob("Images/"."*"));
				$no=$no+1;
				$image ="Images/".$no.".".pathinfo($_FILES["fileImage1"]["name"], PATHINFO_EXTENSION);
				move_uploaded_file($_FILES["fileImage1"]["tmp_name"],$image);
				$doc = ['_id' => new MongoDB\BSON\ObjectID, 'data' => $data, 'type' => 'image', 'image' => $no.".JPG"];	
			}
    	$bulk->insert($doc);
    	$con->executeBulkWrite('sbuddy.AdminPost', $bulk);
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSSAdmin.css" />
<title>Admin Post</title>
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
    
    
    <div class="bar1">
  
        <table align="center" >
        <tr>
        <td>
        	<div class="enq1">
        	<ul>
				  <li><a href="" >Profile</a></li>
                  <li><a href=""  class="active">Post</a></li>
                  <li><a href="viewComplain.php">Inquiry</a></li>
                  <li><a href="userreport.php">User Report</a></li>
                  <li><a href="zoneReport.php">Zone Report</a></li>
                  <li style="float:right"><a href="" class="lo">LOG</a></li>
                  
			</ul>
            </div>
         </td>
         </tr>
         </table>
    </div> 
       
       
       
       
      
      <table  width="1500" align="center">
       <tr>
       <td>
       <div class="posts" >
   		 <div class="createPost">
          		<div class="txtbox">
                <form method="post" enctype="multipart/form-data" id="signform">
                	<textarea name="txtAreaPost1" rows="6" class="txtbox"></textarea> 
                    </br>upload photo
                    <input type="file" name="fileImage1" id="fileImage1"/>
                    <div class="txtButton">
                	<input name="AbtnPost" type="submit" value="POST" class="txtButton"/>
                </div>
                    </form>
                </div>
            </div>
            
            <hr class="line"/>
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
                </div>
            
         </div>  
         </td>
       </tr>
       </table>
            
      
       
       
</body>


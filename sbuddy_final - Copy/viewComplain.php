<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>view complain</title>
<link rel="stylesheet" href="CSSAdmin.css" />
</head>

<body>
    <div class="bar1">
  
        <table align="center" >
        <tr>
        <td>
        	<div class="enq1">
        	<ul>
				  <li><a href="" >Profile</a></li>
                  <li><a href="AdminPost.php" >Post</a></li>
                  <li><a href="" class="active">Inquiry</a></li>
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
    <div class="posts">
	<?php
	$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
						$query = new MongoDB\Driver\Query([]);     
    					$res = $con->executeQuery("sbuddy.complain", $query);
						$i=0;
						foreach($res as $row){
							$arr[$i]=$row;
							$i++;
							}
						foreach(array_reverse($arr) as $row){
							if($row->type=="text"){
								echo "<div class='data'>$row->data</div>"."<hr>";
								}else{
									$pic=$row->image;
									echo "<img src='Images/$pic' height='200' width='250' align='middle'>"."<br>";
									echo "<div class='data'>$row->data</div>"."<hr>";
									}
							}
	?>
    </div></td></tr></table>
</body>
</html>
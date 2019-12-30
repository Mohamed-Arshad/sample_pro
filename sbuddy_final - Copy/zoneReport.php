<?php
	$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<h1 align="center"> Report</h1>

	<table border="0" align="center">
    	<tr>
        	<td>Number of Zones :  </td>
            <td>
            	<?php 
				$query = new MongoDB\Driver\Query([]);     
    			$res = $con->executeQuery("sbuddy.zone", $query);
				$count=0;
				
				
				/*$cou=0;
	$i=0;
	foreach($res as $temp){
		$arr[$i]=$temp;
		$i++;
	}*/
	
	foreach($res as $temp)
	{
		$count++;
		/*$name=$temp->zName;
		$admin=$temp->Admin;
		/*$max=0;
		$min=100;
		foreach($arr as $temp)
		{
				
				if($temp->Admin==$admin)
					$cou++;
				
		}
		if($cou>$max){
			$max=$cou;
			$maxname=$temp->Admin;
		}*/
		/*if($cou<$min){
			$min=$cou;
			$minname=$temp->Admin;
		}
			echo "</br>";
			echo $min;
			echo "</br>";
			echo $max;*/	
				
	}
		/*$filter = [ 'email' =>  $maxname];
		$query = new MongoDB\Driver\Query($filter);     
    	$result = $con->executeQuery("sbuddy.users", $query);
		
		$val = current($result->toArray());
		
		$name2=$val->fname." ".$val->lname;
		////////////////
	/*$filter = [ 'email' =>  $minname];
		$query = new MongoDB\Driver\Query($filter);     
    	$result = $con->executeQuery("sbuddy.users", $query);
		
		$val = current($result->toArray());
		
		$name3=$val->fname." ".$val->lname;*/
				echo $count; 
				
				
	?>
            
            
        </tr>
    </table>
	
    
    <table border="1" align="center" width="600">
    	<tr>
        	<td><b>Zone Name</b></td>
            <td><b>Admin</b></td>
            <td><b>Number of Members</b></td>
            <td><b>Number of Posts</b></td>
        </tr>
        
        
     <?php
	$query = new MongoDB\Driver\Query([]);     
    $res = $con->executeQuery("sbuddy.zone", $query);
	
	/*$cou=0;
	$i=0;
	foreach($res as $temp){
		$arr[$i]=$temp;
		$i++;
	}*/
	
	foreach($res as $temp)
	{
		$name=$temp->zName;
		$admin=$temp->Admin;
		//$max=0;
		/*foreach($arr as $temp)
		{
				
				if($temp->Admin==$admin)
					$cou++;
				
		}
		if($cou>$max){
			$max=$cou;
			$maxname=$temp->Admin;
		}*/
		//echo $max;
		
		
		$mem=$temp->members;
	
		$nMem= explode(',',$mem);
		$length=count($nMem)-1;
		//finding max
		/*$filter = [ 'email' =>  $maxname];
		$query = new MongoDB\Driver\Query($filter);     
    	$result = $con->executeQuery("sbuddy.users", $query);
		
		$val = current($result->toArray());
		
		$name2=$val->fname." ".$val->lname;*/
		//echo $name1;
		///////////////
		$filter = [ 'email' =>  $admin];
		$query = new MongoDB\Driver\Query($filter);     
    	$result = $con->executeQuery("sbuddy.users", $query);
		
		$val = current($result->toArray());
		
		$name1=$val->fname." ".$val->lname;	
			
		echo "<tr><td > $name </td>
					<td> $name1 </td>
					<td align='center'> $length </td>
		";
		
		$filter = [ 'postZone' =>  $name];
		$query = new MongoDB\Driver\Query($filter);     
    	$result = $con->executeQuery("sbuddy.post", $query);
		$count=0;
		
		foreach($result as $row)
		{
				$count++;
		}
		echo "<td align='center'> $count </td></tr>";

	}
	
	?>
    
		
            
    	
    </table>
</body>
</html>

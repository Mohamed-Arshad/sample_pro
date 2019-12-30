<?php 
$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		

		$name1=$_POST["zName"];
		//$name2=$_POST["lname"];
		
    	$filter = [ 'zName' =>  $name1 ]; 
		//$filter = ['$and'=>[[ 'fname' => $name1 ],['lname' => $name2]]];
		
    	$query = new MongoDB\Driver\Query($filter);     
    	$result = $con->executeQuery("sbuddy.zone", $query);
    	//$val = current($result->toArray());
    	
		
		//echo $resul->fname;
    	foreach($result as $row)
		{
			
			//echo $val->fname;
			
			//echo $val->lname;
			echo "<div id='view'><a>name already exist</a></div>";
		}
		
?>
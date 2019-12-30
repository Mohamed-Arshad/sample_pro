<?php 
$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		

		$name1=$_POST["fname"];
		//$name2=$_POST["lname"];
		
    	$filter = [ 'fname' =>  $name1 ]; 
		//$filter = ['$and'=>[[ 'fname' => $name1 ],['lname' => $name2]]];
		
    	$query = new MongoDB\Driver\Query($filter);     
    	$result = $con->executeQuery("sbuddy.users", $query);
    	//$val = current($result->toArray());
    	
		$count=0;
		//echo $resul->fname;
    	foreach($result as $row)
		{
			$conut++;
			//echo $val->fname;
			echo $name1;
			//echo $val->lname;
			echo "<div class='SearchedBuddyImg'>
            	<a><img src='' /><a>
            </div>
            <div class='SearchedBuddyName'>
            	<a> $row->fname $row->lname</a>
            </div>
            
			";
		}
		
?>
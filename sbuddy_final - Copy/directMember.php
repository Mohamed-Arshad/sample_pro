
<?php 
	session_start();
		$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		

		$zname=$_POST["name"];
		
		echo $zname;
		//$_SESSION["idone"]=$zname;
		
		//echo $_SESSION["idone"]=$zname;
		
		$filter = [ 'zName' =>  $zname ]; 
    	$query = new MongoDB\Driver\Query($filter);     
    	$result = $con->executeQuery("sbuddy.zone", $query);
    	
		$resul = current($result->toArray());
		
		$id=$resul->_id;
		//$_SESSION["idone"]=$id;
		//$_SESSION["Zone"]=true;
		
		
		
		
		
		
		
		
		
		
		
		//print_r $result;
		//$resul = current($result->toArray());
    	/*foreach($result as $row)
		{
			echo "$resupe";
			echo "$resupe";
			//echo $val->_id;
			echo "<div class='SearchedBuddyImg'>
            	<a>
            </div>
            <div class='SearchedBuddyName'>
            	<a > $resul->zName</a>
            </div>	";
           
		   echo "ivecsfs";
			
			//$_SESSION["idZone"]=$result->_id;
			
			//header('Location:FZone.php');	
		}*/
		
		
?>

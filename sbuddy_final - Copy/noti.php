<?php
 
	
		//$filter=[],['sort'=>['time'=>-1]];
		$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$query = new MongoDB\Driver\Query([]);     
    	$result = $con->executeQuery("sbuddy.post", $query);//qurey select all posts
        /*$db = $c->sbuddy;
        $collection = $db->posts;
        $sel = $collection->find();
		$db.$collection.aggregate({$sort : {time : -1}});*/
		
		

        foreach($result as $tmp){
		//echo $tmp->user." posted a ".$tmp->post_t." at ".$tmp->time."<br>";
			//}
			$mail=$tmp->postBy;
			$query = new MongoDB\Driver\Query(['mail'=>"$mail"]);     
    		$res = $con->executeQuery("sbuddy.users", $query);
			
			
        echo "<div class='not'>
            	<div class='NotificationImg'>
            	<a><img src='$tmp->posterImg' height='50' width='50' /></a>
            </div>
            <div class='NotificationDef'>
            	<a>$tmp->postBy
				 Posted on  $tmp->postZone </a>
           
            </div></div>";
			}
		
	
	?>
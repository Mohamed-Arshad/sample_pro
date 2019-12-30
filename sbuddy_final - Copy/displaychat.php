<?php
session_start();
$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");

			$name1 = $_SESSION["email"];
			$name2 = $_POST["r_name"];

$bulk = new MongoDB\Driver\Query([]);
$row=$con->executeQuery('sbuddy.chat', $bulk);
			foreach($row as $temp){
				if($temp->s_name==$name1 && $temp->r_name==$name2){
				echo $temp->sname." - ";
				echo $temp->message."<br>";
				}else if($temp->s_name==$name2 && $temp->r_name==$name1){
					echo $temp->sname." - ";
					echo $temp->message."<br>";
					}
				}

		?>
		
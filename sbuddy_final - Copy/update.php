<?php
	$email=$_POST["email"];
	$data1=$_POST["data1"];
	$tname=$_POST["tname"];
	
	$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$bulk = new MongoDB\Driver\BulkWrite;
	$bulk->update(['email' => $email], ['$set' => [$tname => $data1]]);
	$con->executeBulkWrite('sbuddy.users', $bulk);
?>

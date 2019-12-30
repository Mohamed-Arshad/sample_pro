<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
		$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		if(!$con)
			{
				die("Cannot connect to DB server");
		}
		$email=$_POST["txt_email"];
    	$filter = ['$and'=>[[ 'email' => $email ],['valid' => 1]]]; 
    	$query = new MongoDB\Driver\Query($filter);     
    	$res = $con->executeQuery("sbuddy.users", $query);
    	$res = current($res->toArray());
    
    	if (!empty($res)) {
			echo '*The Email you entered is already exists';
    	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>verify email</title>
</head>
<body>
</body>
</html>
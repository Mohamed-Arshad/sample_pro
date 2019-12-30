<?php
	$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>report</title>
</head>

<body>
<h1 align="center"> Weekly Complain Report</h1>
<table border="0" align="center"><tr><td>No.of complains : 
	<?php 
	$query = new MongoDB\Driver\Query([]);     
    $res = $con->executeQuery("sbuddy.complain", $query);
	$count=0;
	$string = date("d.m.y");
 	$day = DateTime::createFromFormat("d.m.y", $string);
 	$day = "-".$day->format("d")." days";
	$start=date("d.m.y", strtotime("$day", strtotime($string)));
	echo $start."<br>";
	foreach($res as $temp){
		echo $temp->date."<br>";
		$dom=date($temp->date);
		echo $dom;
		$interval = date_diff($start, $dom);
		echo $interval->format('%R%a days')."<br>";
		if($dom > $start){
			$count++;
		}
	}
	echo $count."<br>";
	//if("20" > $start){
		//	echo "done";
		//} 
	?></td></tr></table>
<h2 align="center">User Dettails</h2>
<?php
	$query = new MongoDB\Driver\Query([]);     
    $res = $con->executeQuery("sbuddy.users", $query);
	echo "<table align='center' border='1'><tr align='center'><td>First Name</td><td>Last Name</td><td>Email</td>
	<td>Contact No</td><td>NIC</td><td>Address</td><td>Gender</td><td>Date of Birth</td><td>Pro pic</td></tr>";
	foreach($res as $row){
		echo "<tr align='center'><td> $row->fname </td><td> $row->lname </td><td> $row->email </td>
		<td> $row->telno </td><td> $row->nic </td><td> $row->address </td><td> $row->gender </td>
		<td> $row->dob </td><td> <img src='Images/$row->propic' height='100' width='100'></td></tr>";
		}
		echo "</table>";
?>
</body>
</html>
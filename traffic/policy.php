<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recent Accidents</title>
<link rel="stylesheet" href="policy.css" type="text/css" />
</head>

<body>
<h1>Recent Accidents</h1>
<?php
	$con=mysqli_connect("localhost","root","","accident");
		$sql="SELECT * FROM `accident`";
		if($data=mysqli_query($con,$sql)){
			echo "<table border='1' width='1350'>";
			/*while($row=mysqli_fetch_assoc($data)){
				echo "<tr><td>Nic :</td><td>".$row["Nic"]."</td><td>Nic Pic :</td><td><img src='".$row["Nic_pic"]."' width='100' height='100'></td>";
				echo "<td>Location :</td><td>".$row["Location"]."</td><td>Location Pic : </td><td><img src='".$row["Location_pic"]."' width='100' height='100'></td>";
				echo "<td>Impect</td><td>".$row["Impect"]."</td><td>Contact NO:</td><td>".$row["Contact_No"]."</td>";
				echo "</tr>";
				}*/
			
			foreach($data as $row){
				echo "<tr><td>Nic :</td><td>".$row["Nic"]."</td><td>Nic Pic :</td><td><img src='".$row["Nic_pic"]."' width='100' height='100'></td>";
				echo "<td>Location :</td><td>".$row["Location"]."</td><td>Location Pic : </td><td><img src='".$row["Location_pic"]."' width='100' height='100'></td>";
				echo "<td>Impect</td><td>".$row["Impect"]."</td><td>Contact NO:</td><td>".$row["Contact_No"]."</td>";
				echo "</tr>";
				}
				
				/////////////////
				
				echo "</table>";
				
			}
?>
</body>
</html>
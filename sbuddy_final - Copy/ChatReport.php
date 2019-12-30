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
        	<td>Number of Conversation :  </td>
            <td>
            <?php 
				$query = new MongoDB\Driver\Query([]);     
    			$res = $con->executeQuery("sbuddy.chat", $query);
				$count=0;
				foreach($res as $temp){$count++;
					
				
				
				}
				echo $count; 
	?>
	</td>
            
        </tr>
        <tr>
        <td>
        Number of senders : 
        </td>
        <td>
<?php 
	$query = new MongoDB\Driver\Query(['s_name'=>'$name1']);     
    $res = $con->executeQuery("sbuddy.chat", $query);
	$count=0;
	foreach($res as $temp){$count++;}
	echo $count;
?>
</td>
</tr>
<tr>
        <td>
        Number of recievers : 
        </td>
        <td>
<?php 
	$query = new MongoDB\Driver\Query(['r_name'=>'$name2']);     
    $res = $con->executeQuery("sbuddy.chat", $query);
	$count=0;
	foreach($res as $temp){$count++;}
	echo $count;
?>
</td>
</tr>
    </table>
	
    
    
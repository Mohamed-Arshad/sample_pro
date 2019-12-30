<script type="text/javascript" language="javascript">

	function trans(x)
	{
		/*var name1=document.getElementById(x).innerHTML;
		
		alert(name1);
		
		$(document).ready(
				function(){
							$.ajax({
								
										url:"directMember.php",
										method:"POST",
										data:{zname:name1},
										success: function(data){
												url:"FZone.php";
												method:"POST"
												data:{zname:data}
										}
										
							});
			}); */
			//window.location.replace('FZone.php')
	}

</script>







<?php 
		$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		

		$name=$_POST["zName"];
		$filter = [ 'zName' => [ '$regex'=> $name] ];

    	//$filter = ['$and'=>[[ 'fname' => $name ],['valid' => 0]]]; 
		//$filter = ['$and'=>[[ 'email' => $email ],['valid' => 0]]];
		
    	$query = new MongoDB\Driver\Query($filter);     
    	$result = $con->executeQuery("sbuddy.zone", $query);
    	//$val = current($result->toArray());
    	
		$count=0;
		//echo $resul->fname;
    	foreach($result as $row)
		{
			//echo $val->fname;
			$count++;
			//echo $val->lname;
			echo "<div class='SearchedZoneImg'>
            		<a onclick='trans($count)'><img src='$row->image' width='50px' height='40px' /><a>
            	</div>
            	<div class='SearchedZoneName'>
            		<a name='".$count."' onclick='trans($count)'> $row->zName </a>";
					
					
            	echo "</div>
            	<div class='SearchedZoneAdd'>
            		<input name='btnSearch' type='button' value='ADD' class='btnSearch1' id='".$count."'/>  
				</div>	
			";
		}
		/*if(isset($_POST['$count']))
		{

		$unit = document.getElementById('$count').innerHTML;

		$_SESSION["unit"] = $unit;
		}
		header("Location:FZone.php");*/
		
?>
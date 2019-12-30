<head>
<link rel="stylesheet" href="CSSZone.css" />
<script src="jquery-3.3.1.min.js"></script>



<script type="text/javascript" language="javascript">

	function getmem(x)
	{	
		var name1=document.getElementById(x).innerHTML;
		var data=document.getElementById("mem").innerHTML;
		document.getElementById("mem").innerHTML=data+","+name1;
		/*$(document).ready(
				function(){
							$.ajax({
								
										url:"SearchMem.php",
										method:"POST",
										data:{fname:name1},
										success: function(data){
												$('#AddedMembers').html(data);
										}
							});
			}); */
	}
	
</script>

</head>

<!-- Displaying the output--->
<?php 
		$con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		

		$name=$_POST["fname"];
		
		$filter = [ 'fname' => [ '$regex'=> $name] ]; 
    	//$filter = ['$and'=>[[ 'fname' => $name ],['valid' => 0]]]; 
		//$filter = ['$and'=>[[ 'email' => $email ],['valid' => 0]]];
		
    	$query = new MongoDB\Driver\Query($filter);     
    	$result = $con->executeQuery("sbuddy.users", $query);
    	//$val = current($result->toArray());
    	$count=0;
		
		//echo $resul->fname;
    	foreach($result as $row)
		{
			//echo $val->fname;
			$count++;
			//echo $val->lname;
			//<!-- Displaying the output--->
			echo "<div class='SearchedBuddyImg'>
            	<a><img src=.$row->propic width='50px' height='40px'/><a>
            </div>
            <div class='SearchedBuddyName'>
            	<a id='".$count."'> $row->fname  $row->lname</a>
            </div>
            <div class='SearchedBuddyAdd'>
            	<input name='btnSearch' type='button' value='ADD' class='btnSearch1' onClick='getmem($count)'/> 
            </div>	
			";
		}
		
		
?>
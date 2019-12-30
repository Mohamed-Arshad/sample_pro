<?php
//session_start();
//if(!isset($_SESSION["email"])){
	//header('Location:signup.php');
	//}
//if(isset($_POST["logout"])){
		//session_destroy();
		//header('Location:signup.php');
		//}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSSNotMess.css" />
<script src="jquery-3.3.1.min.js"></script>
<title>Notifications</title>
<script type="text/javascript" language="javascript">

$(document).ready(function(){

$.ajax({
  url:"noti.php",
  method:"POST",
success: function(data){
$('#Notification').html(data);

}
});
})


</script>
</head>

<body>
<div class="bar">
        <table align="center">
        <tr>
        <td>
        <div class="enq">
        	<ul>
				  <li><a  href="FMyZoneList.php" class="lo" ><img src="iconsImg/zone.png" width="30" height="30" /></a></li>
                  <li><a href="" class="lo" ><img src="iconsImg/buddyList.png" width="30" height="30" /></a></li>
				  <li><a class=" lo" href="sliit_servise.php"><img src="iconsImg/service.png" width="30" height="30" /></a> </li>
                  <li><a href="chat.php"  class="lo" ><img src="iconsImg/message.png" width="30" height="30" /></a></li>
                  <li><a href=""  class="lo"><img src="iconsImg/notification.png" width="30" height="30" /></a></li>
                  <li style="float:right"><a href="" class="lo" ><img src="iconsImg/logout.png" width="30" height="30" /></a></li>
                  <li style="float:right"><a  href="profile.php" class="lo"><img src="iconsImg/profile.png" width="30" height="30" /></a></li>
                  
			</ul>
            </div>
         </td>
         </tr>
         </table>
         </div>
		 
       <table align="center" width="1500">
        <tr>
        <td>
        <div class="Notification" id="Notification">
      	</div>
        </td>
         </tr>
         
         </table> 
</body>
</html>
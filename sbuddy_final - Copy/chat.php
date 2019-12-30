<?php
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>chat</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" href="style.css">

<script>
	$(document).ready(function(e) {

		function displaychat(){

		

		$.ajax({
			url:'displaychat.php',
			type:'POST',
			data: $('#mychatform').serialize(),
			success: function(data){
				$("#chatdisplay").html(data);
			}
		});

		}

	
	setInterval(function(){displaychat();},1000);

        $('#sendmessagebtn').click(function(e) {
		$.ajax({
				
				url:'sendchat.php',
				method: 'POST',
				data: $('#mychatform').serialize(),
				success:function(data){
				}
				});
				
        });

		
    });


</script>

</head>
<body>
<div class="bar">
  	
        <table align="center">
        <tr>
        <td>
        <div class="enq">
        	<ul>
				  <li><a  href="FMyZoneList.php" class="active lo" ><img src="iconsImg/zone.png" width="30" height="30" /></a></li>
                  <li><a href="" class="lo" ><img src="iconsImg/buddyList.png" width="30" height="30" /></a></li>
				  <li><a class="lo" href="sliit_servise.php"><img src="iconsImg/service.png" width="30" height="30" /></a> </li>
                  <li><a href="chat.php"  class="lo" ><img src="iconsImg/message.png" width="30" height="30" /></a></li>
                  <li><a href="notification.php"  class="lo" ><img src="iconsImg/notification.png" width="30" height="30" /></a></li>
                  <li style="float:right"><a href="" class="lo" ><button id="logout" name="logout" class="lob"><img src="iconsImg/logout.png" width="30" height="30"/></button></a></li>
                  <li style="float:right"><a  href="profile.php" class="lo"><img src="iconsImg/profile.png" width="30" height="30" /></a></li>
                  
			</ul>
            </div>
         </td>
         </tr>
         </table>
         </div> 

	<div class="container-fluid">
    <h3 class="text-center"></h3>

    	<div class="well" id="chatbox">

		<div id="chatdisplay" ></div>
		
			
        </div>
        
        <form id="mychatform" action="" method="post">
			<input type="text" id="r_name" name="r_name" placeholder="enter reciever's name "><br>
            <textarea name="message" id="message" placeholder="enter your message here..." cols="30" rows="3" ></textarea><br>
        	<button type="button"  class="btn btn-success btn-lg" id="sendmessagebtn">send message</button>  
        </form>
    
    </div>

</body>
</html>   
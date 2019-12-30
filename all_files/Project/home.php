<html>
<?php 
session_start();
if(!isset($_SESSION["user"])){
	header('Location:call-a-doc.php');
	}
if(isset($_POST["logout"])){
	session_destroy();
	header('Location:call-a-doc.php');
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" type="text/css" href="doc.css"/>
</head>
<body>
		<table class="header">
    	<tr>
    		<td>
       			<a href="call-a-doc.html"><img src="finallogo.png" height="150" width="200"/></a>
             </td><td><div class="non"></div><a href="call-a-doc.html"><h1>The DocWeb</h1></a>
            </td>
            <td align="right" width="800">
            	<form method="post">
            	<input type="submit" value="Logout" name="logout">
                <a href=""><img src="pro_icon.png" height="100" width="100"/></a>
                </form>
             </td></tr></table>
			<h3>
    			<ul>
				  <li>
                    	<a href="call-a-doc.html">Home</a>
                    </li>
				  <li class="dropdown">
					    <a>Services</a>
                        
					    <div class="dropdown-content">
					      <a href="">Call-a-Doc</a>
					      <a href="">Book-a-Doc</a>
					      <a href="">Book CheckUps</a>
					 	</div>
                        
                     </li>
				  <li>
                    	<a href="">Contact Us</a>
                     </li>
			   	  <li style="float:right">
                    	<a href="">About Us</a>
                    </li>
              </ul>
       	</h3>
                    
                <marquee scrollamount="20" direction="left">
        		<img src="doc1.jpg" height="250" width="400" />
      			</marquee>
</body>
</html>
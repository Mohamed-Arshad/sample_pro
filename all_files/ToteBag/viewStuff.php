<?php session_start();
if(!isset($_SESSION["userName"]))
{
	header('Location:login.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/loginStyle.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<table width="835" height="377" border="0" align="center">
  <tr>
    <td width="400" height="44"><img src="images/Totebag/Cover2.png" width="400" height="70" /></td>
    <td width="425"><div>
<ul>
  <li><a href="home.html">Home</a></li>
  <li><a href="myTotebag.php">My Tote Bag</a></li>
  <li><a href="viewAllStuff.php">Community</a></li>
  <li></li>
  <li><a href="#about">About Us</a></li>
</ul>
</div></td>
  </tr>
  <tr>
    <td height="299" colspan="2"><table align="center">
      <tr>
        <td width="521"><div class="imgcontainer"> <img src="images/shopping-bag-flat.png" alt=""  width="256" height="256" class="avatar" /> </div></td>
          <div class="container">
            <table width="512">
            <?php
			
			
				$con= mysqli_connect("localhost","root","","IT18070736");
			
			if(!$con)
			{
				die("Cannot connect to DB server");
			}
			$sql="SELECT * FROM `item` WHERE `email`='".$_SESSION["userName"]."';";
			
			$result = mysqli_query($con,$sql);
			
			if(mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					
			
            echo"  <tr>
			  
              <td><div class='image'><img src='".$row["path"]."' width='172' height='173' /></div></td>";
               echo" <td width='172'><a href='updateStuff.php'><img src='images/edit2.png' alt='' width='32' height='34' />Edit</a></td>";
              echo" <td width='171'><a href='editContent.php'><img src='images/delete.jpg' alt='' width='32' height='34' /></a><a href='deleteContent.php'>Delete </a></td>";
                echo" <td width='153'><img src='images/publish2.png' alt='' width='32' height='34' /><a href='updateStuff.php'>Publish</a></td>

              </tr>";
				}
			}
			
			  ?>
             
            </table>
          </div>
          <div class="container" style="background-color:#f1f1f1"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

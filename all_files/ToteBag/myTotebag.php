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
<link rel="stylesheet" type="text/css" href="css/dashBoardStyle.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<table width="835" height="265" border="0" align="center">
  <tr>
    <td width="404" height="44"><img src="images/Totebag/Cover2.png" width="400" height="70" /></td>
    <td width="431"><div>
<ul>
  <li><a href="home.html">Home</a></li>
  <li><a href="#news">My Tote Bag</a></li>
  <li><a href="viewAllStuff.php">Community</a></li>
  <li></li>
  <li><a href="#about">About Us</a></li>
</ul>
</div></td>
  </tr>
  <tr>
    <td height="215" colspan="2"><div class="main-section">
      <div class="dashbord">
        <div class="icon-section"> <br />
          <img src="images/profile.png" alt="" width="87" height="90" />
          <p>&nbsp;</p>
        </div>
        <div class="detail-section"> <a href="#">My Profile </a> </div>
      </div>
      <div class="dashbord dashbord-green">
        <div class="icon-section"> <br />
          <img src="images/add.png" alt="" width="87" height="90" />
          <p>&nbsp;</p>
        </div>
        <div class="detail-section"> <a href="addStuff.php">Add  Stuff</a> </div>
      </div>
      <div class="dashbord dashbord-blue">
        <div class="icon-section"> <br />
          <img src="images/b2.png" alt="" width="87" height="90" />
          <p>&nbsp;</p>
        </div>
        <div class="detail-section"> <a href="viewStuff.php">View My Stuff</a> </div>
      </div>
      <div class="dashbord dashbord-skyblue">
        <div class="icon-section"> <br />
          <img src="images/b3.png" alt="" width="87" height="90" />
          <p>&nbsp;</p>
        </div>
        <div class="detail-section"> <a href="editDetails.php">Share Stuff</a> </div>
      </div>
      <div class="dashbord dashbord-red">
        <div class="icon-section"> <br />
          <img src="images/edit.png" alt="" width="87" height="90" />
          <p>&nbsp;</p>
        </div>
        <div class="detail-section"> <a href="editDetails.php">Edit Stuff </a> </div>
      </div>
      <div class="dashbord dashbord-orange">
        <div class="icon-section"> <br />
          <img src="images/p.png" alt="" width="87" height="90" />
          <p>&nbsp;</p>
        </div>
        <div class="detail-section"> <a href="viewAllStuff.php">View Stuff</a> </div>
      </div>
    </div></td>
  </tr>
</table>
</body>
</html>

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
<link rel="stylesheet" type="text/css" href="css/basicStyle.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<table width="835" height="265" border="0" align="center">
  <tr>
    <td width="404" height="44"><img src="images/Totebag/Cover2.png" width="400" height="70" /></td>
    <td width="431"><div>
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
    <td height="215" colspan="2"><form action="" method="post">
      ;
      <table width="383" border="0" align="center">
      <tr>
        <td colspan="2" bgcolor="#FFFFFF"><div align="center"><img src="images/p.png" width="198" height="195" /></div>
          <h1>Edit Stuff</h1></td>
        </tr>
      <tr>
        <td width="146">Name / Title</td>
        <td width="227"><input type="text" name="txtFullName" id="txtFullName" /></td>
      </tr>
      <tr>
        <td>Images</td>
        <td><input type="file" name="fileImage" id="fileImage" /></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><input type="text" name="txtContact" id="txtContact" /></td>
      </tr>
      <tr>
        <td height="43">Category</td>
        <td><input type="checkbox" name="chkBooks" id="chkBooks" />
          <label for="chkBooks">Books
            <input type="checkbox" name="chkGames" id="chkGames" />
            Games
  <input type="checkbox" name="chkMovies" id="chkMovies" />
            Movies</label></td>
      </tr>
      <tr>
        <td colspan="2"><br />
          <label for="chkBooks">
            <input type="checkbox" name="chkPublish" id="chkPublish" />
            Publish this<br />
            <br />
          </label></td>
        </tr>
      <tr>
        <td colspan="2"><blockquote>
        
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Add Now"   />
            <input name="btnReset" type="reset" class="button" id="btnReset" value="Cancel"   />
         
        </blockquote></td>
        </tr>
    </table>
    </form>
    </td>
  </tr>
</table>
</body>
</html>

<?php session_start();
if(!isset($_SESSION["userName"]))
{
	//header('Location:login.php');
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
    <td height="215" colspan="2"><form action="addStuff.php" method="post" enctype="multipart/form-data">
      ;
      <table width="383" border="0" align="center">
      <tr>
        <td colspan="2" bgcolor="#FFFFFF"><div align="center"><img src="images/add.png" width="165" height="166" /></div>
          <h1>Add Stuff</h1></td>
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
            
            <?php
			if(isset($_POST["btnSubmit"]))
			{
				$title=$_POST["txtFullName"];
				$image ="uploads/".basename($_FILES["fileImage"]["name"]);
				
				move_uploaded_file($_FILES["fileImage"]["tmp_name"],$image);
				
				$description=$_POST["txtContact"];
				
				if(isset($_POST["chkBooks"]))
				{
					$category="Books";
				}
					if(isset($_POST["chkGames"]))
				{
					$category="Games";
				}
					if(isset($_POST["chkMovies"]))
				{
					$category="Movies";
				}
				if(isset($_POST["chkPublish"]))
				{
					$status=1;}
				else {
					$status=0;}
			
			
				$con= mysqli_connect("localhost","root","","IT18070736");
			
			if(!$con)
			{
				die("Cannot connect to DB server");
			}
			$sql="INSERT INTO `item`(`itemID`, `email`, `category`, `published`, `path`, `description`, `title`) VALUES (NULL,'".$_SESSION["userName"]."','".$category."','".$status."','".$image."','".$description."','".$title."');";
		
			
			if(mysqli_query($con,$sql))
			{
				echo "File uploaded Successfully";
			}
			else
			{
				echo"Opps something is wrong, Please select the file again";
			}
			
			
}
			?>
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

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
  <li><a href="#news">My Tote Bag</a></li>
  <li><a href="#contact">Community</a></li>
  <li></li>
  <li><a href="#about">About Us</a></li>
</ul>
</div></td>
  </tr>
  <tr>
    <td height="215" colspan="2"><form action="" method="post">
      
      <table width="383" border="0" align="center">
      <tr>
        <td colspan="2" bgcolor="#FFFFFF"><h1>Create Profile</h1></td>
        </tr>
      <tr>
        <td width="146">Full Name</td>
        <td width="227"><input type="text" name="txtFullName" id="txtFullName" /></td>
      </tr>
      <tr>
        <td>Email Address</td>
        <td><input type="text" name="txtEmail" id="txtEmail" /></td>
      </tr>
      <tr>
        <td>Contact Number</td>
        <td><input type="text" name="txtContact" id="txtContact" /></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="txtPassword" id="txtPassword" class="datalist" /></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td><input type="password" name="txtConfirmPassword" id="txtConfirmPassword" class="datalist" /></td>
      </tr>
      <tr>
        <td>Interest</td>
        <td><br />
          <input type="checkbox" name="chkBooks" id="chkBooks" />
          <label for="chkBooks">Books
            <input type="checkbox" name="chkGames" id="chkGames" />
            Games
            <input type="checkbox" name="chkMovies" id="chkMovies" />
            Movies<br />
            <br />
          </label></td>
      </tr>
      <tr>
        <td colspan="2"><blockquote>
        
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input name="btnSubmit" type="submit" class="button" id="btnSubmitn" value="Join Now"   />
            <input name="btnReset" type="reset" class="button" id="btnReset" value="Cancel"   />
         	<input type="button" value="pressme" id="zxc" />
        </blockquote></td>
        </tr>
    </table>
    </form>
    </td>
  </tr>
</table>
</body>
<?php
	if(isset ($_POST["btnSubmit"]))
	{
		echo 'pilaha';
		$email = $_POST["txtEmail"];
		$fullName = $_POST["txtFullName"];
		$contact = $_POST["txtContact"];
		$password = $_POST["txtPassword"];
		
		if(isset($_POST["chkBooks"]))
		{
			$in[]="Books";
		}
		if(isset($_POST["chkGames"]))
		{
			$in[]="Games";
		}
		if(isset($_POST["chkMovies"]))
		{
			$in[]="Movies";
		}
		
			$con= mysqli_connect("localhost","root","","IT18070736");
			
			if(!$con)
			{
				die("Cannot connect to DB server");
			}
			$sql="INSERT INTO `user`(`email`, `fullName`, `contactNo`, `password`) VALUES ('".$email."','".$fullName."','".$contact."','".$password."');";

			
			mysqli_query($con,$sql);
			
			foreach($in as $i)
			{
				$sql ="INSERT INTO `interests`(`email`, `interests`) VALUES ('".$email."','".$i."');";
			}
		}else{
			echo rand(10000,99999);
			}
			
			if(isset($_POST["zxc"])){
				$asd=5;
				echo $asd;
				}else{
					echo 'potta case';
					}
		
			
?>
</html>

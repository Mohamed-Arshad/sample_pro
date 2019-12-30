<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" enctype="multipart/form-data">
<input type="file" name="Image" />
<input type="submit" value="submi" name="submit" />aaa
</form>
<?php
			/*if(isset($_POST["submit"]))
			{
				//if(getimagesize($_FILES['Ima']['name'])==true){
					//	echo 'you can store';
					//}
				$image ="uploads/".basename($_FILES['Image']['name']);
				move_uploaded_file($_FILES["Image"]["tmp_name"],$image);
				echo 'done';
			}else{
				echo 'hello';
				}*/
				function alpa($s,$y){
					return $s+$y;
					}
?>
</body>
</html>
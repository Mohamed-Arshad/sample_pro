<?php
if(isset($_POST["submit"])){
$target = "uploads/".basename($_FILES["fileToUpload"]["tmp_name"]);
move_uploaded_file( $_FILES["fileToUpload"]["tmp_name"], $target);
}
?>
<html>
<body>

<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
$directory = "uploads/";
$filecount = count(glob($directory . "*"));
echo "Total number of php file in a folder :".$filecount;
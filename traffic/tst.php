<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>

function validnicpic(){
	var path=document.getElementById("nicpic").value;
	var len=path.length;
	var subs=path.substring(len-3,len);
	if(path==""){
		alert("empty");
		}
	if(subs=="JPG" || subs=="PNG"){
		alert("done");
		return true;
		}
		alert("not done");
	}
</script>
</head>

<body>

<input type="file" name="nicpic" id="nicpic"/>
<input type="button" onclick="validnicpic()" />
</body>
</html>
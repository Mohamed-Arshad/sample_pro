<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign UP</title>
<link href="logincss.css" type="text/css" rel="stylesheet" />
</head>

<body>
		<table class="header">
    	<tr>
    		<td>
       			<a href="call-a-doc.html"><img src="finallogo.png" height="150" width="200"/></a>
             </td><td><div class="non"></div><a href="call-a-doc.html"><h1>The DocWeb</h1></a>
            </td>
            <td align="right" width="850">
				<form method="post" >
            				<div>
							<label for="txtUserName">Username :</label>
							<input class="log" id="txtUserName" type="text" name="username">
                            </div><br><div>
							<label for="txtPassword">Password :</label>
							<input class="log" id="txtPassword" type="password" name="password">
                            </div><br>
                            <input type="submit" value="Login" name="logsubmit">
                            <a href="" ><i>Forgotten password?</i></a>
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
        
        <div class="loginpcg" align="center">
    	    <div class="non"></div>
    	    <div class="non"></div>
            
    	   		<h2>The Email you entered is already exists.<br />
    	    	Please <a href="SignUp.php">Try again.</a></h2>
                
    	    <div class="non"></div>
    	    <div class="non"></div>
        </div>
</body>
</html>
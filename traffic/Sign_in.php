<?php 
						session_start(); 

						if(isset($_POST['btnSubmit']))
						{
							$username=$_POST["email"];
							$password=$_POST["password"];
							$valid=false;
							
							$con = mysqli_connect("localhost","root","","accident");
		  				    if(!$con)
								{	
									die("Cannot connect to DB server");		
								}

			
						    $sql="SELECT * FROM `admin` WHERE `Username`='".$username."' and `Password`='".$password."';";
							
							
							
							$result= mysqli_query($con,$sql);
							if(mysqli_num_rows($result)>0)
							{
								$valid=true;
							}
							else
							{
								$valid=false;
							}
							if($valid)
							{
								$_SESSION["email"]=$username;
								header('Location:policy.php');
							}
							else
							{
								echo'<script>alert(" Please enter correct username and password")</script>';
							}

						
						}
					
					?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LogIn</title>

	<link rel="stylesheet" href="css/Sign_in.css" />
</head>

<body>
	<section class="sign-up-section">
            
            <h1 id="sign-text" > Log In!</h1>
            
            <div class="form" >
            <div class="logo">
            	<img src="img/download.jpg" alt="logo" />
            </div>
                <form name="Signin" method="post" enctype="multipart/form-data" >
                    

                    <p><label for="username" >Username:</label></p>
                    <input type="text" id="email" name="email" placeholder="ExampleAdmin1234" required>

                    <p><label for="password">Password:</label></p>
                    <input type="password" id="password" name="password" placeholder="password" required>
                    <a href="img/download.jpg">
                    <input name="btnSubmit" type="submit" class="btnsubmit" id="btnsubmit"  value="Sign in!"  >
                   </a>
                    </form>
                    
      
                
            </div>
            
            
            <div class="clearfix"></div>


        </section>      


</body>
</html>

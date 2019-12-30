<?php
		session_start();
		$email=$_SESSION["email"];
		$vkey=$_SESSION["vkey"];
		$fname=$_SESSION["fname"];
		require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->SMTPDebug = 3;										// Enable verbose debug output

		$mail->isSMTP();                                    		// Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  							// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               		// Enable SMTP authentication
		$mail->Username = 'hndconstructioniaaann@gmail.com';                // SMTP username
		$mail->Password = 'IAAANNJAVA';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            		// Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    		// TCP port to connect to

		$mail->setFrom('hndconstructioniaaann@gmail.com', 'S-Buddy');		//sender
		$mail->addAddress($email, 'You');     //recipient
		//$mail->addReplyTo('urmail.....', 'Information');
		
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Email verification';
		$mail->Body    = 'Dear '.$fname.',<br>your verification key is <b>'.$vkey.'</b><br>Thank You.';
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		$mail->SMTPOptions = array(
    	'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    	)
		);
	
		if(!$mail->send()) {
 		   	echo 'Message could not be sent.';
    		echo 'Mailer Error: ' . $mail->ErrorInfo;
			die ('failed');
		} else {
    		echo 'Message has been sent';
			header('Location:vkeysubmit.php');
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
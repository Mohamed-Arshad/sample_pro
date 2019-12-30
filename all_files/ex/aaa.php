<html>
<head>
</head>
<body>
	<?php
		function email($nail,$no){
			//echo $mail.strlen($mail);
		require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->SMTPDebug = 3;										// Enable verbose debug output

		$mail->isSMTP();                                    		// Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  							// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               		// Enable SMTP authentication
		$mail->Username = 'nihalamansoor@gmail.com';                // SMTP username
		$mail->Password = 'nihala123456';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            		// Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    		// TCP port to connect to

		$mail->setFrom('nihalamansoor@gmail.com', 'Mailer');
				//sender
		$mail->addAddress($nail, 'Joe User');     //recipient
		//$mail->addReplyTo('nihalamansoor@gmail.com', 'Information');
		
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Here is the subject';
		$mail->Body    = $no;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
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
		} else {
    		echo 'Message has been sent';
		}}
		email("moharshad46@gmail.com",45);
?>
</body>
</html>
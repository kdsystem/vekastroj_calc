<?php 
	$to      = 'kdsystem@gmail.com';
	$subject = '����� � �����';
	$text=serialize($_POST);
	$headers = 'From: webmaster@wss.spb.ru' . "\r\n" .
			'Reply-To: lubimov@wss.spb.ru' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subject, $text, $headers); 	
?>
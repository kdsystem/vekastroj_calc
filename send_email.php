<?php 
	$to      = 'kdsystem@gmail.com';
	$subject = 'Заказ с сайта';
	$text=serialize($_POST);
	$headers = 'From: webmaster@example.com' . "\r\n" .
			'Reply-To: webmaster@example.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subject, $text, $headers); 	
?>
<?php 
	$to      = 'kdsystem@gmail.com';
	$subject = 'Заказ с сайта';
	$text=serialize($_POST);
	$headers = 'From: webmaster@wss.spb.ru' . "\r\n" .
			'Reply-To: lubimov@wss.spb.ru' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
	//dfgfdg
	mail($to, $subject, "11111111", $headers); 	
?>
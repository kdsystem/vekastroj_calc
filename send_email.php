<?php
	$msg=serialize($_POST);
	$to      = 'kdsystem@gmail.com';
	$subject = 'Заказ с сайта';
	$headers = 'From: webmaster@wss.spb.ru' . "\r\n" .
			'Reply-To: lubimov@wss.spb.ru' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Дополнительные заголовки
	$headers .= 'To: Alex Lubimov <lubimov@wss.spb.ru>';
	$headers .= 'From: Webmaster <admin@wss.spb.ru>';
	$message = '
			<html>
				<head>
	  				<title>Заказ с сайта</title>
				</head>
				<body>';
	$text=$message.$msg.'</body> </html>';
	
	
	mail($to, $subject, $text, implode("\r\n", $headers));
?>
<?php 
	$msg=serialize($_POST);
	//$to      = 'lubimov@wss.spb.ru';
	$to      = 'kdsystem@gmail.com';
	$subject = 'Заказ с сайта';
	$headers = 'From: admin@wss.spb.ru' . "\r\n" .
			'Reply-To: lubimov@wss.spb.ru' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Дополнительные заголовки
	$headers .= 'To: Alex Lubimov <kdsystem@gmail.com>';
	$headers .= 'From: Webmaster <admin@wss.spb.ru>';

	$message = '
		<html>
			<head>
  				<title>Заказ с сайта</title>
			</head>
			<body>';
	$text=$message.$msg.'</body> </html>';
//Отправим письмо	
	mail($to, $subject, $text, $headers); 	
?>
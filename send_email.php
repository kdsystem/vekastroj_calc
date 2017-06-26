<?php 
	$text=serialize($_POST);
	
	mail("kdsystem@gmail.com", "the subject", $text,
			"From: webmaster@wss.spb.ru \r\n"
			."X-Mailer: PHP/" . phpversion()); 	
?>
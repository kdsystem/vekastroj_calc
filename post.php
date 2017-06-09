<?php

// ----------------------------конфигурация-------------------------- //
$adminemail = "kdsystem@gmail.com"; // e-mail админа
$date = date ( "d.m.y" ); // число.месяц.год
$time = date ( "H:i" ); // часы:минуты:секунды
$backurl = "http://kdsystem.noip.me:8066/vekastroj_calc/sendmail.html"; // На какую страничку переходит после отправки письма
                                      
// ---------------------------------------------------------------------- //
                                      
// Принимаем данные с формы

$name = $_POST ['name'];
$email = $_POST['email'];
$msg = $_POST ['message'];
// Проверяем валидность e-mail
echo "email:".$email."!";

if (! preg_match ( "|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", strtolower ( $email ) )) 
{
	echo "<center>Вернитесь <a href='javascript:history.back(1)'><B>назад</B></a>. Вы указали неверные данные!";
} 
else 
{	
	$msg = "<p>Имя: $name</p> <p>E-mail: $email</p> <p>Сообщение: $msg</p>";
	
	// Отправляем письмо админу
	
	$headers  = "Content-type: text/html; charset=windows-1251 \r\n";
	$headers .= "From: От кого письмо <from@example.com>\r\n";
	$headers .= "Reply-To: reply-to@example.com\r\n"; 
	
	mail ( $adminemail, "$date $time Сообщение от $name", $msg, $headers );
	
	// Сохраняем в базу данных
	
	$f = fopen ( "message.txt", "a+" );
	fwrite ( $f, " \n $date $time Сообщение от $name" );
	fwrite ( $f, "\n $msg " );
	fwrite ( $f, "\n ---------------" );
	fclose ( $f );
	
	// Выводим сообщение пользователю
	
	print "<script language='Javascript'><!--
function reload() {location = \"$backurl\"}; setTimeout('reload()', 6000);
//--></script>

$msg

<p>Сообщение отправлено! Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";
	exit ();
}

?>
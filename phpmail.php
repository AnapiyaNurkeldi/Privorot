<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$name = $_POST["name"];
$phone = $_POST["phone"];
$message = $_POST["message"];

$Body = "";
$Body .= "Имя: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Телефон: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Сообщение: ";
$Body .= $message;
$Body .= "\n";

$mail = new PHPMailer(true);

try{
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host='smtp.yandex.ru';
	$mail->SMTPAuth = true;
	$mail->Username = 'Адрес';
	$mail->Password = 'Пароль';
	//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->Port = 25;

	$mail->setFrom('Адрес', 'Сообщение из сайта');
	$mail->addAddress('Адрес');
	//$mail->addAttachment('/var/tmp/file.tar.gz');

	$mail->isHTML(true);
	$mail->Subject = "Email из сайта";
	$mail->Body = $Body;
	//для клиентов без html
	$mail->AltBody = $Body;

	$mail->send();
	echo 'success';
}
catch (Exception $e) {
	echo "Ошибка при отправлении сообщения: {$mail->ErrorInfo}";
}

?>

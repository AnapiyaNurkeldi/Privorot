<?php

$name = $_POST['name'];
$number = $_POST['number'];
$message = $_POST['message'];


$to = 'magvpomosh@ukr.net';


$subject = 'Новая заявка с сайта';


$headers = 'From: magvpomosh@ukr.net' . "\r\n" .
    'Reply-To: magvpomosh@ukr.net' . "\r\n" .
    'Content-Type: text/html; charset=UTF-8' . "\r\n";


$message_body = '<p><strong>Имя:</strong> '.$name.'</p>'.
                '<p><strong>Номер телефона:</strong> '.$number.'</p>'.
                '<p><strong>Сообщение:</strong> '.$message.'</p>';


$mail_sent = mail($to, $subject, $message_body, $headers);


if ($mail_sent) {
    http_response_code(200);
    echo 'OK';
} else {
    http_response_code(500);
    echo 'Ошибка отправки';
}
?>

<?php
require_once __DIR__ . '/smtp_config.php';
require_once __DIR__ . '/phpmailer/Exception.php';
require_once __DIR__ . '/phpmailer/PHPMailer.php';
require_once __DIR__ . '/phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

if (!empty($_POST['website'])) {
    // Honeypot-поле — люди его не видят и не заполняют, боты обычно заполняют всё.
    // Отвечаем "успехом", чтобы не подсказывать боту, что его распознали.
    http_response_code(200);
    exit;
}

$name  = isset($_POST['name'])  ? strip_tags(trim($_POST['name']))  : '';
$phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : '';
$email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';

$message = "
<table cellpadding='6' cellspacing='0'>
    <tr>
        <td><b>Имя:</b></td>
        <td>&nbsp;&nbsp;&nbsp;{$name}</td>
    </tr>
    <tr>
        <td><b>Телефон:</b></td>
        <td>&nbsp;&nbsp;&nbsp;<a href='tel:{$phone}'>{$phone}</a></td>
    </tr>" .
    ($email ? "
    <tr>
        <td><b>Email:</b></td>
        <td>&nbsp;&nbsp;&nbsp;<a href='mailto:{$email}'>{$email}</a></td>
    </tr>" : '') . "
</table>";

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = SMTP_SECURE;
    $mail->Port       = SMTP_PORT;
    $mail->SMTPDebug  = SMTP_DEBUG;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
    $mail->addAddress(MAIL_TO);
    if ($email) {
        $mail->addReplyTo($email, $name ?: $email);
    }

    $mail->isHTML(true);
    $mail->Subject  = 'Заявка с сайта rentalsky.by';
    $mail->Body     = $message;
    $mail->AltBody  = "Имя: {$name}\nТелефон: {$phone}" . ($email ? "\nEmail: {$email}" : '');

    $mail->send();
    http_response_code(200);

} catch (Exception $e) {
    http_response_code(500);
    if (SMTP_DEBUG) {
        echo 'Ошибка: ' . $mail->ErrorInfo;
    }
}

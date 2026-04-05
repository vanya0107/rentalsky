<?php
//require_once __DIR__ . '/recaptchalib.php';
// Введите свой секретный ключ
//$secret = "6LfEl6UqAAAAACVTGp0lhV0xzkFpEHHPF6v6XFGN";
//// пустой ответ каптчи
//$response = null;
//// Проверка вашего секретного ключа
//$reCaptcha = new ReCaptcha($secret);
//if ($_POST["g-recaptcha-response"]) {
//    $response = $reCaptcha->verifyResponse(
//        $_SERVER["REMOTE_ADDR"],
//        $_POST["g-recaptcha-response"]
//    );
//}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {
        $name = strip_tags($_POST['name']);
        $nameFieldset = "<b>Имя:</b>";
    }
    if (isset($_POST['phone'])) {
        $phone = strip_tags($_POST['phone']);
        $phoneFieldset = "<b>Телефон:</b>";
    }
    if (isset($_POST['email'])) {
        $email = strip_tags($_POST['email']);
        $emailFieldset = "<b>Email:</b>";
    }

//    $to = "vanya010792@gmail.com"; /*Укажите адрес, на который должно приходить письмо*/
    $to = "rentalskyby@gmail.com";
    $header = 'Заявка с сайта rentalsky.by';
    $from = $email ? $email : 'rentalskyby@gmail.com';
    $message = "<table>
            <tr>
                <td>$nameFieldset</td>
                <td>&nbsp;&nbsp;&nbsp;$name</td>
            </tr>
            <tr>
                <td>$phoneFieldset</td>
                <td>&nbsp;&nbsp;&nbsp;<a href='tel: $phone'>$phone</a></td>
            </tr>
            <tr>
                <td>$emailFieldset</td>
                <td>&nbsp;&nbsp;&nbsp;<a href='mailto: $email'>$email</a></td>
            </tr>
        </table>";

    $send = mail($to, $header, $message, "Content-type:text/html; charset = UTF-8\r\nFrom:$from");
}
?>
<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$message = $_POST['user_message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                                                                                             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'tehpk5697@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '70784492A'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('tehpk5697@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('Motherfxker.03@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

if($message != ""){
    $mail->Subject = 'Заявка сайта Сервиса TEXPC';
    $mail->Body    = '' .$name . ' оставил заявку.</br> Номер телефона: ' .$phone. '<p>Письмо:</p>' .$message;
    $mail->AltBody = '';
}else{
    $mail->Subject = 'Заявка с сайта: "TEXPC"';
    $mail->Body    = '' .$name . ' оставил заявку.</br> Номер телефона: ' .$phone;
    $mail->AltBody = '';
}


if(!$mail->send()) {
    echo '<b style="font-size:42px; color:red;">Error: </b><span style="font-size:32px;">Ошибка отправки данных</span>';
}else{
    header('location: index.html');
}
?>
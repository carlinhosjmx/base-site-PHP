<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.partiturasmusicais.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'suporte@partiturasmusicais.com';                     // SMTP username
    $mail->Password   = '@Partituras10@';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('suporte@partiturasmusicais.com', 'Partituras Musicais');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Bem vindo ao site Partituras Musicais.';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    

    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Houve um erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
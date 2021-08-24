<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/Exception.php';
require 'vendor/PHPMailer/PHPMailer.php';
require 'vendor/PHPMailer/SMTP.php';


//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msj = $_POST['message'];

$body = 
"Este mensaje fue enviado por: " . $name . " \r\n".
"Su e-mail es: " . $mail . " \r\n".
"Teléfono de contacto: " . $phone . " \r\n".
"Mensaje: " . $msj . " \r\n".
"Enviado el: " . date('d/m/Y', time());


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@blendaec.com';                     //SMTP username
    $mail->Password   = 'AECServices-2020';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@blendaec.com', 'Info-Blend');
    $mail->addAddress($email, $name);     //Add a recipient             //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nuevo mensaje de Blendaec.com';
    $mail->Body    = $body;

    $mail->send();
    echo 'Message has been sent';
    echo '<script> alert("empieza el script");</script>';
    header("Location:index.html");
    
    
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

  
?>

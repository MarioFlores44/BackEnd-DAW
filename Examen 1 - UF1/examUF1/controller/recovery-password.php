<!-- Ex14 -->


<?php

require_once '../model/pdo-users.php';
require_once '../controller/session.php';
require_once '../controller/input-common.php';

require_once '../view/recovery-password.view.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargamos los ficheros de las clases de PHPMailer
require 'D:\2n DAW\Apps\XAMPP\PHPMailer-master\src\Exception.php';
require 'D:\2n DAW\Apps\XAMPP\PHPMailer-master\src\PHPMailer.php';
require 'D:\2n DAW\Apps\XAMPP\PHPMailer-master\src\SMTP.php';


// Funcions
function enviarMail() {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = MAIL_USERNAME;                     //SMTP username
        $mail->Password   = MAIL_PASSWORD;                               //SMTP password
        $mail->SMTPSecure = 'tls';                            //PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('mflorespalafolls@gmail.com', getUserNicknameById($_SESSION['userId']));
        //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress(getEmail($_SESSION['userId']));               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('C:\Users\GU502\Desktop\mondongo.jpg');         //Add attachments
        //$mail->addAttachment('');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Mail de preueba de PHPMailer';
        $mail->Body    = '1234';

        novaContrasenya($_SESSION['userId'], 1234);
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Enviado correctamente';
    } catch (Exception $e) {
        echo "No se ha podido enviar. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
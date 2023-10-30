<?php
    require_once '../MODEL/model.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Cargamos los ficheros de las clases de PHPMailer
    require 'D:\2n DAW\Apps\XAMPP\PHPMailer-master\src\Exception.php';
    require 'D:\2n DAW\Apps\XAMPP\PHPMailer-master\src\PHPMailer.php';
    require 'D:\2n DAW\Apps\XAMPP\PHPMailer-master\src\SMTP.php';
    // Función para comprobar si mail introducido existe, y si es así, mandar un mail con el token
    function mandarMail() {
        if (!empty($_POST['mail'])) {
            if (trobarMail($_POST['mail'])) {
                generarToken($_POST['mail']);
                $token = obtenirToken($_POST['mail']);

                $mail = new PHPMailer(true);

                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = MAIL_USERNAME;
                $mail->Password   = MAIL_PASSWORD;
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                $mail->setFrom(MAIL_USERNAME, MAIL_SENDER_NAME);
                $mail->addAddress($_POST['mail']);
                $mail->isHTML(true);
                $mail->Subject = 'Recuperar contraseña';
                $mail->Body    = '<a href="' . BASE_RESET_URL . "id=". $_POST['mail'] . "&token=". $token .'">Click aquí para cambiar la contraseña</a>';

                $mail->send();
                echo '<script language="javascript">alert("Se ha enviado un mail para cambiar la contraseña")</script>';
            } else {
                echo '<script language="javascript">alert("El mail no existe")</script>';
            }
        } else {
            echo '<script language="javascript">alert("Introduce el correo")</script>';
        }
    }

    require '../VISTA/recu.vista.php';
?>
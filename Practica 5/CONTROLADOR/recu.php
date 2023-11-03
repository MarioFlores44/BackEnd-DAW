<?php
    require_once '../MODEL/model.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Cargamos los ficheros de las clases de PHPMailer
    require '../lib/PHPMailer-master/src/Exception.php';
    require '../lib/PHPMailer-master/src/PHPMailer.php';
    require '../lib/PHPMailer-master/src/SMTP.php';
    // Función para comprobar si mail introducido existe, y si es así, mandar un mail con el token
    function mandarMail() {
        if (!empty($_POST['mail'])) {
            if (trobarMail($_POST['mail'])) {
                generarToken($_POST['mail']);
                $token = obtenirToken($_POST['mail']);

                try {
                    $mail = new PHPMailer(true);

                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = "mflorespalafolls@gmail.com";
                $mail->Password   = "fzcp xhvl wlxe yzcj";
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                $mail->setFrom("mflorespalafolls@gmail.com", "Password Recovery");
                $mail->addAddress($_POST['mail']);
                $mail->isHTML(true);
                $mail->Subject = 'Recuperar contraseña';
                $mail->Body    = '<a href="' . "http://localhost/BackEnd-DAW/Practica%205/CONTROLADOR/change-password.php?" . "mail=". $_POST['mail'] . "&token=". $token .'">Click aquí para cambiar la contraseña</a>';

                if ($mail->send()) {
                    header("Location: ../VISTA/pswrd-recuperada.php");
                }
                } catch (Exception $e) {
                    echo '<script language="javascript">alert("No se ha podido enviar el mail")</script>';
                }
            } else {
                echo '<script language="javascript">alert("El mail no existe")</script>';
            }
        } else {
            echo '<script language="javascript">alert("Introduce el correo")</script>';
        }
    }

    require '../VISTA/recu.vista.php';
?>
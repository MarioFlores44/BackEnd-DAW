<!-- Mario Flores -->

<?php
    require_once '../MODEL/model.php';
    require_once '../CONTROLADOR/session.php';

    // Función para ver si había algo escrito en mail
    function tenimMail() {
        if (isset($_POST['mail'])) {
            return htmlspecialchars($_POST['mail']);
        }
    }

    // Función para ver si había algo escrito en password
    function tenimPassword() {
        if (isset($_POST['password'])) {
            return htmlspecialchars($_POST['password']);
        }
    }

    // Función para comprobar si el login es correcto
    function comprobarLogin() {
        try {
            if (!empty($_POST['mail']) && !empty($_POST['password'])) {
                $mail = htmlspecialchars($_POST['mail']);
                $password = htmlspecialchars($_POST['password']);
                $login = login($mail, $password);
                if ($login == 0) {
                    session_start();
                    $_SESSION['email'] = $mail;
                    header('Location: ./modificar.php');
                } else if ($login == 1) {
                    echo '<script language="javascript">alert("El mail es incorrecto")</script>';
                } else if ($login == 2) {
                    echo '<script language="javascript">alert("La contraseña es incorrecta")</script>';
                }
                // ELSE IF si el post mail tiene algo pero el password está bacio
            } else if (empty($_POST['mail']) && !empty($_POST['password'])) {
                echo '<script language="javascript">alert("Introduce el correo")</script>';
            } else if (!empty($_POST['mail']) && empty($_POST['password'])) {
                echo '<script language="javascript">alert("Introduce la contraseña")</script>';
            } else {
                echo '<script language="javascript">alert("Introduce el correo y la contraseña")</script>';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    require '../VISTA/login.vista.php';
?>
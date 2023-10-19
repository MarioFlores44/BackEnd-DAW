<!-- Mario Flores -->

<?php
    require_once '../MODEL/model.php';

    // Función para ver si había algo escrito en mail
    function tenimMail() {
        if (isset($_POST['mail'])) {
            return $_POST['mail'];
        }
    }

    // Función para ver si había algo escrito en password
    function tenimPassword() {
        if (isset($_POST['password'])) {
            return $_POST['password'];
        }
    }

    // Función para comprobar si el login es correcto
    function comprobarLogin() {
        try {
            if (!empty($_POST['mail']) && !empty($_POST['password'])) {
                $mail = $_POST['mail'];
                $password = $_POST['password'];
                $login = login($mail, $password);
                if ($login) {
                    header('Location: ./index.php');
                } else {
                    echo '<script language="javascript">alert("El mail o la contrasenya son incorrectos")</script>';
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
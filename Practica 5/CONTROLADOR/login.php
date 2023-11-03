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

    if (!isset($_SESSION['intentos'])) {
        $_SESSION['intentos'] = 0;
    }

    // Función para comprobar si el login es correcto
    function comprobarLogin() {
        // Poner la etiqueta hidden al div con class g-recaptcha
        echo '<script language="javascript">document.getElementsByClassName("g-recaptcha")[0].setAttribute("hidden", "true");</script>';



        try {
           if ($_SESSION['intentos'] < 3) {
            if (!empty($_POST['mail']) && !empty($_POST['password'])) {
                $mail = htmlspecialchars($_POST['mail']);
                $password = htmlspecialchars($_POST['password']);
                $login = login($mail, $password);
                if ($login == 0) {
                    session_start();
                    $_SESSION['email'] = $mail;
                    $_SESSION['intentos'] = 0;
                    header('Location: ./modificar.php');
                } else if ($login == 1) {
                    echo '<script language="javascript">alert("El mail es incorrecto")</script>';
                    $_SESSION['intentos']++;
                } else if ($login == 2) {
                    echo '<script language="javascript">alert("La contraseña es incorrecta")</script>';
                    $_SESSION['intentos']++;
                }
                // ELSE IF si el post mail tiene algo pero el password está bacio
            } else if (empty($_POST['mail']) && !empty($_POST['password'])) {
                echo '<script language="javascript">alert("Introduce el correo")</script>';
                $_SESSION['intentos']++;
            } else if (!empty($_POST['mail']) && empty($_POST['password'])) {
                $_SESSION['intentos']++;
                echo '<script language="javascript">alert("Introduce la contraseña")</script>';
            } else {
                echo '<script language="javascript">alert("Introduce el correo y la contraseña")</script>';
            }
           } else {
            withCapcha();
           }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function withCapcha() {
        // Quitarle el hidden al div con class g-recaptcha
        echo '<script language="javascript">document.getElementsByClassName("g-recaptcha")[0].removeAttribute("hidden");</script>';
        if (!empty($_POST['mail']) && !empty($_POST['password'])) {
            $mail = htmlspecialchars($_POST['mail']);
            $password = htmlspecialchars($_POST['password']);
            $captcha = $_POST['g-recaptcha-response'];

            $secret = '6LcnSfEoAAAAACz6ATiTp-qwKCdB00BVG9nmC6N4';

            $login = login($mail, $password);
            if(!$captcha){

                echo "Por favor verifica el captcha";
                
                } else {

                    setcookie('intentos', 0);
                
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
                
                $arr = json_decode($response, TRUE);
                
                if($arr['success']){
                    if ($login == 0) {
                        session_start();
                        $_SESSION['email'] = $mail;
                        header('Location: ./modificar.php');
                    } else if ($login == 1) {
                        echo '<script language="javascript">alert("El mail es incorrecto")</script>';
                    } else if ($login == 2) {
                        echo '<script language="javascript">alert("La contraseña es incorrecta")</script>';
                    }
                }
            }
            // ELSE IF si el post mail tiene algo pero el password está bacio
        } else if (empty($_POST['mail']) && !empty($_POST['password'])) {
            echo '<script language="javascript">alert("Introduce el correo")</script>';
        } else if (!empty($_POST['mail']) && empty($_POST['password'])) {
            echo '<script language="javascript">alert("Introduce la contraseña")</script>';
        } else {
            echo '<script language="javascript">alert("Introduce el correo y la contraseña")</script>';
        }
    }

    require '../VISTA/login.vista.php';
?>
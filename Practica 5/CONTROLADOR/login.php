<!-- Mario Flores -->


<?php
    require_once '../MODEL/model.php';
    require_once '../CONTROLADOR/session.php';
    include_once '../hybridauth/src/autoload.php';
    require_once 'git-constants.php';

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
    
    if (!isset($_COOKIE['intentos'])) {
        setcookie('intentos', 0);
    }
    
    // Función para comprobar si el login es correcto
    function comprobarLogin() {
        // Poner la etiqueta hidden al div con class g-recaptcha
        echo '<script language="javascript">document.getElementsByClassName("g-recaptcha")[0].setAttribute("hidden", "true");</script>';
        
        
        
        try {
            if ($_COOKIE['intentos'] < 2) {
                if (!empty($_POST['mail']) && !empty($_POST['password'])) {
                $mail = htmlspecialchars($_POST['mail']);
                $password = htmlspecialchars($_POST['password']);
                $login = login($mail, $password);
                if ($login == 0) {
                    session_start();
                    $_SESSION['email'] = $mail;
                    setcookie('intentos', 0);
                    header('Location: ./modificar.php');
                } else if ($login == 1) {
                    echo '<script language="javascript">alert("El mail es incorrecto")</script>';
                    $intentos = $_COOKIE['intentos'] + 1;
                    setcookie('intentos', $intentos);
                } else if ($login == 2) {
                    echo '<script language="javascript">alert("La contraseña es incorrecta")</script>';
                    $intentos = $_COOKIE['intentos'] + 1;
                    setcookie('intentos', $intentos);
                }
                // ELSE IF si el post mail tiene algo pero el password está bacio
            } else if (empty($_POST['mail']) && !empty($_POST['password'])) {
                echo '<script language="javascript">alert("Introduce el correo")</script>';
                $intentos = $_COOKIE['intentos'] + 1;
                setcookie('intentos', $intentos);
            } else if (!empty($_POST['mail']) && empty($_POST['password'])) {
                $intentos = $_COOKIE['intentos'] + 1;
                    setcookie('intentos', $intentos);
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
    
    // <!-- ID CLIENTE GOOGLE AUTH: 753110686316-q4h2l2ee7t14rfsl2dmihm4sl5e09sv2.apps.googleusercontent.com -->
    // <!-- CLAVE CLIENTE GOOGLE AUTH: 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 -->
    require_once '../MODEL/google-conf.php';
require_once '../google-api-php/vendor/autoload.php';
// Creating new google client instance
$client = new Google_Client();
// Enter your Client ID
$client->setClientId('753110686316-q4h2l2ee7t14rfsl2dmihm4sl5e09sv2.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/BackEnd-DAW/Practica%205/CONTROLADOR/login.php');
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");
if(isset($_GET['code'])):
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if(!isset($token["error"])){
        $client->setAccessToken($token['access_token']);
        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `usuarios` WHERE `google_id`='$id'");
        if(mysqli_num_rows($get_user) > 0){
            $_SESSION['login_id'] = $id; 
            header('Location: modificar.php');
            exit;
        }
        else{
            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO `usuarios`(`google_id`,`email`) VALUES('$id','$email')");
            if($insert){
                header('Location: modificar.php');
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }
        }
    }
    else{
        header('Location: login.php');
        exit;
    }
    
else: 
    // Google Login Url = $client->createAuthUrl();
    
endif;

    require '../VISTA/login.vista.php';
?>
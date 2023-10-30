<!-- Mario Flores -->

<?php
    require_once '../MODEL/model.php';
    
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
        function comprobarRegistre() {
            try {
                if (!empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['repswd'])) {
                    if (!trobarMail($_POST['mail'])){
                        if ($_POST['password'] == $_POST['repswd']) {
                            $mail = htmlspecialchars($_POST['mail']);
                            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
                            registre($mail, $password);
                            echo '<script language="javascript">alert("Registrado correctamente")</script>';
                            echo '<script language="javascript">window.location.href="../CONTROLADOR/index.php"</script>';
                        
                        } else {
                            echo '<script language="javascript">alert("Las contraseñas no coinciden")</script>';
                        }
                    } else {
                        echo '<script language="javascript">alert("El mail ya está registrado")</script>';
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


    require '../VISTA/register.vista.php';
?>
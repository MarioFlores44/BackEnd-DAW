<?php
    require_once '../MODEL/model.php';

    function changePassword() {
        if (!empty($_POST['password']) && !empty($_POST['repswd'])) {
            if ($_POST['password'] == $_POST['repswd']) {
                $password = htmlspecialchars($_POST['password']);
                $mail = htmlspecialchars($_GET['mail']);
                $token = htmlspecialchars($_GET['token']);
                $change = changePasswordDB($mail, $password, $token);
                if ($change == 0) {
                    echo '<script language="javascript">alert("Contraseña cambiada correctamente")</script>';
                } else if ($change == 1) {
                    echo '<script language="javascript">alert("El mail no existe")</script>';
                } else if ($change == 2) {
                    echo '<script language="javascript">alert("El token no existe")</script>';
                } else if ($change == 3) {
                    echo '<script language="javascript">alert("El token ha expirado")</script>';
                }
            } else {
                echo '<script language="javascript">alert("Las contraseñas no coinciden")</script>';
            }
        } else if (empty($_POST['password']) && !empty($_POST['repswd'])) {
            echo '<script language="javascript">alert("Introduce la contraseña")</script>';
        } else if (!empty($_POST['password']) && empty($_POST['repswd'])) {
            echo '<script language="javascript">alert("Introduce la contraseña otra vez")</script>';
        }
    }

    require '../VISTA/change-password.vista.php';
?>
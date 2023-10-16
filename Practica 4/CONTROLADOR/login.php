<!-- Mario Flores -->

<?php
    require_once '../MODEL/model.php';

    // Función para mostrar el menú de login
    function mostrarLogin() {
        $conexxtio = conect();

    }

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

    require '../VISTA/login.vista.php';
?>
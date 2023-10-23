<?php
    require_once '../model/pdo-users.php';

    // Ex6
    function eliminarUsuari() {
        if ($_SESSION['userId'] != 0) {
            // Sense temps de mirar de possar que l'usuari confirmi
            deleteUser($_SESSION['userId']);
        }
    }

?>
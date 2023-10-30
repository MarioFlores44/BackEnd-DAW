<!-- Mario Flores -->

<?php
    // Funció de session_start
    function sessionStart($mail) {
        session_start();
        $_SESSION['email'] = $mail;
    }
    // Función de session_destroy
    function sessionEnd() {
        session_start();
        session_destroy();
    }

?>
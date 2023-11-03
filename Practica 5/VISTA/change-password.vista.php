<!-- Mario Flores -->

<?php
    require_once "../CONTROLADOR/change-password.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils.css">
    <title>Registre</title>
</head>
<body>
<div class="contenidor">
    <h1>Registre</h1>
        <div class="registre">
        <form method="post">
        <label for="password">Nova Contrassenya</label>
        <input type="password" name="password" class="password"><br>
        <label for="password2">Repetir contrassenya</label>
        <input type="password" name="repswd" class="repswd"><br>
        <input type="submit" value="Canviar">
        <button type="button" onclick="window.location.href='../CONTROLADOR/index.php'">Tornar</button>
        </form>
        </div>
        <div>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    changePassword();
                }
            ?>
        </div>
    </div>
</body>
</html>
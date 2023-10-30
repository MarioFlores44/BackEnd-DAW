<!-- Mario Flores -->
<?php
    require_once "../CONTROLADOR/recu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils.css">
    <title>Recuperar Contrassenya</title>
</head>
<body>
    <div class="contenidor">
    <h1>Recuperar Contrassenya</h1>
        <div class="login">
        <form method="post">
        <label for="mail">Email</label>
        <input type="text" name="mail" class="mail"><br>
        <input type="submit" value="Recuperar">
        <button type="button" onclick="window.location.href='../CONTROLADOR/login.php'">Tornar</button><br>
        </form>
        </div>
        <div>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    mandarMail();
                }
            ?>
        </div>
    </div>
</body>
</html>
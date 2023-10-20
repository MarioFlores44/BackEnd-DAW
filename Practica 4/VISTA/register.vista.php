<!-- Mario Flores -->

<?php
    require_once "../CONTROLADOR/register.php";
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
        <label for="mail">Email</label>
        <input type="text" name="mail" class="mail" value="<?php echo tenimMail();?>"><br>
        <label for="password">Contrassenya</label>
        <input type="password" name="password" class="password" value=<?php echo tenimPassword();?>><br>
        <label for="password">Repetir contrassenya</label>
        <input type="password" name="repswd" class="repswd"><br>
        <input type="submit" value="Entrar">
        <button type="button" onclick="window.location.href='../CONTROLADOR/index.php'">Tornar</button>
        </form>
        </div>
        <div>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    comprobarRegistre();
                }
            ?>
        </div>
    </div>
</body>
</html>
<!-- Mario Flores -->
<?php
    require_once "../CONTROLADOR/login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils.css">
    <title>Login</title>
</head>
<body>
    <div class="contenidor">
    <h1>Login</h1>
        <div class="login">
        <form method="post">
        <label for="mail">Email</label>
        <input type="text" name="mail" class="mail" value="<?php echo tenimMail();?>"><br>
        <label for="password">Contrasenya</label>
        <input type="password" name="password" class="password" value=<?php echo tenimPassword();?>><br>
        <input type="submit" value="Entrar">
        <button type="button" onclick="window.location.href='../CONTROLADOR/index.php'">Tornar</button>
        </form>
        </div>
        <div>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    comprobarLogin();
                }
            ?>
        </div>
    </div>
</body>
</html>
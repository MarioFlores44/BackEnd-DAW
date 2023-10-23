<?php
    require_once '../controller/show-users.php'
?>
<head>
<link rel="shortcut icon" href="../view/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../view/bootstrap/css/bootstrap.min.css">
  <script src="../view/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../view/fontello/css/fontello.css">
<link rel="stylesheet" href="../view/styles.css">
</head>
<body>
<?php require_once '../controller/navbar.php' ?>
<div id="allUsers">
    <?php
        users();
    ?>
</div>
</body>

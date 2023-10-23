<!-- Ex 14 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Recovery</title>
  <!-- Favicon -->
	<link rel="shortcut icon" href="../view/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../view/bootstrap/css/bootstrap.min.css">
  <script src="../view/bootstrap/js/bootstrap.min.js"></script>
  <!-- Fontawesome -->
  <link rel="stylesheet" href="../view/fontello/css/fontello.css">
  <!-- Estils propis -->
  <link rel="stylesheet" href="../view/styles.css">
</head>

<body>
<?php require_once '../controller/navbar.php' ?>

  <main class="container py-5">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-5 d-md-block d-none">
        <img src="../view/images/signup.jpg" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-6 col-12">
        <h2 class="mb-4">Mail sent</h2>
        <?php enviarMail();?>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include_once '../view/footer.view.php' ?>
</body>

</html>
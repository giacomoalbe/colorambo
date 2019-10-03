<?php
require "controller.php";

$userLoggedIn = getLoggedInUser();

if (isset($_POST['name'])) {
  $name = $_POST['name'];

  $red = intval($_POST['red']);
  $green = intval($_POST['green']);
  $blue = intval($_POST['blue']);

  $code = sprintf("%02X", $red) . sprintf("%02X", $green) . sprintf("%02X", $blue);

  addColor($name, $code);

  header('Location: ../index.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Colorambo | Aggiungi Colore ?></title>
  <link href="https://fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i|Montserrat+Alternates:400,400i,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="header">
    <h1>
      <a href="index.php">
          Colorambo
      </a>
    </h1>
    <div class="login">
      <?php if ($userLoggedIn == null) { ?>
      <span>
        <i class="fas fa-user"></i>
        <a href="..php/login.php">Login</a>
      </span>
      <?php } else { ?>
      <div>
        <i class="fas fa-user"></i>
        Ciao, <span class="tx-bold"><?=$userLoggedIn?></span>
      </div>
      <a href="logout.php">Logout</a>
      <?php } ?>
    </div>
  </div>
  <div class="content">
    <div class="flex-cont-col max-width form-cont add-color">
      <h1>Aggiungi Colore</h1>
      <form action="" method="POST">
        <div>
          <label for="name">Nome:</label>
          <input type="text" name="name">
        </div>
        <!-- <div>
          <label for="">Codice</label>
          <input type="text" name="code">
        </div> -->
        <div>
          <label for="">Rosso</label>
          <input type="range" min="0" max="255" name="red">
        </div>
        <div>
          <label for="">Verde</label>
          <input type="range" min="0" max="255" name="green">
        </div>
        <div>
          <label for="">Blue</label>
          <input type="range" min="0" max="255" name="blue">
        </div>
        <div>
          <input type="submit" value="Aggiungi"/>
        </div>
      </form>
    </div>
  </div>
  <script src="../js/script.js"></script>
</body>
</html>

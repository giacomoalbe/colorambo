<?php
require "controller.php";
//require "mock_controller.php";

$colori = getAllColors();

$userLoggedIn = getLoggedInUser();

if ($userLoggedIn != null) {
  $colori[] = [
    "code" => "#ffffff",
    "name" => "Aggiungi colore",
    "is_add" => true,
  ];
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Colorambo v0.0.1</title>
  <link href="https://fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i|Montserrat+Alternates:400,400i,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="style.css">
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
        <a href="login.php">Login</a>
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
    <div class="colors-container max-width">
      <?php foreach ($colori as $color) { ?>
      <div
        class="color"
      >
        <div
          class="color-bg"
          style="background-color: <?=$color['code']?>"
        >
          <div class="color-cont">
            <span>
              <?php if (isset($color['is_add'])) { ?>
              <a
                href="aggiungi_colore.php"
                style="color: #888"
              >
                Aggiungi Colore
              </a>
              <?php } else { ?>
              <a
                href="dettaglio.php?id=<?=$color['id']?>"
                style="color: <?=$color['code']?>"
              >
                <?=$color['name']?>
              </a>
              <?php } ?>
            </span>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>

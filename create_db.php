<?php
require "utility.php";

// Creazione tabella utenti
$sqlCreateUserTable = "CREATE TABLE utenti (
  id        INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username  VARCHAR(30) NOT NULL,
  password  VARCHAR(30) NOT NULL
)";

// Creazione tabella colori
$sqlCreateColorTable = "CREATE TABLE colori (
  id        INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name  VARCHAR(30) NOT NULL,
  code  VARCHAR(30) NOT NULL,
  red   INT(3) NOT NULL,
  green INT(3) NOT NULL,
  blue  INT(3) NOT NULL
)";

$conn = getDBConnection();

createDB($conn, "colorambo");

createTable($conn, "utenti", $sqlCreateUserTable);
createTable($conn, "colori", $sqlCreateColorTable);
?>

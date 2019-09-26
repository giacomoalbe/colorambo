<?php
function createTable($conn, $tableName, $tableSql) {
  if (mysqli_query($conn, $tableSql)) {
    echo "Tabella $tableName creata con successo <br>";
  } else {
    $errorCode = mysqli_errno($conn);

    switch ($errorCode) {
    case 1050:
      echo "Tabella $tableName già esistente, proseguo <br>";
      break;

    default:
      die(
        "Errore creazione tabella $tableName: "
        . $errorCode . ": "
        . mysqli_error($conn)
      );
    }

  }
}

function createDB($conn, $dbName) {
  // Creazione Database Colorambo
  $sqlCreateDatabase = "CREATE DATABASE $dbName";

  if (mysqli_query($conn, $sqlCreateDatabase)) {
    echo "Database $dbName creato";
  } else {
    $errorCode = mysqli_errno($conn);

    switch ($errorCode) {
      case 1007:
        // Il database esiste, posso andare avanti
        // a creare le tabelle
        echo "Database $dbName esiste, proseguo. <br>";
        break;

      default:
        // In tutti gli altri caso do errore ed esco
        die(
          "Errore creazione database $dbName"
          . $errorCode . ": "
          . mysqli_error($conn)
        );
    }
  }

  echo "Selezionato database $dbName <br>";
  mysqli_select_db($conn, $dbName);
}

function getDBConnection() {
  // TODO: Spostare queste informazioni
  // in un file ENV
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = mysqli_connect($servername, $username, $password);

  if (!$conn) {
    die("Connessione NON RIUSCITA con $servername <br>");
  } else {
    //echo "Connessione OK con $servername <br>";
  }

  return $conn;
}

function connectDB() {
  // TODO: Spostare queste informazioni
  // in un file ENV
  $dbName = "colorambo";

  $conn = getDBConnection();

  mysqli_select_db($conn, $dbName);

  return $conn;
}

function createUser($conn, $username, $password) {
  echo "Creo utente $username <br>";

  $sqlCreateUser = "
    INSERT INTO utenti
    (username, password)
    VALUES
    ('$username', '$password')
  ";

  $result = mysqli_query($conn, $sqlCreateUser);

  if ($result) {
    echo "Utente $username inserito con successo <br>";
  } else {
    die (
      "Errore nell'inserimento di $username: "
      . mysqli_errno($conn) . ": "
      . mysqli_error($conn) . "<br>");
  }
}

function createColor($conn, $name, $code) {
  echo "Creo colore $name con hex $code <br>";

  if (strlen($code) != 6) {
    echo "ERRORE: il codice deve essere di 6 caratteri. Esempio ffaabb <br>";
    return false;
  }

  $red = hexdec(substr($code, 0, 2));
  $green = hexdec(substr($code, 2, 2));
  $blue = hexdec(substr($code, 4, 2));

  $code = "#" . $code;

  $sqlCreateColor = "
    INSERT INTO colori
    (name, code, red, green, blue)
    VALUES
    ('$name', '$code', $red, $green, $blue)
  ";

  $result = mysqli_query($conn, $sqlCreateColor);

  if ($result) {
    echo "Colore $name con $red, $green, $blue creato con successo <br>";
  } else {
    die (
      "Errore nell'inserimento di $name: "
      . mysqli_errno($conn) . ": "
      . mysqli_error($conn) . "<br>");
  }
}
?>

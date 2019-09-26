<?php

require "utility.php";

function getAllColors() {
  $conn = connectDB();

  $sqlAllColors = "
    SELECT * FROM colori
  ";

  $resultSet = mysqli_query($conn, $sqlAllColors);

  return mysqli_fetch_all($resultSet, MYSQLI_ASSOC);
}

function getColorFromId($colorId) {
  $conn = connectDB();

  $sqlAllColors = "
    SELECT * FROM colori WHERE id = $colorId
  ";

  $resultSet = mysqli_query($conn, $sqlAllColors);

  return mysqli_fetch_assoc($resultSet);
}

function tryLogin($username, $password) {
  $conn = connectDB();

  $sqlAllColors = "
    SELECT *
    FROM utenti
    WHERE username = '$username'
    AND password = '$password'
  ";

  $resultSet = mysqli_query($conn, $sqlAllColors);

  $isUser = mysqli_num_rows($resultSet) == 1;

  return $isUser;
}

function getLoggedInUser() {
  if (isset($_COOKIE['user'])) {
    return $_COOKIE['user'];
  }

  return null;
}

function addColor($name, $code) {
  $conn = connectDB();

  echo $code;

  createColor($conn, $name, $code);
}
?>

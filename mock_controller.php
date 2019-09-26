<?php
// IMPORTANTE!
// QUESTA PARTE VA CONCORDATA TRA
// FRONT END E BACK END!
// ALTRIMENTI PIANGO E FARÀ SCHIFO IL PROGETTO!

function getAllColors() {
  return [
    [
      "name" => "Blu Luca",
      "code" => "#cc22ee"
    ],
    [
      "name" => "Verde Mauro",
      "code" => "#aaee33"
    ],
  ];
}

function getLoggedInUser() {
  // Utente non loggato
  //return null;

  // Utente loggato
  return "Paolo";
}

?>

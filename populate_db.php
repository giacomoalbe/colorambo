<?php
require "utility.php";

// Crea un utente per il login
$conn = connectDB();

createUser($conn, "admin", "password");

// Crea i tre colori primari
createColor($conn, "Rosso", "ff0000");
createColor($conn, "Verde", "00ff00");
createColor($conn, "Blue", "0000ff");
?>

<?php
// database gegevens voor het inloggen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc_specs";

// connectie met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// check of de connectie is gelukt, zo niet dan krijg je een error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
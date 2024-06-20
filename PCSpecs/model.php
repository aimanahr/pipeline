<?php
// pakt de dbconn file om de database connectie te maken
require_once 'dbconn.php';

// hier word een klasse gemaakt met de naam PC
class PC {
    // prive variable die de database connectie maakt
    private $conn;

    // dit initialiseerd de database connectie
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // functie om alle pcs uit de database te krijgen
    public function getAllPCs() {
        // sql query om alle pc gegevens te pakken
        $sql = "SELECT * FROM pcs";
        // de query word uitgevoerd en brengt alle gegevens terug
        $result = $this->conn->query($sql);
        // returned alle row gegevens
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // functie om pcs met een ID terug te krijgen
    public function getPCById($id) {
        // sql query om een pc met een bepaald ID terug te krijgen
        $sql = "SELECT * FROM pcs WHERE id = $id";
        // de query word uitgevoerd en brengt alle gegevens terug
        $result = $this->conn->query($sql);
        // returned alle row gegevens
        return $result->fetch_assoc();
    }

    // functie om een nieuwe pc toe te voegen
    public function addPC($brand, $cpu, $ram, $gpu) {
        // sql query om een nieuwe pc toe te voegen
        $sql = "INSERT INTO pcs (brand, cpu, ram, gpu) VALUES ('$brand', '$cpu', '$ram', '$gpu')";
        // de query word uitgevoerd
        return $this->conn->query($sql);
    }

    // functie om een pc up te daten
    public function updatePC($id, $brand, $cpu, $ram, $gpu) {
        // sql query om een pc up te daten
        $sql = "UPDATE pcs SET brand='$brand', cpu='$cpu', ram='$ram', gpu='$gpu' WHERE id=$id";
        // de query word uitgevoerd
        return $this->conn->query($sql);
    }

    // functie om een pc te verwijderen
    public function deletePC($id) {
        // sql query om een pc te verwijderen met een bepaalde id
        $sql = "DELETE FROM pcs WHERE id=$id";
        // de query word uitgevoerd
        return $this->conn->query($sql);
    }
}

// handelt het gebruik van de pc model samen met de database connectie
$pc_model = new PC($conn);
?>
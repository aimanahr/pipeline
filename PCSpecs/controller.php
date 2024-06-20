<?php
// pak de model zodat er gecommuniceerd kan worden met de database
require_once 'model.php';

// hier word een klasse gemaakt met de naam Controller
class Controller {
    // prive variable die de model gegevens opvangt
    private $model;

    // dit initialiseerd de model
    public function __construct($model) {
        $this->model = $model;
    }

    // functie om alle pcs uit de database te halen
    public function getAllPCs() {
        return $this->model->getAllPCs();
    }

    // functie om een niewe pc toe te voegen in de database
    public function addPC($brand, $cpu, $ram, $gpu) {
        return $this->model->addPC($brand, $cpu, $ram, $gpu);
    }

    // functie om een pc te veranderen in de database
    public function updatePC($id, $brand, $cpu, $ram, $gpu) {
        return $this->model->updatePC($id, $brand, $cpu, $ram, $gpu);
    }

    // functie om een pc te verwijderen van de database
    public function deletePC($id) {
        return $this->model->deletePC($id);
    }

    // functie die de post request van een pc toevoegen aanpakt
    public function handleAddRequest($post) {
        if (isset($post["add"])) {
            $brand = $post["brand"];
            $cpu = $post["cpu"];
            $ram = $post["ram"];
            $gpu = $post["gpu"];
            // hier word gebruik gemaakt van de addPC functie om een nieuwe pc toe te voegen
            $this->addPC($brand, $cpu, $ram, $gpu);
            // om er voor te zorgen dat na het refreshen van de pagina de post request niet nog een keer word uitgevoerd, word je naar de originele pagina teruggestuurd
            header("Location: {$_SERVER['REQUEST_URI']}");
            exit();
        }
    }

    // functie die de post request van een pc updaten aanpakt
    public function handleUpdateRequest($post) {
        if (isset($post["update"])) {
            $id = $post["id"];
            $brand = $post["brand"];
            $cpu = $post["cpu"];
            $ram = $post["ram"];
            $gpu = $post["gpu"];
            // hier word gebruik gemaakt van de updatePC functie om een pc up te daten
            $this->updatePC($id, $brand, $cpu, $ram, $gpu);
            // om er voor te zorgen dat na het refreshen van de pagina de post request niet nog een keer word uitgevoerd, word je naar de originele pagina teruggestuurd
            header("Location: {$_SERVER['REQUEST_URI']}");
            exit();
        }
    }

    // functie die de post request van een pc verwijderen aanpakt
    public function handleDeleteRequest($post) {
        if (isset($post["delete"])) {
            $id = $post["id"];
            // hier word gebruik gemaakt van de deletePC functie om een pc te verwijderen
            $this->deletePC($id);
            // om er voor te zorgen dat na het refreshen van de pagina de post request niet nog een keer word uitgevoerd, word je naar de originele pagina teruggestuurd
            header("Location: {$_SERVER['REQUEST_URI']}");
            exit();
        }
    }
}

// handelt het gebruik van de controller samen met de model
$controller = new Controller($pc_model);

// dit handelt alle post requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // pakt alle functies voor alle post requests
    $controller->handleAddRequest($_POST);
    $controller->handleUpdateRequest($_POST);
    $controller->handleDeleteRequest($_POST);
}
?>
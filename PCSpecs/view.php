<?php
// pak de controller zodat er gecommuniceerd kan worden met de controller en model
require_once 'controller.php';

// alle pcs ophalen van de controller
$pcs = $controller->getAllPCs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Specs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>PC Specs</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>CPU</th>
            <th>RAM</th>
            <th>GPU</th>
            <th>Actions</th>
        </tr>
        <!-- loop die alle pcs pakt en de bijhorende gegevens -->
        <?php foreach ($pcs as $pc): ?>
            <tr>
                <!-- form voor elke pc waar ook update en delete functies bij komen -->
                <form method="post">
                    <td><?= $pc['id'] ?></td>
                    <td><input type="text" name="brand" value="<?= $pc['brand'] ?>"></td>
                    <td><input type="text" name="cpu" value="<?= $pc['cpu'] ?>"></td>
                    <td><input type="text" name="ram" value="<?= $pc['ram'] ?>"></td>
                    <td><input type="text" name="gpu" value="<?= $pc['gpu'] ?>"></td>
                    <input type="hidden" name="id" value="<?= $pc['id'] ?>">
                    <!-- de "U & D" functies voor CRUD-->
                    <td>
                        <button type="submit" name="update">Update</button>
                        <button type="submit" name="delete">Delete</button>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
        <tr>
            <!-- form waar je een nieuwe pc kan toevoegen -->
            <form method="post">
                <td>#</td>
                <td><input type="text" name="brand" placeholder="Brand" required></td>
                <td><input type="text" name="cpu" placeholder="CPU" required></td>
                <td><input type="text" name="ram" placeholder="RAM" required></td>
                <td><input type="text" name="gpu" placeholder="GPU" required></td>
                <!-- de "C" functie voor CRUD -->
                <td><button type="submit" name="add">Add</button></td>
            </form>
        </tr>
    </table>
</body>
</html>
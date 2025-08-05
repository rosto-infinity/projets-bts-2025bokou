<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dossiers = $_POST['dossiers'];
    $rendez_vous = $_POST['rendez_vous'];
    $courriers = $_POST['courriers'];
    $autres = $_POST['autres'];

    $sql = "INSERT INTO categories (dossiers, rendez_vous, courriers, autres) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$dossiers, $rendez_vous, $courriers, $autres]);
    $message = "<div class='container'><p style='color:#1b5e20;'>Catégorie ajoutée.</p></div>";
}
?>
<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dossiers = $_POST['dossiers'];
    $rendez_vous = $_POST['rendez_vous'];
    $courriers = $_POST['courriers'];
    $autres = $_POST['autres'];

    $sql = "INSERT INTO categories (dossiers, rendez_vous, courriers, autres) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$dossiers, $rendez_vous, $courriers, $autres]);
    $message = "<div class='container'><p style='color:#1b5e20;'>Catégorie ajoutée.</p></div>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une catégorie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php if (!empty($message)) echo $message; ?>
<div class="container">
<h1>Ajouter une catégorie</h1>
<form method="post">
    <input name="dossiers" placeholder="Dossiers" required>
    <input name="rendez_vous" placeholder="Rendez-vous">
    <input name="courriers" placeholder="Courriers">
    <input name="autres" placeholder="Autres">
    <button type="submit">Ajouter</button>
</form>
</div>
</body>
</html>
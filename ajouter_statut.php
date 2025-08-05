
<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $effectuer = $_POST['effectuer'];
    $non_effectuer = $_POST['non_effectuer'];

    $sql = "INSERT INTO statut (effectuer, non_effectuer) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$effectuer, $non_effectuer]);
    $message = "<div class='container'><p style='color:#1b5e20;'>Statut ajouté.</p></div>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un statut</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php if (!empty($message)) echo $message; ?>
<div class="container">
<h1>Ajouter un statut</h1>
<form method="post">
    <input name="effectuer" placeholder="Effectuer" required>
    <input name="non_effectuer" placeholder="Non effectuer">
    <button type="submit">Ajouter</button>
</form>
</div>
</body>
</html>
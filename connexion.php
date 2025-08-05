<?php

require 'database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $message = "<div class='container'><p style='color:#1b5e20;'>Connexion réussie.</p></div>";
        // header('Location: tableau_de_bord.php'); // décommente pour rediriger
    } else {
        $message = "<div class='container'><p style='color:red;'>Identifiants incorrects.</p></div>";
    }
}
?>
<?php
require 'database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $message = "<div class='container'><p style='color:#1b5e20;'>Connexion réussie.</p></div>";
        // header('Location: tableau_de_bord.php'); // décommente pour rediriger
    } else {
        $message = "<div class='container'><p style='color:red;'>Identifiants incorrects.</p></div>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php if (!empty($message)) echo $message; ?>
<div class="container">
<h1>Connexion utilisateur</h1>
<form method="post">
    <input name="email" placeholder="Email" required type="email">
    <input name="mot_de_passe" placeholder="Mot de passe" type="password" required>
    <button type="submit">Connexion</button>
</form>
</div>
</body>
</html>
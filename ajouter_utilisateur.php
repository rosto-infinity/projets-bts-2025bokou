<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $role = $_POST['role'] ?? 'user';

    $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $mot_de_passe, $role]);
    $message = "<div class='container'><p style='color:#1b5e20;'>Utilisateur ajouté avec succès.</p></div>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php if (!empty($message)) echo $message; ?>
<div class="container">
<h1>Ajouter un utilisateur</h1>
<form method="post">
    <input name="nom" placeholder="Nom" required>
    <input name="prenom" placeholder="Prénom" required>
    <input name="email" placeholder="Email" required type="email">
    <input name="mot_de_passe" placeholder="Mot de passe" type="password" required>
    <select name="role">
        <option value="user">Utilisateur</option>
        <option value="admin">Admin</option>
    </select>
    <button type="submit">Ajouter</button>
</form>
</div>
</body>
</html>
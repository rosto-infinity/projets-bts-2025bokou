<?php

// -Inclusion du fichier de connexion à la base de données
require 'database.php';

// -Démarrage de la session pour récupérer l'utilisateur connecté
session_start();

// -Traitement du formulaire d'ajout de tâche
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // -Récupération des données du formulaire
    $titre = $_POST['titre']; // T-itre de la tâche
    $description = $_POST['description']; // Description de la tâche
    $categorie_id = $_POST['categorie_id']; // Catégorie sélectionnée
    $statut_id = $_POST['statut_id']; // Statut sélectionné
    // -Récupération de l'ID utilisateur depuis la session (à adapter selon la gestion des utilisateurs)
    $utilisateur_id = $_SESSION['user_id'] ?? 1;
    // -Date de création et de modification (initialement identiques)
    $date_creation = date('Y-m-d');
    $date_moditifation = $date_creation;

    // -Préparation de la requête d'insertion de la tâche
    $sql = "INSERT INTO taches (titre, description, date_creaction, date_moditifation, statut, utilisateur_id, categorie_id, statut_id) VALUES (?, ?, ?, ?, 0, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    // -Exécution de la requête avec les valeurs du formulaire
    $stmt->execute([$titre, $description, $date_creation, $date_moditifation, $utilisateur_id, $categorie_id, $statut_id]);
    // -Message de confirmation à afficher à l'utilisateur
    $message = "<div class='container'><p style='color:#1b5e20;'>Tâche ajoutée.</p></div>";
}

// --Récupération de toutes les catégories pour alimenter la liste déroulante du formulaire
$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
// Récupération de tous les statuts pour alimenter la liste déroulante du formulaire
$statuts = $pdo->query("SELECT * FROM statut")->fetchAll();
?>
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $categorie_id = $_POST['categorie_id'];
    $statut_id = $_POST['statut_id'];
    $utilisateur_id = $_SESSION['user_id'] ?? 1; // à adapter
    $date_creation = date('Y-m-d');
    $date_moditifation = $date_creation;

    $sql = "INSERT INTO taches (titre, description, date_creaction, date_moditifation, statut, utilisateur_id, categorie_id, statut_id) VALUES (?, ?, ?, ?, 0, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titre, $description, $date_creation, $date_moditifation, $utilisateur_id, $categorie_id, $statut_id]);
    $message = "<div class='container'><p style='color:#1b5e20;'>Tâche ajoutée.</p></div>";
}

// -Récupérer catégories et statuts pour le formulaire
$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
$statuts = $pdo->query("SELECT * FROM statut")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une tâche</title>
    <!-- Lien vers la feuille de style principale -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
// --ttAffichage du message de confirmation si la tâche a été ajoutée
if (!empty($message)) echo $message; 
?>
<div class="container">
    <h1>Ajouter une tâche</h1>
    <!-- Formulaire d'ajout de tâche -->
    <form method="post">
        <!-- Champ pour le titre de la tâche -->
        <input name="titre" placeholder="Titre" required>
        <!-- Champ pour la description de la tâche -->
        <input name="description" placeholder="Description" required>
        <!-- Liste déroulante des catégories -->
        <select name="categorie_id">
            <?php foreach ($categories as $cat) echo "<option value='{$cat['categorie_id']}'>{$cat['dossiers']}</option>"; ?>
        </select>
        <!-- Liste déroulante des statuts -->
        <select name="statut_id">
            <?php foreach ($statuts as $stat) echo "<option value='{$stat['statut_id']}'>{$stat['effectuer']}</option>"; ?>
        </select>
        <!-- Bouton de soumission du formulaire -->
        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>
<?php
require 'database.php';

// Suppression d'une tâche
if (isset($_GET['supprimer'])) {
    $id = (int)$_GET['supprimer'];
    $pdo->prepare('DELETE FROM taches WHERE tache_id = ?')->execute([$id]);
    echo "<div class='container'><p style='color:#1b5e20;'>Tâche supprimée.</p></div>";
}

// Validation d'une tâche (statut = 1)
if (isset($_GET['valider'])) {
    $id = (int)$_GET['valider'];
    $pdo->prepare('UPDATE taches SET statut = 1 WHERE tache_id = ?')->execute([$id]);
    echo "<div class='container'><p style='color:#1b5e20;'>Tâche validée.</p></div>";
}

// Edition d'une tâche (affichage du formulaire)
if (isset($_GET['editer'])) {
    $id = (int)$_GET['editer'];
    $tacheEdit = $pdo->prepare('SELECT * FROM taches WHERE tache_id = ?');
    $tacheEdit->execute([$id]);
    $tacheEdit = $tacheEdit->fetch();
}

// Mise à jour d'une tâche
if (isset($_POST['maj_tache'])) {
    $id = (int)$_POST['tache_id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $pdo->prepare('UPDATE taches SET titre=?, description=? WHERE tache_id=?')->execute([$titre, $description, $id]);
    echo "<div class='container'><p style='color:#1b5e20;'>Tâche modifiée.</p></div>";
}

$sql = "SELECT t.*, c.dossiers, s.effectuer FROM taches t
        JOIN categories c ON t.categorie_id = c.categorie_id
        JOIN statut s ON t.statut_id = s.statut_id";
$taches = $pdo->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<div class="container">
<h1>Liste des tâches</h1>
<table style="width:100%;background:#e8f5e9;border-radius:8px;">
    <tr style="background:#43e97b;color:#fff;">
        <th>Titre</th>
        <th>Catégorie</th>
        <th>Statut</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($taches as $tache): ?>
    <tr id="tache-<?= $tache['tache_id'] ?>">
        <td><?= htmlspecialchars($tache['titre']) ?></td>
        <td><?= htmlspecialchars($tache['dossiers']) ?></td>
        <td>
            <?php if ($tache['statut']): ?>
                <span style="color:#1b5e20;"><i class="fa-solid fa-circle-check"></i> Validée</span>
            <?php else: ?>
                <span style="color:#bdbd00;"><i class="fa-regular fa-clock"></i> À faire</span>
            <?php endif; ?>
        </td>
        <td>
            <a href="?editer=<?= $tache['tache_id'] ?>" title="Éditer"><i class="fa-solid fa-pen-to-square" style="color:#388e3c;"></i></a>
            <a href="#" onclick="supprimerTache(<?= $tache['tache_id'] ?>);return false;" title="Supprimer"><i class="fa-solid fa-trash" style="color:#b71c1c;"></i></a>
            <?php if (!$tache['statut']): ?>
            <a href="#" onclick="validerTache(<?= $tache['tache_id'] ?>);return false;" title="Valider"><i class="fa-solid fa-check" style="color:#1b5e20;"></i></a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php if (!empty($tacheEdit)): ?>
<div style="margin-top:32px;">
    <h2>Éditer la tâche</h2>
    <form method="post">
        <input type="hidden" name="tache_id" value="<?= $tacheEdit['tache_id'] ?>">
        <input name="titre" value="<?= htmlspecialchars($tacheEdit['titre']) ?>" required>
        <input name="description" value="<?= htmlspecialchars($tacheEdit['description']) ?>" required>
        <button type="submit" name="maj_tache">Valider</button>
    </form>
</div>
<?php endif; ?>
</div>
<script>
function supprimerTache(id) {
    if(confirm('Supprimer cette tâche ?')) {
        window.location = '?supprimer=' + id;
    }
}
function validerTache(id) {
    if(confirm('Valider cette tâche ?')) {
        window.location = '?valider=' + id;
    }
}
</script>
</body>
</html>
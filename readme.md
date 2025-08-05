# 📌 OfficeFlow – Application de Gestion du Secrétariat

**OfficeFlow** est une application web conçue pour automatiser et centraliser la gestion des tâches administratives dans le centre de formation professionnelle la cannadienne, 
Elle permet de gérer efficacement les **utilisateurs**, les **tâches**, les **catégories** et les **statuts**, tout en respectant les rôles de chaque membre de l’équipe administrative.

---

## 🧭 Objectifs du projet

- Organiser les tâches de secrétariat (inscriptions, dossiers, réunions…)
- Affecter les responsabilités à différents utilisateurs
- Suivre l’état d’avancement des tâches en temps réel
- Sécuriser l’accès grâce à un système de connexion avec rôles
- Simplifier le travail quotidien du personnel administratif

---

## ⚙️ Fonctionnalités principales

| Fonctionnalité          | Description |
|-------------------------|-------------|
| 🔐 Connexion sécurisée  | Authentification des utilisateurs avec mot de passe haché |
| 👤 Gestion des utilisateurs | Ajout, affichage, suppression, rôles (admin, assistant, utilisateur) |
| 📋 Gestion des tâches   | Création, affectation, date limite, suivi |
| 🗂️ Catégorisation       | Classement des tâches selon des thèmes personnalisés |
| ⏳ Suivi des statuts     | États des tâches : À faire, En cours, Terminée |
| 📊 Tableau de bord (à venir) | Vue synthétique des activités du secrétariat |

---

## 🧪 Technologies utilisées

| Technologie   | Usage                           |
|---------------|----------------------------------|
| HTML5         | Structure de l’interface         |
| CSS3          | Mise en page, animations         |
| JavaScript    | Comportement dynamique basique  |
| PHP (procédural) | Traitement des données côté serveur |
| MySQL         | Base de données relationnelle    |
| XAMPP  | Serveur local pour les tests     |

---



---

## 🛠️ Installation du projet

### 1. Installer un serveur local
> Recommandé : **XAMPP** 

### 2. Créer la base de données
- Ouvrir `http://localhost/phpmyadmin`
- Créer une base de données nommée `taches_secretariat`
- Importer le fichier `sql/officeflow_schema.sql`

### 3. Configurer la connexion MySQL dans les fichiers PHP
```php
$host = "localhost";
$dbname = "taches_secretariat";
$user = "root";
$pass = ""; 

### auteur
nom: bokou laurenne grace
encadré par.waffo lélé rostand
projet de stage professionnel -aout 2025
projet-bts-2025

-- Table : utilisateurs
CREATE TABLE utilisateurs (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(125) NOT NULL,
  prenom VARCHAR(125) NOT NULL,
  email VARCHAR(125) NOT NULL,
  mot_de_passe VARCHAR(125) NOT NULL,
  role ENUM('user', 'admin') NOT NULL DEFAULT 'user'
);

-- Table : categories
CREATE TABLE categories (
  categorie_id INT PRIMARY KEY AUTO_INCREMENT,
  dossiers VARCHAR(452),
  rendez_vous TEXT,
  courriers VARCHAR(125),
  autres TEXT
);

-- Table : statut
CREATE TABLE statut (
  statut_id INT PRIMARY KEY AUTO_INCREMENT,
  effectuer VARCHAR(125),
  non_effectuer VARCHAR(125)
);

-- Table : taches
CREATE TABLE taches (
  tache_id INT PRIMARY KEY AUTO_INCREMENT,
  titre VARCHAR(125) NOT NULL,
  description VARCHAR(251),
  date_creaction DATE,
  date_moditifation DATE,
  statut BOOLEAN,
  test VARCHAR(255),
  utilisateur_id INT NOT NULL,
  categorie_id INT NOT NULL,
  statut_id INT NOT NULL,
  FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id),
  FOREIGN KEY (categorie_id) REFERENCES categories(categorie_id),
  FOREIGN KEY (statut_id) REFERENCES statut(statut_id)
);
# Selection de la bonne base de données (à créer avant)
USE gestion_stages;

# Création de la table promotion si elle n'existe pas
CREATE TABLE IF NOT EXISTS promotion
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee_debut INT,
    annee_fin INT,
    commentaire MEDIUMTEXT
);

# Création de la table periode_stage si elle n'existe pas
CREATE TABLE IF NOT EXISTS periode_stage
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_debut DATE,
    date_fin DATE,
    commentaire MEDIUMTEXT,
    annee INT,
    id_promotion INT,
    FOREIGN KEY (id_promotion) REFERENCES promotion(id)
);

# Création de la table utilisateur si elle n'existe pas
CREATE TABLE IF NOT EXISTS utilisateur
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(255),
    mot_de_passe VARCHAR(255),
    role CHAR
);

# Création de la table etudiant si elle n'existe pas
CREATE TABLE IF NOT EXISTS etudiant
(
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255),
  prenom VARCHAR(255),
  telephone VARCHAR(16),
  email VARCHAR(255),
  specialite VARCHAR(50),
  annee INT,
  id_promotion INT,
  id_utilisateur INT,
  FOREIGN KEY (id_promotion) REFERENCES promotion(id),
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id)
);

# Création de la table professeur si elle n'existe pas
CREATE TABLE IF NOT EXISTS professeur
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id)
);

# Création de la table organisation si elle n'existe pas
CREATE TABLE IF NOT EXISTS organisation
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    telephone VARCHAR(16),
    email VARCHAR(255),
    site VARCHAR(255),
    secteur_activite VARCHAR(255),
    adresse_rue VARCHAR(255),
    code_postal INT,
    ville VARCHAR(255),
    numero_SIRET VARCHAR(255),
    code_APE VARCHAR(5)
);

# Création de la table maitre_stage si elle n'existe pas
CREATE TABLE IF NOT EXISTS maitre_stage
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    telephone VARCHAR(16),
    id_organisation INT,
    FOREIGN KEY (id_organisation) REFERENCES organisation(id)
);

# Création de la table stage si elle n'existe pas
CREATE TABLE IF NOT EXISTS stage
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_debut DATE,
    date_fin DATE,
    signature VARCHAR(255),
    avis MEDIUMTEXT,
    annee INT,
    reponse BOOL,
    etat_avancement_signature VARCHAR(255),
    id_etudiant INT,
    id_organisation INT,
    id_periode_stage INT,
    id_maitre_stage INT,
    FOREIGN KEY (id_etudiant) REFERENCES etudiant(id),
    FOREIGN KEY (id_organisation) REFERENCES organisation(id),
    FOREIGN KEY (id_periode_stage) REFERENCES periode_stage(id),
    FOREIGN KEY (id_maitre_stage) REFERENCES maitre_stage(id)
);
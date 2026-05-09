DROP DATABASE regime_db;
CREATE DATABASE IF NOT EXISTS regime_db;
USE regime_db;

CREATE TABLE genres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(20) NOT NULL
);

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_role VARCHAR(20) NOT NULL
);

CREATE TABLE objectifs_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

CREATE TABLE categories_plats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

CREATE TABLE moments_journee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

CREATE TABLE configurations_remises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_option VARCHAR(50) NOT NULL,
    pourcentage_remise DECIMAL(5, 2) NOT NULL DEFAULT 15.00
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    id_genre INT,
    id_role INT,
    is_gold BOOLEAN DEFAULT FALSE,
    solde_portefeuille DECIMAL(10, 2) DEFAULT 0.00,
    FOREIGN KEY (id_genre) REFERENCES genres(id),
    FOREIGN KEY (id_role) REFERENCES roles(id)
);

CREATE TABLE user_health_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    poids_actuel DECIMAL(5, 2),
    taille DECIMAL(5, 2),
    date_mesure DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE user_objectifs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    id_objectif_type INT,
    poids_cible DECIMAL(5, 2),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (id_objectif_type) REFERENCES objectifs_types(id)
);

CREATE TABLE plats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    id_categorie INT,
    calories DECIMAL(6, 2),
    FOREIGN KEY (id_categorie) REFERENCES categories_plats(id)
);

CREATE TABLE regimes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    prix_journalier DECIMAL(10, 2),
    poids_impact_semaine DECIMAL(4, 2),
    pourcentage_viande DECIMAL(5, 2),
    pourcentage_poisson DECIMAL(5, 2),
    pourcentage_volaille DECIMAL(5, 2)
);

CREATE TABLE regime_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    regime_id INT,
    plat_id INT,
    jour_numero INT,
    id_moment INT,
    FOREIGN KEY (regime_id) REFERENCES regimes(id),
    FOREIGN KEY (plat_id) REFERENCES plats(id),
    FOREIGN KEY (id_moment) REFERENCES moments_journee(id)
);

CREATE TABLE activites_sportives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    description TEXT,
    calories_brules_heure INT
);

CREATE TABLE regime_activites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    regime_id INT,
    activite_id INT,
    duree_minutes_jour INT DEFAULT 30,
    FOREIGN KEY (regime_id) REFERENCES regimes(id),
    FOREIGN KEY (activite_id) REFERENCES activites_sportives(id)
);

CREATE TABLE codes_recharge (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) UNIQUE NOT NULL,
    valeur DECIMAL(10, 2) NOT NULL,
    est_valide BOOLEAN DEFAULT TRUE
);

CREATE TABLE achats_regimes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    regime_id INT,
    date_achat DATETIME DEFAULT CURRENT_TIMESTAMP,
    duree_jours INT,
    prix_total DECIMAL(10, 2),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (regime_id) REFERENCES regimes(id)
);


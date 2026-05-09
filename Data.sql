DROP DATABASE IF EXISTS alimentation;
CREATE DATABASE IF NOT EXISTS alimentation;
USE alimentation;

CREATE TABLE IF NOT EXISTS admin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    genre ENUM('Homme', 'Femme', 'Autre') NOT NULL,
    taille INT,
    poids INT,
    solde DECIMAL(10, 2) DEFAULT 0,
    is_gold BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS categorie(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    ref_IMC DECIMAL(5,2) NOT NULL
);

-- dureer:par jours
CREATE TABLE IF NOT EXISTS activite(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    intesite ENUM('faible', 'moyenne', 'élevée') NOT NULL,
    duree VARCHAR(255) NOT NULL
);

-- Table Régime simplifiée selon l'énoncé 
CREATE TABLE IF NOT EXISTS regime(
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie_id INT,
    activite_id INT,
    name VARCHAR(255) NOT NULL,
    poids_minimal_impact DECIMAL(10, 2) NOT NULL,
    duree_jours INT NOT NULL, 
    prix_journalier DECIMAL(10, 2) NOT NULL,
    p_viande DECIMAL(5,2) NOT NULL,
    p_volaille DECIMAL(5,2) NOT NULL,
    p_poisson DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (categorie_id) REFERENCES categorie(id),
    FOREIGN KEY (activite_id) REFERENCES activite(id)
);


-- ato no atao ilay regime novidian ilay users
CREATE TABLE IF NOT EXISTS users_regimes(
    user_id INT,
    regime_id INT,
    PRIMARY KEY (user_id, regime_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (regime_id) REFERENCES regime(id)
);

INSERT INTO categorie (name,description,ref_IMC) VALUES 
('Augmenter poids','Régime pour augmenter le poids',18.5),
('Perdre poids','Régime pour perdre du poids',25.0),
('Atteindre IMC idéal','Régime pour atteindre un IMC idéal',22.0);

INSERT INTO admin (username, password) VALUES 
 ('vody', '$2y$10$jZ90B06dOmPj/XQBA24.eOjdm8pMtG9Q0rmBqtOCuvuPGCXJNpG92 ');-- mdp:vody

INSERT INTO users(username, email, password, genre, telephone, taille, poids) VALUES 
('test', 'test@gmail.com', '$2y$10$wyASdWJNuXgQBu3zEc4h1usNvAJhTl.CeSey17EzLwr0F5WldONVK', 'Homme', '034 12 345 67', 170, 70);-- mdp:test

INSERT INTO activite(name, intesite, duree) VALUES 
('Marche rapide', 'moyenne', '30 min'),
('Natation', 'élevée', '45 min'),
('Musculation', 'élevée', '45 min'),
('Cyclisme', 'moyenne', '40 min'),
('Course à pied', 'élevée', '30 min'),
('Yoga', 'faible', '60 min'),
('Marche rapide', 'moyenne', '45 min'),
('Pilates', 'faible', '50 min'),
('Natation', 'élevée', '40 min'),
('Marche rapide', 'moyenne', '35 min'),
('Cyclisme', 'moyenne', '50 min'),
('Yoga', 'faible', '60 min');

INSERT INTO regime(categorie_id, activite_id, name, poids_minimal_impact, duree_jours, prix_journalier, p_viande, p_volaille, p_poisson) VALUES 
(1, 1, 'Régime Hypercalorique standard', +5.0, 30, 15.00, 30.0, 30.0, 40.0),
(1, 2, 'Régime Hypercalorique riche en protéines', +7.0, 30, 20.00, 40.0, 30.0, 30.0),
(1, 3, 'Régime Hypercalorique riche en glucides', +6.0, 30, 18.00, 20.0, 30.0, 50.0),
(1, 4, 'Régime Hypercalorique riche en lipides', +5.5, 30, 17.00, 20.0, 20.0, 60.0),
(2, 5, 'Régime Hypocalorique standard', -5.0, 30, 20.00, 20.0, 40.0, 40.0),
(2, 6, 'Régime Hypocalorique riche en protéines', -7.0, 30, 25.00, 40.0, 30.0, 30.0),
(2, 7, 'Régime Hypocalorique riche en glucides', -6.0, 30, 22.00, 20.0, 30.0, 50.0),
(2, 8, 'Régime Hypocalorique riche en lipides', -5.5, 30, 21.00, 20.0, 20.0, 60.0),
(3, 9, 'Régime Équilibré standard', 0.0, 30, 18.00, 25.0, 35.0, 40.0),
(3, 10, 'Régime Équilibré riche en protéines', 0.0, 30, 23.00, 35.0, 30.0, 35.0),
(3, 11, 'Régime Équilibré riche en glucides', 0.0, 30, 21.00, 25.0, 30.0, 45.0),
(3, 12, 'Régime Équilibré riche en lipides', 0.0, 30, 20.00, 20.0, 25.0, 55.0);



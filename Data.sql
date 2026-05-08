CREATE DATABASE IF NOT EXISTS alimentation;
USE alimentation;


CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    genre ENUM('Homme', 'Femme', 'Autre') NOT NULL,
    telephone VARCHAR(20),
    taille INT,
    poids INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS categorie(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS regime(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE IF NOT EXISTS aliment(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    calories INT NOT NULL,
    category_id INT,
    regime_id INT,
    FOREIGN KEY (category_id) REFERENCES categorie(id),
    FOREIGN KEY (regime_id) REFERENCES regime(id)
);

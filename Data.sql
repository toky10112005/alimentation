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

INSERT INTO admin (username, password) VALUES 
 ('vody', '$2y$10$jZ90B06dOmPj/XQBA24.eOjdm8pMtG9Q0rmBqtOCuvuPGCXJNpG92 ');--mdp:vody

INSERT INTO users(username, email, password, genre, telephone, taille, poids) VALUES 
('test', 'test@gmail.com', '$2y$10$wyASdWJNuXgQBu3zEc4h1usNvAJhTl.CeSey17EzLwr0F5WldONVK', 'Homme', '034 12 345 67', 170, 70);--mdp:test
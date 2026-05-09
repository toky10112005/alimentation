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
('test', 'test@gmail.com', '$2y$10$wyASdWJNuXgQBu3zEc4h1usNvAJhTl.CeSey17EzLwr0F5WldONVK', 'Homme', '034 12 345 67', 170, 70),
('jessica', 'jessica@gmail.com', '$2y$10$wyASdWJNuXgQBu3zEc4h1usNvAJhTl.CeSey17EzLwr0F5WldONVK', 'Femme', '032 45 678 90', 160, 56),
('lucas', 'lucas@gmail.com', '$2y$10$wyASdWJNuXgQBu3zEc4h1usNvAJhTl.CeSey17EzLwr0F5WldONVK', 'Homme', '033 11 223 34', 182, 88),
('noa', 'noa@gmail.com', '$2y$10$wyASdWJNuXgQBu3zEc4h1usNvAJhTl.CeSey17EzLwr0F5WldONVK', 'Autre', '034 98 765 43', 168, 64);--mdp:test

INSERT INTO categorie (name) VALUES
('Proteines'),
('Glucides'),
('Legumes'),
('Fruits'),
('Lipides');

INSERT INTO regime (name, description) VALUES
('Perte progressive', 'Regime equilibre avec deficit calorique modere.'),
('Prise de masse douce', 'Regime riche en energie et proteines.'),
('IMC ideal', 'Regime stabilise pour maintenir un poids ideal.');

INSERT INTO aliment (name, calories, category_id, regime_id) VALUES
('Blanc de poulet', 165, 1, 2),
('Oeufs', 155, 1, 2),
('Riz complet', 110, 2, 3),
('Patate douce', 86, 2, 1),
('Brocoli', 34, 3, 1),
('Carotte', 41, 3, 3),
('Pomme', 52, 4, 1),
('Banane', 89, 4, 2),
('Amandes', 579, 5, 2),
('Avocat', 160, 5, 3);
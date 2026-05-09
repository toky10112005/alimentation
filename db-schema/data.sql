INSERT INTO genres (libelle) VALUES ('Homme'), ('Femme');
INSERT INTO roles (nom_role) VALUES ('admin'), ('user');
INSERT INTO objectifs_types (libelle) VALUES ('Augmenter son poids'), ('Réduire son poids'), ('Atteindre son IMC idéal');
INSERT INTO moments_journee (libelle) VALUES ('Petit-déjeuner'), ('Déjeuner'), ('Dîner');
INSERT INTO categories_plats (libelle) VALUES ('Viande'), ('Poisson'), ('Volaille'), ('Légumes');
INSERT INTO configurations_remises (nom_option, pourcentage_remise) VALUES ('Option Gold', 15.00);

INSERT INTO activites_sportives (nom, calories_brules_heure) VALUES 
('Course à pied', 600), ('Natation', 500), ('Cyclisme', 400), ('Musculation', 300), ('Yoga', 200);

-- Légumes (Id_categorie = 4)
INSERT INTO plats (nom, id_categorie, calories) VALUES 
('Salade de crudités au citron', 4, 150),
('Poêlée de légumes de saison', 4, 200),
('Soupe de légumes verts', 4, 120),
('Gratin de chou-fleur (sans fromage)', 4, 180);

-- Viande (Id_categorie = 1)
INSERT INTO plats (nom, id_categorie, calories) VALUES 
('Steak de bœuf grillé', 1, 350),
('Émincé de porc au gingembre', 1, 400),
('Boulettes de bœuf à la tomate', 1, 380);

-- Poisson (Id_categorie = 2)
INSERT INTO plats (nom, id_categorie, calories) VALUES 
('Filet de colin vapeur', 2, 220),
('Pavé de saumon grillé', 2, 450),
('Thon au naturel et maïs', 2, 280);

-- Volaille (Id_categorie = 3)
INSERT INTO plats (nom, id_categorie, calories) VALUES 
('Blanc de poulet rôti', 3, 250),
('Émincé de dinde au curry', 3, 230),
('Cuisse de poulet aux herbes', 3, 310);

INSERT INTO regimes (nom, description, objectif_type_id, prix_journalier, poids_impact_semaine, pourcentage_viande, pourcentage_poisson, pourcentage_volaille) VALUES
('Détox Océane', 'Régime léger basé sur les produits de la mer pour une perte rapide.', 1, 15000, -1.2, 10, 60, 30),
('Mass Gain Pro', 'Régime riche en calories et protéines pour la musculation.', 2, 25000, 0.8, 50, 10, 40),
('Volailles & Fibres', 'Équilibre parfait entre volaille et légumes pour stabiliser le poids.', 3, 12000, -0.3, 0, 0, 100),
('Mix Équilibré', 'Variété totale pour une santé optimale au quotidien.', 1, 18000, 0.0, 33.33, 33.33, 33.34),
('Bœuf & Énergie', 'Régime axé sur la force et l''apport en fer.', 2, 22000, 0.5, 70, 10, 20);

-- Jour 1
INSERT INTO regime_details (regime_id, plat_id, jour_numero, id_moment) VALUES 
(1, 1, 1, 1), -- Petit-déjeuner : Salade
(1, 8, 1, 2), -- Déjeuner : Poisson vapeur
(1, 11, 1, 3); -- Dîner : Blanc de poulet

-- Jour 2
INSERT INTO regime_details (regime_id, plat_id, jour_numero, id_moment) VALUES 
(1, 3, 2, 1), -- Soupe
(1, 10, 2, 2), -- Thon
(1, 2, 2, 3); -- Légumes

-- ... À répéter jusqu'au jour 7 pour avoir un cycle complet

INSERT INTO regime_activites (regime_id, activite_id, duree_minutes_jour) VALUES 
(1, 2, 45), -- Détox Océane + Natation (45 min)
(2, 4, 60), -- Mass Gain + Musculation (60 min)
(3, 1, 30), -- Volailles & Fibres + Course à pied (30 min)
(4, 3, 40), -- Mix Équilibré + Cyclisme (40 min)
(5, 4, 30); -- Bœuf & Énergie + Musculation (30 min)

INSERT INTO codes_recharge (code, valeur) VALUES 
('bibity', 100.00),
('caca', 200.00),
('pipi', 500.00);
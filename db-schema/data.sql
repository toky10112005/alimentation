INSERT INTO genres (libelle) VALUES ('Homme'), ('Femme');
INSERT INTO roles (nom_role) VALUES ('admin'), ('user');
INSERT INTO objectifs_types (libelle) VALUES ('Augmenter son poids'), ('Réduire son poids'), ('Atteindre son IMC idéal');
INSERT INTO moments_journee (libelle) VALUES ('Petit-déjeuner'), ('Déjeuner'), ('Dîner');
INSERT INTO categories_plats (libelle) VALUES ('Viande'), ('Poisson'), ('Volaille'), ('Légumes');
INSERT INTO configurations_remises (nom_option, pourcentage_remise) VALUES ('Option Gold', 15.00);

INSERT INTO activites_sportives (nom, calories_brules_heure) VALUES 
('Course à pied', 600), ('Natation', 500), ('Cyclisme', 400), ('Musculation', 300), ('Yoga', 200);
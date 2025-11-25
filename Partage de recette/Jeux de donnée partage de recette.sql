---------------------------------------------------------
-- 1) UTILISATEURS
---------------------------------------------------------
INSERT INTO users (username, email, password_hash) VALUES
('chef_pierre', 'pierre@example.com', 'hash1'),
('laura_cuisine', 'laura@example.com', 'hash2'),
('mama_italia', 'maria@example.com', 'hash3');

---------------------------------------------------------
-- 2) CATÉGORIES
---------------------------------------------------------
INSERT INTO categories (name) VALUES
('Pâtes'),            -- id = 1
('Dessert'),          -- id = 2
('Viande'),           -- id = 3
('Végétarien'),       -- id = 4
('Soupes'),           -- id = 5
('Cuisine du monde'), -- id = 6
('Snacks');           -- id = 7

---------------------------------------------------------
-- 3) RECETTES (10 recettes)
---------------------------------------------------------

-- 1) Lasagnes à la Bolognaise
INSERT INTO recipes 
(user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
VALUES 
(3, 1, 'Lasagnes à la Bolognaise',
'Recette italienne traditionnelle à base de viande mijotée, béchamel et pâtes.',
'https://site.com/images/lasagnes.jpg', 30, 45, 6);

-- 2) Salade César Maison
INSERT INTO recipes 
(user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
VALUES 
(2, 4, 'Salade César Maison',
'Une salade fraîche avec poulet grillé, parmesan et croûtons maison.',
'https://site.com/images/cesar.jpg', 20, 10, 4);

-- 3) Poulet Curry Coco
INSERT INTO recipes 
(user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
VALUES 
(1, 6, 'Poulet Curry Coco',
'Poulet mijoté dans une sauce au lait de coco et curry parfumé.',
'https://site.com/images/curry.jpg', 15, 25, 4);

-- 4) Tiramisu Classique
INSERT INTO recipes 
(user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
VALUES 
(3, 2, 'Tiramisu Classique',
'Un dessert italien à base de mascarpone et biscuits imbibés de café.',
'https://site.com/images/tiramisu.jpg', 25, 0, 6);

-- 5) Soupe de Potiron & Châtaignes
INSERT INTO recipes 
(user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
VALUES 
(2, 5, 'Soupe de Potiron et Châtaignes',
'Velouté d’automne onctueux et parfumé.',
'https://site.com/images/potiron.jpg', 15, 30, 4);

-- 6) Burger Steak & Cheddar
INSERT INTO recipes 
(user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
VALUES 
(1, 7, 'Burger Steak & Cheddar',
'Burger maison avec steak haché frais, cheddar fondu et sauce maison.',
'https://site.com/images/burger.jpg', 20, 10, 2);

-- 7) Ratatouille Provençale
INSERT INTO recipes 
(user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
VALUES 
(2, 4, 'Ratatouille Provençale',
'Plat végétarien aux légumes mijotés : courgettes, aubergines, tomates.',
'https://site.com/images/ratatouille.jpg', 20, 35, 5);

-- 8) Bœuf Bourguignon
INSERT INTO recipes 
(user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
VALUES 
(1, 3, 'Bœuf Bourguignon',
'Plat français mijoté au vin rouge, carottes, champignons et lardons.',
'https://site.com/images/bourguignon.jpg', 30, 180, 6);

-- 9) Fajitas de Poulet
INSERT INTO recipes 
(user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
VALUES 
(3, 6, 'Fajitas de Poulet',
'Poulet mariné servi avec poivrons, oignons et tortillas.',
'https://site.com/images/fajitas.jpg', 20, 15, 4);

-- 10) Cookies Moelleux au Chocolat
INSERT INTO recipes 
(user_id, category_id, title, description, image_url, prep_time, cook_time, portions)
VALUES 
(2, 2, 'Cookies Moelleux au Chocolat',
'Cookies gourmands au chocolat noir, fondants à l’intérieur.',
'https://site.com/images/cookies.jpg', 15, 12, 12);

---------------------------------------------------------
-- 4) INGREDIENTS
---------------------------------------------------------

-- 1 Lasagnes
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
(1, 'Pâtes à lasagne', '12 feuilles'),
(1, 'Viande hachée', '400 g'),
(1, 'Sauce tomate', '500 ml'),
(1, 'Béchamel', '300 ml'),
(1, 'Parmesan râpé', '80 g');

-- 2 César
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
(2, 'Salade romaine', '1'),
(2, 'Poulet grillé', '200 g'),
(2, 'Parmesan', '50 g'),
(2, 'Croûtons', '80 g'),
(2, 'Sauce César', '100 ml');

-- 3 Curry coco
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
(3, 'Poulet', '400 g'),
(3, 'Lait de coco', '400 ml'),
(3, 'Pâte de curry', '2 c. à soupe'),
(3, 'Oignon', '1'),
(3, 'Riz', '200 g');

-- 4 Tiramisu
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
(4, 'Mascarpone', '250 g'),
(4, 'Biscuits cuillère', '24'),
(4, 'Café fort', '200 ml'),
(4, 'Sucre', '80 g'),
(4, 'Cacao en poudre', '10 g');

-- 5 Soupe potiron
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
(5, 'Potiron', '800 g'),
(5, 'Châtaignes', '150 g'),
(5, 'Crème', '100 ml'),
(5, 'Oignon', '1'),
(5, 'Bouillon', '500 ml');

-- 6 Burger
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
(6, 'Pain burger', '2'),
(6, 'Steak haché', '2'),
(6, 'Cheddar', '2 tranches'),
(6, 'Tomate', '1'),
(6, 'Salade', '1 poignée');

-- 7 Ratatouille
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
(7, 'Courgettes', '2'),
(7, 'Aubergine', '1'),
(7, 'Poivron', '1'),
(7, 'Tomates', '3'),
(7, 'Oignon', '1');

-- 8 Bourguignon
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
(8, 'Bœuf', '1 kg'),
(8, 'Vin rouge', '750 ml'),
(8, 'Carottes', '3'),
(8, 'Champignons', '200 g'),
(8, 'Lardons', '150 g');

-- 9 Fajitas
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
(9, 'Poulet', '300 g'),
(9, 'Poivrons', '2'),
(9, 'Oignons', '1'),
(9, 'Tortillas', '6'),
(9, 'Épices mexicaines', '2 c. à café');

-- 10 Cookies
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
(10, 'Farine', '250 g'),
(10, 'Beurre', '125 g'),
(10, 'Sucre', '150 g'),
(10, 'Oeufs', '1'),
(10, 'Pépites de chocolat', '200 g');

---------------------------------------------------------
-- 5) ETAPES
---------------------------------------------------------

-- 1 Lasagnes
INSERT INTO steps (recipe_id, step_number, description) VALUES
(1, 1, 'Préparer la sauce bolognaise.'),
(1, 2, 'Préparer la béchamel.'),
(1, 3, 'Monter les couches.'),
(1, 4, 'Cuire 45 minutes au four.');

-- 2 César
INSERT INTO steps (recipe_id, step_number, description) VALUES
(2, 1, 'Couper la salade.'),
(2, 2, 'Griller le poulet.'),
(2, 3, 'Mélanger avec parmesan et sauce.'),
(2, 4, 'Ajouter croûtons.');

-- 3 Curry
INSERT INTO steps (recipe_id, step_number, description) VALUES
(3, 1, 'Faire revenir l’oignon.'),
(3, 2, 'Ajouter poulet et curry.'),
(3, 3, 'Incorporer lait de coco.'),
(3, 4, 'Laisser mijoter.');

-- 4 Tiramisu
INSERT INTO steps (recipe_id, step_number, description) VALUES
(4, 1, 'Battre le mascarpone et sucre.'),
(4, 2, 'Tremper biscuits dans le café.'),
(4, 3, 'Monter en couches.'),
(4, 4, 'Réfrigérer 4 heures.');

-- 5 Soupe potiron
INSERT INTO steps (recipe_id, step_number, description) VALUES
(5, 1, 'Faire revenir l’oignon.'),
(5, 2, 'Ajouter potiron et châtaignes.'),
(5, 3, 'Ajouter bouillon et cuire.'),
(5, 4, 'Mixer et ajouter crème.');

-- 6 Burger
INSERT INTO steps (recipe_id, step_number, description) VALUES
(6, 1, 'Cuire les steaks.'),
(6, 2, 'Ajouter cheddar.'),
(6, 3, 'Assembler burger.');

-- 7 Ratatouille
INSERT INTO steps (recipe_id, step_number, description) VALUES
(7, 1, 'Couper les légumes.'),
(7, 2, 'Faire revenir l’oignon.'),
(7, 3, 'Ajouter le reste.'),
(7, 4, 'Laisser mijoter 35 minutes.');

-- 8 Bourguignon
INSERT INTO steps (recipe_id, step_number, description) VALUES
(8, 1, 'Faire revenir la viande.'),
(8, 2, 'Ajouter légumes.'),
(8, 3, 'Couvrir de vin.'),
(8, 4, 'Cuire 3 heures.');

-- 9 Fajitas
INSERT INTO steps (recipe_id, step_number, description) VALUES
(9, 1, 'Couper poulet et légumes.'),
(9, 2, 'Faire revenir.'),
(9, 3, 'Ajouter épices.'),
(9, 4, 'Garnir tortillas.');

-- 10 Cookies
INSERT INTO steps (recipe_id, step_number, description) VALUES
(10, 1, 'Mélanger beurre et sucre.'),
(10, 2, 'Ajouter œuf.'),
(10, 3, 'Ajouter farine.'),
(10, 4, 'Ajouter chocolat.'),
(10, 5, 'Former des boules et cuire 12 min.');

---------------------------------------------------------
-- 6) FAVORIS
---------------------------------------------------------
INSERT INTO favorites (user_id, recipe_id) VALUES
(1, 4),
(2, 1),
(3, 10);

---------------------------------------------------------
-- 7) NOTES / AVIS
---------------------------------------------------------
INSERT INTO ratings (user_id, recipe_id, rating, comment) VALUES
(1, 1, 5, 'Incroyables lasagnes, recette très complète !'),
(2, 3, 4, 'Très bon curry, manque un peu de sel.'),
(3, 10, 5, 'Cookies parfaits, fondants !');

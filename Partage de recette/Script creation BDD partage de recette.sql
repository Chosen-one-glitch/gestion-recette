-- ---------------------------------------------
-- 1) Utilisateurs
CREATE TABLE users (
id SERIAL PRIMARY KEY,
username VARCHAR(100) UNIQUE NOT NULL,
email VARCHAR(255) UNIQUE NOT NULL,
password_hash VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT NOW()
);


-- 2) Catégories
CREATE TABLE categories (
id SERIAL PRIMARY KEY,
name VARCHAR(100) UNIQUE NOT NULL
);


-- 3) Recettes
CREATE TABLE recipes (
id SERIAL PRIMARY KEY,
user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
category_id INT REFERENCES categories(id) ON DELETE SET NULL,
title VARCHAR(200) NOT NULL,
description TEXT,
image_url TEXT,
prep_time INT, -- minutes
cook_time INT, -- minutes
portions INT, -- nombre de personnes
created_at TIMESTAMP DEFAULT NOW(),
updated_at TIMESTAMP DEFAULT NOW()
);


-- 4) Ingrédients
CREATE TABLE ingredients (
id SERIAL PRIMARY KEY,
recipe_id INT NOT NULL REFERENCES recipes(id) ON DELETE CASCADE,
name VARCHAR(200) NOT NULL,
quantity VARCHAR(100)
);


-- 5) Étapes
CREATE TABLE steps (
id SERIAL PRIMARY KEY,
recipe_id INT NOT NULL REFERENCES recipes(id) ON DELETE CASCADE,
step_number INT NOT NULL,
description TEXT NOT NULL
);


-- 6) Favoris (un utilisateur peut mettre une recette en favori)
CREATE TABLE favorites (
user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
recipe_id INT NOT NULL REFERENCES recipes(id) ON DELETE CASCADE,
PRIMARY KEY (user_id, recipe_id)
);


-- 7) Notation des recettes (reviews)
CREATE TABLE ratings (
id SERIAL PRIMARY KEY,
user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
recipe_id INT NOT NULL REFERENCES recipes(id) ON DELETE CASCADE,
rating INT CHECK (rating >= 1 AND rating <= 5),
comment TEXT,
created_at TIMESTAMP DEFAULT NOW(),
UNIQUE (user_id, recipe_id) -- un utilisateur note une seule fois
);
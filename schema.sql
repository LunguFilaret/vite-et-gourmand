// Creation de la base de données
CREATE DATABASE IF NOT EXISTS vite_et_gourmand CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE vite_et_gourmand;

// Table des utilisateurs (Admin, Employés, Clients)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  prenom VARCHAR(100) NOT NULL,
  username VARCHAR(100) DEFAULT NULL,
  email VARCHAR(191) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  telephone VARCHAR(20),
  adresse TEXT,
  role ENUM('admin','employee', 'user') DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

// Table des menus (selon le sujet de Vite & Gourmand)
CREATE TABLE IF NOT EXISTS menus (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titre VARCHAR(150) NOT NULL,
  description TEXT NOT NULL,
  theme VARCHAR(100),
  regime VARCHAR(100),
  prix_min_personne DECIMAL(10,2) NOT NULL,
  nb_personne_min INT NOT NULL,
  disponible BOOLEAN DEFAULT TRUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

// Table des commandes avec les statuts précis du sujet
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  menu_id INT NOT NULL,
  nb_personnes INT NOT NULL,
  date_prestation DATE NOT NULL,
  heure_prestation TIME NOT NULL,
  adresse_prestation TEXT NOT NULL,
  total_amount DECIMAL(10,2) NOT NULL,
  status ENUM('en_attente', 'accepte', 'en_preparation', 'en_cours_de_livraison', 'livre', 'en_attente_retour_materiel', 'terminee', 'annulee') DEFAULT 'en_attente',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE
);

// Table des avis clients validés par les employés
CREATE TABLE IF NOT EXISTS reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  note INT CHECK (note BETWEEN 1 AND 5),
  commentaire TEXT,
  valide BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);


        
  
  

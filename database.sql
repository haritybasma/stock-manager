CREATE DATABASE stock_nice;
USE stock_nice;

CREATE TABLE produits (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100),
  quantite INT,
  prix DECIMAL(10,2)
);

INSERT INTO produits (nom, quantite, prix) VALUES
('Stylo', 50, 2.50),
('Cahier', 10, 15.00),
('Clé USB', 3, 80.00);

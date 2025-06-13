-- Create the KasiShop database (if not exists)
CREATE DATABASE IF NOT EXISTS kasishop;
USE kasishop;

-- Drop the table if already exists (for testing or reset)
DROP TABLE IF EXISTS products;

-- Create products table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    is_featured BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Featured Products
INSERT INTO products (name, price, image, is_featured) VALUES
('Limited Edition Sneakers', 1299.00, 'images/featured1.jpg', TRUE),
('Deluxe Leather Bag', 849.00, 'images/featured2.jpg', TRUE),
('Luxury Home Diffuser', 499.00, 'images/featured3.jpg', TRUE);

-- Insert Regular Products
INSERT INTO products (name, price, image, is_featured) VALUES
('Streetwear Hoodie', 499.00, 'images/product1.jpg', FALSE),
('Handmade Clay Pots', 299.00, 'images/product2.jpg', FALSE),
('Organic Skincare Set', 350.00, 'images/product3.jpg', FALSE),
('Wireless Earbuds', 899.00, 'images/product4.jpg', FALSE),
('Zulu Beaded Necklace', 199.00, 'images/product5.jpg', FALSE),
('Decorative Basket', 150.00, 'images/product6.jpg', FALSE),
('Kasi Made Kicks', 999.00, 'images/product7.jpg', FALSE),
('Scented Soy Candles', 120.00, 'images/product8.jpg', FALSE);

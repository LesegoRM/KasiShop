CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  slug VARCHAR(100) NOT NULL UNIQUE,
  icon_class VARCHAR(100) NOT NULL
);
INSERT INTO categories (name, slug, icon_class) VALUES
('Clothing', 'clothing', 'fas fa-tshirt'),
('Electronics', 'electronics', 'fas fa-tv'),
('Groceries', 'groceries', 'fas fa-shopping-basket'),
('Home & Garden', 'home-garden', 'fas fa-couch'),
('Health & Beauty', 'health-beauty', 'fas fa-heartbeat'),
('Books', 'books', 'fas fa-book');

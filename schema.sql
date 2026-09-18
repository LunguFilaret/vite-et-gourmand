CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255),
  role VARCHAR(50),
  first_name VARCHAR(100),
  last_name VARCHAR(100),
  phone VARCHAR(20),
  adress TEXT,
  created_at TIMESTAMP
  );

CREATE TABLE restaurants (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255);
  addres TEXT,
  city VARCHAR(100)
);

CREATE TABLE products(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255);
  description TEXT,
  price DECIMAL(10,2),
  restaurant_id INT,
  category VARCHAR(100),
  min_people INT,
  conditions TEXT,
  FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
);

CREATE TABLE orders (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  restaurant_id INT,
  status VARCHAR(50),
  total_amount DECIMAL(10,2),
  delivery_date TIMESTAMP,
  FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
  );

CREATE TABLE order_items (
  id INT PRIMARY KEY AUTO_INCREMENT,
  order_id INT,
  product_id INT,
  quantity INT,
  unit_price DECIMAL(10,2),
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
  );


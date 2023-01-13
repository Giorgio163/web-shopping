CREATE DATABASE IF NOT EXISTS web_shopping;

use web_shopping;

CREATE TABLE IF NOT EXISTS products(
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL ,
    quantity INTEGER NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS orders(
    id VARCHAR(255) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    completed_at DATETIME NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS order_items (
    order_id VARCHAR(255) NOT NULL,
    product_id INTEGER NOT NULL,
    quantity INTEGER NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    PRIMARY KEY(order_id, product_id),
    FOREIGN KEY(product_id) REFERENCES products(id),
    FOREIGN KEY(order_id) REFERENCES orders(id)
);

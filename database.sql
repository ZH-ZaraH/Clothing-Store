--This is the the database. c_customers is the parent entity, c_orders is the child entity.--
CREATE TABLE c_customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    contact_number VARCHAR(20),
    email VARCHAR(100),
    address VARCHAR(100),
    city VARCHAR(50),
    province VARCHAR(50),
    postal_code VARCHAR(10),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE c_orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    size VARCHAR(10),
    customer_id INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (customer_id)
        REFERENCES c_customers(customer_id)
);

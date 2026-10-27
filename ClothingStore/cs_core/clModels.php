<!-- clModels.php will handle all the functions or commands to execute CRUD
 (e.g. insert, update, delete) of customer and order -->

<?php

#Creating new customer in the c_customer table
function insertCustomer($pdo, $username, $first_name, $last_name, $contact_number, $email, 
                        $address, $city, $province, $postal_code){
    $sql = "INSERT INTO c_customers (username, first_name, last_name, contact_number, email, 
                                    address, city, province, postal_code)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $executeInsert = $stmt->execute([$username, $first_name, $last_name, $contact_number, $email, 
                                    $address, $city, $province, $postal_code]);
    if($executeInsert){
        return true;
    }
}

#Getting all the records in c_customers
function getAllCustomers($pdo) {
    $sql = "SELECT * FROM c_customers";
    $stmt = $pdo->prepare($sql);
    $executeGetAll = $stmt->execute();

    if ($executeGetAll) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC); #FETCH ASSOC to get all records associated in the table and fields in my understanding.
    }
}

#Getting records in c_customers by using the ID
function getCustomerById($pdo, $customer_id) {
    $sql = "SELECT * FROM c_customers WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeGetId = $stmt->execute([$customer_id]);
    if ($executeGetId) {
        return $stmt->fetch();
    }
}

#Updating c_customers
function updateCustomer($pdo, $first_name, $last_name, $contact_number,
        $email, $address, $city, $province, $postal_code, $customer_id) {
        
        $sql = "UPDATE c_customers
                SET first_name = ?,
                    last_name = ?,
                    contact_number = ?,
                    email = ?,
                    address = ?,
                    city = ?,
                    province = ?,
                    postal_code = ?
                WHERE customer_id = ?";
        
        $stmt = $pdo->prepare($sql);
        $executeUpdate = $stmt->execute([$first_name, $last_name, $contact_number, 
            $email, $address, $city, $province, $postal_code, $customer_id]);
        if ($executeUpdate) {
            return true;
        }
}

#Delete Record in c_customers
function deleteCustomer($pdo, $customer_id) {
    $DeleteC_customer = "DELETE FROM c_customers 
            WHERE customer_id = ?";
    $deleteStmt = $pdo->prepare($DeleteC_customer);
    $executeDeleteQuery = $deleteStmt->execute([$customer_id]);

    if ($executeDeleteQuery) {
        $sql = "DELETE FROM c_customers 
                WHERE customer_id = ?";
        $stmt = $pdo->prepare($sql);
        $executeDelete = $stmt->execute([$customer_id]);

        if ($executeDelete) {
            return true;
        }
    }
}

#Getting order by customer_id and connecting the table c_orders to c_customers
function getOrderByCustomer($pdo, $customer_id){
    $sql = "SELECT
                c_orders.order_id AS order_id,
                c_orders.product_name AS product_name,
                c_orders.category AS category,
                c_orders.size AS size,
                c_orders.price AS price,
                c_orders.date_added AS date_added,
                CONCAT(c_customers.first_name,' ',c_customers.last_name) AS customer
            FROM c_orders
            JOIN c_customers ON c_orders.customer_id = c_customers.customer_id
            WHERE c_orders.customer_id = ?
            GROUP BY c_orders.product_name;";

    $stmt = $pdo->prepare($sql);
    $executeShow = $stmt->execute([$customer_id]);
    if ($executeShow) {
        return $stmt->fetchAll();
    }
}

#Adding orders in c_orders
function insertOrder($pdo, $product_name, $category, $size, $price, $customer_id) {
    $sql = "INSERT INTO c_orders (product_name, category, size, price, customer_id)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeAdd = $stmt->execute([$product_name, $category, $size, $price, $customer_id]);
    if ($executeAdd) {
        return True;
    }
}

#getting order by order_id which also shows the customer as c_orders is joined in c_customer table
function getOrderById($pdo, $order_id) {
    $sql = "SELECT
                c_orders.order_id as order_id,
                c_orders.product_name as product_name,
                c_orders.category as category,
                c_orders.size as size,
                c_orders.price as price,
                c_orders.date_added as date_added,
                CONCAT (c_customers.first_name,' ',c_customers.last_name) AS customer
            FROM c_orders
            JOIN c_customers ON c_orders.customer_id = c_customers.customer_id
            WHERE c_orders.order_id = ?
            GROUP BY c_orders.product_name";
    
    $stmt = $pdo->prepare($sql);
    $executeGet = $stmt->execute([$order_id]);
    if ($executeGet) {
        return $stmt->fetch();
    }
}

#updating an order by order_id
function updateOrder($pdo, $product_name, $category, $size, $price, $order_id) {
    $sql = "UPDATE c_orders
            SET product_name = ?,
                category = ?,
                size = ?,
                price = ?
            WHERE order_id = ?";
    
    $stmt = $pdo->prepare($sql);
    $executeUpdate = $stmt->execute([$product_name, $category, $size, $price, $order_id]);

    if ($executeUpdate) {
        return true;
    } 
}

#deleting an order by order_id
function deleteOrder($pdo, $order_id) {
    $sql = "DELETE FROM c_orders WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeDelete = $stmt->execute([$order_id]);
    if ($executeDelete) {
        return true;
    }
}

#in viewrecord.php this is to see the orders and the customers using the customer_id
function getAllInfoByCustomerId($pdo, $customer_id) {
    $sql = "SELECT * FROM c_customers WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeGet = $stmt->execute([$customer_id]);
    if ($executeGet) {
        return $stmt->fetch();
    }
}
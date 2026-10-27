<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
require_once 'cldbConfig.php';
require_once 'clModels.php';

if (isset($_POST['addCustomerBtn'])) {
    $insert_query = insertCustomer($pdo, $_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['contact_number'], 
    $_POST['email'], $_POST['address'], $_POST['city'], $_POST['province'], $_POST['postal_code']);

    if ($insert_query) {
        header("Location: ../cs_sql/cs_index.php");
        exit();
    } else {
        echo "Failed To Add New Customer";
    }
}

if (isset($_POST['editCustomerBtn'])) {
    $edit_query = updateCustomer($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['contact_number'],
            $_POST['email'], $_POST['address'], $_POST['city'], $_POST['province'], $_POST['postal_code'], $_GET['customer_id']);

    if ($edit_query) {
        header("Location: ../cs_sql/cs_index.php");
        exit();
    } else {
        echo "Failed to Edit Information";
    }
}

if (isset($_POST['deleteCustomerBtn'])) {
    $delete_query = deleteCustomer($pdo, $_GET['customer_id']);

    if ($delete_query) {
        header("Location: ../cs_sql/cs_index.php");
        exit();
    } else {
        echo "Customer Deletion Failed.";
    }
}

if (isset($_POST['insertOrderBtn'])){
    $insert_order = insertOrder($pdo, $_POST['product_name'], $_POST['category'], $_POST['size'], $_POST['price'], $_GET['customer_id']);
    if ($insert_order) {
        header("Location: ../cs_sql/vieworders.php?customer_id=" . $_GET['customer_id']);
        exit();
    } else {
        echo "Failed to Add Order";
    }
}

if (isset($_POST['editOrderBtn'])) {
    $edit = updateOrder($pdo, $_POST['product_name'], $_POST['category'], $_POST['size'], $_POST['price'], $_GET['order_id']);
    if ($edit) {
        header("Location: ../cs_sql/vieworders.php?customer_id=" . $_GET['customer_id']);
        exit();
    } else {
        echo "Failed to Edit Order";
    }
}

if (isset($_POST['deleteOrderBtn'])) {
    $delete = deleteOrder($pdo, $_GET['order_id']);

    if ($delete) {
        header("Location: ../cs_sql/vieworders.php?customer_id=" . $_GET['customer_id']);
        exit();
    } else {
        echo "Failed to Delete Order";
    }
}
?>
<?php require_once '../cs_core/cldbConfig.php'; ?>
<?php require_once '../cs_core/clModels.php'; ?>
<!DOCTYPE  html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Clothing Store</title>
    <link rel="stylesheet" href="cs_styles.css">
</head>
<body>
    <a href="vieworders.php?customer_id=<?php echo $_GET['customer_id']; ?>">View Orders</a>
    <h1>Edit Order</h1>
    <?php $getOrderById = getOrderById($pdo, $_GET['customer_id']); ?>
    <form action="../cs_core/clHandleForms.php?order_id=<?php echo $_GET['order_id']; ?>
    &customer_id=<?php echo$_GET['customer_id']; ?>" method="POST">
            
            <p>
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name"
                value="<?php echo $getOrderById['product_name']; ?>">
            </p>
            <p>
                <label for="category">Category</label>
                <input type="text" name="category"
                value="<?php echo $getOrderById['category']; ?>">
            </p>
            <p>
                <label for="size">Size</label>
                <input type="text" name="size"
                value="<?php echo $getOrderById['size']; ?>">
            <p>
                <label for="price">Price</label>
                <input type="text" name="price"
                value="<?php echo $getOrderById['price']; ?>">
                <input type="submit" name="editOrderBtn">
            </p>
    
    </form>
</body>
</html>
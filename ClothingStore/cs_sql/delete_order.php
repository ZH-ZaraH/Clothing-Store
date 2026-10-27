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
    <a href="vieworders.php?customer_id=<?php echo $_GET['customer_id']; ?>">Return to View Orders</a>
    <?php $getOrderById = getOrderById($pdo, $_GET['order_id']); ?>
    <h1>Are you sure youwant to delete this order?</h1>
    <div class="container" style="border-style: solid; height: 400px;">
        <h2>Product Name: <?php echo $getOrderById['product_name'] ?></h2>
        <h2>Category: <?php echo $getOrderById['category'] ?></h2>
        <h2>Size: <?php echo $getOrderById['size'] ?></h2>
        <h2>Price: <?php echo $getOrderById['price'] ?></h2>
        <h2>Date Ordered: <?php echo $getOrderById['date_added'] ?></h2>

        <div class="deleteBtn" style="float: right; margin-right: 10px;">
            <form action="../cs_core/clHandleForms.php?order_id=<?php echo $_GET['order_id']; ?>&customer_id=<?php echo $_GET['customer_id'];?>" method="POST">
                <input type="submit" name="deleteOrderBtn" value="Delete">
            </form>
        </div>
    </div>
</body>
</html>
<?php require_once '../cs_core/cldbConfig.php'; ?>
<?php require_once '../cs_core/clModels.php'; ?>
<!DOCTYPE  html>
<html lang="en">
<<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Clothing Store</title>
    <link rel="stylesheet" href="cs_styles.css">
</head>
<body>
    <a href="../cs_sql/cs_index.php">Return Home</a>
    <?php $getAllInfoByCustomerId = getAllInfoByCustomerId($pdo, $_GET['customer_id']); ?>
    <h1>Username: <?php echo $getAllInfoByCustomerId['username']; ?></h1>
    <h1>Add New Order</h1>
    <form action="../cs_core/clHandleForms.php?customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
        <p>
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name">
        </p>
        <p>
            <label for="category">Category</label>
            <input type="text" name="category">
        </p>
        <p>
            <label for="size">Size</label>
            <input type="text" name="size">
        </p>
        <p>
            <label for="price">Price</label>
            <input type="text" name="price">
            <input type="submit" name="insertOrderBtn">
        </p>
    </form>

    <table style="width:100%; margin-top: 50px;">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Size</th>
            <th>Customer</th>
            <th>Date Ordered</th>
            <th>Action</th>
        </tr>
        <?php $getOrderByCustomer = getOrderByCustomer($pdo, $_GET['customer_id']); ?>
        <?php foreach($getOrderByCustomer as $row) { ?>
        <tr>
            <td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['size']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['customer']; ?></td>
            <td><?php echo $row['date_added']; ?></td>
            <td>
                <a href="edit_order.php?order_id=<?php echo $row['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>">Edit</a>
                <a href="delete_order.php?order_id=<?php echo $row['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>
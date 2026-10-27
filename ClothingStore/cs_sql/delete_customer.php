<?php require_once '../cs_core/cldbConfig.php'; ?>
<?php require_once '../cs_core/clModels.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Clothing Store</title>
    <link rel="stylesheet" href="cs_styles.css">
</head>
<body>
    <a href="cs_index.php?customer_id=<?php echo $_GET['customer_id']; ?>">Return to View Customers</a>
    <h1>Are you sure you want to delete this Customer?</h1>
    <?php $getCustomerById = getCustomerById($pdo, $_GET['customer_id']); ?>
    <div class="container" style="border-style: solid; height: 400px;">
        <h2>First Name: <?php echo $getCustomerById['first_name']; ?></h2>
        <h2>Last Name: <?php echo $getCustomerById['last_name']; ?></h2>
        <h2>Contact Number: <?php echo $getCustomerById['contact_number']; ?></h2>
        <h2>Email: <?php echo $getCustomerById['email']; ?></h2>
        <h2>Address: <?php echo $getCustomerById['address']; ?></h2>
        <h2>City: <?php echo $getCustomerById['city']; ?></h2>
        <h2>Province: <?php echo $getCustomerById['province']; ?></h2>
        <h2>Postal Code: <?php echo $getCustomerById['postal_code']; ?></h2>
        <h2>Date Added: <?php echo $getCustomerById['date_added']; ?></h2>

        <div class="deleteBtn" style="float: right; margin-right: 10px;">
           <form action="../cs_core/clHandleForms.php?customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
                <input type="submit" name="deleteCustomerBtn" value="Delete">
            </form></form>
        </div>
    </div>

</body>
</html>
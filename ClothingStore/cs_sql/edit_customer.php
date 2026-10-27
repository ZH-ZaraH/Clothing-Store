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
    <?php $getCustomerById = getCustomerById($pdo, $_GET['customer_id']); ?>
    <h2>Edit your Account</h2>
    <form action="../cs_core/clHandleForms.php?customer_id=<?php echo $_GET['customer_id'];?>" method="POST">
        <p>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="<?php echo $getCustomerById['first_name']; ?>">
        </p>
        <p>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="<?php echo $getCustomerById['last_name']; ?>">
        </p>
        <p>
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" value="<?php echo $getCustomerById['contact_number']; ?>">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $getCustomerById['email']; ?>">
        </p>
        <p>
            <label for="address">Address</label>
            <input type="text" name="address" value="<?php echo $getCustomerById['address']; ?>">
        </p>
        <p>
            <label for="city">City</label>
            <input type="text" name="city" value="<?php echo $getCustomerById['city']; ?>">
        </p>
        <p>
            <label for="province">Province</label>
            <input type="text" name="province" value="<?php echo $getCustomerById['province']; ?>">
        </p>
        <p>
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code" value="<?php echo $getCustomerById['postal_code']; ?>">
        </p>
        <input type="submit" name="editCustomerBtn" value="Save">
    </form>

</body>
</html>
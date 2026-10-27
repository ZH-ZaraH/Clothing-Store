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
    <h1>˚.⋆꒰১ ໒꒱⋆.˚Welcome To BowTique˚.⋆꒰১ ໒꒱⋆.˚</h1>
    <h2>Create an Account now to Shop!</h2>
    <form action="../cs_core/clHandleForms.php" method="POST">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username">
        </p>
        <p>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name">
        </p>
        <p>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name">
        </p>
        <p>
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="text" name="email">
        </p>
        <p>
            <label for="address">Address</label>
            <input type="text" name="address">
        </p>
        <p>
            <label for="city">City</label>
            <input type="text" name="city">
        </p>
        <p>
            <label for="province">Province</label>
            <input type="text" name="province">
        </p>
        <p>
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code">
        </p>
        <input type="submit" name="addCustomerBtn">
    </form>
    <?php $getAllCustomers = getAllCustomers($pdo); ?>
    <?php foreach ($getAllCustomers as $row) { ?>
    <div class="container" style="border-style: solid; width: 50%; height: automatic; margin-top: 20px;">
        <h3>Username: <?php echo $row['username']; ?></h3>
        <h3>First Name: <?php echo $row['first_name']; ?></h3>
        <h3>Last Name: <?php echo $row['last_name']; ?></h3>
        <h3>Contact Number: <?php echo $row['contact_number']; ?></h3>
        <h3>Email: <?php echo $row['email']; ?></h3>
        <h3>Address: <?php echo $row['address']; ?></h3>
        <h3>City: <?php echo $row['city']; ?></h3>
        <h3>Province: <?php echo $row['province']; ?></h3>
        <h3>Postal Code: <?php echo $row['postal_code']; ?></h3>
        <h3>Date Added: <?php echo $row['date_added']; ?></h3>
    
        <div class="Edit_and_Delete" style="float: right; margin-right: 20px;">
            <a href="vieworders.php?customer_id=<?php echo $row['customer_id']; ?>">View Orders</a>
            <a href="edit_customer.php?customer_id=<?php echo $row['customer_id']; ?>">Edit</a>
            <a href="delete_customer.php?customer_id=<?php echo $row['customer_id']; ?>">Delete</a>
        </div>

    </div>
    <?php } ?>  
</body>
</html>
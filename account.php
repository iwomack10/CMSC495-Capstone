<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Page</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['email']; ?></h2>
    <a href="add_product.php">Add New Product</a><br>
    <a href="record_sale.php">Record Sales</a><br>
    <a href="delete_product.php">Delete Product</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>

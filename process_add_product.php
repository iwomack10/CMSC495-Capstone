<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$db = new mysqli('localhost', 'root', '', 'inventory_management_db');

$name = $_POST['name'];
$quantity = $_POST['quantity'];
$cost = $_POST['cost'];

$query = "INSERT INTO products (name, quantity, cost) VALUES ('$name', $quantity, $cost)";
$db->query($query);

header('Location: account.php');
exit();
?>

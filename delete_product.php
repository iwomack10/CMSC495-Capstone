<?php
include 'config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM products WHERE id='$id'";
    if ($connection->query($sql) === TRUE) {
        header('Location: view_products.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>

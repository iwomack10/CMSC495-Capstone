<?php
include 'config/header.php';
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<div class="container mt-5">
    <h1 class="text-center">Welcome to the Inventory Management System</h1>
    <p class="text-center">Use the navigation menu to manage your products.</p>
</div>
<?php include 'config/footer.php'; ?>

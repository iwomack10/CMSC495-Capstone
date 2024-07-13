<?php
session_start();

// Database connection
$db = new mysqli('localhost', 'root', '', 'inventory_management_db');

// Registration
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Insert user into database
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    $db->query($query);
    $_SESSION['email'] = $email;
    header('Location: account.php');
    exit();
}

// Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Retrieve user from database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $db->query($query);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $email;
            header('Location: account.php');
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
?>

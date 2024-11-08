<?php
session_start();
require 'db_connection.php'; // File for database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);
    
    // Check if fields are empty
    if (empty($email) || empty($password)) {
        die('Please fill all required fields.');
    }

    // Fetch user data from the database
    $sql = "SELECT * FROM register WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['Id'] = $user['Id'];
            $_SESSION['username'] = $user['username'];
            header('Location: https://centralperk.com/pages/shop-coffee'); // Redirect to dashboard or any other page
            exit();
        } else {
            echo 'Invalid password.';
            header('Location: https://centralperk.com/pages/shop-coffee');
        }
    } else {
        echo 'No user found with this email.';
    }

    $stmt->close();
    $conn->close();
}
?>

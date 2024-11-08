<?php
// Database connection parameters
$host = 'localhost';
$db = 'centralperk';
$user = 'root';
$pass = '';

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

// Validate the data
if (!empty($name) && !empty($phone) && !empty($email) && !empty($message)) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO info (name, phone, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo"New record created sucessfully";
        // Redirect to index page
        header("Location: /coffee-website/index.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "All fields are required!";
    // Redirect to contact page
    header("Location: /coffee-website/contact.html");
        exit();
}

// Close the connection
$conn->close();
?>

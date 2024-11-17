<?php
require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $connection->real_escape_string($_POST['name']);
    $email = $connection->real_escape_string($_POST['email']);
    $messages = $connection->real_escape_string($_POST['messages']);

    // Prepare and bind
    $stmt = $connection->prepare("INSERT INTO message (name, email, main_message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $messages);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        http_response_code(500); // Set HTTP error code
        echo "Message sending failed. Please try again.";
    }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
} else {
    http_response_code(405); // Method not allowed
    echo "Invalid request method.";
}

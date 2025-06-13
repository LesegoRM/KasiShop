<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect user information
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Process the order (e.g., save to database, send email, etc.)
    // For demonstration purposes, we'll just display a confirmation message
    echo "<h1>Thank you, $name!</h1>";
    echo "<p>Your order has been placed.</p>";
    echo "<p>We will send a confirmation email to $email.</p>";
    echo "<p>Shipping to: $address</p>";

    // Clear the cart after processing the order
    unset($_SESSION['cart']);
}
?>
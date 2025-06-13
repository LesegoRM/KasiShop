<?php
// get_cart_items.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kasishop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cart items
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

$cartItems = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }
}

echo json_encode($cartItems);

$conn->close();
?>
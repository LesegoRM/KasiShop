<?php
session_start();

// Sample product data (for demonstration purposes)
$products = [
    ["id" => 1, "name" => "Streetwear Hoodie", "price" => 499.00],
    ["id" => 2, "name" => "Handmade Clay Pots", "price" => 299.00],
    ["id" => 3, "name" => "Organic Skincare Set", "price" => 350.00],
    ["id" => 4, "name" => "Wireless Earbuds", "price" => 899.00],
    ["id" => 5, "name" => "Zulu Beaded Necklace", "price" => 199.00],
    ["id" => 6, "name" => "Decorative Basket", "price" => 150.00],
    ["id" => 7, "name" => "Kasi Made Kicks", "price" => 999.00],
    ["id" => 8, "name" => "Scented Soy Candles", "price" => 120.00]
];

// Function to get product details by ID
function getProductById($id, $products) {
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
                    $productId = $_POST['product_id'];
                    $quantity = $_POST['quantity'];
                    if (isset($_SESSION['cart'][$productId])) {
                        $_SESSION['cart'][$productId] += $quantity;
                    } else {
                        $_SESSION['cart'][$productId] = $quantity;
                    }
                }
                break;
            case 'remove':
                if (isset($_POST['product_id'])) {
                    unset($_SESSION['cart'][$_POST['product_id']]);
                }
                break;
            case 'update':
                if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
                    $productId = $_POST['product_id'];
                    $quantity = $_POST['quantity'];
                    if ($quantity > 0) {
                        $_SESSION['cart'][$productId] = $quantity;
                    } else {
                        unset($_SESSION['cart'][$productId]);
                    }
                }
                break;
        }
    }
}

// Calculate total price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $productId => $quantity) {
    $product = getProductById($productId, $products);
    if ($product) {
        $totalPrice += $product['price'] * $quantity;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KasiShop | Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #001f3f;
            color: #fff;
        }
        .navbar {
            background-color: #111;
        }
        .nav-link {
            color: #fff;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #007bff;
        }
        .cart-section {
            padding: 60px 0;
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }
        .cart-table th, .cart-table td {
            padding: 15px;
            text-align: left;
        }
        .cart-table th {
            background-color: #1a232e;
        }
        .cart-table tbody tr:nth-child(odd) {
            background-color: #111;
        }
        .cart-table tbody tr:hover {
            background-color: #222;
        }
        .btn-remove {
            background-color: #dc3545;
            border: none;
            color: white;
        }
        .btn-remove:hover {
            background-color: #a71d2a;
        }
        .footer {
            background-color: #111;
            color: white;
            padding: 40px 0 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.html">
            <img src="images/kasishop-logo-white.png" alt="KasiShop" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="categories.html">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="sell.html">Sell</a></li>
                <li class="nav-item"><a class="nav-link" href="login.html">Account</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light ml-1"><?= array_sum($_SESSION['cart']) ?></span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Cart Section -->
    <section class="cart-section container">
        <h2 class="text-center mb-5">🛒 Your Cart</h2>
        <?php if (empty($_SESSION['cart'])): ?>
            <p class="text-center">Your cart is empty.</p>
        <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $productId => $quantity): ?>
                        <?php $product = getProductById($productId, $products); ?>
                        <?php if ($product): ?>
                            <tr>
                                <td><?= $product['name'] ?></td>
                                <td>
                                    <form action="cart.php" method="post" style="display: inline;">
                                        <input type="hidden" name="product_id" value="<?= $productId ?>">
                                        <input type="number" name="quantity" value="<?= $quantity ?>" min="1" class="form-control" style="width: 50px;">
                                        <button type="submit" name="action" value="update" class="btn btn-primary btn-sm">Update</button>
                                    </form>
                                </td>
                                <td>R<?= number_format($product['price'], 2) ?></td>
                                <td>R<?= number_format($product['price'] * $quantity, 2) ?></td>
                                <td>
                                    <form action="cart.php" method="post" style="display: inline;">
                                        <input type="hidden" name="product_id" value="<?= $productId ?>">
                                        <button type="submit" name="action" value="remove" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3 class="text-center mt-4">Total: R<?= number_format($totalPrice, 2) ?></h3>
            <a href="checkout.php" class="btn btn-success btn-block mt-3">Proceed to Checkout</a>
        <?php endif; ?>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 KasiShop Marketplace. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
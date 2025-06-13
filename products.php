<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kasishop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all products
$allProducts = [];
$result = $conn->query("SELECT * FROM products");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $allProducts[] = [
            "id" => $row["id"],
            "image" => $row["image"],
            "name" => $row["name"],
            "price" => $row["price"]
        ];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>KasiShop | Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
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
        .product-section {
            padding: 60px 0;
        }
        .product-card {
            background-color: #1a232e;
            border: none;
            border-radius: 10px;
            transition: transform 0.3s;
            color: #fff;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 15px rgba(0,123,255,0.3);
        }
        .product-card img {
            max-height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .product-card .card-body {
            padding: 15px;
        }
        .product-card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }
        .product-card .card-text {
            font-size: 0.95rem;
            margin-bottom: 10px;
        }
        .btn-buy {
            background-color: #007bff;
            border: none;
        }
        .btn-buy:hover {
            background-color: #0056b3;
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
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="KasiShop" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item active"><a class="nav-link" href="products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="categories.php">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="sell.php">Sell</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Account</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light ml-1">0</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- All Products -->
    <section class="product-section container">
        <h2 class="text-center mb-5">🛒 All Products</h2>
        <div class="row">
            <?php if (!empty($allProducts)): ?>
                <?php foreach ($allProducts as $product): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card product-card">
                            <img src="<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['name'] ?></h5>
                                <p class="card-text"><?= $product['price'] ?></p>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" name="action" value="add" class="btn btn-buy btn-block">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">No products available.</p>
            <?php endif; ?>
        </div>
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
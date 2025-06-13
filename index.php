<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KasiShop | South Africa's Local Marketplace</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #fff;
            background-color: #001f3f;
        }
        .navbar {
            background-color: #111;
        }
        .navbar-brand img {
            height: 40px;
        }
        .nav-link {
            color: #fff;
            margin: 0 10px;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #007bff;
        }
        .btn-main {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            padding: 10px 25px;
            font-weight: 600;
        }
        .btn-main:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .header {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/kasi-bg.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 20px 0;
        }
        .hero-content {
            padding: 80px 0;
        }
        .featured-section {
            background-color: #1a232e;
            padding: 50px 0;
            color: #fff;
        }
        .testimonial-section {
            background-color: #111;
            padding: 50px 0;
            color: #fff;
        }
        .testimonial-card {
            background-color: #222;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .testimonial-card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .footer {
            background-color: #111;
            color: white;
            padding: 50px 0 20px;
        }
        .footer a {
            color: #ccc;
        }
        .footer a:hover {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Header with Navigation -->
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" alt="KasiShop Marketplace">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="categories.php">Categories</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Sell</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Account</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <i class="fas fa-shopping-cart"></i> Cart
                                <span class="badge badge-light ml-1">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="row align-items-center hero-content">
                <div class="col-md-6">
                    <h1>Buy & Sell Locally in South Africa</h1>
                    <p class="lead">Support local businesses and find unique products from your community.</p>
                    <div class="mt-4">
                        <a href="products.php" class="btn btn-main mr-3">Browse Products</a>
                        <a href="sell.php" class="btn btn-outline-light">Sell an Item</a>
                    </div>
                </div>
                <div class="col-md-6 hero-img">
                <img src="images/logo.png" alt="KasiShop Marketplace" class="img-fluid">
                </div>
            </div>
        </div>
    </header>

    <!-- Featured Section -->
    <section class="featured-section">
        <div class="container">
            <h2 class="text-center">Featured Products</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/product1.jpg" class="card-img-top" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">Traditional Beaded Jewelry</h5>
                            <p class="card-text">R150.00</p>
                            <a href="product.php?id=1" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/product2.jpg" class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Handmade Leather Wallet</h5>
                            <p class="card-text">R250.00</p>
                            <a href="product.php?id=2" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/product3.jpg" class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="card-title">African Print Dress</h5>
                            <p class="card-text">R350.00</p>
                            <a href="product.php?id=3" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonial-section">
        <div class="container">
            <h2 class="text-center">What Our Users Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center">
                            <img src="images/user1.jpg" class="rounded-circle" alt="User">
                            <div>
                                <h5 class="mb-0">Thandi M.</h5>
                                <small>Soweto</small>
                            </div>
                        </div>
                        <p>"KasiShop helped me grow my small beadwork business. Now I reach customers across South Africa!"</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center">
                            <img src="images/user2.jpg" class="rounded-circle" alt="User">
                            <div>
                                <h5 class="mb-0">Sipho K.</h5>
                                <small>Alexandra</small>
                            </div>
                        </div>
                        <p>"I found authentic African art for my home at great prices. Supporting local artists feels good!"</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center">
                            <img src="images/user3.jpg" class="rounded-circle" alt="User">
                            <div>
                                <h5 class="mb-0">Nomsa D.</h5>
                                <small>Khayelitsha</small>
                            </div>
                        </div>
                        <p>"The homemade food section is amazing! I order traditional meals weekly from talented cooks."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section bg-primary text-white py-5">
        <div class="container text-center">
            <h2>Ready to Sell Your Products?</h2>
            <p class="lead">Join our community of local entrepreneurs and grow your business</p>
            <a href="sell.php" class="btn btn-light btn-lg mt-3">Get Started for Free</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="text-center">&copy; 2025 KasiShop Marketplace. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

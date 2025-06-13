<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'kasishop';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch categories from database
$sql = "SELECT * FROM categories ORDER BY name ASC";
$result = $conn->query($sql);

if (!$result) {
    die("Error fetching categories: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>KasiShop | Categories</title>
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
    .category-section {
      padding: 60px 0;
    }
    .category-title {
      text-align: center;
      margin-bottom: 40px;
    }
    .category-card {
      background-color: #1a232e;
      border: none;
      border-radius: 10px;
      text-align: center;
      padding: 30px 20px;
      transition: all 0.3s ease;
      color: #fff;
      cursor: pointer;
    }
    .category-card:hover {
      background-color: #007bff;
      transform: translateY(-5px);
      color: #fff;
    }
    .category-card i {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: #007bff;
    }
    .category-card:hover i {
      color: #fff;
    }
    .footer {
      background-color: #111;
      color: white;
      padding: 40px 0 20px;
      text-align: center;
    }
    .footer a {
      color: #ccc;
    }
    .footer a:hover {
      color: #007bff;
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
        <li class="nav-item"><a class="nav-link" href="products.html">Products</a></li>
        <li class="nav-item active"><a class="nav-link" href="categories.php">Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="sell.html">Sell</a></li>
        <li class="nav-item"><a class="nav-link" href="login.html">Account</a></li>
        <li class="nav-item">
          <a class="nav-link" href="cart.html"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light ml-1">0</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Categories Section -->
  <section class="category-section container">
    <h2 class="category-title">Browse Categories</h2>
    <div class="row">
      <?php while ($category = $result->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
          <a href="products.php?category=<?= htmlspecialchars($category['slug']) ?>" class="text-decoration-none">
            <div class="category-card">
              <i class="<?= htmlspecialchars($category['icon_class']) ?>"></i>
              <h5><?= htmlspecialchars($category['name']) ?></h5>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
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

<?php
$conn->close();
?>

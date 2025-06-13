<?php
// Handle product submission
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli("localhost", "root", "", "kasishop");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $productName = $conn->real_escape_string($_POST["productName"]);
    $productPrice = floatval($_POST["productPrice"]);
    $productDescription = $conn->real_escape_string($_POST["productDescription"]);
    $productCategory = $conn->real_escape_string($_POST["productCategory"]);

    $imagePath = "";
    if (isset($_FILES["productImage"]) && $_FILES["productImage"]["error"] === 0) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $imageName = basename($_FILES["productImage"]["name"]);
        $imagePath = $targetDir . time() . "_" . $imageName;
        move_uploaded_file($_FILES["productImage"]["tmp_name"], $imagePath);
    }

    $sql = "INSERT INTO products (name, price, description, category, image) 
            VALUES ('$productName', $productPrice, '$productDescription', '$productCategory', '$imagePath')";

    if ($conn->query($sql) === TRUE) {
        $message = "Product submitted successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>KasiShop | Sell Your Products</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #001f3f, #1a232e);
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
    .form-container {
      max-width: 600px;
      margin: 80px auto;
      background-color: rgba(26, 35, 46, 0.95);
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
      padding: 40px 30px;
    }
    .form-container h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
    }
    .form-group label {
      color: #ccc;
    }
    .form-control, .form-control-file, .form-select {
      background-color: #222;
      color: #fff;
      border: 1px solid #444;
    }
    .btn-primary {
      background-color: #007bff;
      font-weight: 500;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .footer {
      background-color: #111;
      color: #ccc;
      padding: 40px 0 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">
      <img src="images/kasishop-logo-white.png" alt="KasiShop" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="seller_dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="manage_products.php">Manage Products</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

  <!-- Sell Form -->
  <section class="form-container">
    <h2>Sell Your Product</h2>
    <?php if ($message): ?>
      <div class="alert alert-info text-center"><?= $message ?></div>
    <?php endif; ?>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="productName"><i class="fas fa-tag"></i> Product Name</label>
        <input type="text" class="form-control" name="productName" required>
      </div>
      <div class="form-group">
        <label for="productPrice"><i class="fas fa-money-bill-wave"></i> Price</label>
        <input type="number" class="form-control" name="productPrice" step="0.01" required>
      </div>
      <div class="form-group">
        <label for="productDescription"><i class="fas fa-align-left"></i> Description</label>
        <textarea class="form-control" name="productDescription" rows="4" required></textarea>
      </div>
      <div class="form-group">
        <label for="productCategory"><i class="fas fa-list"></i> Category</label>
        <select class="form-control" name="productCategory" required>
          <option value="">Select Category</option>
          <option value="clothing">Clothing</option>
          <option value="handicrafts">Handicrafts</option>
          <option value="food">Food</option>
          <option value="furniture">Furniture</option>
          <option value="electronics">Electronics</option>
          <option value="beauty">Beauty</option>
        </select>
      </div>
      <div class="form-group">
        <label for="productImage"><i class="fas fa-image"></i> Product Image</label>
        <input type="file" class="form-control-file" name="productImage" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Submit Product</button>
    </form>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2025 KasiShop Marketplace. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>

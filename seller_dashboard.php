<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit();
}
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Seller Dashboard | KasiShop</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background-color: #001f3f; color: #fff; font-family: 'Poppins', sans-serif; }
    .navbar { background-color: #1a232e; }
    .dashboard-container { padding: 40px; }
    .welcome-box, .dashboard-card {
      background-color: #1a232e; border-radius: 10px; padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3); transition: transform 0.2s;
    }
    .dashboard-card:hover { transform: translateY(-5px); }
    a.btn-logout { background-color: #dc3545; border: none; }
    .btn-primary { background-color: #007bff; border-color: #007bff; }
    .btn-primary:hover { background-color: #0056b3; }
    .card-icon { font-size: 30px; margin-bottom: 10px; }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">KasiShop Seller Portal</a>
    <div class="ml-auto">
      <a href="logout.php" class="btn btn-logout btn-sm text-white">Logout</a>
    </div>
  </div>
</nav>

<div class="container dashboard-container">
  <div class="welcome-box text-center mb-4">
    <h2>Welcome, <?= htmlspecialchars($username) ?> 👋</h2>
    <p class="lead">Manage your store, products, and orders from here.</p>
  </div>
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="dashboard-card">
        <div class="card-icon"><i class="fas fa-box-open"></i></div>
        <h5>Manage Products</h5>
        <p>Add, update, or delete your listings.</p>
        <a href="manage_products.php" class="btn btn-primary btn-sm">Go</a>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="dashboard-card">
        <div class="card-icon"><i class="fas fa-shopping-cart"></i></div>
        <h5>Orders</h5>
        <p>Track customer orders (coming soon).</p>
        <a href="#" class="btn btn-primary btn-sm disabled">Go</a>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="dashboard-card">
        <div class="card-icon"><i class="fas fa-user-cog"></i></div>
        <h5>Account Settings</h5>
        <p>Edit profile or password (coming soon).</p>
        <a href="#" class="btn btn-primary btn-sm disabled">Go</a>
      </div>
    </div>
  </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>

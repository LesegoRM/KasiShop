<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
  $name = trim($_POST['name']);
  $price = floatval($_POST['price']);
  $imagePath = '';

  if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($_FILES['image']['type'], $allowedTypes) && $_FILES['image']['size'] < 2*1024*1024) {
      $folder = "uploads/";
      if (!is_dir($folder)) mkdir($folder, 0777, true);
      $filename = time() . '_' . basename($_FILES['image']['name']);
      $imagePath = $folder . $filename;
      if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        $imagePath = ''; // reset if upload failed
      }
    } else {
      echo "<p style='color:red;'>Invalid image file type or size (max 2MB).</p>";
    }
  }

  $stmt = $conn->prepare("INSERT INTO products (seller, name, price, image) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssds", $_SESSION['username'], $name, $price, $imagePath);
  $stmt->execute();
  $stmt->close();
}

if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $stmt = $conn->prepare("DELETE FROM products WHERE id = ? AND seller = ?");
  $stmt->bind_param("is", $id, $_SESSION['username']);
  $stmt->execute();
  $stmt->close();
}

$stmt = $conn->prepare("SELECT id, name, price, image FROM products WHERE seller = ? ORDER BY created_at DESC");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$products = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Products | KasiShop</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background-color: #001f3f; color: #fff; font-family: 'Poppins', sans-serif; }
    .container { padding: 40px; }
    .btn-danger { background-color: #dc3545; }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#1a232e;">
  <div class="container">
    <a class="navbar-brand" href="seller_dashboard.php">← Back to Dashboard</a>
  </div>
</nav>

<div class="container">
  <h2 class="mb-4">Your Products</h2>
  <form method="POST" enctype="multipart/form-data" class="mb-5 text-dark bg-light p-3 rounded">
    <div class="form-row align-items-center">
      <div class="col"><input type="text" name="name" class="form-control" placeholder="Product Name" required></div>
      <div class="col"><input type="number" step="0.01" name="price" class="form-control" placeholder="Price" required></div>
      <div class="col"><input type="file" name="image" class="form-control-file" required></div>
      <div class="col-auto"><button type="submit" name="add_product" class="btn btn-primary">Add</button></div>
    </div>
  </form>

  <table class="table table-bordered table-dark">
    <thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Image</th><th>Action</th></tr></thead>
    <tbody>
      <?php while ($row = $products->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td>R<?= number_format($row['price'], 2) ?></td>
        <td><img src="<?= $row['image'] ?: 'placeholder.jpg' ?>" width="80" alt="Product Image"></td>
        <td>
          <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this product?')" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
      <?php if ($products->num_rows == 0): ?>
      <tr><td colspan="5" class="text-center">No products yet.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</body>
</html>

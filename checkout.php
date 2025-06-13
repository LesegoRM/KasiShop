<?php 
session_start();

// Sample product data
$products = [
    ["id" => 1, "image" => "images/product4.jpg", "name" => "Streetwear Hoodie", "price" => 499.00],
    ["id" => 2, "image" => "images/product5.jpg", "name" => "Handmade Clay Pots", "price" => 299.00],
    ["id" => 3, "image" => "images/product6.jpg", "name" => "Organic Skincare Set", "price" => 350.00],
    ["id" => 4, "image" => "images/product7.jpg", "name" => "Wireless Earbuds", "price" => 899.00],
    ["id" => 5, "image" => "images/product8.jpg", "name" => "Zulu Beaded Necklace", "price" => 199.00],
    ["id" => 6, "image" => "images/product9.jpg", "name" => "Decorative Basket", "price" => 150.00],
    ["id" => 7, "image" => "images/feature1.jpg", "name" => "Kasi Made Kicks", "price" => 999.00],
    ["id" => 8, "image" => "images/feature2.jpg", "name" => "Scented Soy Candles", "price" => 120.00]
];

function getProductById($id, $products) {
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}

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
  <title>KasiShop | Checkout</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #001f3f;
      color: white;
      font-family: 'Poppins', sans-serif;
    }
    .checkout-card {
      background-color: #1a232e;
      border-radius: 10px;
      padding: 30px;
      margin-top: 30px;
    }
    .form-control, .btn {
      border-radius: 5px;
    }
    .payment-option {
      background: #222c3a;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .payment-option label {
      color: #fff;
      font-weight: 500;
    }
    .badge-light {
      background: #007bff;
      color: #fff;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center mt-5">🛒 Checkout</h2>

  <?php if (empty($_SESSION['cart'])): ?>
    <p class="text-center mt-4">Your cart is empty.</p>
  <?php else: ?>
    <div class="checkout-card">
      <h4>Cart Summary</h4>
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($_SESSION['cart'] as $productId => $quantity): ?>
            <?php $product = getProductById($productId, $products); ?>
            <?php if ($product): ?>
              <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $quantity ?></td>
                <td>R<?= number_format($product['price'], 2) ?></td>
                <td>R<?= number_format($product['price'] * $quantity, 2) ?></td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
      <h5 class="text-right">Total: <span class="badge badge-light">R<?= number_format($totalPrice, 2) ?></span></h5>
    </div>

    <form action="process_order.php" method="post" class="checkout-card">
      <h4>Billing Information</h4>
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" required />
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="address">Delivery Address</label>
        <input type="text" class="form-control" id="address" name="address" required />
      </div>

      <h4>Payment Method</h4>
      <div class="payment-option">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment_method" value="credit_card" id="creditCard" required>
          <label class="form-check-label" for="creditCard">Credit / Debit Card</label>
        </div>
        <div class="row mt-2">
          <div class="col-md-6">
            <input type="text" class="form-control" name="card_number" placeholder="Card Number">
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control" name="expiry" placeholder="MM/YY">
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control" name="cvv" placeholder="CVV">
          </div>
        </div>
      </div>

      <div class="payment-option">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment_method" value="eft" id="eft">
          <label class="form-check-label" for="eft">Instant EFT</label>
        </div>
      </div>

      <div class="payment-option">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment_method" value="snapscan" id="snapscan">
          <label class="form-check-label" for="snapscan">SnapScan / QR Code</label>
        </div>
      </div>

      <button type="submit" class="btn btn-success btn-block mt-4">Place Order</button>
    </form>
  <?php endif; ?>
</div>

</body>
</html>

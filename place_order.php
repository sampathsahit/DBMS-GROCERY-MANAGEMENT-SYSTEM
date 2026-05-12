<?php
include 'db.php';

$user_id = 1;

// Step 1: Create order
$sql = "INSERT INTO orders (user_id) VALUES ('$user_id')";
$conn->query($sql);

// Get last order id
$order_id = $conn->insert_id;

// Step 2: Get cart items
$cart = $conn->query("SELECT * FROM cart WHERE user_id=$user_id");

while($row = $cart->fetch_assoc()) {
    $product_id = $row['product_id'];
    $qty = $row['quantity'];

    // Insert into order_items
    $conn->query("INSERT INTO order_items (order_id, product_id, quantity)
                  VALUES ('$order_id', '$product_id', '$qty')");
}

// Step 3: Clear cart
$conn->query("DELETE FROM cart WHERE user_id=$user_id");

echo "<h2>Order Placed Successfully 🎉</h2>";
echo "<a href='products.php'>Continue Shopping</a>";
?>
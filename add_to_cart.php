<?php
include 'db.php';

// Temporary user_id (we will fix later with session)
$user_id = 1;

$product_id = $_POST['product_id'];
$qty = $_POST['qty'];

// Insert into cart
$sql = "INSERT INTO cart (user_id, product_id, quantity)
        VALUES ('$user_id', '$product_id', '$qty')";

if ($conn->query($sql) === TRUE) {
    echo "Added to cart successfully <br>";
    echo "<a href='products.php'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}
?>
<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];
?>
<?php
include 'db.php';

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Products</title>
<style>
body {
    font-family: Arial;
    background: #f4f4f4;
}

.container {
    width: 80%;
    margin: auto;
    text-align: center;
}

.card {
    display: inline-block;
    background: white;
    padding: 20px;
    margin: 15px;
    border-radius: 10px;
    width: 200px;
}

button {
    padding: 8px;
    background: green;
    color: white;
    border: none;
    border-radius: 5px;
}
</style>
</head>

<body>

<div class="container">
<h2>Fresh Vegetables 🥕</h2>

<?php
while($row = $result->fetch_assoc()) {
    echo "
    <div class='card'>
        <h3>{$row['name']}</h3>
        <p>Price: ₹{$row['price']}</p>
        <p>Available: {$row['quantity']}</p>
        
        <form action='add_to_cart.php' method='POST'>
            <input type='hidden' name='product_id' value='{$row['product_id']}'>
            <input type='number' name='qty' value='1' min='1'>
            <br><br>
            <button type='submit'>Add to Cart</button>
        </form>
    </div>
    ";
}
?>

<br><br>

<a href="cart.php">
    <button style="background: orange;">🛒 View Cart</button>
</a>

<a href="home.php">
    <button>⬅ Back</button>
</a>
</body>
</html>

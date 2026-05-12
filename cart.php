<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];
?>
<?php
include 'db.php';

// Temporary user id
$user_id = 1;

$sql = "SELECT cart.cart_id, products.name, products.price, cart.quantity
        FROM cart
        JOIN products ON cart.product_id = products.product_id
        WHERE cart.user_id = $user_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Cart</title>
<style>
body { font-family: Arial; background: #f4f4f4; text-align: center; }
table {
    margin: auto;
    border-collapse: collapse;
    width: 60%;
}
th, td {
    padding: 10px;
    border: 1px solid #ddd;
}
button {
    padding: 5px 10px;
    background: red;
    color: white;
    border: none;
}
.place {
    background: green;
    margin-top: 20px;
}
</style>
</head>

<body>

<h2>🛒 Your Cart</h2>

<table>
<tr>
<th>Item</th>
<th>Price</th>
<th>Quantity</th>
<th>Action</th>
</tr>

<?php
while($row = $result->fetch_assoc()) {
    echo "
    <tr>
        <td>{$row['name']}</td>
        <td>₹{$row['price']}</td>
        <td>{$row['quantity']}</td>
        <td>
            <a href='remove.php?id={$row['cart_id']}'><button>Remove</button></a>
        </td>
    </tr>
    ";
}
?>

</table>

<br>

<a href="place_order.php">
    <button class="place">Place Order</button>
</a>

<br><br>
<a href="products.php">⬅ Back to Products</a>

</body>
</html>
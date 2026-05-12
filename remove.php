<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM cart WHERE cart_id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: cart.php");
} else {
    echo "Error";
}
?>
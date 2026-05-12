<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Store session
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];

    header("Location: home.php");
} else {
    echo "Invalid login";
}
?>
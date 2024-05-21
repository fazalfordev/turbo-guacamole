<?php
include "functions.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_barang'])) {
    $pdo = pdo_connect();

    $cart_id = $_POST['cart_id'];

    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("DELETE FROM shopping_cart WHERE id = ? AND user_id = ?");
    $stmt->execute([$cart_id, $user_id]);

    header("Location: cart.php");
    exit();
} else {
    header("Location: cart.php");
    exit();
}
?>

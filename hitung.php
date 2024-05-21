<?php

session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<html>
    <head>
        <title>Bayar</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="section3">
        <?php
            include 'functions.php';
            
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $action = isset($_GET["action"]) ? $_GET["action"] : "";
            
                if ($action == "bayar") {
                    $cart_id = isset($_GET["cart_id"]) ? $_GET["cart_id"] : 0;
                    $jumlah = isset($_GET["jumlah"]) ? $_GET["jumlah"] : 0;
                    $harga = isset($_GET["harga"]) ? $_GET["harga"] : 0;
            
                    $total = $jumlah * $harga;

                    if ($jumlah > 3) {
                        $diskon = 0.05 * $total;
                        $total -= $diskon;
                        echo "<script>alert('Transaksi berhasil! \\nSelemat anda mendapatkan diskon sebanyak 5%($diskon) karena membeli lebih dari 3 barang \\nTotal: " . $total . "'); window.location.href = 'produk.php';</script>";
                        deleteCartItem($cart_id);
                        exit();
                    } else{
                        echo "<script>alert('Transaksi berhasil! Total: " . $total . "'); window.location.href = 'produk.php';</script>";
                        deleteCartItem($cart_id);
                    exit();
                    }

                    

                } elseif ($action == "keranjang") {
                    $nama = $_GET["nama"];
                    $harga = $_GET["harga"];
                    $deskripsi = $_GET["deskripsi"];
                    $jumlah = $_GET["jumlah"];

                    saveToShoppingCart($nama, $harga, $deskripsi, $jumlah);

                    header("Location: produk.php");
                    exit();
                }
            }

            function deleteCartItem($cart_id) {
                $pdo = pdo_connect();
                $stmt = $pdo->prepare("DELETE FROM shopping_cart WHERE id = ?");
                $stmt->execute([$cart_id]);
            }
            
            function saveToShoppingCart($nama, $harga, $deskripsi, $jumlah) {
                $pdo = pdo_connect();
                $user_id = $_SESSION['user_id'];
                $stmt = $pdo->prepare("INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
                $stmt->execute([$user_id, $nama, $jumlah, $harga]);
            }
        ?>
        </div>
    </body>
</html>

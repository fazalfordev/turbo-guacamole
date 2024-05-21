<?php

session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "functions.php";

$pdo = pdo_connect();
$stmt = $pdo->prepare("SELECT * FROM contacts");
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
    <head>
        <title>Product</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
        <body>
            <div class="sections">
                <?php
                    echo "<h1>Selamat Datang di Toko Batujajar</h1>";
                ?>

                <div class="topnav">
                    <a href="produk.php">Produk</a>
                    <a href="tentangkami.php">Tentang Kami</a>
                    <?php
                        if (isset($_SESSION["username"])) {
                            echo "<a>" . $_SESSION["username"] . "</a>";
                        }
                    ?>
                    <a href="logout.php">Logout</a>
                    <a href="cart.php">&#x1F6D2;Cart</a>
                </div>
                <h2>Produk Kami</h2>
                <div class="section3">
                    <div class="list-product">
                        <img src="steak.jpg" alt="iPhone">
                        <h4>iPhone</h4>
                        <h5>RP 12.000.000</h5>
                        <a class="tombol tombol-detail" href="detail.php">Detail</a>
                        <a class="tombol tombol-beli" href="checkout.php?harga=12000000&nama=iPhone&deskripsi=iPhone terbaru dengan fitur yang sangat menarik dan canggih&gambar=steak.jpg">Beli</a>
                    </div>
                    <div class="list-product">
                        <img src="burger.jpg" alt="Laptop">
                        <h4>Laptop</h4>
                        <h5>RP 14.000.000</h5>
                        <a class="tombol tombol-detail" href="detail.php">Detail</a>
                        <a class="tombol tombol-beli" href="checkout.php?harga=14000000&nama=Laptop&deskripsi=Laptop terbaru dengan fitur yang sangat canggih&gambar=burger.jpg">Beli</a>
                    </div>
                    <div class="list-product">
                        <img src="chips.jpg" alt="Mouse">
                        <h4>Mouse</h4>
                        <h5>RP 70.000</h5>
                        <a class="tombol tombol-detail" href="detail.php">Detail</a>
                        <a class="tombol tombol-beli" href="checkout.php?harga=70000&nama=Mouse&deskripsi=Mouse yang ringan dan nyaman dipakai&gambar=chips.jpg">Beli</a>
                    </div>
                    <div class="list-product">
                        <img src="pizza.jpg" alt="Headset">
                        <h4>Headset</h4>
                        <h5>RP 150.000</h5>
                        <a class="tombol tombol-detail" href="detail.php">Detail</a>
                        <a class="tombol tombol-beli" href="checkout.php?harga=150000&nama=Headset&deskripsi=Headset dengan kualitas suara yang sangat baik&gambar=pizza.jpg">Beli</a>
                    </div>
                </div>
            </div>
        </body>
</html>

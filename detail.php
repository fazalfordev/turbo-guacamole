<?php

session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
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
            <div class="sections3">
                <img src="steak.jpg" alt="iPhone" width="400px">
                <p>iPhone terbaru dengan fitur yang sangat menarik dan canggih</P>
                <img src="burger.jpg" alt="Laptop" width="400px">
                <p>Laptop terbaru dengan fitur yang sangat canggih</P>
                <img src="chips.jpg" alt="Mouse" width="400px">
                <p>Mouse yang ringan dan nyaman dipakai&gambar</P>
                <img src="pizza.jpg" alt="Headset" width="400px">
                <p>Headset dengan kualitas suara yang sangat baik</P>
            </div>
        </div>
    </body>
</html>

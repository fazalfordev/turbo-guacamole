<?php

session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<html>
    <head>
        <title>Detail Produk</title>
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

            <div class="section3">
                <div class="checkout">
                    <?php
                        $gambarProduk = isset($_GET['gambar']) ? $_GET['gambar'] : 'default.jpg';
                    ?>
                    <img src="<?php echo $gambarProduk; ?>" alt="Produk">
                    <form action="hitung.php" method="GET">
                        Nama<br>
                        <input type="text" name="nama" value="<?php echo isset($_GET['nama']) ? $_GET['nama'] : ''; ?>" readonly/><br/>
                        Harga<br>
                        <input type="text" name="harga" value="<?php echo isset($_GET['harga']) ? $_GET['harga'] : ''; ?>" readonly/><br/>
                        Deskripsi<br>
                        <input type="text" name="deskripsi" value="<?php echo isset($_GET['deskripsi']) ? $_GET['deskripsi'] : ''; ?>" readonly/><br/>
                        Jumlah      : <input type = "number" name = "jumlah" value="1" min="1" required/><br>
                        <a class="tombol2 tombol-beli2" href="produk.php">Kembali</a>
                        <button class="tombol12 button-beli" type="submit" name="action" value="bayar">BAYAR</button>
                        <button class="tombol12 button-beli"type="submit" name="action" value="keranjang">Masukkan ke Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
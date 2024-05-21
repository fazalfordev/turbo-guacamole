<?php
include "functions.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$pdo = pdo_connect();

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM shopping_cart WHERE user_id = ?");
$stmt->execute([$user_id]);
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

            <h2>Keranjang Belanja</h2>
            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td><?php echo $item['product_name']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['price']; ?></td>
                            <td><?php echo $item['quantity'] * $item['price']; ?></td>
                            <td><a class="btn btn-bayar" href="hitung.php?action=bayar&cart_id=<?php echo $item['id']; ?>&jumlah=<?php echo $item['quantity']; ?>&harga=<?php echo $item['price']; ?>">Bayar</a>
                                <form method="post" action="hapus_barang.php">
                                    <input type="hidden" name="cart_id" value="<?php echo $item['id']; ?>">
                                    <button class="btn btn-hapus" type="submit" name="hapus_barang">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

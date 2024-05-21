<?php
session_start(); 

include "functions.php";
$pdo = pdo_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM contacts WHERE username = ? AND password = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $row['id'];
        header("Location: produk.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css"> 
</head>
<body>
    <div class="container login-container">
        <h1>SELAMAT DATANG DI TOKO BATUJAJAR<h1>
        <h2>Login</h2>
        <?php
        if (isset($_GET['login']) && $_GET['login'] == 'failed') {
            echo '<p class="error-message">Login failed. Please try again.</p>';
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <input type="submit" value="Login" class="btn">
            <a class="regbtn" href="register.php">Register</a>
        </form>
    </div>
</body>
</html>
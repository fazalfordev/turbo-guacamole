<?php
    include 'functions.php';
    $pdo = pdo_connect();

    if(!empty($_POST)) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password']; 
        
        if($password == $confirm_password) {
            $stmt = $pdo->prepare('INSERT INTO contacts (name, username, password) VALUES (?, ?, ?)');
            $stmt->execute([$name, $username, $password]);
            header("location:produk.php");
        } else {
            echo "<script>alert('Passwords do not match!');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required> 
            </div>
            <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>
            <input type="submit" value="Create" class="btn">
            <a href="produk.php" class="btn btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
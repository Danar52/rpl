<?php
require 'functions.php';
session_start(); // Memulai session

// Cek apakah pengguna sudah login, jika sudah, arahkan ke halaman index
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Menggunakan prepared statements untuk menghindari SQL injection
    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username); // Binding parameter
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_array($result);
        
        // Verifikasi password yang telah di-hash
        if (password_verify($password, $row["password"])) {
            // Menyimpan session setelah login sukses
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Login</title>
</head>
<body>
    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
            <form action="" method="post">
                <div class="field input"> 
                    <input type="text" name="username" id="username" autocomplete="off" placeholder="Username" required>
                </div>
                <div class="field input">
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required>
                </div>
                <button class="btn" type="submit" name="login">Login</button>
                <div class="link">
                    Belum punya akun? <a href="registrasi.php">Registrasi di sini</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
require 'functions.php';

if(isset($_POST["register"])) {
    if(registrasi($_POST) > 0) {
        echo "<script>
            alert('User Baru Berhasil Dibuat!');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="styleregistrasi.css">
</head>
<body>
    <div class="registration-box">
        <div class="registration-header">
            <header>Registrasi</header>
        </div>
        <form action="" method="post">
            <div class="field">
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="field">
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="field">
                <input type="password" name="password2" id="password2" placeholder="Konfirmasi password" required>
            </div>
            <button class="btn" type="submit" name="register">Registrasi</button>
            <div class="link">
                Sudah punya akun? <a href="login.php">Login di sini</a>
            </div>
        </form>
    </div>
</body>
</html>
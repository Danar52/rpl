<?php
session_start(); // Memulai session

// Cek apakah pengguna sudah login, jika belum arahkan ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

$krywn = query("SELECT * FROM karyawan WHERE id = $id")[0];

if(isset($_POST["submit"])) {

    if(ubah($_POST) > 0) {
        echo "<script>
            alert('Data Berhasil di Edit');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
                alert('Gagal Mengedit Data: " . mysqli_error($conn) . "');
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
    <link rel="stylesheet" href="styleubah.css">
</head>

<body>
    <div class="form-container">
        <h1>Edit Data Karyawan</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $krywn["id"]; ?>">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" required value="<?= $krywn["nik"]; ?>">

            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required value="<?= $krywn["nama"]; ?>">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Masukkan Email" required value="<?= $krywn["email"]; ?>">

            <label for="departemen">Departemen</label>
            <input type="text" name="departemen" id="departemen" placeholder="Masukkan Departemen" required value="<?= $krywn["departemen"]; ?>">

            <button type="submit" name="submit">Konfirmasi Data</button>
        </form>
    </div>
</body>

</html>
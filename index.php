<?php
session_start(); // Memulai session

// Cek apakah pengguna sudah login, jika belum arahkan ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$karyawan = query("SELECT * FROM karyawan ORDER BY nik ASC");

if(isset($_POST["cari"])) {
    $karyawan = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="styleindex.css">
</head>
    <h1>Database Karyawan</h1>
    <a href="logout.php" class="btn-add logout">Logout</a>
    <form action="" method="post">
    <a href="tambah.php" class="btn-add">Tambah Data Karyawan</a>
    <a href="cetak.php" class="btn-cetak" target="blank">Print PDF</a>
        <input type="text" name="keyword" size="30" autofocus="" placeholder="Masukkan Pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    
<table border="1" cellpadding="10" cellspacsing="0">
    <tr>
        <th>No.</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Dept.</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($karyawan as $row): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $row["nik"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["departemen"]; ?></td>
            <td>
                <a class="btn-edit" href="ubah.php?id=<?= $row["id"]; ?>">Edit</a>
                <a class="btn-delete" href="hapus.php?id=<?= $row["id"]; ?>" onclick="
                return confirm('Yakin?');">Delete</a>
            </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>

</table>
</body>

</html>
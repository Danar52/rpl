<?php
session_start(); // Memulai session

// Cek apakah pengguna sudah login, jika belum arahkan ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$karyawan = query("SELECT * FROM karyawan ORDER BY nik ASC");

if (isset($_POST["cari"])) {
    $karyawan = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Karyawan</title>
    <link rel="stylesheet" href="styleindex.css">
</head>

<body>
<nav class="navbar">
    <a href="home.php" class="logo">
        <img src="img/Logo-Astra.png" height="30px" width="auto" alt="Astra International Logo">
    </a>
    <ul class="menu">
        <li><a href="index.php" class="active">Data Karyawan</a></li>
        <li><a href="cuti.php">Pengajuan Cuti</a></li>
        <li><a href="absen.php">Absen</a></li>
        <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
</nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>
                <span id="welcome-text" class="typing"></span>
                <span class="highlight">Database Karyawan</span>
            </h1>
            <p>Kelola data karyawan Anda dengan mudah melalui tampilan modern dan responsif.</p>
        </div>
    </section>

    <!-- Form dan Tabel -->
    <section class="content-section">
        <div class="content-container">
            <form action="" method="post" class="search-form">
                <div class="form-group">
                    <a href="tambah.php" class="btn-add">Tambah Data Karyawan</a>
                    <a href="cetak.php" class="btn-cetak" target="blank">Print PDF</a>
                </div>
                <div class="form-group">
                    <input type="text" name="keyword" size="30" autofocus="" placeholder="Masukkan Pencarian" autocomplete="off">
                    <button type="submit" name="cari" class="btn-submit">Cari</button>
                </div>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dept.</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
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
                                <a class="btn-delete" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?');">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 PT. Astra International Tbk. All Rights Reserved.</p>
    </footer>
</body>

</html>
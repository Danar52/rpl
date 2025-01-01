<?php
session_start(); // Memulai session

// Cek apakah pengguna sudah login, jika belum arahkan ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perusahaan");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses jika tombol submit ditekan
if (isset($_POST["submit"])) {
    $nik = mysqli_real_escape_string($conn, $_POST["nik"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $departemen = mysqli_real_escape_string($conn, $_POST["departemen"]);

    // Query untuk memasukkan data ke database
    $query = "INSERT INTO karyawan (nik, nama, email, departemen)
            VALUES ('$nik', '$nama', '$email', '$departemen')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan data: " . mysqli_error($conn) . "');
            </script>";
    }
}

// Tutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Karyawan</title>
    <link rel="stylesheet" href="styletambah.css">
</head>

<body>
    <div class="form-container">
        <h1>Tambah Data Karyawan</h1>
        <form action="" method="post">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" required>

            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Masukkan Email" required>

            <label for="departemen">Departemen</label>
            <input type="text" name="departemen" id="departemen" placeholder="Masukkan Departemen" required>

            <button type="submit" name="submit">Tambah Data</button>
        </form>
    </div>
</body>

</html>
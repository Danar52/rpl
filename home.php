<?php
session_start(); // Memulai session

// Cek apakah pengguna sudah login, jika belum arahkan ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra</title>
    <link rel="stylesheet" href="stylehome.css">
</head>

<body>
<nav class="navbar">
    <a href="home.php" class="logo">
        <img src="img/Logo-Astra.png" height="30px" width="auto" alt="Astra International Logo">
    </a>
    <ul class="menu">
        <li><a href="index.php">Data Karyawan</a></li>
        <li><a href="cuti.php">Pengajuan Cuti</a></li>
        <li><a href="absen.php">Absensi</a></li>
        <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
</nav>

    <!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>
            <span id="welcome-text" class="typing"></span>
            <span class="highlight">, PT. Astra International Tbk.</span>
        </h1>
        <p>Dashboard ini dirancang untuk memudahkan pengelolaan administrasi perusahaan melalui antarmuka yang modern, intuitif, dan efisien. Berbagai fitur yang tersedia dirancang untuk meningkatkan produktivitas dan mempermudah pengambilan keputusan.</p>
    </div>
</section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 PT. Astra International Tbk. All Rights Reserved.</p>
    </footer>
    <script>
    const welcomeTexts = ["Selamat Datang", "Welcome", "Irasshaimase", "Hwangyong-hamnida", "Bienvenue"];
    let currentIndex = 0;
    let isDeleting = false; // Untuk menentukan apakah teks sedang dihapus
    const typingSpeed = 100; // Kecepatan mengetik (ms per karakter)
    const deletingSpeed = 50; // Kecepatan menghapus (ms per karakter)
    const delayBetweenTexts = 2000; // Delay setelah teks selesai diketik (ms)

    const welcomeTextElement = document.getElementById("welcome-text");

    // Fungsi untuk mengetik dan menghapus teks
    function typeText() {
        const currentText = welcomeTexts[currentIndex];
        let displayedText = welcomeTextElement.textContent;

        if (isDeleting) {
            // Hapus karakter satu per satu
            welcomeTextElement.textContent = currentText.substring(0, displayedText.length - 1);
        } else {
            // Ketik karakter satu per satu
            welcomeTextElement.textContent = currentText.substring(0, displayedText.length + 1);
        }

        // Tentukan kecepatan mengetik atau menghapus
        const speed = isDeleting ? deletingSpeed : typingSpeed;

        if (!isDeleting && displayedText === currentText) {
            // Jika selesai mengetik, tunggu sebelum menghapus
            isDeleting = true;
            setTimeout(typeText, delayBetweenTexts);
        } else if (isDeleting && displayedText === "") {
            // Jika selesai menghapus, pindah ke teks berikutnya
            isDeleting = false;
            currentIndex = (currentIndex + 1) % welcomeTexts.length; // Ulangi ke teks pertama
            setTimeout(typeText, typingSpeed);
        } else {
            // Lanjutkan mengetik atau menghapus
            setTimeout(typeText, speed);
        }
    }

    // Mulai proses mengetik
    typeText();
</script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Cuti</title>
    <link rel="stylesheet" href="stylecuti.css">
</head>

<body>
<nav class="navbar">
    <a href="home.php" class="logo">
        <img src="img/Logo-Astra.png" height="30px" width="auto" alt="Astra International Logo">
    </a>
    <ul class="menu">
        <li><a href="index.php">Data Karyawan</a></li>
        <li><a href="cuti.php" class="active">Pengajuan Cuti</a></li>
        <li><a href="absen.php">Absen</a></li>
        <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
</nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>
                <span id="welcome-text" class="typing"></span>
                <span class="highlight">Pengajuan Cuti</span>
            </h1>
            <p>Ajukan cuti dengan mudah dan cepat melalui tampilan modern dan responsif.</p>
        </div>
    </section>

    <!-- Form Pengajuan Cuti -->
    <section class="content-section">
        <div class="content-container">
            <form action="" method="post" class="cuti-form">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" required placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" required placeholder="Masukkan NIK">
                </div>
                <div class="form-group">
                    <label for="tanggal_cuti">Tanggal Cuti</label>
                    <input type="date" name="tanggal_cuti" id="tanggal_cuti" required>
                </div>
                <div class="form-group">
                    <label for="alasan">Alasan Cuti</label>
                    <textarea name="alasan" id="alasan" required placeholder="Masukkan Alasan Cuti"></textarea>
                </div>
                <button type="submit" class="btn-submit">Ajukan Cuti</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 PT. Astra International Tbk. All Rights Reserved.</p>
    </footer>
</body>

</html>
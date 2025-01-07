-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Jan 2025 pada 20.31
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perusahaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `email`, `departemen`) VALUES
(5, 'KMI-003', 'Afif Muhamad Miftah Al-Hudan', 'afiifm@gmail.com', 'PPIC'),
(8, 'KMI-007', 'Putri Lestari', 'putrilestari@gmail.com', 'HRGA'),
(9, 'KMI-008', 'Dhika', 'dhika@gmail.com', 'PURCHASING'),
(12, 'KMI-010', 'Firmansyah', 'firmansyah@gmail.com', 'QUALITY'),
(14, 'KMI-001', 'Eka Danar Arrasyid', 'edanararrasyid@gmail.com', 'PPIC'),
(15, 'KMI-002', 'Widia Rossi Pratiwi', 'widiarossi@gmail.com', 'PPIC'),
(16, 'KMI-005', 'Eko Suprayogi', 'ekos@gmail.com', 'PRODUKSI'),
(17, 'KMI-015', 'Rayhana Putri', 'rayhanaputri@gmail.com', 'ACCOUNTING'),
(18, 'KMI-017', 'Mei Rahmawati', 'Meirahmawati@gmail.com', 'PPIC'),
(22, 'KMI-054', 'Kevin Dikiara Agasi', 'kevindikiara@gmail.com', 'PURCHASING');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'danar', '$2y$10$uGCoMeSpqStJcn58nd2QoOGvdT4wD5qKPOQyvBPT31SZwfknBQFpy'),
(2, 'widia', '$2y$10$.TVn4rKc9gEBptHlHnz7deOEfmYYQgs8B8GXbO3CpjaMWhQ/IFLtu'),
(3, 'dinar', '$2y$10$Vfau7nWN4zqmI0I2UWk.PewEWB/oouBrze0AmZapQcqfB2WLFUSEO'),
(4, 'iwid', '$2y$10$qnFo/BZEFFdWa1z8wTNXKuqJRztupcMpRAwWqs6cZ9lJ69kD.1RUC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

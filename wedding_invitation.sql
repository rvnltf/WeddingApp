-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2021 pada 17.32
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_invitation`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_data_undangan`
--

CREATE TABLE `m_data_undangan` (
  `id_data` int(11) NOT NULL,
  `nick_pria` varchar(50) NOT NULL,
  `nick_wanita` varchar(50) NOT NULL,
  `fullname_pria` varchar(100) NOT NULL,
  `fullname_wanita` varchar(100) NOT NULL,
  `tanggal_akad` date NOT NULL,
  `tanggal_resepsi` date NOT NULL,
  `akad_awal` time NOT NULL,
  `akad_akhir` time NOT NULL,
  `resepsi_awal` time NOT NULL,
  `resepsi_akhir` time NOT NULL,
  `alamat_akad` text NOT NULL,
  `link_akad` text NOT NULL,
  `alamat_resepsi` text NOT NULL,
  `link_resepsi` text NOT NULL,
  `foto_pria` varchar(50) NOT NULL,
  `foto_wanita` varchar(50) NOT NULL,
  `musik` varchar(50) NOT NULL,
  `kalimat` text NOT NULL,
  `is_actived` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_ucapan`
--

CREATE TABLE `m_ucapan` (
  `id_ucapan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ucapan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_ucapan`
--

INSERT INTO `m_ucapan` (`id_ucapan`, `nama`, `ucapan`, `created_at`, `updated_at`) VALUES
(1, 'wong ganteng', 'samawa yaaa', '2021-08-23 19:37:53', '2021-08-23 19:37:53'),
(2, 'wong ayuu', 'kamu jahat mass', '2021-08-23 19:37:53', '2021-08-23 19:37:53'),
(3, 'tes', ' lorem sum ', '2021-08-23 08:59:37', '2021-08-23 08:59:37'),
(4, 'wong wongan', 'apa iraaa', '2021-08-23 09:00:36', '2021-08-23 09:00:36'),
(5, 'asd', ' asdad', '2021-08-23 09:52:14', '2021-08-23 09:52:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_data_undangan`
--
ALTER TABLE `m_data_undangan`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `m_ucapan`
--
ALTER TABLE `m_ucapan`
  ADD PRIMARY KEY (`id_ucapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_data_undangan`
--
ALTER TABLE `m_data_undangan`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_ucapan`
--
ALTER TABLE `m_ucapan`
  MODIFY `id_ucapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

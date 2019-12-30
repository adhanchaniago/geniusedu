-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2019 pada 19.26
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genius`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(5) NOT NULL,
  `guru_nama` varchar(50) NOT NULL,
  `guru_jk` varchar(1) NOT NULL,
  `guru_alamat` text NOT NULL,
  `guru_telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`guru_id`, `guru_nama`, `guru_jk`, `guru_alamat`, `guru_telepon`) VALUES
(1, 'NURIS SETIA BUDI', 'l', 'Tegaldlimo - Banyuwangi', '085204569506');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master`
--

CREATE TABLE `master` (
  `master_id` int(1) NOT NULL,
  `master_nama` varchar(50) NOT NULL,
  `master_alamat` text NOT NULL,
  `master_logo` varchar(20) NOT NULL,
  `master_icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master`
--

INSERT INTO `master` (`master_id`, `master_nama`, `master_alamat`, `master_logo`, `master_icon`) VALUES
(1, 'Genius', 'Cluring - Banyuwangi', 'logo.png', 'icon.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paketbimbel`
--

CREATE TABLE `paketbimbel` (
  `paketbimbel_id` int(5) NOT NULL,
  `paketbimbel_nama` varchar(50) NOT NULL,
  `paketbimbel_nominal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paketbimbel`
--

INSERT INTO `paketbimbel` (`paketbimbel_id`, `paketbimbel_nama`, `paketbimbel_nominal`) VALUES
(1, 'Paket Bisnis', '200000'),
(4, 'Paket Hemat', '900000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(6) NOT NULL,
  `pembayaran_pesertadidik_id` int(6) NOT NULL,
  `pembayaran_tanggalbayar` date NOT NULL,
  `pembayaran_nominalbayar` varchar(20) NOT NULL,
  `pembayaran_kwitansi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `pembayaran_pesertadidik_id`, `pembayaran_tanggalbayar`, `pembayaran_nominalbayar`, `pembayaran_kwitansi`) VALUES
(5, 1, '2019-12-30', '800000', '001'),
(8, 2, '2019-12-31', '1000000', '004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesertadidik`
--

CREATE TABLE `pesertadidik` (
  `pesertadidik_id` int(6) NOT NULL,
  `pesertadidik_nama` varchar(50) NOT NULL,
  `pesertadidik_noinduk` varchar(10) NOT NULL,
  `pesertadidik_jk` varchar(1) NOT NULL,
  `pesertadidik_tempatlahir` varchar(20) NOT NULL,
  `pesertadidik_tanggallahir` date NOT NULL,
  `pesertadidik_agama` varchar(10) NOT NULL,
  `pesertadidik_alamat` text NOT NULL,
  `pesertadidik_telepon` varchar(13) NOT NULL,
  `pesertadidik_ayah` varchar(50) NOT NULL,
  `pesertadidik_ibu` varchar(50) NOT NULL,
  `pesertadidik_pekerjaanayah` varchar(20) NOT NULL,
  `pesertadidik_pekerjaanibu` varchar(20) NOT NULL,
  `pesertadidik_teleponortu` varchar(13) NOT NULL,
  `pesertadidik_paketbimbel_id` int(5) NOT NULL,
  `pesertadidik_diskonpersen` varchar(3) NOT NULL,
  `pesertadidik_diskonnominal` varchar(20) NOT NULL,
  `pesertadidik_keterangandiskon` varchar(100) NOT NULL,
  `pesertadidik_batasbayar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesertadidik`
--

INSERT INTO `pesertadidik` (`pesertadidik_id`, `pesertadidik_nama`, `pesertadidik_noinduk`, `pesertadidik_jk`, `pesertadidik_tempatlahir`, `pesertadidik_tanggallahir`, `pesertadidik_agama`, `pesertadidik_alamat`, `pesertadidik_telepon`, `pesertadidik_ayah`, `pesertadidik_ibu`, `pesertadidik_pekerjaanayah`, `pesertadidik_pekerjaanibu`, `pesertadidik_teleponortu`, `pesertadidik_paketbimbel_id`, `pesertadidik_diskonpersen`, `pesertadidik_diskonnominal`, `pesertadidik_keterangandiskon`, `pesertadidik_batasbayar`) VALUES
(1, 'NURIS SETIA BUDI', '0912039120', 'l', 'Banyuwangi', '2019-12-03', 'Islam', 'Tegaldlimo-banyuwangi', '085204569506', 'Anton', 'Nur', 'wiraswasta', 'ibu rumah tanggal', '0852045695062', 4, '', '', '', '2019-12-31'),
(2, 'ANDI SETIAWAN', '00023', 'l', 'BANYUWANGI', '2019-12-10', 'Islam', 'TEGALDLIMO', '', 'PAIJO', 'PAINEM', '', '', '', 1, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `user_nama` varchar(30) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_level` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`) VALUES
(1, 'Administrator', 'admin', '$2y$10$d/mrs5KiYl0FNtzHO.aKUu1JrvlENHQpl8vOWsPRbC0/UYQaP5v5y', 1),
(4, 'Staff', 'staff', '$2y$10$yUUvKf7NNNoevuy5WUurnuf1Z8gOw8AIedLo8xF5dZJcM/VeeHVNa', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indeks untuk tabel `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`master_id`);

--
-- Indeks untuk tabel `paketbimbel`
--
ALTER TABLE `paketbimbel`
  ADD PRIMARY KEY (`paketbimbel_id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indeks untuk tabel `pesertadidik`
--
ALTER TABLE `pesertadidik`
  ADD PRIMARY KEY (`pesertadidik_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master`
--
ALTER TABLE `master`
  MODIFY `master_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `paketbimbel`
--
ALTER TABLE `paketbimbel`
  MODIFY `paketbimbel_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pesertadidik`
--
ALTER TABLE `pesertadidik`
  MODIFY `pesertadidik_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

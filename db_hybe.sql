-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2023 pada 17.55
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hybe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `naungan` varchar(100) NOT NULL,
  `id_grup` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id_company`, `foto`, `naungan`, `id_grup`, `id_member`) VALUES
(12, 'bm.png', 'Big Hit Music', 21, 15),
(13, 'bm.png', 'Big Hit Music', 21, 18),
(15, 'ador.png', 'Ador', 14, 20),
(19, 'Belift.jpg', 'Belift Lab', 13, 9),
(20, 'sm.png', 'Source Music', 9, 7),
(21, 'ador.png', 'Ador', 14, 12),
(22, 'pledis_entertainment.jpg', 'Pledis Entertainment', 12, 11),
(27, 'sm.png', 'Source Music', 27, 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE `grup` (
  `id_grup` int(11) NOT NULL,
  `nama_grup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`id_grup`, `nama_grup`) VALUES
(6, 'TXT'),
(9, 'Le Sserafim'),
(11, 'Seventeen'),
(12, 'Fromis9 '),
(13, 'ENHYPEN'),
(14, 'NewJeans'),
(21, 'BTS'),
(27, 'GFriend');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `name_member` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `name_member`) VALUES
(4, 'Choi Yeonjun'),
(7, 'Sakura Miyawaki'),
(9, 'Ni-ki'),
(11, 'Lee Chaeyoung'),
(12, 'Hanni'),
(15, 'Park Jimin'),
(18, 'Min Yoongi'),
(20, 'Kim Minji'),
(22, 'Yang Jungwoon'),
(24, 'Eunha');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD KEY `id_grup` (`id_grup`),
  ADD KEY `id_member` (`id_member`);

--
-- Indeks untuk tabel `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id_grup`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `grup`
--
ALTER TABLE `grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id_grup`),
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

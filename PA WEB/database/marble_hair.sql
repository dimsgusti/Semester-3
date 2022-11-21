-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2022 pada 03.24
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marble_hair`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `kode` varchar(5) NOT NULL,
  `kota` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`kode`, `kota`, `alamat`, `notelp`) VALUES
('BDG', 'BANDUNG', 'JL. JEND SUDIRMAN NO.21', '082145347320'),
('BJM', 'BANJARMASIN', 'JL. JEND SUDIRMAN', '082155442370'),
('BLI', 'BALI', 'JL. JEND SUDIRMAN', '085157325720'),
('BPP', 'BALIKPAPAN', 'JL. MT HARYONO', '082161563210'),
('SBY', 'SURABAYA', 'JL. MT HARYONO', '082515625170'),
('SMD', 'SAMARINDA', 'JL. PRAMUKA', '082516890326');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_login`
--

CREATE TABLE `data_login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_login`
--

INSERT INTO `data_login` (`id`, `username`, `password`) VALUES
(3212, 'alif1234', 'edsa'),
(32139, 'bibi', '4321'),
(32144, 'amin', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `ulasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id`, `rating`, `ulasan`) VALUES
(2, 3, 'GK BAGUS'),
(51, 3.5, 'Harga terjangkau'),
(88, 4.5, 'tempatnya nyaman'),
(89, 4.5, 'Murahh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id`, `nama`, `notelp`, `tanggal`, `jenis`, `gambar`) VALUES
(1321, 'Muhammad Amin Quthbi Arabi', '082147483647', '2022-11-17', 'Smoothing', ''),
(1322, 'Daviana Dwitasari Enka Fornia', '082873232114', '2022-11-18', 'Curly', ''),
(1323, 'Mohammad Fhadil Hafids Harsandi', '082732122325', '2022-11-30', 'Treatment', ''),
(1327, 'aminn', '082331232321', '2022-11-11', 'Haircut', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_login`
--
ALTER TABLE `data_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32146;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1336;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

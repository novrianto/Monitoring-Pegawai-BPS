-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2022 pada 07.10
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikape`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_proyek`
--

CREATE TABLE `detail_proyek` (
  `id_detail` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_kontraktor` int(11) NOT NULL,
  `tanggal_proyek` date NOT NULL,
  `target_proyek` date NOT NULL,
  `budget` varchar(20) NOT NULL,
  `rencana` int(11) NOT NULL,
  `realisasi` int(11) NOT NULL,
  `deviasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_proyek`
--

INSERT INTO `detail_proyek` (`id_detail`, `id_proyek`, `id_kontraktor`, `tanggal_proyek`, `target_proyek`, `budget`, `rencana`, `realisasi`, `deviasi`) VALUES
(13, 15, 2, '1970-01-01', '1970-01-01', '1223333000', 19, 70, 56),
(14, 16, 2, '2020-08-16', '2020-08-16', '14124124', 21, 12, 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_file` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `file_size` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumentasi`
--

INSERT INTO `dokumentasi` (`id_file`, `id_proyek`, `nama_file`, `file_size`) VALUES
(3, 8, 'eb4ce64a071b7807a259e9444679105f.pdf', ''),
(5, 6, '65ec4a804c8254d8298c04caa3d9a28b.jpg', '150.01'),
(6, 11, '8c0545c85415eb8ef035a153f972e89f.jpg', '150.01'),
(7, 11, '94c9fa5592578a2bf28e32f75fbe114d.pdf', '158.45'),
(8, 13, '276bbe0f0cfab2c7ef12b47716d89121.jpg', '150.01'),
(9, 13, 'f26a494e24b6afc0ce4adf4169af08fb.pdf', '158.45'),
(10, 14, 'cb035bb0145fd8249b180530460a28e0.PNG', '30.49'),
(11, 14, 'be84d17d4e5b0054f0d1f501783f3a56.pdf', '158.45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontraktor`
--

CREATE TABLE `kontraktor` (
  `id_kontraktor` int(11) NOT NULL,
  `nama_kontraktor` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontraktor`
--

INSERT INTO `kontraktor` (`id_kontraktor`, `nama_kontraktor`, `alamat`, `no_hp`) VALUES
(2, 'Kontraktor 1', 'Alamat', '13123123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_proyek` varchar(128) NOT NULL,
  `nomor_proyek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `id_user`, `nama_proyek`, `nomor_proyek`) VALUES
(15, 13, 'proyek1', '4'),
(16, 11, 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `tipe` enum('administrator','satker') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `tipe`) VALUES
(7, 'Papua Barat', 'satker1', '$2y$10$ohO1Qy48HNwccmbP6N6eYelq6qxdqaLccyt.NWBwrltn/7apqdF9e', 'satker'),
(8, 'Manokwari Selatan', 'satker2', '$2y$10$sW5GEDvxfYS6bw2uTDGxne1/KNTAfafiRv/QmPcK7EYhv9IQrdX2O', 'satker'),
(9, 'Pegunungan Arfak', 'satker3', '$2y$10$Ifjy0Z0SSRhUMAiqgfur0uTTnVuzeNQfEitZgrCue47nU0kRQgYDG', 'satker'),
(10, 'Fak-fak', 'satker4', '$2y$10$3JWMs6637wBQy.ufVrfjquDSTI/ehWEV2kfbDaDCXW5YwCsdcxBwm', 'satker'),
(11, 'Kaimana', 'satker5', '$2y$10$iVz2PToISWe/NMU9LBBgmuiRLV4/PCjaBRdg1deVT7HB3L3tzpqK6', 'satker'),
(12, 'Raja Ampat', 'satker6', '$2y$10$sJanQyNFgbqym5ifVTlTTe6hhM5mqa0RIQXK4gK7S3XteKspmTMPu', 'satker'),
(13, 'Teluk Bintuni', 'satker7', '$2y$10$XXZ.vsXnS4oI2224pO8sLuum4jkETkM77aO/c5ZXEjgb3JzSbvsE.', 'satker'),
(15, 'Teluk Wondama', 'satker8', '$2y$10$6m.nODZaicaANtdzm7NF5eT7fQyyWNtexAxpjJjmmSL//MC10xrM6', 'satker'),
(16, 'Dani Slayy', 'balai17', '$2y$10$7uRqZvrrEOzetMDe0yBf..d5SgBpi9SUf.5RHxVKJIhSbYC8JNFv.', 'administrator'),
(17, 'Komando Lukman Sucipto', 'mando', '$2y$10$tAUFyEVegNoeTRo1zoNl2O89R6zTedFa558o9EPxOOYjr4shFG5fK', 'satker');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_proyek`
--
ALTER TABLE `detail_proyek`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `kontraktor`
--
ALTER TABLE `kontraktor`
  ADD PRIMARY KEY (`id_kontraktor`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_proyek`
--
ALTER TABLE `detail_proyek`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kontraktor`
--
ALTER TABLE `kontraktor`
  MODIFY `id_kontraktor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

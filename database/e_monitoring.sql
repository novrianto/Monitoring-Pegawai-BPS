-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2022 pada 08.19
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_monitoring`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `work_unit_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `task_name` varchar(128) NOT NULL,
  `task_point` int(10) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` enum('new','ongoing','finish') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `progress` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `task`
--

INSERT INTO `task` (`task_id`, `work_unit_id`, `user_id`, `task_name`, `task_point`, `description`, `status`, `created_at`, `updated_at`, `progress`) VALUES
(8, 4, 2, 'Melakukan Survey di Bukit Cermin', 20, '-', 'ongoing', '2022-12-04 01:14:26', '2022-12-04 01:15:17', 36),
(9, 4, 5, 'Melakukan Survey di Bukit Bestari', 20, '-', 'ongoing', '2022-12-04 01:15:05', '2022-12-04 01:15:45', 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `role` enum('admin','supervisor','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$C4Qx/ml8GhqNIN.eIsKdEOwOA2GbZ0K6l8n4GGWwxGjnT2RzN9usi', 'Admin', '', 'admin', '2022-11-02 13:01:21', '2022-11-02 13:01:21'),
(2, 'dani', '$2y$10$xiKlqdz.RY.ohbF0MSuRdeWQ3hUa.tGV9xJqpHetNv4H0a/AY111a', 'Dani', '', 'supervisor', '2022-11-02 13:06:05', '2022-12-03 15:04:48'),
(5, 'Lukman', '$2y$10$ornuipmIL7fxR41z571AiOJPzyDb/GHEGCpzJ5.U.iHq2OekDM7um', 'Lukman', '', 'user', '2022-12-03 15:16:39', '2022-12-03 15:16:39'),
(6, 'user', '$2y$10$cgvE2A2pakypJaExuWDzDugLhmy/fbVmKvk2BS4dh20jP/zG5YgyC', 'User1', '', 'user', '2022-12-04 01:18:13', '2022-12-04 01:18:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `work_unit`
--

CREATE TABLE `work_unit` (
  `work_unit_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `unit_name` varchar(128) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `work_unit`
--

INSERT INTO `work_unit` (`work_unit_id`, `supervisor_id`, `unit_name`, `description`, `created_at`, `updated_at`) VALUES
(4, 2, 'Survei Regsosek', 'Menyelesaikan Survei REGSOSEK', '2022-12-03 15:29:25', '2022-12-03 15:29:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `work_unit_member`
--

CREATE TABLE `work_unit_member` (
  `work_unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `work_unit_member`
--

INSERT INTO `work_unit_member` (`work_unit_id`, `user_id`, `created_at`) VALUES
(4, 2, '2022-12-03 15:29:25'),
(4, 5, '2022-12-03 15:30:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `work_unit`
--
ALTER TABLE `work_unit`
  ADD PRIMARY KEY (`work_unit_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `work_unit`
--
ALTER TABLE `work_unit`
  MODIFY `work_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

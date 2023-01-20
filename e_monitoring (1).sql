-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 06:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

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
-- Table structure for table `task`
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
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `work_unit_id`, `user_id`, `task_name`, `task_point`, `description`, `status`, `created_at`, `updated_at`, `progress`) VALUES
(8, 4, 2, 'Melakukan Survey di Bukit Cermin', 20, '-', 'ongoing', '2022-12-04 01:14:26', '2022-12-04 01:15:17', 36),
(9, 4, 5, 'Melakukan Survey di Bukit Bestari', 20, '-', 'ongoing', '2022-12-04 01:15:05', '2022-12-29 17:53:09', 80),
(10, 5, 5, 'entry', 10, 'entri ', 'ongoing', '2022-12-29 07:30:07', '2022-12-29 07:31:14', 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$C4Qx/ml8GhqNIN.eIsKdEOwOA2GbZ0K6l8n4GGWwxGjnT2RzN9usi', 'Admin', '', 'admin', '2022-11-02 13:01:21', '2022-11-02 13:01:21'),
(2, 'dani', '$2y$10$xiKlqdz.RY.ohbF0MSuRdeWQ3hUa.tGV9xJqpHetNv4H0a/AY111a', 'Dani', '', 'supervisor', '2022-11-02 13:06:05', '2022-12-03 15:04:48'),
(5, 'Lukman', '$2y$10$T565.Tiu.2fcmbB1j4GCZ.ulBDcsr7WLbyD50tsWJVjTptsGVUOmW', 'Lukman', '', 'user', '2022-12-03 15:16:39', '2022-12-29 07:32:08'),
(9, 'ferdi', '$2y$10$DK9KhNKsTQDGTDwNFriujOAT6BMoFWdUjxThpc7KVtx/apUJYQsrq', 'Ferdi', '', 'user', '2022-12-29 06:24:50', '2022-12-29 06:24:50'),
(10, 'Nita', '$2y$10$qDKcldXJh4UVA7Vg.GnZSOGhiARXaFojvsNEvcK1arvJILTz9eDAu', 'Nita', '', 'user', '2022-12-29 06:25:03', '2022-12-29 06:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `work_unit`
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
-- Dumping data for table `work_unit`
--

INSERT INTO `work_unit` (`work_unit_id`, `supervisor_id`, `unit_name`, `description`, `created_at`, `updated_at`) VALUES
(4, 2, 'Survei Regsosek', 'Menyelesaikan Survei REGSOSEK', '2022-12-03 15:29:25', '2022-12-03 15:29:25'),
(5, 2, 'tim kerja 1', 'deskripsi', '2022-12-29 07:28:18', '2022-12-29 07:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `work_unit_member`
--

CREATE TABLE `work_unit_member` (
  `work_unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_unit_member`
--

INSERT INTO `work_unit_member` (`work_unit_id`, `user_id`, `created_at`) VALUES
(4, 2, '2022-12-03 15:29:25'),
(4, 5, '2022-12-03 15:30:33'),
(5, 2, '2022-12-29 07:28:18'),
(5, 5, '2022-12-29 07:29:03'),
(5, 9, '2023-01-03 03:52:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `work_unit`
--
ALTER TABLE `work_unit`
  ADD PRIMARY KEY (`work_unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `work_unit`
--
ALTER TABLE `work_unit`
  MODIFY `work_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

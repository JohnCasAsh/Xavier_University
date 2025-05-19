-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 11:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xavier_university`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `password` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`password`, `username`) VALUES
('$2y$10$0JGjXSkWljuE7i7kQf6ebuO0z49xaAS5XbViBlU7ceDNQzQX76vFu', ''),
('$2y$10$ezHdTZ8L0v.GN9HkGffrmeO5E4h0BQ5MpCSw/5xZIoGIPbmR9nQuC', '2500000'),
('$2y$10$1GMmpz3Di4pkN8dMDh6hguOn04RpccRyPEnfJK.4lvARDPsKFX0ZC', '2500020'),
('$2y$10$XxjTX3C1Pe/427D5R5RvJejKxyuKGALu6p.TE87/.QtJCIi4xH33q', '2500021'),
('$2y$10$EQRsm.EgMbMnVjxsg824HuGNTt8AuNS0HLbC29pB/10wyD7gYQ8UW', '2500022'),
('$2y$10$T1KbDDnDWuaZNA6PJYDloOLGB2EgJDPHyPbXZCPKUaqvkExFRRyRm', '2500024'),
('$2y$10$69CDDwDVhnsmGKsi59dcg.HD0dEUenXM7FnM.ny.1Bop/HPSJMJOy', '2500025'),
('$2y$10$pkKUOy0QjPCQis0OhptArucnXWjRUY7/cmFsdmUeGcCoI6ppbNjvy', '2500026');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

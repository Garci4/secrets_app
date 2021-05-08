-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2021 at 12:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SECRETS_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `SECRETS`
--

CREATE TABLE `SECRETS` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `key_word` varchar(256) NOT NULL,
  `link` text NOT NULL,
  `viewed` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SECRETS`
--

INSERT INTO `SECRETS` (`id`, `message`, `key_word`, `link`, `viewed`, `expired`, `created`, `expires`) VALUES
(1, 'soy un secreto', 'asd', 'asdasd', 0, 0, '2021-05-01 15:45:06', '2021-05-08 20:43:47'),
(2, 'este es el secreto', 'whisper', 'perro', 1, 1, '2021-05-01 17:19:50', '2022-10-10 10:01:00'),
(3, 'shhh es un secreto', 'whisper', 'perro', 0, 0, '2021-05-01 17:20:55', '2022-10-10 10:01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SECRETS`
--
ALTER TABLE `SECRETS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SECRETS`
--
ALTER TABLE `SECRETS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

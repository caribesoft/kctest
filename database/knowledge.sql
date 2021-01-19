-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 29, 2020 at 09:44 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledge`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

CREATE TABLE `api_users` (
  `recid` int(10) NOT NULL,  NOT NULL AUTO_INCREMENT,
  `user` varchar(100) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `passcode` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_users`
--

INSERT INTO `api_users` (`recid`, `user`, `nombre`, `passcode`) VALUES
(1, 'ADMIN', 'ADMINISTRADOR', 'g<ŸÛ¿ù');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `recid` int(3) NOT NULL, NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `group` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`recid`, `name`, `group`, `id`) VALUES
(1, 'Peter Smith', 'Default Group', 'kctest00101'),
(2, 'Jim Sanders', 'Default Group', 'kctest00102'),
(3, 'Roger Waters', 'Default Group', 'kctest00103'),
(4, 'Peter Gabriel', 'Default Group', 'kctest00104'),
(5, 'Issac Hayes', 'Default Group', 'kctest00105'),
(6, 'Paty Smith', 'Default Group', 'kctest00106'),
(7, 'Donna Summer', 'Default Group', 'kctest00107'),
(8, 'Roger Waters', 'Default Group', 'kctest00108'),
(9, 'Frank Zapa', 'Default Group', 'kctest00109'),
(10, 'Victor Rodriguez', 'Default Group', 'kctest00110'),
(11, 'David Gilmour', 'Default Group', 'kctest00111'),
(12, 'Calos Santana', 'Default Group', 'kctest00112'),
(13, 'Jimy Hendrix', 'Default Group', 'kctest00113'),
(14, 'David Bowie', 'Default Group', 'kctest00114'),
(15, 'Jim Croce', 'Default Group', 'kctest00115');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`recid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `recid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

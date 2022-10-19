-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 04:58 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student1`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `fname`, `email`, `password`, `cpassword`) VALUES
(1, 'Shubham Patidar', 'patelshubham@gmil.com', '123', '123'),
(2, 'ramu', 'ramu@gmail.com', '$2y$10$Tc00vILsDbN1tPU8TrLwhu6QmQN8CqyLQEr87LvMn1PTDwq6eYbc.', '$2y$10$zs22jZ6r5wwo6Iu.HmwxZOkByAquSLYQ6OVBfhDDiqvlADNj96nRm'),
(3, 'raj Patidar', 'raj@gmail.com', '$2y$10$K7FUfxiQTj/igVp32PHYVuqBfejKZHl1h8xvoQdChj97/5E4dvAo2', '$2y$10$WkEWxvFsdo57c.UF28tGnucGc8/HlCNv8d03ZTmUtKRyI15gEVYvm'),
(4, 'raju bhai ', 'raju@gmail.com', '$2y$10$RBzcAsMzNVj6Sd1W18MY0uXQ2YP3a17miv8HC/D2jx0sfxuqu0x9O', '$2y$10$punZEzRKWVkwJe9g0SIkSeqgLPwcrRoukwmX/Aa1RquB/hkqzc8Zm'),
(5, 'ramu', 'ramuji@gmail.com', '$2y$10$E9Bj2jGIt2QvRAs3Dd/FHeHTHFjvwax8zGTnBq7KQHrH/osCgnh/u', '$2y$10$UaNW9EP5SCckWyGz/PhC6uF2ljTkJK3YzEl3D9UR5Y16DDiO5On2e');

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE `student_detail` (
  `st_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`st_id`, `fname`, `lname`, `email`, `father_name`, `birthdate`, `mobile`, `gender`, `district`, `city`, `state`, `nation`, `photo`) VALUES
(3, 'shubha', 'patidar', 'shubham@gmail.com', 'papa', '0000-00-00', '1234567890', '', 'ujjain', 'ujjain', 'mp', 'india', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_detail`
--
ALTER TABLE `student_detail`
  MODIFY `st_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

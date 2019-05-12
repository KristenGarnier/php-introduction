-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 12, 2019 at 08:21 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `citytowns`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `life` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `country`, `life`) VALUES
(1, 'Bamako', 'Mali', 'C'),
(2, 'New York', 'USA', 'A'),
(3, 'Paris', 'France', 'A'),
(4, 'Le puy en velay', 'France', 'B'),
(5, 'Öslo', 'Suède', 'A'),
(6, 'Amsterdam', 'Pays-bas', 'A'),
(7, 'Lyon', 'France', 'A'),
(8, 'Lille', 'France', 'A'),
(9, 'Leister', 'England', 'A'),
(10, 'Bordeau', 'France', 'A'),
(11, 'Mons', 'France', 'B'),
(12, 'Torronto', 'Canada', 'A'),
(13, 'Madrid', 'Espagne', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 09:03 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `type`, `value`) VALUES
(1, 'Genre', 'Action'),
(2, 'Genre', 'Comedy'),
(3, 'Genre', 'Thriller'),
(4, 'Genre', 'RomCom'),
(5, 'Language', 'Hindi'),
(6, 'Language', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `m_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `featured_image` varchar(500) NOT NULL,
  `movie_length` int(6) NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`m_id`, `title`, `description`, `featured_image`, `movie_length`, `release_date`) VALUES
(4, 'Kick', 'Action movie of Salman Khan', 'img/kick.jpg', 120, '2018-07-23'),
(5, 'Venom', 'Journalist Eddie Brock ', 'img/venom.jpg', 160, '2018-10-05'),
(6, 'Golmaal', 'A man falls in love ', 'img/golmaal.jpg', 140, '2018-09-11'),
(7, 'Drishyam', 'When the son of Goa\'s IGP', 'img/drishyam.jpg', 160, '2018-06-21'),
(8, 'Yeh Jawani Hai Deewani', 'Kabir and Naina bond during a trekking ', 'img/yjhd.jpg', 100, '2017-02-06'),
(9, 'The Matrix', 'Thomas Anderson', 'img/matrix.jpg', 120, '2009-11-06'),
(10, '50 First Dates', 'Henry, a vet, falls in love ', 'img/dates.jpg', 200, '1999-12-06'),
(11, 'Deadpool', 'Mercenary Wade Wilson', 'img/deadpool.jpg', 100, '2018-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `r_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `m_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`r_id`, `c_id`, `m_id`) VALUES
(1, 1, 4),
(2, 1, 9),
(3, 5, 7),
(4, 6, 11),
(5, 2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `m_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `r_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

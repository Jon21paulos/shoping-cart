-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 04:36 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mkshope`
--

-- --------------------------------------------------------

--
-- Table structure for table `productmen`
--

CREATE TABLE IF NOT EXISTS `accessesoris` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `madein` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productmen`
--

INSERT INTO `productmen` (`id`, `name`, `code`, `image`, `price`, `madein`) VALUES
(13, 'shose', 'shara', '1529795541.png', 200.70, 'USA'),
(14, 'cloth', 'shurab', '1529795893.png', 300.00, 'ethiopia'),
(15, 'shose', 'shara', '1529795927.png', 200.00, 'ethiopia'),
(16, 'Eye Glass', 'eye glass', '1529795961.png', 50.00, 'china'),
(17, 'camera', 'sony', '1529796083.jpg', 1000.00, 'USA'),
(18, 'shose', 'shara', '1530020244.png', 200.00, 'ethiopia'),
(19, 'cloth', 'tishrt', '1530197642.png', 200.00, 'ethiopia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productmen`
--
ALTER TABLE `productmen`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productmen`
--
ALTER TABLE `productmen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

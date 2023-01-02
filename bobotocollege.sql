-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 08:13 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bobotocollege`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `id` int(20) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`id`, `name`, `email`, `password`) VALUES
(1, 'Bhanji', 'bhanji@gmail.com', 'bhanji123');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `position` text NOT NULL,
  `message` varchar(200) NOT NULL,
  `nvotes` int(11) NOT NULL,
  `approval` text NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `email`, `position`, `message`, `nvotes`, `approval`, `image`) VALUES
INSERT INTO `candidates` (`id`, `name`, `email`, `position`, `message`, `nvotes`, `approval`, `image`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `id` int(20) NOT NULL,
  `name` text NOT NULL,
  `collegeyear` int(20) NOT NULL,
  `collegehouse` text NOT NULL,
  `collegeidnum` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `voted` text NOT NULL,
  `leadervoted` text NOT NULL,
  `sportvoted` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`id`, `name`, `collegeyear`, `collegehouse`, `collegeidnum`, `email`, `password`, `voted`, `leadervoted`, `sportvoted`) VALUES
(19, 'Adnan Bhanji', 4, 'Bleue', 5692, 'bhanji@gmail.com', '361dd0cbfa233d83ca4607168c5992d8', 'no', 'no', 'no'),
(20, 'Shawn adatia', 3, 'Verte', 2341, 'shaan.adatia@akamom.org', 'b5e42f49ab3acf8f6c2ccf99f604a17f', 'no', 'no', 'no'),
(21, 'Shan Adatia', 2, 'Jaune', 9502, 'adatiashaan@gmail.com', 'be1ad4af0f9b4fe645965ad266731af6', 'no', 'no', 'no'),
(22, 'Arish Madataly', 1, 'Jaune', 9991, 'arishmadataly@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'no', 'no', 'no'),
(23, 'Ashal Rafiq', 4, 'Verte', 5839, 'ashhalrafiq@gmail.com', '877dba90e1752571ffa32de87602981e', 'no', 'no', 'no'),
(24, 'Vellani Ashal', 2, 'Verte', 2390, 'ashhal.vellani@akamom.org', '078563f337ec6d6fedf131ddc857db19', 'no', 'no', 'no'),
(25, 'Adu B', 2, 'Verte', 5839, 'adnan.bhanji@gmail.com', '47e33e7bc0210909fd3bee60bce51e89', 'no', 'no', 'no'),
(26, 'Fish Blue', 4, 'Jaune', 3290, 'aly17jassani@gmail.com', 'e656e74f6eb5627f4de2fbe0f650cc2b', 'no', 'no', 'no'),
(27, 'Aly J', 3, 'Jaune', 4902, 'aly.jassani@akamom.org', 'd907be2dc6534bc1ef00939599bc4539', 'no', 'no', 'no'),
(28, 'Sahil patlu', 1, 'Bleue', 4821, 'sahil.patel@akamom.org', '8d94540d680fe2d4412026a071fde5d5', 'no', 'no', 'no'),
(29, 'Jimmy', 2, 'Bleue', 3810, 'sahilcp2003@gmail.com', '33bcea61ff7edac1e6c777b5d6607076', 'no', 'no', 'no'),
(35, 'Adnan Bhanji', 2, 'Jaune', 5932, 'bhanjiadnan786@gmail.com', '361dd0cbfa233d83ca4607168c5992d8', 'yes', 'no', 'no'),
(36, 'Max Harako', 3, 'Verte', 4893, 'maxh@gmail.com', '5ugeibghb', 'no', 'no', 'no'),
(37, 'Yoka Minaji', 1, 'Bleue', 3109, 'yokam@gmail.com', '48acnv23', 'no', 'no', 'no'),
(38, 'Jonas Blue', 1, 'Jaune', 2342, 'jonasb@gmail.com', 'qrneg953ht', 'no', 'no', 'no'),
(39, 'Janice Patton', 2, 'Verte', 4223, 'janicep@gmail.com', 'qn35t98q53', 'no', 'no', 'no'),
(40, 'Dudi Dodo', 3, 'Bleue', 1236, 'dudid@gmail.com', 'qoi5ng5io4', 'no', 'no', 'no'),
(41, 'Mwaninge Kamba', 4, 'Jaune', 3567, 'mwanin@gmail.com', 'fnrgneugi4h5', 'no', 'no', 'no'),
(42, 'Mondo Safari', 2, 'Verte', 2463, 'mondos@gmail.com', '5i4onq4589', 'no', 'no', 'no'),
(43, 'Juma Kiremba', 4, 'Bleue', 6463, 'jumak@gmail.com', '45ou945g54', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `vote_time`
--

CREATE TABLE `vote_time` (
  `id` int(11) NOT NULL,
  `electiontype` text NOT NULL,
  `vote_start` int(200) NOT NULL,
  `vote_end` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote_time`
--

INSERT INTO `vote_time` (`id`, `electiontype`, `vote_start`, `vote_end`) VALUES
(1, 'captain', 1615501860, 1616884260),
(2, 'leader', 1603150900, 1657932134),
(3, 'sport', 1601360580, 1604687100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_time`
--
ALTER TABLE `vote_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindata`
--
ALTER TABLE `admindata`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `studentdata`
--
ALTER TABLE `studentdata`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `vote_time`
--
ALTER TABLE `vote_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
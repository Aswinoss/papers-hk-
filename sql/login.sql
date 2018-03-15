-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2016 at 09:25 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional`
--

CREATE TABLE `additional` (
  `user_id` int(11) NOT NULL,
  `ident1` varchar(1000) NOT NULL,
  `ident2` varchar(1000) NOT NULL,
  `blood` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_type` varchar(10) NOT NULL,
  `app_status` varchar(20) NOT NULL,
  `dates` date NOT NULL,
  `comments` varchar(10000) NOT NULL,
  `dates1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`app_id`, `user_id`, `app_type`, `app_status`, `dates`, `comments`, `dates1`) VALUES
(47, 1, 'Driving Li', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(48, 1, 'VoterId', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(49, 1, 'Passport', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(50, 1, 'Driving Li', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(51, 1, 'Driving Li', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(52, 1, 'Driving Li', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(53, 1, 'Driving Li', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(54, 1, 'Learner''s ', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(55, 1, 'Learner''s ', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(56, 1, 'Learner''s ', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(57, 1, 'Learner''s ', 'Under Review', '2016-09-23', '-', '0000-00-00'),
(58, 1, 'Driving Li', 'Under Review', '2016-09-24', '-', '0000-00-00'),
(59, 1, 'Driving Li', 'Under Review', '2016-09-24', '-', '0000-00-00'),
(60, 1, 'Learner''s ', 'Under Review', '2016-09-24', '-', '0000-00-00'),
(61, 1, 'VoterId', 'Under Review', '2016-09-24', '-', '0000-00-00'),
(62, 12, 'Passport', 'Under Review', '2016-09-24', '-', '0000-00-00'),
(63, 12, 'Passport', 'Under Review', '2016-09-24', '-', '0000-00-00'),
(64, 12, 'Passport', 'Under Review', '2016-09-24', '-', '0000-00-00'),
(65, 1, 'VoterId', 'Under Review', '2016-09-24', '-', '0000-00-00'),
(66, 1, 'VoterId', 'Under Review', '2016-09-24', '-', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_Nam` varchar(32) NOT NULL,
  `last_Nam` varchar(32) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `education` varchar(32) NOT NULL,
  `fathernamef` varchar(32) NOT NULL,
  `fathernamel` varchar(32) NOT NULL,
  `mothernamel` varchar(32) NOT NULL,
  `relationnamel` varchar(32) NOT NULL,
  `mothernamef` varchar(32) NOT NULL,
  `maritalstat` varchar(10) NOT NULL,
  `relationnamef` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `mothertongue` varchar(10) NOT NULL,
  `pincode` varchar(15) NOT NULL,
  `addr1` varchar(200) NOT NULL,
  `addr2` varchar(200) NOT NULL,
  `addr3` varchar(200) NOT NULL,
  `district` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `postoff` varchar(32) NOT NULL,
  `taluka` varchar(32) NOT NULL,
  `constituency` varchar(100) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `poip1` varchar(100) NOT NULL,
  `poip2` varchar(100) NOT NULL,
  `poip3` varchar(100) NOT NULL,
  `poap1` varchar(100) NOT NULL,
  `poap2` varchar(100) NOT NULL,
  `poap3` varchar(100) NOT NULL,
  `porp1` varchar(100) NOT NULL,
  `porp2` varchar(100) NOT NULL,
  `porp3` varchar(100) NOT NULL,
  `podobp1` varchar(100) NOT NULL,
  `podobp2` varchar(100) NOT NULL,
  `podobp3` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `flag` int(11) NOT NULL DEFAULT '0',
  `ident1` varchar(1000) NOT NULL,
  `ident2` varchar(1000) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `vehicletype` varchar(50) NOT NULL,
  `llrno` int(11) NOT NULL,
  `poi1` varchar(100) NOT NULL,
  `poi2` varchar(100) NOT NULL,
  `poi3` varchar(100) NOT NULL,
  `poa1` varchar(100) NOT NULL,
  `poa2` varchar(100) NOT NULL,
  `poa3` varchar(100) NOT NULL,
  `por1` varchar(100) NOT NULL,
  `por2` varchar(100) NOT NULL,
  `por3` varchar(100) NOT NULL,
  `podob1` varchar(100) NOT NULL,
  `podob2` varchar(100) NOT NULL,
  `podob3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_Nam`, `last_Nam`, `gender`, `education`, `fathernamef`, `fathernamel`, `mothernamel`, `relationnamel`, `mothernamef`, `maritalstat`, `relationnamef`, `dob`, `mothertongue`, `pincode`, `addr1`, `addr2`, `addr3`, `district`, `state`, `postoff`, `taluka`, `constituency`, `email`, `mobile`, `password`, `poip1`, `poip2`, `poip3`, `poap1`, `poap2`, `poap3`, `porp1`, `porp2`, `porp3`, `podobp1`, `podobp2`, `podobp3`, `active`, `flag`, `ident1`, `ident2`, `blood`, `vehicletype`, `llrno`, `poi1`, `poi2`, `poi3`, `poa1`, `poa2`, `poa3`, `por1`, `por2`, `por3`, `podob1`, `podob2`, `podob3`) VALUES
(1, 'Hari Kshore', 'Sridhar', 'Male', 'Bachelors Degree', 'Sridharan', 'Thangavelu', 'Sridharan', 'Thangavelu', 'Sumathi', 'Single', 'Sridharan', '1997-04-15', 'Tamil', '620017', 'A:38, Sivaprakasam Salai', 'Anna Nagar, Tennur', 'Tiruchirapalli', 'Tiruchirapalli', 'Tamil Nadu', 'Thillai Nagar ', 'Anna Nagar', 'Tiruchirapalli East', 'harikshore.s15497@gmail.com', '8012808007', 'e05165cca19d29fb445c9386f384e8bb', 'uploads/poi/3a0c24729b.jpg', 'uploads/poi/cf1bca3734.jpg', 'uploads/poi/d15b75c8f9.jpg', '', '', '', '', '', '', '', '', '', 1, 0, 'Mole above lips', 'Mole above lips', 'B+ve', 'M/CYCL WG', 8888756, 'birth certificate', 'community certificate', 'High School MarkSheet', '', '', '', '', '', '', '', '', ''),
(3, 'Ananda Venkadesh', 'Ravichandran', 'Male', 'Bachelors Degree', '', '', '', '', '', '', '', '1996-10-07', 'tamil', '', '', '', '', '', '', '', '', '', 'anand.bumblebee@gmail.com', '9840941643', '951d6343a33297e533b174fb8acfd1d8', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'aswin', 'balaji', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'aswinn1996@gmail.com', '', '94dd794f4eb2ca64639a1e7851e41e93', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'asiwnfkansdlkfns', 'hkhkhk/', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'gwgc@gmail.com', '', '5ebba0b00f74c1b2353602b00dba9437', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'admin', 'admin', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'admin@papers.com', '', '365d8c5640d00ecc1599da1ddfd60239', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'aswinos', 'balaji', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'aswinosrise@gmail.com', '', 'fd079de6c896ec214e02f22fd20389f7', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'mohamed', 'meeran', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'meeran1996@gmail.com', '', '8fcef3066aeceb00dd6f8debb5a02d86', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'mani', 'kandan', 'Male', 'Bachelors Degree', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'gmanigandan98@gmail.com', '5672173979', 'e07b066fbb56f0df3109b94ae2668141', 'uploads/poi/344886f31d.jpg', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, 'marksheet', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'aswin', 'B', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'aswinosrise@gmail.com', '732648', '2c248ae98b875459dee9928342924f86', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'buvanesh', 'mano', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'buaneshmarquz93@gmail.com', '5555555555', 'b3438c6475eb1c5568f8043547f912e3', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'aswin', 'Balaji', 'Male', 'Bachelors Degree', '', '', '', '', '', 'Single', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'aswin@gmail.com', '7401281079', '5f4dcc3b5aa765d61d8327deb882cf99', 'uploads/poi/93f33635fd.jpg', 'uploads/poi/a36ba273c2.jpg', 'uploads/poi/96df581b8f.jpg', 'uploads/poa/26f6ada184.jpg', 'uploads/poa/9b7cc6936e.jpg', 'uploads/poa/a52cb2c8c0.jpg', 'uploads/por/ef2962db55.jpg', '', '', '', '', '', 1, 0, '', '', '', '', 0, 'marksheet', 'birthcertificate', 'community cer', 'community', 'birth certificate', 'marksheet', 'community', '', '', '', '', ''),
(13, 'harinath', 'reddy', 'Male', 'Bachelors Degree', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'harigautii555@gmail.com', '9959849390', '08aea180245cbabfa1acd5d41bbb4163', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'vinod', 's', 'Male', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sss@gmail.com', '9999999999', 'e807f1fcf82d132f9bb018ca6738a19f', 'uploads/poi/67d0cdc167.jpg', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'ghj', 'rtu', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'srt@gmail.com', '6666666666', 'bcf5414e3899f5a6e8ceaa45a76e8b5a', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional`
--
ALTER TABLE `additional`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional`
--
ALTER TABLE `additional`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

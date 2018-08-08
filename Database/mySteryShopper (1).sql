-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2018 at 07:42 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mySteryShopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `mysteryShopper`
--

CREATE TABLE `mysteryShopper` (
  `mysteryShopper_id` int(11) NOT NULL,
  `mysteryShopper_name` varchar(25) NOT NULL,
  `mysteryShopper_nic` int(20) NOT NULL,
  `mysteryShopper_card_type` varchar(50) NOT NULL,
  `mysteryShopper_bank_name` varchar(128) NOT NULL,
  `mysteryShopper_address` varchar(128) NOT NULL,
  `mysteryShopper_email` varchar(128) NOT NULL,
  `mysteryShopper_account_no` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mysteryShopper_ratting` varchar(128) DEFAULT NULL,
  `mysteryShopper_video` varchar(128) NOT NULL,
  `mysteryShopper_contact_number` varchar(128) NOT NULL,
  `mysteryShopper_profile_image` varchar(128) NOT NULL,
  `mysteryShopper_category` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysteryShopper`
--

INSERT INTO `mysteryShopper` (`mysteryShopper_id`, `mysteryShopper_name`, `mysteryShopper_nic`, `mysteryShopper_card_type`, `mysteryShopper_bank_name`, `mysteryShopper_address`, `mysteryShopper_email`, `mysteryShopper_account_no`, `user_id`, `mysteryShopper_ratting`, `mysteryShopper_video`, `mysteryShopper_contact_number`, `mysteryShopper_profile_image`, `mysteryShopper_category`) VALUES
(1, 'Rana', 42201, 'Debit', 'UBL', 'Malir', 'rana@gmail.com', 'test', 5, '', 'Sample2.mp4', '0315484468', 'profile.jpeg', ''),
(14, 'hassan', 42201, 'Debit', 'UBL', 'jhgjh', 'hjk@gmail.com', '5969', 33, NULL, 'Sample18.mp4', '0351651454', 'KFC55.png', 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `mysteryShopperUsers`
--

CREATE TABLE `mysteryShopperUsers` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysteryShopperUsers`
--

INSERT INTO `mysteryShopperUsers` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`) VALUES
(1, 'Abbas', 'abbas_h5@gmail.com', '12345', 'ADMIN'),
(4, 'Mehmood Iqbal', 'mehnmood-Iqbal@gmail.com', '12345', 'CLIENT'),
(5, 'Rana', 'rana@gmail.com', '123', 'MYSTERYSHOPPER'),
(6, 'Imran Khan', 'Imran@gmail.com', '123', 'CLIENT'),
(33, 'hassan', 'hjk@gmail.com', '123', 'MYSTERYSHOPPER');

-- --------------------------------------------------------

--
-- Table structure for table `mysteryShopper_assignment`
--

CREATE TABLE `mysteryShopper_assignment` (
  `mysteryShopper_assignment_id` int(11) NOT NULL,
  `mysteryShopper_client_id` int(11) NOT NULL,
  `mysteryShopper_assignment_toDate` date NOT NULL,
  `mysteryShopper_assignment_fromDate` date NOT NULL,
  `mysteryShopper_assignment_status` varchar(128) NOT NULL,
  `mysteryShopper_id` int(11) DEFAULT NULL,
  `mysteryShopper_assignment_review_report` varchar(250) NOT NULL,
  `mysteryShopper_assignment_ratting_from` varchar(128) NOT NULL,
  `mysteryShopper_assignment_ratting_to` varchar(128) NOT NULL,
  `mysteryShopper_assignment_description` varchar(1000) NOT NULL,
  `mysteryShopper_assignment_category` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysteryShopper_assignment`
--

INSERT INTO `mysteryShopper_assignment` (`mysteryShopper_assignment_id`, `mysteryShopper_client_id`, `mysteryShopper_assignment_toDate`, `mysteryShopper_assignment_fromDate`, `mysteryShopper_assignment_status`, `mysteryShopper_id`, `mysteryShopper_assignment_review_report`, `mysteryShopper_assignment_ratting_from`, `mysteryShopper_assignment_ratting_to`, `mysteryShopper_assignment_description`, `mysteryShopper_assignment_category`) VALUES
(1, 1, '2018-04-30', '2018-04-01', 'Working', 5, '', '2', '5', 'Check the quality of Zinger burger served.', 'Food'),
(2, 2, '2018-04-30', '2018-04-12', 'Working', 5, '', '3', '5', 'Check the taste and odour of Mcburger.', 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `mysteryShopper_client`
--

CREATE TABLE `mysteryShopper_client` (
  `mysteryShopper_client_id` int(11) NOT NULL,
  `mysteryShopper_client_name` varchar(50) NOT NULL,
  `mysteryShopper_client_address` varchar(128) NOT NULL,
  `mysteryShopper_client_image` varchar(128) NOT NULL,
  `mysteryShopper_client_owner_name` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mysteryShopper_client_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysteryShopper_client`
--

INSERT INTO `mysteryShopper_client` (`mysteryShopper_client_id`, `mysteryShopper_client_name`, `mysteryShopper_client_address`, `mysteryShopper_client_image`, `mysteryShopper_client_owner_name`, `user_id`, `mysteryShopper_client_category`) VALUES
(1, 'KFC', 'Main Tariq Road', 'KFC.png', 'Mehmood Iqbal', 4, 'Food'),
(2, 'Mcdonald\'s', 'Defence Phase 4', 'mcdonalds.png', 'Imran Khan', 6, 'Food');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mysteryShopper`
--
ALTER TABLE `mysteryShopper`
  ADD PRIMARY KEY (`mysteryShopper_id`),
  ADD KEY `FK_User_id` (`user_id`);

--
-- Indexes for table `mysteryShopperUsers`
--
ALTER TABLE `mysteryShopperUsers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `mysteryShopper_assignment`
--
ALTER TABLE `mysteryShopper_assignment`
  ADD PRIMARY KEY (`mysteryShopper_assignment_id`),
  ADD KEY `FK_mysteryShopper_client_id` (`mysteryShopper_client_id`),
  ADD KEY `FK_mysteryShopper_id` (`mysteryShopper_id`);

--
-- Indexes for table `mysteryShopper_client`
--
ALTER TABLE `mysteryShopper_client`
  ADD PRIMARY KEY (`mysteryShopper_client_id`),
  ADD UNIQUE KEY `unique_index` (`mysteryShopper_client_name`,`mysteryShopper_client_owner_name`),
  ADD KEY `FK_User_id_client` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mysteryShopper`
--
ALTER TABLE `mysteryShopper`
  MODIFY `mysteryShopper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mysteryShopperUsers`
--
ALTER TABLE `mysteryShopperUsers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `mysteryShopper_assignment`
--
ALTER TABLE `mysteryShopper_assignment`
  MODIFY `mysteryShopper_assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mysteryShopper_client`
--
ALTER TABLE `mysteryShopper_client`
  MODIFY `mysteryShopper_client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mysteryShopper`
--
ALTER TABLE `mysteryShopper`
  ADD CONSTRAINT `FK_User_id` FOREIGN KEY (`user_id`) REFERENCES `mysteryShopperUsers` (`user_id`);

--
-- Constraints for table `mysteryShopper_assignment`
--
ALTER TABLE `mysteryShopper_assignment`
  ADD CONSTRAINT `FK_mysteryShopper_client_id` FOREIGN KEY (`mysteryShopper_client_id`) REFERENCES `mysteryShopper_client` (`mysteryShopper_client_id`),
  ADD CONSTRAINT `mysteryshopper_assignment_ibfk_1` FOREIGN KEY (`mysteryShopper_id`) REFERENCES `mysteryShopperUsers` (`user_id`);

--
-- Constraints for table `mysteryShopper_client`
--
ALTER TABLE `mysteryShopper_client`
  ADD CONSTRAINT `FK_User_id_client` FOREIGN KEY (`user_id`) REFERENCES `mysteryShopperUsers` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

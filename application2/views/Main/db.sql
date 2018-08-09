-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2018 at 06:58 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mspdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_assignment`
--

CREATE TABLE `client_assignment` (
  `assignment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `Month` varchar(250) NOT NULL,
  `total_budget` int(11) NOT NULL,
  `total_payout` int(11) NOT NULL,
  `speical_note` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_assignment`
--

INSERT INTO `client_assignment` (`assignment_id`, `client_id`, `Month`, `total_budget`, `total_payout`, `speical_note`) VALUES
(1, 4, 'June', 0, 0, 'asdasd'),
(2, 4, 'June', 1, 1, 'asdasd'),
(3, 4, 'June', 1, 1, 'asdasd'),
(4, 4, 'June', 1, 1, 'asdasd'),
(5, 4, 'June', 1, 1, 'asdasd'),
(6, 4, 'June', 1, 1, 'asdasd'),
(7, 4, 'June', 1, 1, 'asdasd'),
(8, 4, 'June', 1, 1, 'asdasd'),
(9, 4, 'June', 1, 1, 'asdasd'),
(10, 4, 'June', 1452, 1888, 'asdasd'),
(11, 4, 'June', 1815, 2360, 'heelo this is test assignment'),
(12, 4, 'June', 1815, 2360, 'heelo this is test assignment'),
(13, 4, 'June', 1815, 2360, 'heelo this is test assignment'),
(14, 158, 'June', 80262, 104341, 'sda'),
(15, 158, '2018', 1815, 2360, 'sadas'),
(16, 158, 'August2018', 80262, 104341, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `client_assignment_citybifraction`
--

CREATE TABLE `client_assignment_citybifraction` (
  `id` int(11) NOT NULL,
  `client_assignment_id` int(11) NOT NULL,
  `city` varchar(250) NOT NULL,
  `number_of_assignment` int(11) NOT NULL,
  `budget_for_each` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_assignment_citybifraction`
--

INSERT INTO `client_assignment_citybifraction` (`id`, `client_assignment_id`, `city`, `number_of_assignment`, `budget_for_each`) VALUES
(1, 1, 'Ayubia', 33, 55),
(2, 0, 'Ayubia', 0, 0),
(3, 13, 'Ayubia', 33, 55),
(4, 14, 'Ayubia', 343, 234),
(5, 15, 'Ayubia', 55, 33),
(6, 16, 'Ayubia', 343, 234);

-- --------------------------------------------------------

--
-- Table structure for table `mysteryshopper`
--

CREATE TABLE `mysteryshopper` (
  `mysteryShopper_id` int(11) NOT NULL,
  `mysteryShopper_name` varchar(25) NOT NULL,
  `mysteryShopper_nic` varchar(128) DEFAULT NULL,
  `mysteryShopper_card_type` varchar(50) DEFAULT NULL,
  `mysteryShopper_bank_name` varchar(128) DEFAULT NULL,
  `mysteryShopper_address` varchar(128) NOT NULL,
  `mysteryShopper_email` varchar(128) NOT NULL,
  `mysteryShopper_account_no` varchar(128) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `mysteryShopper_ratting` varchar(128) DEFAULT NULL,
  `mysteryShopper_video` varchar(128) DEFAULT NULL,
  `mysteryShopper_contact_number` varchar(128) NOT NULL,
  `mysteryShopper_profile_image` varchar(128) DEFAULT NULL,
  `mysteryShopper_category` varchar(128) DEFAULT NULL,
  `mysteryShopper_travel_field` varchar(128) DEFAULT NULL,
  `mysteryShopper_account_contact` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysteryshopper`
--

INSERT INTO `mysteryshopper` (`mysteryShopper_id`, `mysteryShopper_name`, `mysteryShopper_nic`, `mysteryShopper_card_type`, `mysteryShopper_bank_name`, `mysteryShopper_address`, `mysteryShopper_email`, `mysteryShopper_account_no`, `user_id`, `mysteryShopper_ratting`, `mysteryShopper_video`, `mysteryShopper_contact_number`, `mysteryShopper_profile_image`, `mysteryShopper_category`, `mysteryShopper_travel_field`, `mysteryShopper_account_contact`) VALUES
(5, 'Abbas', '2147483647', '', '', 'Karachi', 'abbas_h5@live.com', '', 50, NULL, NULL, '03145465', 'cafemist15.png', 'Food', 'Within City', ''),
(13, 'Shaikh abbas', '12345-1234567-1', '', '', 'Karachi', 'shaikhabbas193@gmail.com', '', 73, NULL, NULL, '0313-4554777', 'Box.png', 'Food', 'Within City', ''),
(14, 'Rana Naseeb', '31301-4411670-7', 'Credit', 'UBL', 'Karachi', 'naseeb615@gmail.com', '', 74, 'A', NULL, '0332-2719281', 'Box4.png', 'Food', 'Out City', '03322719281'),
(15, 'Hassan Ahmed', '', '', '', '', 'hassanahmed113@gmail.com', '', 83, NULL, NULL, '0345-2201069', '24796576_10156022045540452_5687838453385272436_n.jpg', 'Food', 'Within City', ''),
(18, 'Aleena', '4250192643252', '', 'hbl', 'malir', 'meer_alina_ali@yahoo.com', '', 90, NULL, NULL, '03471274933', NULL, 'Online', 'Within City', ''),
(20, 'sajjad', '', '', '', '', 'sajjad@gmail.com', '', 93, NULL, NULL, '', 'Food', NULL, NULL, ''),
(21, 'Hamza', '', '', '', '', 'hamza@gmail.com', '', 94, NULL, NULL, '', 'Food', NULL, NULL, ''),
(22, 'Areeba', NULL, NULL, NULL, 'Karachi', 'areeba_ahmer@yahoo.com', NULL, 98, NULL, NULL, '03323131796', NULL, NULL, NULL, ''),
(23, 'Waqar Noor', NULL, NULL, NULL, 'Faisalabad', 'wikidrifter@hotmail.com', NULL, 99, NULL, NULL, '03212800005', NULL, NULL, NULL, ''),
(24, 'Anika', NULL, NULL, NULL, '', 'anikazirghaam@gmail.com', NULL, 100, 'A', NULL, '03337663664', NULL, NULL, NULL, ''),
(25, 'Zeenat', NULL, NULL, NULL, '', 'std_11587@iobm.edu.pk', NULL, 101, 'A', NULL, '03343976741', NULL, NULL, NULL, ''),
(26, 'syeda sabeen', NULL, NULL, NULL, 'Karachi', 'sabeen34@gmail.com', NULL, 102, 'A', NULL, '03333062761', NULL, NULL, NULL, ''),
(27, 'Anam Tariq', NULL, NULL, NULL, '', 'atk-812@hotmail.com', NULL, 103, 'A', NULL, '03222632363', NULL, NULL, NULL, ''),
(28, 'Mahrukh', NULL, NULL, NULL, '', 'mahrukhsaleem943@gmail.com', NULL, 104, NULL, NULL, '03058325148', NULL, NULL, NULL, ''),
(30, 'Areeba', NULL, NULL, NULL, 'Karachi', 'areeba_princess09@hotmail.com', NULL, 106, 'A', NULL, '03323131796', NULL, NULL, NULL, ''),
(31, 'Maria Saeed', NULL, NULL, NULL, 'Karachi', 'maria285@gmail.com', NULL, 107, 'A', NULL, '03333126955', NULL, NULL, NULL, ''),
(32, 'Uzma', NULL, NULL, NULL, 'Karachi', 'siddiqui.uzma@gmail.com', NULL, 108, 'A', NULL, '03330271385', NULL, NULL, NULL, ''),
(33, 'Nida Abbas', NULL, NULL, NULL, 'Karachi', 'nida.abbas93@gmail.com', NULL, 109, 'B', NULL, '0342-293-2964', NULL, NULL, NULL, ''),
(34, 'Ifrah Arshad', '4210131550388', '', '', 'Karachi', 'ifraharshad65@gmail.com', '', 110, 'A', NULL, '+92 313 2957643', '', 'Food', 'Within City', ''),
(35, 'Muntazir Haider', NULL, NULL, NULL, 'Karachi', 'muntazir.haider@gmail.com', NULL, 111, 'A', NULL, '03127799914', NULL, NULL, NULL, ''),
(36, 'Sundeep Aggarwal', NULL, NULL, NULL, 'Lahore', 'sundeep.cwa@gmail.com', NULL, 112, 'A', NULL, '+918276814990', NULL, NULL, NULL, ''),
(37, 'Mahrukh Arsalan', NULL, NULL, NULL, 'Karachi', 'mahrukh1990@outlook.com', NULL, 113, 'A', NULL, '03342226363', NULL, NULL, NULL, ''),
(38, 'Sabeen Faisal', NULL, NULL, NULL, 'Karachi', 'sabbokaz@hotmail.com', NULL, 114, 'A', NULL, '+923340033671', NULL, NULL, NULL, ''),
(39, 'Shahar Ahmed', NULL, NULL, NULL, 'Karachi', 'shahar742427@gmail.com', NULL, 115, 'A', NULL, '+923333374247', NULL, NULL, NULL, ''),
(41, 'Safeer', NULL, NULL, NULL, 'Karachi', 'safeer.husssain@gmail.com', NULL, 117, 'A', NULL, '03472097733', NULL, NULL, NULL, ''),
(43, 'abbas', NULL, NULL, NULL, 'Ali Bandar', 'asdasd@gmail.com', NULL, 120, NULL, NULL, '02312313', NULL, NULL, NULL, ''),
(44, 'Javaria', NULL, NULL, NULL, 'Karachi', 'javeebokhari@gmail.com', NULL, 121, 'A', NULL, '03028266150', NULL, NULL, NULL, ''),
(45, 'fatimi', NULL, NULL, NULL, 'Karachi', 'Ilostmypenguin@icloud.com', NULL, 124, 'A', NULL, '03002479396', NULL, NULL, NULL, ''),
(46, 'Samra', '4210139375970', 'Union card', 'Bank al habib', 'Karachi', 'samrarazakazi@gmail.com', '03323007585', 126, NULL, NULL, '03323007585', '9ED032B3-BC1D-4343-9500-AC7C5D733D0D.jpeg', 'Entertainment', 'Within City', ''),
(49, 'Ali', '', '', '', 'Karachi', 'alidevjianie@yahoo.com', '', 55, NULL, NULL, '03212428090', '', 'Food', '', '03212428090'),
(50, 'Omar Iftikhar', NULL, NULL, NULL, 'Karachi', 'omariftikhar82@gmail.com', NULL, 133, NULL, NULL, '0322-252-9748', NULL, NULL, NULL, NULL),
(51, 'waqar', '4240123454327', NULL, NULL, 'Karachi', 'waqaryounus@gmail.com', NULL, 134, NULL, NULL, '0987654321', NULL, NULL, NULL, '03453138653'),
(54, 'Abbas', NULL, NULL, NULL, 'Karachi', 'PPPPP@gmail.com', NULL, 138, NULL, NULL, '03232323', NULL, NULL, NULL, NULL),
(55, 'Mehdi', NULL, NULL, NULL, 'Karachi', 'mehdikaramali@live.com', NULL, 139, NULL, NULL, '03002446110', NULL, NULL, NULL, NULL),
(57, 'Murtaza', '', '', '', 'Karachi', 'murtaza.fazal@gmail.com', '', 147, 'C', NULL, '123123', 'Screen_Shot_2014-09-26_at_8_28_50_AM2.png', 'Food', '', '123123'),
(58, 'Ahsan', '-----------------------kkkkkkkkkkkkkkkkkkkkkkkkkk', '', '', 'Karachi', 'ahsan.kai@gmail.com', '', 152, NULL, NULL, '03328287820', 'login-screen.jpg', 'Food', '', 'nnmnnmnmnnmm'),
(59, 'dfsfdsfd', '', NULL, '', '', 'fdsfsd@gmail.com', '', 153, NULL, NULL, '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mysteryshopperusers`
--

CREATE TABLE `mysteryshopperusers` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `takenAssignment` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysteryshopperusers`
--

INSERT INTO `mysteryshopperusers` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`, `takenAssignment`) VALUES
(1, 'admin', 'admin@gmail.com', '12345', 'ADMIN', 0),
(49, 'abcd', 'abc@gmail.com', '123', 'CLIENT', 0),
(50, 'Abbas', 'abbas_h5@live.com', '827ccb0eea8a706c4c34a16891f84e7b', 'MYSTERYSHOPPER', 0),
(55, 'Ali Asghar', 'alidevjianie@yahoo.com', 'dbf29def8f2ad903a827500695e5baf6', 'MYSTERYSHOPPER', 0),
(59, 'Abbas', 'ali.muhammed@arena.net.pk', '12345', 'CLIENT', 0),
(73, 'Shaikh abbas', 'shaikhabbas193@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'MYSTERYSHOPPER', 0),
(74, 'Rana Naseeb', 'naseeb615@gmail.com', '47d80a0f2bf42c97407dd0c82206395d', 'MYSTERYSHOPPER', 0),
(83, 'Hassan Ahmed', 'hassanahmed113@gmail.com', '7b44dc876c221f7cddfb299bb122e008', 'MYSTERYSHOPPER', 0),
(84, 'Shahbaz', 'shahbaz@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CLIENT', 0),
(85, 'Khizar', 'khizar@yahoo.com', '12345', 'CLIENT', 0),
(86, 'None', 'pizzamax@yahoo.com', '12345', 'CLIENT', 0),
(88, 'Ali', 'info@koffiechalet.com', 'feb59c1d83690f0ce64e150cfd850778', 'MYSTERYSHOPPER', 0),
(90, 'Aleena', 'meer_alina_ali@yahoo.com', '95b5d776ebb1ca4e073ca1778cdcda88', 'MYSTERYSHOPPER', 0),
(92, 'Ali', 'outofthebox514@gmail.com', 'd3f52be24b9723b725bb28e6ef04c37c', 'MYSTERYSHOPPER', 0),
(93, 'sajjad', 'sajjad@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'MYSTERYSHOPPER', 0),
(94, 'Hamza', 'hamza@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'MYSTERYSHOPPER', 0),
(96, 'None', 'macdonald@gmail.com', '12345', 'CLIENT', 0),
(97, 'Butt Sahb', 'subway@gmail.com', '12345', 'CLIENT', 0),
(98, 'Areeba', 'areeba_ahmer@yahoo.com', '72e94357409601244394f5dd0b8fa1b2', 'MYSTERYSHOPPER', 0),
(99, 'Waqar Noor', 'wikidrifter@hotmail.com', '9488a7206f7be7ec238d9d6cf4151adc', 'MYSTERYSHOPPER', 0),
(100, 'Anika', 'anikazirghaam@gmail.com', '9a24a010fb44e52093732c71e605f80f', 'MYSTERYSHOPPER', 0),
(101, 'Zeenat', 'std_11587@iobm.edu.pk', 'a05122a90348ea698ad1d5f93c1fe4d8', 'MYSTERYSHOPPER', 0),
(102, 'syeda sabeen', 'sabeen34@gmail.com', '1b1484331ba762105cb05fde6c74a066', 'MYSTERYSHOPPER', 0),
(103, 'Anam Tariq', 'atk-812@hotmail.com', '842ce398b1702101f875c12f96474778', 'MYSTERYSHOPPER', 0),
(104, 'Mahrukh', 'mahrukhsaleem943@gmail.com', '209456e5c94073bb0e6908fac99ebefa', 'MYSTERYSHOPPER', 0),
(106, 'Areeba', 'areeba_princess09@hotmail.com', '72e94357409601244394f5dd0b8fa1b2', 'MYSTERYSHOPPER', 0),
(107, 'Maria Saeed', 'maria285@gmail.com', '0375353ca858a7b935ff53ef0a3c9a98', 'MYSTERYSHOPPER', 0),
(108, 'Uzma', 'siddiqui.uzma@gmail.com', 'da6494b8f0ce64eb1aa4a6d24d04be8e', 'MYSTERYSHOPPER', 0),
(109, 'Nida Abbas', 'nida.abbas93@gmail.com', 'f21f87990535614a939ecedec5cb80e8', 'MYSTERYSHOPPER', 0),
(110, 'Ifrah Arshad', 'ifraharshad65@gmail.com', '3fbdad48b0ade43e424414b258faacef', 'MYSTERYSHOPPER', 0),
(111, 'Muntazir Haider', 'muntazir.haider@gmail.com', '37b4db33c5bac822c955ebc32294d6bc', 'MYSTERYSHOPPER', 0),
(112, 'Sundeep Aggarwal', 'sundeep.cwa@gmail.com', 'e744745baccd3a5b2d70a39ba82d8c1b', 'MYSTERYSHOPPER', 0),
(113, 'Mahrukh Arsalan', 'mahrukh1990@outlook.com', '30604f6cf9c16936dbe12cf947b45dc4', 'MYSTERYSHOPPER', 0),
(114, 'Sabeen Faisal', 'sabbokaz@hotmail.com', '17c29ff77a76f072ef22b4d233b350c7', 'MYSTERYSHOPPER', 0),
(115, 'Shahar Ahmed', 'shahar742427@gmail.com', '1c0fb0a43b38cf804ae5025470e37958', 'MYSTERYSHOPPER', 0),
(117, 'Safeer', 'safeer.husssain@gmail.com', '599a9be036e2f718e6ddd4f2efd1cd0c', 'MYSTERYSHOPPER', 0),
(120, 'abbas', 'asdasd@gmail.com', 'bc98592f56239176d66b604acb9be3c2', 'MYSTERYSHOPPER', 0),
(121, 'Javaria', 'javeebokhari@gmail.com', '59337798560b783e1a89773a20163947', 'MYSTERYSHOPPER', 0),
(124, 'fatimi', 'Ilostmypenguin@icloud.com', '1ddeb17437e5172cd960ea2016a000f1', 'MYSTERYSHOPPER', 0),
(126, 'Samra', 'samrarazakazi@gmail.com', '817040f9bc76aa48f0a8df73de6782d4', 'MYSTERYSHOPPER', 0),
(127, 'Aqeel', 'none@yahoo.com', '12345', 'CLIENT', 0),
(129, 'Haris', 'OpTp@yahoo.com', '12345', 'CLIENT', 0),
(130, 'Raza', 'KFC@yahoo.com', '12345', 'CLIENT', 0),
(133, 'Omar Iftikhar', 'omariftikhar82@gmail.com', 'f47ffc9387e318161ea3dbc25d079797', 'MYSTERYSHOPPER', 0),
(134, 'waqar', 'waqaryounus@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'MYSTERYSHOPPER', 0),
(138, 'Abbas', 'PPPPP@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'MYSTERYSHOPPER', 0),
(139, 'Mehdi', 'mehdikaramali@live.com', '15a497124ff1afba346e4ae6385007a4', 'MYSTERYSHOPPER', 0),
(147, 'Murtaza', 'murtazafazal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'MYSTERYSHOPPER', 0),
(152, 'Ahsan', 'ahsan.kai@gmail.com', '3ccccebe51c7c09a4cc6cd88b0d88652', 'MYSTERYSHOPPER', 0),
(153, 'dfsfdsfd', 'fdsfsd@gmail.com', 'e871ee65228ea28207973b9cab65bf32', 'MYSTERYSHOPPER', 0),
(155, 'fahad', 'fahadfarooq54@gmail.com44', 'fahad', 'CLIENT', 0),
(156, 'fahad44', 'fahadfarooq5444@gmail.com4', 'fahad', 'CLIENT', 0),
(157, 'Fahad Farooq', 'fahadfarooq54@gmail.comss', 'fahad', 'CLIENT', 0),
(158, 'ff', 'fahadfarooq54@gmail.com', 'fahad', 'CLIENT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mysteryshopper_assignment`
--

CREATE TABLE `mysteryshopper_assignment` (
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
  `mysteryShopper_assignment_category` varchar(128) NOT NULL,
  `assignment_budget` varchar(50) DEFAULT NULL,
  `report_edit` varchar(256) DEFAULT NULL,
  `mysteryShopper_assignment_city` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysteryshopper_assignment`
--

INSERT INTO `mysteryshopper_assignment` (`mysteryShopper_assignment_id`, `mysteryShopper_client_id`, `mysteryShopper_assignment_toDate`, `mysteryShopper_assignment_fromDate`, `mysteryShopper_assignment_status`, `mysteryShopper_id`, `mysteryShopper_assignment_review_report`, `mysteryShopper_assignment_ratting_from`, `mysteryShopper_assignment_ratting_to`, `mysteryShopper_assignment_description`, `mysteryShopper_assignment_category`, `assignment_budget`, `report_edit`, `mysteryShopper_assignment_city`) VALUES
(10, 6, '2018-04-24', '2018-04-24', 'Accept', 83, '', '1', '4', 'Overall environment review ', 'Dine', NULL, NULL, ''),
(13, 8, '2018-04-24', '2018-04-24', 'Completed', 92, '', '', '', '', 'Dine', '', '', ''),
(14, 11, '2018-04-24', '2018-04-24', 'Completed', 94, '', '', '', '', 'Dine', '', NULL, ''),
(39, 6, '2018-07-17', '2018-07-16', 'Expired', 55, '', '1', '4', 'Test', '', '300', NULL, 'Karachi'),
(40, 6, '2018-07-17', '2018-07-16', 'Expired', 55, '', '', '', 'Test 2 as first failed to update the city', 'Dine', '300', NULL, 'Karachi'),
(41, 18, '2018-07-21', '0000-00-00', 'Close', NULL, '', 'Rating From', 'Rating To', 'Test Assignment For M', '', '5000', NULL, 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `mysteryshopper_client`
--

CREATE TABLE `mysteryshopper_client` (
  `mysteryShopper_client_id` int(11) NOT NULL,
  `mysteryShopper_client_name` varchar(50) NOT NULL,
  `mysteryShopper_client_address` varchar(128) NOT NULL,
  `mysteryShopper_client_image` varchar(128) DEFAULT NULL,
  `mysteryShopper_client_owner_name` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mysteryShopper_client_category` varchar(50) NOT NULL,
  `Minimum_assignments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysteryshopper_client`
--

INSERT INTO `mysteryshopper_client` (`mysteryShopper_client_id`, `mysteryShopper_client_name`, `mysteryShopper_client_address`, `mysteryShopper_client_image`, `mysteryShopper_client_owner_name`, `user_id`, `mysteryShopper_client_category`, `Minimum_assignments`) VALUES
(6, 'Koffie Chalet', 'Sindhi Muslim', 'Koffie_challet.jpeg', 'abcd', 49, 'Food', 55),
(7, 'Cafe Mist', 'KDA karachi', 'cafemist.png', 'Abbas', 59, 'Food', 55),
(8, 'Broadway Pizza', '', 'broadway1.png', 'Shahbaz', 84, 'Food', 55),
(9, 'Burger Lab', 'None', 'BL.png', 'Khizar', 85, 'Food', 55),
(10, 'Pizza Max', 'none', 'Pizzamax.jpg', 'None', 86, 'Food', 55),
(11, 'Macdonalds', '', 'logoMacdonalds1.png', 'None', 96, 'Food', 55),
(12, 'Subway', '', 'subway.jpg', 'Butt Sahb', 97, 'Food', 55),
(13, 'Pizza Hut', 'None', 'Pizza_Hut_2012_logo.png', 'Aqeel', 127, 'Food', 55),
(15, 'OpTp', 'None', 'OpTplogo.png', 'Haris', 129, 'Food', 55),
(16, 'KFC', 'None', 'KFCPK.jpeg', 'Raza', 130, 'Food', 55),
(17, 'Non', 'Lahore', NULL, 'abcd', 49, 'Food', 55),
(22, 'fahad', 'house no 44/6 C Area malir', NULL, 'ff', 158, 'Food', 55),
(23, 'test Company', '2sri branch.', NULL, 'ff', 158, 'Food', 55);

-- --------------------------------------------------------

--
-- Table structure for table `mysteryshopper_client_branch`
--

CREATE TABLE `mysteryshopper_client_branch` (
  `branch_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `City` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysteryshopper_client_branch`
--

INSERT INTO `mysteryshopper_client_branch` (`branch_id`, `client_id`, `City`, `Address`) VALUES
(1, 59, 'Abbottabad', 'test Address'),
(2, 158, 'Ayubia', 'asd'),
(3, 129, 'Karachi', 'house no 44/6 C Area malir');

-- --------------------------------------------------------

--
-- Table structure for table `mysteryshopper_online_review`
--

CREATE TABLE `mysteryshopper_online_review` (
  `online_review_id` int(11) NOT NULL,
  `outlet` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `mysteryShopper_assignment_id` int(11) NOT NULL,
  `call_center` varchar(128) NOT NULL,
  `online` varchar(128) NOT NULL,
  `rider` varchar(128) NOT NULL,
  `billing` varchar(128) NOT NULL,
  `bribe` varchar(128) NOT NULL,
  `food_packaging` varchar(128) NOT NULL,
  `image1` varchar(128) NOT NULL,
  `food_itself` varchar(128) NOT NULL,
  `image2` varchar(128) NOT NULL,
  `loyalty` varchar(128) NOT NULL,
  `extra` varchar(128) NOT NULL,
  `image3` varchar(128) NOT NULL,
  `image4` varchar(128) DEFAULT NULL,
  `image5` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysteryshopper_online_review`
--

INSERT INTO `mysteryshopper_online_review` (`online_review_id`, `outlet`, `date`, `time`, `mysteryShopper_assignment_id`, `call_center`, `online`, `rider`, `billing`, `bribe`, `food_packaging`, `image1`, `food_itself`, `image2`, `loyalty`, `extra`, `image3`, `image4`, `image5`) VALUES
(7, 'test', '2018-07-09', '05:19:00', 31, 'i. Greeting.\r\n\r\n    ii. Help in finding the right order. \r\n\r\n    iii. Deals discussed. \r\n\r\n    iv. Time from Call to Order recei', 'i. Greeting.\r\n\r\n    ii. Help in finding the right order. \r\n\r\n    iii. Deals discussed. \r\n\r\n    iv. Time from Call to Order recei', 'i. Greeting.\r\n\r\n    ii. Help in finding the right order. \r\n\r\n    iii. Deals discussed. \r\n\r\n    iv. Time from Call to Order recei', '    i. Greeting.\r\n\r\n    ii. Help in finding the right order. \r\n\r\n    iii. Deals discussed. \r\n\r\n    iv. Time from Call to Order r', '    i. Greeting.\r\n\r\n    ii. Help in finding the right order. \r\n\r\n    iii. Deals discussed. \r\n\r\n    iv. Time from Call to Order r', '    i. Greeting.\r\n\r\n    ii. Help in finding the right order. \r\n\r\n    iii. Deals discussed. \r\n\r\n    iv. Time from Call to Order r', 'bg-image22.jpg', '    i. Greeting.\r\n\r\n    ii. Help in finding the right order. \r\n\r\n    iii. Deals discussed. \r\n\r\n    iv. Time from Call to Order r', 'cafe_mist1.jpg', '    i. Greeting.\r\n\r\n    ii. Help in finding the right order. \r\n\r\n    iii. Deals discussed. \r\n\r\n    iv. Time from Call to Order r', '    i. Greeting.\r\n\r\n    ii. Help in finding the right order. \r\n\r\n    iii. Deals discussed. \r\n\r\n    iv. Time from Call to Order r', 'cafemist19.png', '', ''),
(8, 'smchs', '2018-07-11', '14:00:00', 20, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'a', 'q', 'none', 'Broadway-Logo.jpg', 'a', '14thstreetlogo1.png', 'a', 'none', 'Aboutus-12.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mystery_shopper_review`
--

CREATE TABLE `mystery_shopper_review` (
  `review_id` int(11) NOT NULL,
  `mysteryShopper_assignment_id` int(128) NOT NULL,
  `outlet` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `no_customer` int(128) NOT NULL,
  `no_staff` int(128) NOT NULL,
  `server_name` varchar(128) DEFAULT NULL,
  `manager_on_duty` varchar(128) DEFAULT NULL,
  `parking_area` varchar(1000) NOT NULL,
  `outside_ambiance` varchar(1000) NOT NULL,
  `greeter` varchar(1000) NOT NULL,
  `complimentary_drink` varchar(1000) NOT NULL,
  `table_allotment` varchar(1000) NOT NULL,
  `feel_of_place` varchar(1000) NOT NULL,
  `menu_presentation` varchar(1000) NOT NULL,
  `screen` varchar(1000) NOT NULL,
  `self_ordering` varchar(1000) NOT NULL,
  `washroom` varchar(1000) NOT NULL,
  `service` varchar(1000) NOT NULL,
  `food` varchar(1000) NOT NULL,
  `complaints` varchar(1000) DEFAULT NULL,
  `billing` varchar(1000) NOT NULL,
  `loyalty_program` varchar(1000) NOT NULL,
  `bribe` varchar(1000) DEFAULT NULL,
  `smiles_while_leaving` varchar(128) NOT NULL,
  `valet_operation` varchar(1000) NOT NULL,
  `takeaway` varchar(1000) NOT NULL,
  `extra_detail` varchar(1000) DEFAULT NULL,
  `image1` varchar(128) DEFAULT NULL,
  `image2` varchar(128) DEFAULT NULL,
  `image3` varchar(128) DEFAULT NULL,
  `image4` varchar(128) DEFAULT NULL,
  `image5` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mystery_shopper_review`
--

INSERT INTO `mystery_shopper_review` (`review_id`, `mysteryShopper_assignment_id`, `outlet`, `date`, `time`, `no_customer`, `no_staff`, `server_name`, `manager_on_duty`, `parking_area`, `outside_ambiance`, `greeter`, `complimentary_drink`, `table_allotment`, `feel_of_place`, `menu_presentation`, `screen`, `self_ordering`, `washroom`, `service`, `food`, `complaints`, `billing`, `loyalty_program`, `bribe`, `smiles_while_leaving`, `valet_operation`, `takeaway`, `extra_detail`, `image1`, `image2`, `image3`, `image4`, `image5`) VALUES
(16, 2, 'DHA Branch', '2018-04-24', '00:00:00', 8, 7, 'Sally', 'Kashif', 'Clean but not convienient', 'Smelly', 'Smile', 'No', 'Actual', 'Dull', 'Clean and Readable ', 'Clean', 'None', 'dirty', 'Testing comments regarding the service', 'Good Food', 'None Complaints', 'Excellent', 'None', 'None', 'Yes', 'None', 'Yes', 'None', 'planet_01_logos-01.png', 'planet_01_logos-01.png', 'planet_01_logos-01.png', 'planet_01_logos-01.png', 'planet_01_logos-01.png'),
(17, 9, 'sindhi muslim', '2018-04-24', '16:02:00', 14, 4, 'ozwin', 'nabil', 'it was not clean and too small parking space', 'Clean ', 'no one receive us everyone was busy serving other customer ', '-----', 'got table easily', 'fresh and attractive environment ', 'clean readable but too old', '-----', 'no', 'clean but smelly', 'order taker did not introduced themselves but calm and supportive, but they recommended some of their special dishes, did repeated the order,  it toke above 5 mins from the actual time, table was perfectly ready.', 'food and drinks were serve separately and it was food was served 5mins late but it was tasty well clocked and fresh,\r\nwe did call the manager and appreciate him.  ', 'there was no complains regarding food  and there was no complimentary item served ', 'it was on time and did not applied any discount on the bill, feed back was given', 'did not offered loyalty card...', 'none', 'they smiles when we were leaving', 'no valed.....', 'remaining food was parcelled in a good way..', 'None', 'image_157478385.JPG', 'cafemist18.png', 'cafe_mist.jpg', '', ''),
(18, 10, 'Sindhi Muslim', '2018-04-24', '16:10:00', 10, 3, 'Ozwin', 'Anil', 'Parking area is also the entrance so there were bins and its quite conjusted and the road was also broken', 'The outlet was neat and clean, the lighting were a bit dim and it was not smelly but also not fragrant', 'The guard opened the door and the manager and staff were all there at same location and every one greeted', 'I dont need to wait at all, but i didnt witness any waiting area though', 'I was a walk in customer so the seats that i requested was given', 'The lighting were a bit for me, yes the ambiance was really good and relaxing the art-work was good too but can be better', 'The menu was torn and really old, but yes it was readable and the explaination fo every item was impressive', 'Was not available', 'None', 'The washroom was clean but there was no toilet paper or tissues and also the tap for the sink was also broken', 'The order taker never introduced himself.\r\nThe order taker recommended a starter and also very helpful with selecting the sides with the particular dishes.\r\nThe order taker did up sell the desserts and mock tails but we didn\'t order any.\r\nYes he repeated the order.\r\nThe order time was given 10 minutes for starter and 20-25 minutes for main course but both the meals were 5 minutes late.\r\nYes the table was ready and setup properly\r\nThe table was quite small as we ordered a lot of food so it was bit conjusted', 'The order time was given 10 minutes for starter and 20-25 minutes for main course but both the meals were 5 minutes late.\r\nThe taste was amazing for everything\r\nYes the food was fresh and hot\r\nThe manager name was Anil and we also asked about the sauce that it was really good he replied that it was there signature sauce.\r\n', 'There were no complains that we logged but the drinks were not chilled and whenever we needed anything we need to raise the hand or call the person that we need anything.\r\nThe floor manager and the supervisor both had a meeting on a table right in front of us and it was not professional\r\nThe person who was cleaning the table and serving the cutlery was also cleaning the floor that was an issue in terms of hygiene ', 'The moment i requested the bill it was given in like 5 minutes or may be less then that, there were no discounts offered nor they even told if there is a promotion on any of the bank cards or anything in particular\r\nThe order taker did give a comment card and i filled it\r\n', 'No loyalty card were offered by any of the staff members', 'None', 'Yes', 'We didn\'t have a car so didn\'t really get a chance to experience it but the road was broken and there was no space so iam assuming that it might be hectic to get to valet operator.', 'Yes we parceled some fries and they were given right away', 'The staff members were all talking to each other almost all the time and they were all at the same location right at the entrance so it looked pretty odd and also the lighting was really dim i would prefer white lights rather then having warm lights as the environment was looking a bit dim', 'IMG_6746.jpg', 'IMG_6747.jpg', 'IMG_6748.jpg', '', ''),
(19, 14, 'Ocean Mall', '2018-05-04', '15:30:00', 0, 0, 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'This was an online order. We ordered Via your Website. What was really strange was we ordered at 1:15pm..the order was only punched in at 2:04. Now if the delay was beacuse of friday prayers. Your site should mention this!.', 'Food and Drinks arrived together. The food was cold, the bun was stale and the chips were super oily and soggy. The chips were so oily the bag had become oily because of them. The ice had totally melted in the drink. Taste of the burger was fine', 'The complaint was that the food arrived super late! Even if we take the time of the punched time on the bill. It was horribly late . The food arrived at 3.31 pm..when the order taken time read 2:04...this is 1.5 hrs!! Tht is no joke', 'Bill came attached to the bag', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', '', 'a1.jpeg', 'a2.jpeg', '', ''),
(78, 13, 'Online ', '2018-05-04', '13:30:00', 0, 0, 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', ' Na', 'Na ', 'Na ', 'The order was placed online at about 1:30 pm, on friday 4th May. The surprising thing is the order never turned up!! We kept waiting for the delivery guy and we were literally so hungry but no one came.', 'Well food cant be judged you see. We ordered online, the order was confirmed..bit surprise surprise..such a big brand..broadway pizza..highly disappointing i must say..and us being such regulars at broadway', 'The order never arrived!! We waited and waited and waited..after 1.5 hrs we just gave up and ordered something else...if broadway was having any trouble they should have atleast called and informed us.', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 'ED270A76-0D49-4386-917E-39608157E602.jpeg', '46FFBB7A-1F2A-4E47-89F3-5C5A82260519.jpeg', '5FF935BE-00B2-482E-9BE9-B58B3856AD12.jpeg', '', ''),
(79, 0, 'smchs', '1989-05-05', '18:15:00', 15, 2, 'dilshad', 'hassan', 'Not Avaiable', 'clean', 'rude', 'N/A', 'N/A', 'dull, smelly, artwork was good', 'yes', 'yes', 'nope', 'clean', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'a', 'b', 'c', 'yes', 'f', 'd', 'g', '14thstreetlogo.png', 'aboutus.jpg', 'Aboutus-1.jpg', '', ''),
(80, 16, 'Karachi ', '2018-07-11', '00:10:00', 2, 2, '3', '1', 'Clean', 'Dim', 'smile', 'NO', 'No', 'dull', 'yo', 'yo', 'no', 'no', 'msnasm,dnasm,nxas,mxnasm,xnas sa sad asd asd asd asd asd sd ad asd as das dasda sda sd asd asd asd as das da sda das d asd as ds das da sd asd asd as ds d d dasdas d asd asd s d asd as das das da sd asd asd', 'msnasm,dnasm,nxas,mxnasm,xnas sa sad asd asd asd asd asd sd ad asd as das dasda sda sd asd asd asd as das da sda das d asd as ds das da sd asd asd as ds d d dasdas d asd asd s d asd as das das da sd asd asd', 'msnasm,dnasm,nxas,mxnasm,xnas sa sad asd asd asd asd asd sd ad asd as das dasda sda sd asd asd asd as das da sda das d asd as ds das da sd asd asd as ds d d dasdas d asd asd s d asd as das das da sd asd asd', 'msnasm,dnasm,nxas,mxnasm,xnas sa sad asd asd asd asd asd sd ad asd as das dasda sda sd asd asd asd as das da sda das d asd as ds das da sd asd asd as ds d d dasdas d asd asd s d asd as das das da sd asd asd  ', 'sdasda', 'asdasd', 'asd', 'asd', 'asd', 'asd', 'Box1.png', 'Box2.png', 'Box3.png', '', ''),
(81, 17, 'Sindhi Muslim', '2018-07-05', '14:34:00', 10, 4, 'Shadab', 'Mustakeem', 'Cleaned', 'Smellt', 'Rude', 'None', 'Yes', 'Smelly', 'Readable', 'Readable', 'Readable', 'Readable', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'None', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '906630_10152689972995452_4118581526360194262_o.jpg', '24796576_10156022045540452_5687838453385272436_n1.jpg', '24796576_10156022045540452_5687838453385272436_n2.jpg', '906630_10152689972995452_4118581526360194262_o1.jpg', ''),
(82, 0, 'a', '2018-07-06', '16:35:00', 2, 1, '', '', 'a', 'a', 'a', 'a', 'a', 'a', 'Clean', 'a', 'a', 'a', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'a', 'a', '', 'a', 'a', '', '', '', '', 'Aboutus-11.jpg', '', ''),
(83, 19, 'test', '2018-07-10', '11:49:00', 2, 2, '2', '', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '. Did order taker introduced themselves, was s/he calm or in hurry.\r\n\r\n    ii. Any recommendations or just jolting down the order. \r\n\r\n    iii. Any upselling towards Appetizer/,Mocktails/Deserts. \r\n\r\n    iv. Order repeated. \r\n\r\n    v. Order Time (committed vs actual). \r\n\r\n    vi. Was the table ready with setup (knife, fork etc.). \r\n\r\n    vii. Any other comments you deem fit.', '. Did order taker introduced themselves, was s/he calm or in hurry.\r\n\r\n    ii. Any recommendations or just jolting down the order. \r\n\r\n    iii. Any upselling towards Appetizer/,Mocktails/Deserts. \r\n\r\n    iv. Order repeated. \r\n\r\n    v. Order Time (committed vs actual). \r\n\r\n    vi. Was the table ready with setup (knife, fork etc.). \r\n\r\n    vii. Any other comments you deem fit.', '', '    . Did order taker introduced themselves, was s/he calm or in hurry.\r\n\r\n    ii. Any recommendations or just jolting down the order. \r\n\r\n    iii. Any upselling towards Appetizer/,Mocktails/Deserts. \r\n\r\n    iv. Order repeated. \r\n\r\n    v. Order Time (committed vs actual). \r\n\r\n    vi. Was the table ready with setup (knife, fork etc.). \r\n\r\n    vii. Any other comments you deem fit. ', '    . Did order taker introduced themselves, was s/he calm or in hurry.\r\n\r\n    ii. Any recommendations or just jolting down the order. \r\n\r\n    iii. Any upselling towards Appetizer/,Mocktails/Deserts. \r\n\r\n    iv. Order repeated. \r\n\r\n    v. Order Time (committed vs actual). \r\n\r\n    vi. Was the table ready with setup (knife, fork etc.). \r\n\r\n    vii. Any other comments you deem fit. ', '', 'sa', 'gjkjkg', '    . Did order taker introduced themselves, was s/he calm or in hurry.\r\n\r\n    ii. Any recommendations or just jolting down the order. \r\n\r\n    iii. Any upselling towards Appetizer/,Mocktails/Deserts. \r\n\r\n    iv. Order repeated. \r\n\r\n    v. Order Time (committed vs actual). \r\n\r\n    vi. Was the table ready with setup (knife, fork etc.). \r\n\r\n    vii. Any other comments you deem fit. ', 'gjkgjkg', 'bg-image24.jpg', 'bg-image25.jpg', 'bg-image26.jpg', '', ''),
(84, 36, 'Sindhi Muslim', '2018-07-12', '16:05:00', 5, 4, 'asif', 'samad', 'Cleaned', 'clean', 'smile', 'yes', 'abc', 'abc', 'clean', 'Readable', 'no', 'clean', 'jkajsldfj lajdflkajsd;lkfj;aljkd ajksdhf ajhdfla\r\nas dfjahdjkfhajkdhsf \r\na dfajkhdfkjahldsadjkhf a\r\njadhfjkahdskjhfa had\r\ns dkjfahdsfkas d\r\nadsjhajkdhf a\r\nhasjdf ajdhjfahsdfh ajda\r\n adjkfhakjdfha  ahjdhf kajhdjah akub gt bin the an', 'jkajsldfj lajdflkajsd;lkfj;aljkd ajksdhf ajhdfla\r\nas dfjahdjkfhajkdhsf \r\na dfajkhdfkjahldsadjkhf a\r\njadhfjkahdskjhfa had\r\ns dkjfahdsfkas d\r\nadsjhajkdhf a\r\nhasjdf ajdhjfahsdfh ajda\r\n adjkfhakjdfha  ahjdhf kajhdjah akub gt bin the an', 'jkhasldjkhajsdhf \'a dsjkahsd f\r\nhjkhl kjads\r\n akjlsdh ', 'ajshf jaksdhf laksjdhf ', 'jhalksjdhf asjdkfahlkshdf\r\na sdjfkhadfjs ', '', 'yes', 'lkjaskldjflk;asdj', 'jhkadsf jklahsdl jsdh', 'kjsadfkljals;kdjfl;kjs', 'Captain_America_The_First_Avenger_2011_BluRay_Screen_2.PNG', 'Captain_America_The_First_Avenger_2011_BluRay_Screens_2.png', 'Captain_America_The_First_Avenger_Poster.jpg', 'Captain_America_The_First_Avenger_2011_BluRay_Screen_4.PNG', 'Captain_America_The_First_Avenger_2011_BluRay_Screens_1.png'),
(85, 0, 'Pindi Branch', '2018-07-24', '10:05:00', -5, 0, '', '', 'ABC', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132', 'Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132Aa123131313132131313132', '', 'C', 'D', '', '123', '231', '', '', 'Screen_Shot_2014-09-26_at_8_28_50_AM3.png', '', 'Screen_Shot_2014-09-26_at_8_28_50_AM4.png', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_assignment`
--
ALTER TABLE `client_assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `client_assignment_citybifraction`
--
ALTER TABLE `client_assignment_citybifraction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mysteryshopper`
--
ALTER TABLE `mysteryshopper`
  ADD PRIMARY KEY (`mysteryShopper_id`),
  ADD KEY `FK_User_id` (`user_id`);

--
-- Indexes for table `mysteryshopperusers`
--
ALTER TABLE `mysteryshopperusers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `mysteryshopper_assignment`
--
ALTER TABLE `mysteryshopper_assignment`
  ADD PRIMARY KEY (`mysteryShopper_assignment_id`),
  ADD KEY `FK_mysteryShopper_client_id` (`mysteryShopper_client_id`),
  ADD KEY `FK_mysteryShopper_id` (`mysteryShopper_id`);

--
-- Indexes for table `mysteryshopper_client`
--
ALTER TABLE `mysteryshopper_client`
  ADD PRIMARY KEY (`mysteryShopper_client_id`),
  ADD UNIQUE KEY `unique_index` (`mysteryShopper_client_name`,`mysteryShopper_client_owner_name`),
  ADD KEY `FK_User_id_client` (`user_id`);

--
-- Indexes for table `mysteryshopper_client_branch`
--
ALTER TABLE `mysteryshopper_client_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `mysteryshopper_online_review`
--
ALTER TABLE `mysteryshopper_online_review`
  ADD PRIMARY KEY (`online_review_id`),
  ADD KEY `FK_mysteryShopper_assignment_id` (`mysteryShopper_assignment_id`);

--
-- Indexes for table `mystery_shopper_review`
--
ALTER TABLE `mystery_shopper_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `mysteryShopper_assignment_id` (`mysteryShopper_assignment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_assignment`
--
ALTER TABLE `client_assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `client_assignment_citybifraction`
--
ALTER TABLE `client_assignment_citybifraction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mysteryshopper`
--
ALTER TABLE `mysteryshopper`
  MODIFY `mysteryShopper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `mysteryshopperusers`
--
ALTER TABLE `mysteryshopperusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `mysteryshopper_assignment`
--
ALTER TABLE `mysteryshopper_assignment`
  MODIFY `mysteryShopper_assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `mysteryshopper_client`
--
ALTER TABLE `mysteryshopper_client`
  MODIFY `mysteryShopper_client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `mysteryshopper_client_branch`
--
ALTER TABLE `mysteryshopper_client_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mysteryshopper_online_review`
--
ALTER TABLE `mysteryshopper_online_review`
  MODIFY `online_review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mystery_shopper_review`
--
ALTER TABLE `mystery_shopper_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mysteryshopper`
--
ALTER TABLE `mysteryshopper`
  ADD CONSTRAINT `FK_User_id` FOREIGN KEY (`user_id`) REFERENCES `mysteryshopperusers` (`user_id`);

--
-- Constraints for table `mysteryshopper_assignment`
--
ALTER TABLE `mysteryshopper_assignment`
  ADD CONSTRAINT `mysteryshopper_assignment_ibfk_1` FOREIGN KEY (`mysteryShopper_id`) REFERENCES `mysteryshopperusers` (`user_id`);

--
-- Constraints for table `mysteryshopper_client`
--
ALTER TABLE `mysteryshopper_client`
  ADD CONSTRAINT `FK_User_id_client` FOREIGN KEY (`user_id`) REFERENCES `mysteryshopperusers` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

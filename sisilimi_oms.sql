-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2022 at 08:42 PM
-- Server version: 5.7.37
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisilimi_oms`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `country`, `status`) VALUES
(1, 'Toyota', 'Japan', 'active'),
(2, 'Suzuki', 'USA', 'active'),
(3, 'Nissan', 'Japan', 'active'),
(4, 'Daihatsu', 'Japan', 'active'),
(5, 'Honda', 'Japan', 'active'),
(6, 'Mazda', 'Japan', 'active'),
(7, 'Mitsubishi', 'Japan', 'active'),
(8, 'Subaru', 'Japan', 'active'),
(9, 'Volkswagen', 'Germany', 'active'),
(10, 'BMW', 'Germany', 'active'),
(11, 'Audi', 'America', 'active'),
(12, 'Mercedes', 'Germany', 'active'),
(13, 'Volvo', 'Japan', 'active'),
(14, 'Lexus', 'America', 'active'),
(15, 'Isuzu', 'Germany', 'active'),
(16, 'Peugeot', 'Japan', 'active'),
(17, 'Fiat', 'Japan', 'active'),
(18, 'Hino', 'Germany', 'active'),
(19, '4runner', '', 'active'),
(20, '4runner', '', 'active'),
(21, 'allex', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `calllogs`
--

CREATE TABLE `calllogs` (
  `id` int(11) NOT NULL,
  `prospectiveid` int(11) DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `calltype` varchar(10) DEFAULT NULL,
  `contactedPerson` varchar(20) DEFAULT NULL,
  `doc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calllogs`
--

INSERT INTO `calllogs` (`id`, `prospectiveid`, `clientid`, `createdby`, `calltype`, `contactedPerson`, `doc`, `status`) VALUES
(1, 2, 7, 1, 'new', '0756258741', '2021-03-26 00:00:00', 'active'),
(2, 2, 7, 1, 'new', '0756258741', '2021-03-26 00:00:00', 'active'),
(3, 2, 7, 1, 'new', '0756258741', '2021-03-26 00:00:00', 'active'),
(4, 1, 5, 1, 'new', '0757404846', '2021-03-26 00:00:00', 'active'),
(5, 4, 5, 1, 'new', '0757404846', '2021-03-26 00:00:00', 'active'),
(6, 5, 10, 1, 'new', '', '2021-03-26 00:00:00', 'active'),
(7, 5, 10, 1, 'new', '', '2021-03-26 00:00:00', 'active'),
(8, 5, 10, 1, 'new', '', '2021-03-26 00:00:00', 'active'),
(9, 6, 5, 1, 'new', '0757404846', '2021-03-26 00:00:00', 'active'),
(10, 7, 5, 1, 'new', '0757404846', '2021-03-26 00:00:00', 'active'),
(11, 3, 10, 3, 'new', '', '2021-03-29 00:00:00', 'active'),
(12, 1, 5, 3, 'new', '757404846', '2021-03-29 00:00:00', 'active'),
(13, 32, 14, 1, 'new', '767292917', '2021-05-26 23:13:14', 'active'),
(14, 2, 7, 1, 'new', '756258741', '2021-05-26 23:16:31', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `calllog_details`
--

CREATE TABLE `calllog_details` (
  `id` int(11) NOT NULL,
  `calllogid` int(11) NOT NULL,
  `callstatusid` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calllog_details`
--

INSERT INTO `calllog_details` (`id`, `calllogid`, `callstatusid`, `product`, `remarks`) VALUES
(1, 1, 1, 'Used Car Purchace', 'Here are Some Remarks'),
(2, 2, 1, 'Used Car Purchace', 'Here are Some Remarks'),
(3, 3, 1, 'Used Car Purchace', 'Here are Some Remarks'),
(4, 4, 1, 'Used Car Purchace', 'Some Remarks'),
(5, 5, 1, 'Machienery', 'afas'),
(6, 6, 1, 'Used Car Purchace', 'asfdasdf'),
(7, 7, 1, 'Used Car Purchace', 'asfdasdf'),
(8, 8, 1, 'Used Car Purchace', 'asfdasdf'),
(9, 9, 1, 'Used Car Purchace', 'asfasdf'),
(10, 10, 3, 'Used Car Purchace', 'asdfasfa'),
(11, 10, 1, 'Used Car Purchace', 'asfasdf'),
(12, 10, 2, 'Clearing Service', ''),
(13, 10, 1, 'Used Car Purchace', 'asdfasdf'),
(14, 11, 3, 'Used Car Purchace', 'fsfdfg'),
(15, 12, 3, 'Machienery', 'asfasdf'),
(16, 13, 3, 'Used Car Purchace', 'This is just for testing'),
(17, 14, 3, 'Clearing Service', 'Today'),
(18, 14, 1, 'Machienery', 'Remarks');

-- --------------------------------------------------------

--
-- Table structure for table `callstatus`
--

CREATE TABLE `callstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `callstatus`
--

INSERT INTO `callstatus` (`id`, `name`, `status`) VALUES
(1, 'Won -  Generate Lead', 'active'),
(2, 'Lost - Not Interested', 'active'),
(3, 'Follow Up', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `makeid` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brandid`, `makeid`, `year`, `status`) VALUES
(1, 1, 1, 2004, 'active'),
(2, 1, 2, 2013, 'active'),
(3, 1, 1, 2012, 'active'),
(4, 2, 1, 2015, 'inactive'),
(5, 2, 2, 2010, 'inactive'),
(6, 1, 80, 2008, 'active'),
(7, 1, 80, 2011, 'active'),
(8, 1, 6, 2007, 'active'),
(9, 1, 76, 2006, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `tin_no` varchar(12) DEFAULT NULL,
  `nida` varchar(255) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `status` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `address`, `tin_no`, `nida`, `website`, `email`, `status`) VALUES
(1, 'name', 'phone', 'address', 'tin_no', 'nida', 'website', 'email', 'status'),
(5, 'aika Mallya', '757404846', 'P.O.Box Posta Dar es Salaam', '123012478', '167971969', NULL, 'emanuelbariki01@gmail.com', 'active'),
(6, 'Emanuel Bariki', '757404846', 'Dar es salaam', '123012478', '314956920', NULL, 'emanuelbariki01@gmail.com', 'active'),
(7, 'Joseph Kadula', '756258741', 'Samora ', '255458784', '503554662', 'www.power.co.tz ', 'lucianaseverini2@gmail.com', 'active'),
(8, 'John Nikko', '768157467', 'Posta', '14757486', '751255020', 'www.power.co.tz ', 'franciskintungi@gmail.com', 'active'),
(9, 'Emanuel John', NULL, NULL, NULL, '529282541', NULL, NULL, 'active'),
(10, 'John Kimario', NULL, NULL, NULL, '723242733', NULL, NULL, 'active'),
(11, 'David Julius', '756985635', 'Arusha', '258963258', '33459240', NULL, NULL, 'active'),
(12, 'SKYLARK BATTERIES LTD.', '783643856', 'P.O.BOX ', '100188120', '594433118', NULL, NULL, 'active'),
(13, 'BAGS R Us LTD', '746676206', 'P.O.BOX 3516', '123506456', '703034653', NULL, NULL, 'active'),
(14, 'MEGA WOODCRAFT PRODUCTS (', '767292917', 'P.O.BOX 1762', '102555171', '879923305', NULL, NULL, 'active'),
(15, 'S.E PAINTS  LIMITED', '715275252', 'UMOJA STREET PLOT 21 ', '134001801', '277980019', NULL, NULL, 'active'),
(16, 'AZIZ KAYAMALI VALIBHAI T/', '652504828', 'P.O.BOX 3780 DSM  ', '104756301', '992761410', NULL, NULL, 'active'),
(17, 'MURAD SALEH JUMA MOBILE P', '715559325', 'P.O.BOX 10789', '115157426', '306498593', NULL, NULL, 'active'),
(18, 'SUNFRESH LIMITED', '682386772', 'P.O.BOX 20922', '100224844', '720067423', NULL, NULL, 'active'),
(19, 'TRIDENT CLEARING LIMITED', '682386772', 'P.O.BOX 5998', '105627246', '452021896', NULL, NULL, 'active'),
(20, 'GARDENIA TOWERS LTD', '653733663', 'P.O.BOX 5991', '117755223', '783055336', NULL, NULL, 'active'),
(21, 'KIGOMA HILLTOP HOTEL LIMI', '784727252', 'P.O.BOX 20965', '100132052', '930762124', NULL, NULL, 'active'),
(22, 'Genuine Hardware Supplies', '689388620', 'P.O.BOX 20070', '105670664', '989496856', NULL, NULL, 'active'),
(23, 'MBS INTERNATIONAL LTD', '756002497', 'P.O.BOX 7770  ', '128342486', '494050091', NULL, NULL, 'active'),
(24, 'ELISHA S BABY BOUTIQUE', '620888144', 'P.O.BOX 11718', '114591149', '826310215', NULL, NULL, 'active'),
(25, 'LEWIN SEURITY COMPANY  LI', '620888144', 'P.O.BOX 76870 DSM ', '132079668', '504626584', NULL, NULL, 'active'),
(26, 'MUHSIN A H DAMJI', '784284932', 'P.O.BOX 213SINGIDA  NYERERE ROAD', '100111322', '144128987', NULL, NULL, 'active'),
(27, 'MR ANIS YUSUF MAMDANI', NULL, 'P.O. BOX 4850', '102532937', '687351074', NULL, NULL, 'active'),
(28, 'Emanuel John', '0754156985', 'Arusha', '125474157', '529282541', '', '', 'active'),
(29, 'Emanuel John', '0585474741', '', '', '529282541', '', '', 'active'),
(30, 'Alaph', '0798789987', 'Dsm', '321123321', '-', 'www.alaph.com', 'info@alaph.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `consignment_costs`
--

CREATE TABLE `consignment_costs` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cost_groupid` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consignment_costs`
--

INSERT INTO `consignment_costs` (`id`, `name`, `cost_groupid`, `createdby`, `status`) VALUES
(1, 'Port Chages', 2, 1, 'active'),
(2, 'Car Deposit', 1, 1, 'active'),
(3, 'Service Charges', 2, 1, 'active'),
(6, 'Container Deposit', 1, 1, 'active'),
(7, 'Facilization', 2, 1, 'active'),
(8, 'LCL', 2, 1, 'active'),
(9, 'Commision', 3, 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `consignment_types`
--

CREATE TABLE `consignment_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `doc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consignment_types`
--

INSERT INTO `consignment_types` (`id`, `name`, `doc`, `status`) VALUES
(1, 'Automobile', '2021-02-21 21:36:49', 'active'),
(2, 'Container', '2021-02-21 21:37:09', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cost_groups`
--

CREATE TABLE `cost_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `taxed` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cost_groups`
--

INSERT INTO `cost_groups` (`id`, `name`, `taxed`, `status`) VALUES
(1, 'CIF', 0, 'active'),
(2, 'Clearing & Fowarding', 0, 'active'),
(3, 'Commision', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `followups`
--

CREATE TABLE `followups` (
  `id` int(11) NOT NULL,
  `calllogid` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `doc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `followup_date` date NOT NULL,
  `done` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followups`
--

INSERT INTO `followups` (`id`, `calllogid`, `createdby`, `doc`, `followup_date`, `done`) VALUES
(1, 10, 1, '2021-03-26 00:00:00', '2021-03-29', 2),
(2, 11, 3, '2021-03-29 00:00:00', '2021-03-29', 1),
(3, 12, 3, '2021-03-29 00:00:00', '2021-03-29', 2),
(4, 13, 1, '2021-05-26 23:13:14', '2021-05-26', 2),
(5, 14, 1, '2021-05-26 23:16:31', '2021-05-26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `leadno` varchar(11) NOT NULL,
  `clientname` varchar(30) NOT NULL,
  `clientphone` varchar(15) NOT NULL,
  `clientemail` varchar(30) NOT NULL,
  `createdby` int(11) NOT NULL,
  `doc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `leadno`, `clientname`, `clientphone`, `clientemail`, `createdby`, `doc`, `status`) VALUES
(1, '', 'John Kimario', '0682833237', 'emanuelbariki01@gmail.com', 1, '2021-01-16 00:00:00', 'active'),
(2, 'CL-01-Array', 'Joseph Kadula', '0756258741', 'lucianaseverini2@gmail.com', 1, '2021-03-26 23:21:27', 'active'),
(3, 'CL-02-Array', 'Joseph Kadula', '0756258741', 'lucianaseverini2@gmail.com', 1, '2021-03-26 23:21:38', 'active'),
(4, 'CL-03-Array', 'Joseph Kadula', '0756258741', 'lucianaseverini2@gmail.com', 1, '2021-03-26 23:22:21', 'active'),
(5, 'CL-04-Array', 'aika Mallya', '0757404846', 'emanuelbariki01@gmail.com', 1, '2021-03-26 23:22:53', 'active'),
(6, '1', 'aika Mallya', '0757404846', 'emanuelbariki01@gmail.com', 1, '2021-03-26 23:23:56', 'active'),
(7, 'CL-08-', 'John Kimario', '', '', 1, '2021-03-26 23:25:14', 'active'),
(8, 'CL-09-8', 'aika Mallya', '0757404846', 'emanuelbariki01@gmail.com', 1, '2021-03-26 23:25:35', 'active'),
(9, 'CL-10-9', 'aika Mallya', '0757404846', 'emanuelbariki01@gmail.com', 1, '2021-03-26 23:26:38', 'active'),
(10, 'CL-10-10', 'aika Mallya', '0757404846', 'emanuelbariki01@gmail.com', 1, '2021-03-26 23:26:38', 'active'),
(11, 'CL-14-11', 'Joseph Kadula', '756258741', 'lucianaseverini2@gmail.com', 1, '2021-05-26 23:16:31', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `lead_details`
--

CREATE TABLE `lead_details` (
  `id` int(11) NOT NULL,
  `leadid` int(11) NOT NULL,
  `carid` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `statusid` int(11) NOT NULL,
  `image` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_details`
--

INSERT INTO `lead_details` (`id`, `leadid`, `carid`, `link`, `amount`, `statusid`, `image`) VALUES
(1, 1, 9, 'https://www.sbtjapan.com/used-cars/toyota/raum/WB2692/', 8000000, 4, '1610789362-raumu-.png'),
(2, 1, 1, 'https://www.sbtjapan.com/used-cars/toyota/ist/EP2007/', 11200000, 4, '1610789363-ist-.png');

-- --------------------------------------------------------

--
-- Table structure for table `lead_status`
--

CREATE TABLE `lead_status` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `createdby` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_status`
--

INSERT INTO `lead_status` (`id`, `name`, `createdby`, `status`) VALUES
(1, 'Open', 1, 'active'),
(2, 'Progress', 1, 'active'),
(3, 'Lost', 1, 'active'),
(4, 'Won', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `makes`
--

CREATE TABLE `makes` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `brandid` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makes`
--

INSERT INTO `makes` (`id`, `name`, `brandid`, `status`) VALUES
(1, 'IST', 1, 'active'),
(2, 'Corolla', 1, 'active'),
(3, '4runner', 1, 'active'),
(4, 'allex', 1, 'active'),
(5, 'allion', 1, 'active'),
(6, 'Alphard', 1, 'active'),
(7, 'alphard hybrid', 1, 'active'),
(8, 'altezza', 1, 'active'),
(9, 'altezza gita', 1, 'active'),
(10, 'aqua', 1, 'active'),
(11, 'aristo', 1, 'active'),
(12, 'auris', 1, 'active'),
(13, 'avalon', 1, 'active'),
(14, 'avanza', 1, 'active'),
(15, 'avensis', 1, 'active'),
(16, 'avensis wagon', 1, 'active'),
(17, 'aygo', 1, 'active'),
(18, 'bb', 1, 'active'),
(19, 'belta', 1, 'active'),
(20, 'blade', 1, 'active'),
(21, 'brevis', 1, 'active'),
(22, 'caldina', 1, 'active'),
(23, 'caldina van', 1, 'active'),
(24, 'camry', 1, 'active'),
(25, 'camry gracia wagon', 1, 'active'),
(26, 'carina', 1, 'active'),
(27, 'carina ed', 1, 'active'),
(28, 'celica', 1, 'active'),
(29, 'celsior', 1, 'active'),
(30, 'century', 1, 'active'),
(31, 'chaser', 1, 'active'),
(32, 'classic', 1, 'active'),
(33, 'coaster', 1, 'active'),
(34, 'corolla', 1, 'active'),
(35, 'corolla altis', 1, 'active'),
(36, 'corolla axio', 1, 'active'),
(37, 'corolla fielder', 1, 'active'),
(38, 'corolla ii', 1, 'active'),
(39, 'corolla levin', 1, 'active'),
(40, 'corolla rumion', 1, 'active'),
(41, 'corolla runx', 1, 'active'),
(42, 'corolla spacio', 1, 'active'),
(43, 'corolla sport', 1, 'active'),
(44, 'corolla touring', 1, 'active'),
(45, 'crown', 1, 'active'),
(46, 'crown comfort', 1, 'active'),
(47, 'crown estate', 1, 'active'),
(48, 'crown hybrid', 1, 'active'),
(49, 'crown majesta', 1, 'active'),
(50, 'crown stationwagon', 1, 'active'),
(51, 'crown van', 1, 'active'),
(52, 'crown wagon', 1, 'active'),
(53, 'harrier', 1, 'active'),
(54, 'harrier hybrid', 1, 'active'),
(55, 'hiace commuter', 1, 'active'),
(56, 'hiace truck', 1, 'active'),
(57, 'hiace van', 1, 'active'),
(58, 'hiace wagon', 1, 'active'),
(59, 'hilux', 1, 'active'),
(60, 'ipsum', 1, 'active'),
(61, 'kluger', 1, 'active'),
(62, 'land cruiser', 1, 'active'),
(63, 'land cruiser prado', 1, 'active'),
(64, 'mark ii', 1, 'active'),
(65, 'mark x', 1, 'active'),
(66, 'nadia', 1, 'active'),
(67, 'noah', 1, 'active'),
(68, 'Passo', 1, 'active'),
(69, 'passo sette', 1, 'active'),
(70, 'porte', 1, 'active'),
(71, '', 0, 'active'),
(72, 'Premio', 1, 'active'),
(73, 'Prius', 1, 'active'),
(74, 'prius alpha', 1, 'active'),
(75, 'Ractis', 1, 'active'),
(76, 'Raum', 1, 'active'),
(77, 'Rav4', 1, 'active'),
(78, 'Rush', 1, 'active'),
(79, 'Sienta', 1, 'active'),
(80, 'Vanguard', 1, 'active'),
(81, 'Wish', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `sortno` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `label`, `module`, `action`, `icon`, `sortno`, `status`) VALUES
(1, 'Masters', '', '', 'fe-battery-charging', 1, 1),
(3, 'Reports', 'debtors', 'index', 'fe-trending-up', 20, 1),
(4, 'Leads', 'leads', 'index', 'fe-crosshair', 2, 1),
(5, 'Orders', 'orders', 'index', 'fe-shopping-bag', 3, 1),
(6, 'Tasks', 'tickets', 'index', 'fe-slack', 4, 1),
(7, 'Prospectives', '', '', 'fe-phone-call', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderno` varchar(10) NOT NULL,
  `leadno` int(10) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `consignment_type` int(11) NOT NULL DEFAULT '1',
  `carid` int(11) NOT NULL,
  `caryear` varchar(10) DEFAULT NULL,
  `chassis` varchar(255) DEFAULT NULL,
  `colour` varchar(30) DEFAULT NULL,
  `milage` varchar(10) DEFAULT NULL,
  `eginesize` varchar(20) DEFAULT NULL,
  `transmission` varchar(30) DEFAULT NULL,
  `modelnumber` varchar(30) DEFAULT NULL,
  `drivetype` varchar(10) DEFAULT NULL,
  `container_size` varchar(7) DEFAULT NULL,
  `container_goods` text,
  `container_no` varchar(100) DEFAULT NULL,
  `shipname` varchar(20) NOT NULL,
  `fromport` varchar(20) NOT NULL,
  `toport` varchar(20) NOT NULL,
  `etd` date DEFAULT NULL,
  `eta` date DEFAULT NULL,
  `statusid` int(11) NOT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderno`, `leadno`, `date`, `createdby`, `clientid`, `consignment_type`, `carid`, `caryear`, `chassis`, `colour`, `milage`, `eginesize`, `transmission`, `modelnumber`, `drivetype`, `container_size`, `container_goods`, `container_no`, `shipname`, `fromport`, `toport`, `etd`, `eta`, `statusid`, `image`) VALUES
(1, 'SLO-1', NULL, '2021-01-16 00:00:00', 1, 10, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '2021-03-29', 1, '1610789363-ist-.png'),
(2, 'SLO-2', NULL, '2021-01-16 00:00:00', 1, 10, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mornig Merry', '6', '3', '2021-01-09', '2021-03-29', 8, '1610789363-ist-.png'),
(3, 'SLO-003', NULL, '2021-02-15 00:00:00', 1, 5, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Wambura Solomon', '3', '4', '2021-02-16', '2021-03-29', 1, NULL),
(4, 'SLO-004', NULL, '2021-02-19 00:00:00', 1, 11, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Heroshoma Buj Khalif', '6', '3', '2021-02-27', '2021-03-29', 1, NULL),
(5, 'SLO-005', NULL, '2021-02-20 00:00:00', 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '2021-03-29', 1, NULL),
(6, 'SLO-006', NULL, '2021-02-21 00:00:00', 1, 7, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Alex Lucas', '4', '3', '2021-02-22', '2021-03-29', 1, NULL),
(7, 'SLO-7', NULL, '2021-02-21 00:00:00', 1, 10, 1, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '2021-03-29', 1, '1610789362-raumu-.png'),
(9, 'SLO-008', NULL, '2021-02-21 00:00:00', 3, 5, 1, 1, '2004', 'JZA80-1004956', 'Back', '5600', '1800', NULL, NULL, NULL, NULL, NULL, NULL, 'Morning Line Marrine', '6', '3', '2021-02-24', '2021-03-29', 1, NULL),
(10, 'SLO-010', NULL, '2021-02-23 00:00:00', 3, 8, 2, 0, '', '', '', '', '', NULL, NULL, NULL, '4ft', 'asdf', 'asdf', 'Morning Line Marrine', '6', '3', '2021-02-18', '2021-03-29', 1, NULL),
(11, 'SLO-011', NULL, '2021-03-17 11:59:26', 3, 5, 1, 1, '2005', 'JZA80-1004956J', 'Back', '5600', '1800', NULL, NULL, NULL, NULL, '', '', 'Mornig Merry', '6', '3', '2021-02-01', '2021-03-29', 7, NULL),
(12, 'SLO-012', NULL, '2021-06-19 12:24:44', 1, 20, 1, 1, '2006', 'JZA80-1004956', 'Back', '5600', '1800', 'auto', '001', '2wd', NULL, '', '', 'Morning Line', '6', '3', '2021-06-21', '2021-06-30', 1, NULL),
(13, 'SLO-013', NULL, '2021-06-19 12:26:54', 1, 6, 1, 9, '2003', 'JZA80-1004956', 'Back', '5600', '1800', 'manuel', '001', '2wd', NULL, '', '', 'Morning Line', '6', '3', '2021-06-01', '2021-06-19', 1, NULL),
(14, 'SLO-014', NULL, '2021-06-19 15:34:25', 1, 30, 2, 0, '', '', '', '', '', 'auto', '', '2wd', '4ft', 'Copper', '444aaa', 'Msse', '6', '3', '2021-06-14', '2021-06-19', 1, NULL),
(15, 'SLO-015', NULL, '2022-04-04 20:07:14', 1, 7, 1, 2, '2012', 'Zz', 'Black', '70000', '2000', 'auto', 'Zz', '2wd', NULL, '', '', 'ARNOLD ANTHONY MASHE', '6', '3', '2022-04-01', '2022-04-20', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_comments`
--

CREATE TABLE `order_comments` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createdby` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_comments`
--

INSERT INTO `order_comments` (`id`, `orderid`, `comment`, `createdby`, `date`, `status`) VALUES
(1, 2, 'It would be very nice to have. Bla Bla', 1, '2021-01-01 14:40:51', 'active'),
(2, 2, 'It would be very nice to have', 1, '2021-01-16 14:06:23', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `order_costs`
--

CREATE TABLE `order_costs` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `costid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paid` int(5) NOT NULL DEFAULT '0',
  `paid_amount` int(11) NOT NULL DEFAULT '0',
  `paidby` int(11) NOT NULL,
  `paiddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_costs`
--

INSERT INTO `order_costs` (`id`, `orderid`, `costid`, `amount`, `paid`, `paid_amount`, `paidby`, `paiddate`) VALUES
(1, 2, 6, 300000, 2, 250000, 1, '2021-01-16'),
(2, 2, 2, 900000, 1, 900000, 1, '2021-01-16'),
(3, 2, 8, 600000, 0, 0, 0, '0000-00-00'),
(4, 2, 7, 2000000, 1, 2500000, 1, '2021-05-26'),
(5, 2, 3, 200000, 0, 0, 0, '0000-00-00'),
(6, 2, 1, 150000, 0, 0, 0, '0000-00-00'),
(7, 3, 6, 56000, 1, 56000, 1, '2021-02-19'),
(8, 3, 2, 688000, 0, 0, 0, '0000-00-00'),
(9, 3, 8, 695000, 0, 0, 0, '0000-00-00'),
(10, 3, 8, 365000, 0, 0, 0, '0000-00-00'),
(11, 3, 9, 200000, 0, 0, 0, '0000-00-00'),
(12, 4, 6, 5000000, 0, 0, 0, '0000-00-00'),
(13, 4, 2, 250000, 0, 0, 0, '0000-00-00'),
(14, 4, 3, 65000, 0, 0, 0, '0000-00-00'),
(15, 4, 9, 200000, 0, 0, 0, '0000-00-00'),
(16, 4, 8, 3000000, 0, 0, 0, '0000-00-00'),
(17, 4, 7, 200000, 0, 0, 0, '0000-00-00'),
(18, 6, 3, 250000, 0, 0, 0, '0000-00-00'),
(19, 9, 6, 3500000, 0, 0, 0, '0000-00-00'),
(20, 9, 2, 2500000, 0, 0, 0, '0000-00-00'),
(21, 9, 8, 350000, 0, 0, 0, '0000-00-00'),
(22, 9, 7, 1000000, 0, 0, 0, '0000-00-00'),
(23, 9, 3, 1560000, 0, 0, 0, '0000-00-00'),
(24, 9, 9, 200000, 0, 0, 0, '0000-00-00'),
(25, 0, 1, 200000, 0, 0, 0, '0000-00-00'),
(26, 0, 8, 1500000, 0, 0, 0, '0000-00-00'),
(27, 0, 7, 360000, 0, 0, 0, '0000-00-00'),
(28, 10, 1, 200000, 0, 0, 0, '0000-00-00'),
(29, 11, 2, 5425000, 2, 3500000, 1, '2021-03-17'),
(30, 11, 8, 1000000, 1, 1000000, 1, '2021-03-17'),
(31, 11, 7, 500000, 0, 0, 0, '0000-00-00'),
(32, 11, 3, 2500000, 0, 0, 0, '0000-00-00'),
(33, 11, 1, 600000, 1, 3500000, 1, '2021-03-17'),
(34, 11, 9, 225000, 0, 0, 0, '0000-00-00'),
(35, 12, 2, 5000000, 0, 0, 0, '0000-00-00'),
(36, 12, 1, 3000000, 0, 0, 0, '0000-00-00'),
(37, 12, 8, 2000000, 0, 0, 0, '0000-00-00'),
(38, 12, 7, 100000, 0, 0, 0, '0000-00-00'),
(39, 12, 3, 400000, 0, 0, 0, '0000-00-00'),
(40, 12, 9, 500000, 0, 0, 0, '0000-00-00'),
(41, 13, 2, 1500000, 0, 0, 0, '0000-00-00'),
(42, 13, 3, 3000000, 0, 0, 0, '0000-00-00'),
(43, 13, 1, 1000000, 0, 0, 0, '0000-00-00'),
(44, 13, 8, 2000000, 0, 0, 0, '0000-00-00'),
(45, 13, 7, 100000, 0, 0, 0, '0000-00-00'),
(46, 13, 9, 400000, 0, 0, 0, '0000-00-00'),
(47, 14, 6, 5000000, 0, 0, 0, '0000-00-00'),
(48, 14, 8, 2000000, 0, 0, 0, '0000-00-00'),
(49, 14, 3, 5000000, 0, 0, 0, '0000-00-00'),
(50, 14, 9, 4000000, 0, 0, 0, '0000-00-00'),
(51, 15, 2, 6000000, 0, 0, 0, '0000-00-00'),
(52, 15, 3, 600000, 0, 0, 0, '0000-00-00'),
(53, 15, 7, 200000, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `carid` int(11) NOT NULL,
  `remarks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details_status`
--

CREATE TABLE `order_details_status` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `order_statusid` int(11) NOT NULL,
  `assignedto` int(11) NOT NULL,
  `done` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details_status`
--

INSERT INTO `order_details_status` (`id`, `orderid`, `order_statusid`, `assignedto`, `done`, `remarks`, `file`, `date`) VALUES
(1, 2, 1, 1, 1, '', '', '2021-01-16'),
(2, 2, 3, 3, 1, '', '', NULL),
(3, 2, 2, 3, 1, 'asdfasdf', '1610790613-For Production.pdf', '2021-01-16'),
(4, 2, 4, 3, 1, '', '', '2021-01-16'),
(5, 2, 5, 3, 1, '', '', '2021-01-16'),
(6, 2, 6, 3, 1, '', '1610790768-For Production.pdf', '2021-01-16'),
(7, 2, 7, 3, 1, '', '1610790789-Memorandum and articles of association (Sample) (1)_4.doc', '2021-01-16'),
(8, 2, 8, 2, 1, '', '1622060499-16220604430088692407366357189722.jpg', '2021-05-26'),
(9, 2, 9, 3, 1, 'Some Remarks', '1610791876-', '2021-01-16'),
(10, 2, 10, 3, 0, '', '', NULL),
(11, 2, 11, 3, 1, '', '', '2021-05-26'),
(12, 2, 12, 3, 0, '', '', NULL),
(13, 2, 13, 3, 0, '', '', NULL),
(14, 2, 14, 3, 0, '', '', NULL),
(15, 2, 15, 3, 0, '', '', NULL),
(16, 2, 16, 3, 0, '', '', NULL),
(17, 2, 17, 3, 0, '', '', NULL),
(18, 2, 18, 3, 0, '', '', NULL),
(19, 2, 19, 3, 0, '', '', NULL),
(20, 2, 20, 3, 0, '', '', NULL),
(21, 3, 1, 1, 1, 'None', '', '2021-02-19'),
(22, 3, 3, 6, 0, '', '', NULL),
(23, 3, 2, 2, 0, '', '', NULL),
(24, 3, 4, 4, 0, '', '', NULL),
(25, 3, 5, 4, 0, '', '', NULL),
(26, 3, 6, 3, 0, '', '', NULL),
(27, 3, 7, 3, 0, '', '', NULL),
(28, 3, 8, 3, 0, '', '', NULL),
(29, 3, 9, 3, 0, '', '', NULL),
(30, 3, 10, 3, 0, '', '', NULL),
(31, 3, 11, 3, 0, '', '', NULL),
(32, 3, 12, 6, 0, '', '', NULL),
(33, 3, 13, 3, 0, '', '', NULL),
(34, 3, 14, 3, 0, '', '', NULL),
(35, 3, 15, 3, 0, '', '', NULL),
(36, 3, 16, 3, 0, '', '', NULL),
(37, 3, 17, 3, 0, '', '', NULL),
(38, 3, 18, 3, 0, '', '', NULL),
(39, 3, 19, 3, 0, '', '', NULL),
(40, 3, 20, 3, 0, '', '', NULL),
(41, 4, 1, 2, 0, '', '', NULL),
(42, 4, 3, 2, 0, '', '', NULL),
(43, 4, 2, 2, 0, '', '', NULL),
(44, 4, 4, 2, 0, '', '', NULL),
(45, 4, 5, 4, 0, '', '', NULL),
(46, 4, 6, 4, 0, '', '', NULL),
(47, 4, 7, 6, 0, '', '', NULL),
(48, 4, 8, 4, 0, '', '', NULL),
(49, 4, 9, 6, 0, '', '', NULL),
(50, 4, 10, 2, 0, '', '', NULL),
(51, 4, 11, 2, 0, '', '', NULL),
(52, 4, 12, 2, 0, '', '', NULL),
(53, 4, 13, 6, 0, '', '', NULL),
(54, 4, 14, 4, 0, '', '', NULL),
(55, 4, 15, 4, 0, '', '', NULL),
(56, 4, 16, 4, 0, '', '', NULL),
(57, 4, 17, 4, 0, '', '', NULL),
(58, 4, 18, 6, 0, '', '', NULL),
(59, 4, 19, 2, 0, '', '', NULL),
(60, 4, 20, 2, 0, '', '', NULL),
(61, 6, 1, 2, 0, '', '', NULL),
(62, 6, 3, 1, 0, '', '', NULL),
(63, 6, 2, 1, 0, '', '', NULL),
(64, 6, 4, 1, 0, '', '', NULL),
(65, 6, 5, 1, 0, '', '', NULL),
(66, 6, 6, 1, 0, '', '', NULL),
(67, 6, 7, 1, 0, '', '', NULL),
(68, 6, 8, 1, 0, '', '', NULL),
(69, 6, 9, 1, 0, '', '', NULL),
(70, 6, 10, 1, 0, '', '', NULL),
(71, 6, 11, 1, 0, '', '', NULL),
(72, 6, 12, 1, 0, '', '', NULL),
(73, 6, 13, 1, 0, '', '', NULL),
(74, 6, 14, 1, 0, '', '', NULL),
(75, 6, 15, 1, 0, '', '', NULL),
(76, 6, 16, 1, 0, '', '', NULL),
(77, 6, 17, 1, 0, '', '', NULL),
(78, 6, 18, 1, 0, '', '', NULL),
(79, 6, 19, 1, 0, '', '', NULL),
(80, 6, 20, 1, 0, '', '', NULL),
(81, 9, 1, 3, 0, '', '', NULL),
(82, 9, 3, 1, 0, '', '', NULL),
(83, 9, 2, 1, 0, '', '', NULL),
(84, 9, 4, 1, 0, '', '', NULL),
(85, 9, 5, 1, 0, '', '', NULL),
(86, 9, 6, 1, 0, '', '', NULL),
(87, 9, 7, 1, 0, '', '', NULL),
(88, 9, 8, 1, 0, '', '', NULL),
(89, 9, 9, 1, 0, '', '', NULL),
(90, 9, 10, 1, 0, '', '', NULL),
(91, 9, 11, 1, 0, '', '', NULL),
(92, 9, 12, 1, 0, '', '', NULL),
(93, 9, 13, 1, 0, '', '', NULL),
(94, 9, 14, 1, 0, '', '', NULL),
(95, 9, 15, 1, 0, '', '', NULL),
(96, 9, 16, 1, 0, '', '', NULL),
(97, 9, 17, 1, 0, '', '', NULL),
(98, 9, 18, 1, 0, '', '', NULL),
(99, 9, 19, 1, 0, '', '', NULL),
(100, 9, 20, 1, 0, '', '', NULL),
(101, 0, 1, 1, 0, '', '', NULL),
(102, 0, 3, 1, 0, '', '', NULL),
(103, 0, 2, 1, 0, '', '', NULL),
(104, 0, 4, 1, 0, '', '', NULL),
(105, 0, 5, 1, 0, '', '', NULL),
(106, 0, 6, 1, 0, '', '', NULL),
(107, 0, 7, 1, 0, '', '', NULL),
(108, 0, 8, 1, 0, '', '', NULL),
(109, 0, 9, 1, 0, '', '', NULL),
(110, 0, 10, 1, 0, '', '', NULL),
(111, 0, 11, 1, 0, '', '', NULL),
(112, 0, 12, 1, 0, '', '', NULL),
(113, 0, 13, 1, 0, '', '', NULL),
(114, 0, 14, 1, 0, '', '', NULL),
(115, 0, 15, 1, 0, '', '', NULL),
(116, 0, 16, 1, 0, '', '', NULL),
(117, 0, 17, 1, 0, '', '', NULL),
(118, 0, 18, 1, 0, '', '', NULL),
(119, 0, 19, 1, 0, '', '', NULL),
(120, 0, 20, 1, 0, '', '', NULL),
(121, 10, 1, 1, 0, '', '', NULL),
(122, 10, 3, 1, 0, '', '', NULL),
(123, 10, 2, 1, 0, '', '', NULL),
(124, 10, 4, 1, 0, '', '', NULL),
(125, 10, 5, 1, 0, '', '', NULL),
(126, 10, 6, 1, 0, '', '', NULL),
(127, 10, 7, 1, 0, '', '', NULL),
(128, 10, 8, 1, 0, '', '', NULL),
(129, 10, 9, 1, 0, '', '', NULL),
(130, 10, 10, 1, 0, '', '', NULL),
(131, 10, 11, 1, 0, '', '', NULL),
(132, 10, 12, 1, 0, '', '', NULL),
(133, 10, 13, 1, 0, '', '', NULL),
(134, 10, 14, 1, 0, '', '', NULL),
(135, 10, 15, 1, 0, '', '', NULL),
(136, 10, 16, 1, 0, '', '', NULL),
(137, 10, 17, 1, 0, '', '', NULL),
(138, 10, 18, 1, 0, '', '', NULL),
(139, 10, 19, 1, 0, '', '', NULL),
(140, 10, 20, 1, 0, '', '', NULL),
(141, 11, 1, 2, 1, '', '', '2021-03-17'),
(142, 11, 3, 1, 1, '', '1615973714-sample_products.csv', '2021-03-17'),
(143, 11, 2, 1, 1, '', '1615973744-sample_tax_rates.csv', '2021-03-17'),
(144, 11, 4, 1, 1, '', '', '2021-03-17'),
(145, 11, 5, 1, 1, '', '', '2021-03-17'),
(146, 11, 6, 1, 1, '', '1615973805-sample_tax_rates.csv', '2021-03-17'),
(147, 11, 7, 1, 1, '', '1615974142-sample_products.csv', '2021-03-17'),
(148, 11, 8, 1, 0, '', '', NULL),
(149, 11, 9, 1, 0, '', '', NULL),
(150, 11, 10, 1, 0, '', '', NULL),
(151, 11, 11, 1, 0, '', '', NULL),
(152, 11, 12, 1, 0, '', '', NULL),
(153, 11, 13, 1, 0, '', '', NULL),
(154, 11, 14, 1, 0, '', '', NULL),
(155, 11, 15, 1, 0, '', '', NULL),
(156, 11, 16, 1, 0, '', '', NULL),
(157, 11, 17, 1, 0, '', '', NULL),
(158, 11, 18, 1, 0, '', '', NULL),
(159, 11, 19, 1, 0, '', '', NULL),
(160, 11, 20, 1, 0, '', '', NULL),
(161, 12, 1, 1, 0, '', '', NULL),
(162, 12, 3, 1, 0, '', '', NULL),
(163, 12, 2, 1, 0, '', '', NULL),
(164, 12, 4, 1, 0, '', '', NULL),
(165, 12, 5, 1, 0, '', '', NULL),
(166, 12, 6, 1, 0, '', '', NULL),
(167, 12, 7, 1, 0, '', '', NULL),
(168, 12, 8, 1, 0, '', '', NULL),
(169, 12, 9, 1, 0, '', '', NULL),
(170, 12, 10, 1, 0, '', '', NULL),
(171, 12, 11, 1, 0, '', '', NULL),
(172, 12, 12, 1, 0, '', '', NULL),
(173, 12, 13, 1, 0, '', '', NULL),
(174, 12, 14, 1, 0, '', '', NULL),
(175, 12, 15, 1, 0, '', '', NULL),
(176, 12, 16, 1, 0, '', '', NULL),
(177, 12, 17, 1, 0, '', '', NULL),
(178, 12, 18, 1, 0, '', '', NULL),
(179, 12, 19, 1, 0, '', '', NULL),
(180, 12, 20, 1, 0, '', '', NULL),
(181, 12, 21, 1, 0, '', '', NULL),
(182, 13, 1, 2, 0, '', '', NULL),
(183, 13, 3, 3, 0, '', '', NULL),
(184, 13, 2, 6, 0, '', '', NULL),
(185, 13, 4, 1, 0, '', '', NULL),
(186, 13, 5, 1, 0, '', '', NULL),
(187, 13, 6, 1, 0, '', '', NULL),
(188, 13, 7, 1, 0, '', '', NULL),
(189, 13, 8, 1, 0, '', '', NULL),
(190, 13, 9, 1, 0, '', '', NULL),
(191, 13, 10, 1, 0, '', '', NULL),
(192, 13, 11, 1, 0, '', '', NULL),
(193, 13, 12, 1, 0, '', '', NULL),
(194, 13, 13, 1, 0, '', '', NULL),
(195, 13, 14, 1, 0, '', '', NULL),
(196, 13, 15, 1, 0, '', '', NULL),
(197, 13, 16, 1, 0, '', '', NULL),
(198, 13, 17, 1, 0, '', '', NULL),
(199, 13, 18, 1, 0, '', '', NULL),
(200, 13, 19, 1, 0, '', '', NULL),
(201, 13, 20, 1, 0, '', '', NULL),
(202, 13, 21, 1, 0, '', '', NULL),
(203, 14, 1, 1, 0, '', '', NULL),
(204, 14, 3, 1, 0, '', '', NULL),
(205, 14, 2, 1, 0, '', '', NULL),
(206, 14, 4, 1, 0, '', '', NULL),
(207, 14, 5, 1, 0, '', '', NULL),
(208, 14, 6, 1, 0, '', '', NULL),
(209, 14, 7, 1, 0, '', '', NULL),
(210, 14, 8, 1, 0, '', '', NULL),
(211, 14, 9, 1, 0, '', '', NULL),
(212, 14, 10, 1, 0, '', '', NULL),
(213, 14, 11, 1, 0, '', '', NULL),
(214, 14, 12, 1, 0, '', '', NULL),
(215, 14, 13, 1, 0, '', '', NULL),
(216, 14, 14, 1, 0, '', '', NULL),
(217, 14, 15, 1, 0, '', '', NULL),
(218, 14, 16, 1, 0, '', '', NULL),
(219, 14, 17, 1, 0, '', '', NULL),
(220, 14, 18, 1, 0, '', '', NULL),
(221, 14, 19, 1, 0, '', '', NULL),
(222, 14, 20, 1, 0, '', '', NULL),
(223, 14, 21, 1, 0, '', '', NULL),
(224, 15, 1, 1, 0, '', '', NULL),
(225, 15, 3, 1, 0, '', '', NULL),
(226, 15, 2, 1, 0, '', '', NULL),
(227, 15, 4, 1, 0, '', '', NULL),
(228, 15, 5, 1, 0, '', '', NULL),
(229, 15, 6, 1, 0, '', '', NULL),
(230, 15, 7, 1, 0, '', '', NULL),
(231, 15, 8, 1, 0, '', '', NULL),
(232, 15, 9, 1, 0, '', '', NULL),
(233, 15, 10, 1, 0, '', '', NULL),
(234, 15, 11, 1, 0, '', '', NULL),
(235, 15, 12, 1, 0, '', '', NULL),
(236, 15, 13, 1, 0, '', '', NULL),
(237, 15, 14, 1, 0, '', '', NULL),
(238, 15, 15, 1, 0, '', '', NULL),
(239, 15, 16, 1, 0, '', '', NULL),
(240, 15, 17, 1, 0, '', '', NULL),
(241, 15, 18, 1, 0, '', '', NULL),
(242, 15, 19, 1, 0, '', '', NULL),
(243, 15, 20, 1, 0, '', '', NULL),
(244, 15, 21, 1, 0, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sortno` int(11) NOT NULL,
  `sendsms` int(11) NOT NULL,
  `sms` text,
  `fileupload` int(2) NOT NULL DEFAULT '0',
  `payments` int(11) NOT NULL DEFAULT '1',
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`, `sortno`, `sendsms`, `sms`, `fileupload`, `payments`, `status`) VALUES
(1, 'Order Placed', 1, 0, NULL, 0, 1, 'active'),
(2, 'Shipped', 2, 0, NULL, 1, 1, 'active'),
(3, 'Document Recieved', 1, 1, NULL, 1, 0, 'active'),
(4, 'Documents Assigned to Job Task', 3, 0, NULL, 0, 0, 'active'),
(5, 'Initial Assesment', 4, 0, NULL, 0, 0, 'active'),
(6, 'Final Assesment', 5, 1, NULL, 1, 0, 'active'),
(7, 'TBS Invoice & Taxes Paid', 6, 1, NULL, 1, 1, 'active'),
(8, 'S/Order Delivery Order', 7, 0, NULL, 1, 0, 'active'),
(9, 'Shipping Charges Paid', 8, 1, NULL, 1, 1, 'active'),
(10, 'Delivery Order Obtained', 9, 0, NULL, 1, 0, 'active'),
(11, 'Manifest Compared', 10, 0, NULL, 0, 1, 'active'),
(12, 'Wharfage Issued', 11, 0, NULL, 0, 0, 'active'),
(13, 'Wharfage Paid', 12, 0, NULL, 1, 1, 'active'),
(14, 'Verification Booked', 13, 0, NULL, 0, 0, 'active'),
(15, 'TBS Released', 14, 1, NULL, 1, 1, 'active'),
(16, 'TBS Remarks Submitted', 15, 1, NULL, 0, 0, 'active'),
(17, 'Release Order Obtained', 17, 1, NULL, 1, 0, 'active'),
(18, 'TPA / ICD Charges Applied', 18, 0, NULL, 1, 1, 'active'),
(19, 'Gate Pass Obtained', 19, 0, NULL, 1, 1, 'active'),
(20, 'Last Status', 20, 1, NULL, 0, 0, 'active'),
(21, 'Status with SMS', 21, 1, 'Dear {custName} , Your order ( {ordeNo} for {carName} documents have been Recieved.', 0, 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `paid_totalmount` varchar(255) NOT NULL,
  `doc` date NOT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `remark` text,
  `chequeno` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `bankreference` varchar(255) DEFAULT NULL,
  `recievedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `orderid`, `paid_totalmount`, `doc`, `payment_type`, `remark`, `chequeno`, `bankname`, `bankreference`, `recievedby`) VALUES
(1, 9, '500000', '2021-06-19', 1, NULL, '', '', '', 1),
(2, 9, '500000', '2021-02-25', 1, NULL, '', '', '', 1),
(3, 9, '500000', '2021-02-25', 1, NULL, '', '', '', 1),
(4, 9, '500000', '2021-02-25', 1, NULL, '', '', '', 1),
(5, 2, '100000000', '2021-02-25', 2, NULL, '0024556851211225', '', '', 1),
(6, 2, '10000000', '2021-02-25', 2, NULL, '1200051916013216541', 'CRDB', '', 1),
(7, 2, '10000000', '2021-02-25', 2, NULL, '1200051916013216541', 'CRDB', '', 1),
(8, 2, '10000000', '2021-02-25', 2, NULL, '1200051916013216541', 'CRDB', '', 1),
(9, 9, '5000000', '2021-03-04', 2, NULL, '001', 'CRDB', '', 1),
(10, 9, '10000000', '2021-03-04', 1, NULL, '001', 'CRDB', '', 1),
(13, 13, '5000000', '2021-06-19', 1, NULL, '', '', '', 1),
(14, 13, '400000', '2021-06-19', 1, NULL, '', '', '', 1),
(15, 13, '5600000', '2021-06-19', 1, NULL, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `doc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `status`, `doc`) VALUES
(1, 'Cash', 'active', '2021-02-25 17:03:45'),
(2, 'Cheque', 'active', '2021-02-25 17:03:45'),
(3, 'Bank Transfer', 'active', '2021-02-25 17:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `ports`
--

CREATE TABLE `ports` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ports`
--

INSERT INTO `ports` (`id`, `name`, `country`, `status`) VALUES
(3, 'Dar es Salaam', 'Tanzania', 'active'),
(4, 'Mombasa', 'Kenya', 'active'),
(5, 'Mombasa', 'Kenya', 'active'),
(6, 'Some JP Port', 'Japan', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `prospectives`
--

CREATE TABLE `prospectives` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `doc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `createdby` int(11) NOT NULL,
  `done` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prospectives`
--

INSERT INTO `prospectives` (`id`, `userid`, `clientid`, `doc`, `date`, `createdby`, `done`) VALUES
(1, 3, 5, '2021-03-23 23:34:59', '2021-03-24', 1, 1),
(2, 3, 7, '2021-03-23 23:34:59', '2021-03-24', 1, 1),
(3, 3, 10, '2021-03-23 23:34:59', '2021-03-24', 1, 2),
(4, 7, 5, '2021-03-23 23:35:56', '2021-03-31', 1, 2),
(5, 7, 10, '2021-03-23 23:35:56', '2021-03-31', 1, 2),
(6, 1, 5, '2021-03-23 23:36:44', '2021-03-26', 1, 2),
(7, 1, 5, '2021-03-23 23:36:55', '2021-03-26', 1, 2),
(8, 2, 10, '2021-03-26 23:30:31', '2021-03-31', 1, 2),
(9, 2, 11, '2021-03-26 23:30:31', '2021-03-31', 1, 2),
(10, 3, 5, '2021-03-29 09:41:01', '2021-03-29', 1, 2),
(11, 3, 7, '2021-03-29 09:41:01', '2021-03-29', 1, 2),
(12, 3, 8, '2021-03-29 09:41:01', '2021-03-29', 1, 2),
(13, 3, 9, '2021-03-29 09:41:01', '2021-03-29', 1, 2),
(14, 3, 10, '2021-03-29 09:41:01', '2021-03-29', 1, 2),
(15, 3, 11, '2021-03-29 09:41:01', '2021-03-29', 1, 2),
(16, 1, 5, '2021-03-29 10:42:26', '2021-03-29', 1, 2),
(17, 1, 6, '2021-03-29 10:42:26', '2021-03-29', 1, 2),
(18, 1, 5, '2021-05-26 23:10:30', '2021-05-27', 1, 2),
(19, 1, 6, '2021-05-26 23:10:30', '2021-05-27', 1, 2),
(20, 1, 7, '2021-05-26 23:10:30', '2021-05-27', 1, 2),
(21, 1, 8, '2021-05-26 23:10:30', '2021-05-27', 1, 2),
(22, 1, 9, '2021-05-26 23:10:30', '2021-05-27', 1, 2),
(23, 1, 12, '2021-05-26 23:10:30', '2021-05-27', 1, 2),
(24, 1, 14, '2021-05-26 23:10:30', '2021-05-27', 1, 2),
(25, 1, 18, '2021-05-26 23:10:30', '2021-05-27', 1, 2),
(26, 1, 21, '2021-05-26 23:10:30', '2021-05-27', 1, 2),
(27, 1, 5, '2021-05-26 23:10:45', '2021-05-26', 1, 2),
(28, 1, 6, '2021-05-26 23:10:45', '2021-05-26', 1, 2),
(29, 1, 7, '2021-05-26 23:10:45', '2021-05-26', 1, 2),
(30, 1, 8, '2021-05-26 23:10:45', '2021-05-26', 1, 2),
(31, 1, 10, '2021-05-26 23:10:45', '2021-05-26', 1, 2),
(32, 1, 14, '2021-05-26 23:10:45', '2021-05-26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `queues`
--

CREATE TABLE `queues` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `doc` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  `dom` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queues`
--

INSERT INTO `queues` (`id`, `name`, `status`, `doc`, `createdby`, `dom`, `modifiedby`) VALUES
(1, 'Cash', 'active', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'Credit', 'active', '0000-00-00 00:00:00', 1, '2018-05-07 08:32:03', 0),
(3, 'NHIF', 'active', '0000-00-00 00:00:00', 1, '2018-05-07 08:32:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `c_d_logo` varchar(100) DEFAULT NULL,
  `c_w_logo` varchar(100) DEFAULT NULL,
  `themecolor` varchar(255) DEFAULT '#3C4854',
  `address` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alert` int(11) NOT NULL COMMENT 'days after end of month for units',
  `redlist` int(11) NOT NULL COMMENT 'no of months for auto red list',
  `emailpass` varchar(255) NOT NULL,
  `emailhost` varchar(255) NOT NULL,
  `emailport` varchar(255) NOT NULL,
  `smsuser` varchar(255) NOT NULL,
  `smspass` varchar(255) NOT NULL,
  `smsname` varchar(255) NOT NULL,
  `emailstat` varchar(255) NOT NULL,
  `smsstat` varchar(255) NOT NULL,
  `startdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `c_d_logo`, `c_w_logo`, `themecolor`, `address`, `street`, `tel`, `mobile`, `tin`, `fax`, `email`, `alert`, `redlist`, `emailpass`, `emailhost`, `emailport`, `smsuser`, `smspass`, `smsname`, `emailstat`, `smsstat`, `startdate`) VALUES
(1, 'SMART INTEGRATED SOLUTIONS INTERNATIONAL  LIMITED', 'assets/images/Sisi-Limited-All-Logos-03.png', 'assets/images/Sisi-Limited-All-Logos-03.png', 'images/sisilimitedlogo.png', '#bab732', 'Samorea ave, Posta <br> P.O.BOX 80751 Dar es Salaam', 'asfdas', '+255738133775', '+255 713514515', ' 104 - 714 - 218', '+255 222126986', 'sales@sisilimited.co.tz', 5, 3, 'ds', 'smtp.gmail.com', '587', 'asdf', 'asdf', '', 'on', 'on', '2017-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `sortno` int(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `menuid`, `label`, `module`, `action`, `sortno`, `status`) VALUES
(3, 1, 'Users', 'user', 'index', 1, 1),
(4, 1, 'Queues', 'queue', 'queue_index', 4, 0),
(15, 4, 'New Lead', 'leads', 'index', 4, 1),
(16, 1, 'Clients', 'clients', 'index', 2, 1),
(17, 1, 'Cars', 'cars', 'index', 5, 1),
(18, 1, 'Brands', 'brands', 'index', 3, 1),
(19, 1, 'Make', 'makes', 'index', 4, 1),
(20, 4, 'All Leads', 'leads', 'leads-list', 4, 1),
(21, 5, 'New Order', 'orders', 'index', 1, 1),
(22, 5, 'All Automobile Orders', 'orders', 'list', 2, 1),
(23, 1, 'Ports', 'ports', 'index', 6, 1),
(24, 1, 'Settings', 'home', 'cs_index', 20, 1),
(25, 1, 'Costs', 'consignment_costs', 'index', 7, 1),
(26, 1, 'Costs Groups', 'cost_groups', 'index', 6, 1),
(27, 1, 'Order Statuses', 'order_status', 'index', 8, 1),
(28, 6, 'All Tasks', 'tickets', 'list', 1, 1),
(29, 6, 'Assign Tasks', 'tickets', 'assign', 1, 1),
(30, 5, 'All Container Orders', 'orders', 'container-list', 3, 1),
(31, 3, 'Payments Reports', 'reports', 'payment', 1, 1),
(32, 3, 'Order Reports', 'reports', 'orders', 2, 0),
(33, 3, 'Order Profit Reports', 'reports', 'order_profit', 3, 1),
(34, 3, 'Task Reports', 'reports', 'tasks', 4, 1),
(35, 7, 'Create Prospects', 'prospectives', 'add', 1, 1),
(36, 7, 'My Prospects', 'prospectives', 'list', 2, 1),
(37, 7, 'My Follow Ups', 'calls', 'followups', 3, 1),
(38, 3, 'Call Log Reports', 'reports', 'calls', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userrights`
--

CREATE TABLE `userrights` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `submenuid` int(11) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) NOT NULL,
  `dom` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modifiedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrights`
--

INSERT INTO `userrights` (`id`, `userid`, `menuid`, `submenuid`, `doc`, `createdby`, `dom`, `modifiedby`) VALUES
(1, 2, 1, 0, '2017-07-12 06:07:55', 1, '0000-00-00 00:00:00', 0),
(2, 2, 2, 4, '2017-07-12 06:07:55', 1, '0000-00-00 00:00:00', 0),
(3, 2, 3, 0, '2017-07-12 06:07:55', 1, '0000-00-00 00:00:00', 0),
(19, 4, 1, 0, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(20, 4, 1, 3, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(21, 4, 1, 16, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(22, 4, 1, 18, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(23, 4, 1, 19, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(24, 4, 1, 17, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(25, 4, 1, 23, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(26, 4, 1, 26, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(27, 4, 1, 25, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(28, 4, 1, 27, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(29, 4, 1, 24, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(30, 4, 4, 0, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(31, 4, 4, 15, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(32, 4, 4, 20, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(33, 4, 5, 0, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(34, 4, 5, 21, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(35, 4, 5, 22, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(36, 4, 6, 0, '2021-02-20 13:42:29', 1, '0000-00-00 00:00:00', 0),
(37, 4, 6, 28, '2021-02-20 13:42:30', 1, '0000-00-00 00:00:00', 0),
(38, 5, 5, 0, '2021-02-20 13:44:38', 1, '0000-00-00 00:00:00', 0),
(39, 5, 5, 21, '2021-02-20 13:44:38', 1, '0000-00-00 00:00:00', 0),
(40, 5, 5, 22, '2021-02-20 13:44:38', 1, '0000-00-00 00:00:00', 0),
(41, 5, 6, 0, '2021-02-20 13:44:38', 1, '0000-00-00 00:00:00', 0),
(42, 5, 6, 28, '2021-02-20 13:44:38', 1, '0000-00-00 00:00:00', 0),
(43, 5, 6, 29, '2021-02-20 13:44:38', 1, '0000-00-00 00:00:00', 0),
(53, 6, 4, 0, '2021-02-20 13:47:31', 1, '0000-00-00 00:00:00', 0),
(54, 6, 4, 15, '2021-02-20 13:47:31', 1, '0000-00-00 00:00:00', 0),
(55, 6, 4, 20, '2021-02-20 13:47:31', 1, '0000-00-00 00:00:00', 0),
(56, 6, 5, 0, '2021-02-20 13:47:31', 1, '0000-00-00 00:00:00', 0),
(57, 6, 5, 21, '2021-02-20 13:47:31', 1, '0000-00-00 00:00:00', 0),
(58, 6, 5, 22, '2021-02-20 13:47:31', 1, '0000-00-00 00:00:00', 0),
(59, 6, 6, 0, '2021-02-20 13:47:31', 1, '0000-00-00 00:00:00', 0),
(60, 6, 6, 28, '2021-02-20 13:47:31', 1, '0000-00-00 00:00:00', 0),
(61, 7, 1, 0, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(62, 7, 1, 3, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(63, 7, 1, 16, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(64, 7, 1, 18, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(65, 7, 1, 19, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(66, 7, 1, 17, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(67, 7, 1, 26, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(68, 7, 1, 23, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(69, 7, 1, 25, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(70, 7, 1, 27, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(71, 7, 1, 24, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(72, 7, 4, 0, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(73, 7, 4, 15, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(74, 7, 4, 20, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(75, 7, 5, 0, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(76, 7, 5, 21, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(77, 7, 5, 22, '2021-02-20 13:52:13', 1, '0000-00-00 00:00:00', 0),
(78, 7, 6, 0, '2021-02-20 13:52:14', 1, '0000-00-00 00:00:00', 0),
(79, 7, 6, 28, '2021-02-20 13:52:14', 1, '0000-00-00 00:00:00', 0),
(80, 7, 3, 0, '2021-02-20 13:52:14', 1, '0000-00-00 00:00:00', 0),
(81, 8, 6, 0, '2021-02-20 13:52:40', 1, '0000-00-00 00:00:00', 0),
(82, 8, 6, 28, '2021-02-20 13:52:40', 1, '0000-00-00 00:00:00', 0),
(83, 3, 4, 0, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(84, 3, 4, 15, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(85, 3, 4, 20, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(86, 3, 5, 0, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(87, 3, 5, 21, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(88, 3, 5, 22, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(89, 3, 6, 0, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(90, 3, 6, 28, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(91, 3, 7, 0, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(92, 3, 7, 35, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(93, 3, 7, 36, '2021-03-29 06:44:05', 1, '0000-00-00 00:00:00', 0),
(94, 3, 7, 37, '2021-03-29 06:44:06', 1, '0000-00-00 00:00:00', 0),
(95, 3, 3, 0, '2021-03-29 06:44:06', 1, '0000-00-00 00:00:00', 0),
(96, 3, 3, 38, '2021-03-29 06:44:06', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '123',
  `name` varchar(255) NOT NULL,
  `roleid` int(11) NOT NULL,
  `locid` int(11) NOT NULL,
  `delete` varchar(255) NOT NULL DEFAULT 'yes' COMMENT 'hardcode for undeletability for main super',
  `status` varchar(255) NOT NULL DEFAULT 'active' COMMENT 'active,inactive',
  `changepass` int(11) DEFAULT '1',
  `help` int(11) NOT NULL DEFAULT '1' COMMENT 'if help dialogs should appear or not',
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) NOT NULL,
  `dom` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) NOT NULL,
  `image` varchar(20) NOT NULL,
  `themecolor` varchar(20) NOT NULL DEFAULT 'light'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `roleid`, `locid`, `delete`, `status`, `changepass`, `help`, `doc`, `createdby`, `dom`, `modifiedby`, `image`, `themecolor`) VALUES
(1, 'admin', '123', 'Super User', 1, 1, 'no', 'active', 0, 0, '2016-01-19 13:41:29', 1, '2017-07-19 12:26:11', 1, 'user-8.jpg', 'light'),
(2, 'john', '123', 'John Nikko', 2, 0, 'yes', 'active', 0, 1, '2021-02-20 11:12:22', 1, '2021-02-20 11:12:22', 2, 'default.jpg', 'light'),
(3, 'aika', '123', 'Aika Mallya', 2, 0, 'yes', 'active', 0, 1, '2021-02-20 11:16:52', 1, '2021-02-20 11:16:52', 3, 'default.jpg', 'light'),
(4, 'sabas', '123', 'Sabas Straton', 2, 0, 'yes', 'active', 0, 1, '2021-02-20 13:42:02', 1, '2021-02-20 13:42:02', 4, 'default.jpg', 'light'),
(6, 'patrick', '123', 'Patrick Mwihenge', 2, 0, 'yes', 'active', 0, 1, '2021-02-20 13:47:14', 1, '2021-02-20 13:47:14', 6, 'default.jpg', 'light'),
(7, 'joseph', '123', 'Joseph Kadula', 2, 0, 'yes', 'active', 1, 1, '2021-02-20 13:51:53', 1, '2021-02-20 13:51:53', 0, 'default.jpg', 'light'),
(8, 'komba', '123', 'Komba', 2, 0, 'yes', 'active', 1, 1, '2021-02-20 13:52:33', 1, '2021-02-20 13:52:33', 0, 'default.jpg', 'light');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calllogs`
--
ALTER TABLE `calllogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calllog_details`
--
ALTER TABLE `calllog_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `callstatus`
--
ALTER TABLE `callstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consignment_costs`
--
ALTER TABLE `consignment_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consignment_types`
--
ALTER TABLE `consignment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_groups`
--
ALTER TABLE `cost_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followups`
--
ALTER TABLE `followups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_details`
--
ALTER TABLE `lead_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_status`
--
ALTER TABLE `lead_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makes`
--
ALTER TABLE `makes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_comments`
--
ALTER TABLE `order_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_costs`
--
ALTER TABLE `order_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details_status`
--
ALTER TABLE `order_details_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospectives`
--
ALTER TABLE `prospectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queues`
--
ALTER TABLE `queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrights`
--
ALTER TABLE `userrights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `calllogs`
--
ALTER TABLE `calllogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `calllog_details`
--
ALTER TABLE `calllog_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `callstatus`
--
ALTER TABLE `callstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `consignment_costs`
--
ALTER TABLE `consignment_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `consignment_types`
--
ALTER TABLE `consignment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cost_groups`
--
ALTER TABLE `cost_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `followups`
--
ALTER TABLE `followups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lead_details`
--
ALTER TABLE `lead_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lead_status`
--
ALTER TABLE `lead_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `makes`
--
ALTER TABLE `makes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_comments`
--
ALTER TABLE `order_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_costs`
--
ALTER TABLE `order_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details_status`
--
ALTER TABLE `order_details_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ports`
--
ALTER TABLE `ports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prospectives`
--
ALTER TABLE `prospectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `queues`
--
ALTER TABLE `queues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `userrights`
--
ALTER TABLE `userrights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

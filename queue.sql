-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2018 at 07:55 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

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
(1, 'Masters', '', '', 'fa fa-cog', 1, 1),
(3, 'Reports', 'debtors', 'index', 'fa fa-line-chart', 4, 1);

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

INSERT INTO `settings` (`id`, `name`, `logo`, `address`, `street`, `tel`, `mobile`, `tin`, `fax`, `email`, `alert`, `redlist`, `emailpass`, `emailhost`, `emailport`, `smsuser`, `smspass`, `smsname`, `emailstat`, `smsstat`, `startdate`) VALUES
(1, 'ETO (T) LTD', 'images/logo.png', 'P O Box 38331', '', '+255 222126966', '+255 713514515', ' 104 - 714 - 218', '+255 222126986', 'info@eto.co.tz', 5, 3, '', 'smtp.gmail.com', '587', '', '', '', 'on', 'on', '2017-04-01');

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
(3, 1, 'Users', 'user', 'index', 3, 1),
(4, 1, 'Queues', 'queue', 'queue_index', 4, 1);

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
(3, 2, 3, 0, '2017-07-12 06:07:55', 1, '0000-00-00 00:00:00', 0);

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
  `dom` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modifiedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `roleid`, `locid`, `delete`, `status`, `changepass`, `help`, `doc`, `createdby`, `dom`, `modifiedby`) VALUES
(1, 'admin', '123', 'Super User', 1, 1, 'no', 'active', 0, 0, '2016-01-19 13:41:29', 1, '2017-07-19 12:26:11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `userrights`
--
ALTER TABLE `userrights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

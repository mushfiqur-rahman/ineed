-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2018 at 01:49 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbineed37`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `countryId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `countryId`) VALUES
(1, 'Dhaka', 1),
(2, 'Rangpur', 1),
(3, 'Noakhali', 1),
(4, 'Kol khatta', 1),
(5, 'New Delhi', 2),
(7, 'Lahore', 3),
(8, 'Chandpur', 1),
(9, 'Nilphamari', 1),
(10, 'Chapainababgong', 1),
(11, 'Kolkatta', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comodity`
--

CREATE TABLE `comodity` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `conditionId` int(11) NOT NULL,
  `locationId` int(11) NOT NULL,
  `priorityId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comodity`
--

INSERT INTO `comodity` (`id`, `title`, `description`, `conditionId`, `locationId`, `priorityId`, `dateTime`, `userId`, `ip`) VALUES
(1, 'Hat for Tak Matha', 'This hat actually is a fake hair', 1, 1, 1, '2018-01-21 19:24:08', 1, '45'),
(2, 'Ti-shirt', 'a quality ti-shirt', 5, 1, 3, '2018-01-25 19:15:44', 3, '76'),
(3, 'Mouse', 'mouse at lej kata', 3, 4, 2, '2018-01-25 19:20:59', 2, '12'),
(4, 'Tooth Brush', 'only three days used', 1, 2, 2, '2018-01-25 19:21:54', 1, '43'),
(5, 'pendirve', 'one year garinty', 1, 3, 3, '2018-01-25 19:25:58', 1, '345'),
(6, 'need a smart jharu', 'NA, for my boss and home minister', 1, 4, 1, '2018-02-04 18:55:41', 5, '::1'),
(7, 'Array', 'we are friends staying together and need home made food, we dont have bua', 1, 6, 2, '2018-02-04 19:18:26', 5, '::1'),
(8, 'Need breakfast within 9 am', 'for 8 person regular', 1, 1, 3, '2018-02-04 19:24:00', 5, '::1'),
(9, '11th veto by Russia regarding Syria', 'vfdg', 1, 1, 1, '2018-02-04 19:27:10', 5, '::1'),
(10, 'abc is under contructionÂ abc is under ', 'dsfdsf', 1, 3, 2, '2018-02-04 19:28:29', 5, '::1'),
(11, 'I need a gaming mouse', 'Najh gg gjhgdjhgdghjd', 3, 5, 2, '2018-02-04 19:40:53', 5, '::1'),
(12, 'I need a gaming mouse', 'Najh gg gjhgdjhgdghjd', 3, 5, 2, '2018-02-04 19:43:35', 5, '::1'),
(13, 'I need a gaming mouse', 'Najh gg gjhgdjhgdghjd', 3, 5, 2, '2018-02-04 19:45:08', 5, '::1'),
(14, 'PHP advance Shikte chai', 'Amra practice, class korbo na', 3, 2, 1, '2018-02-04 19:48:04', 5, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `comodityapproved`
--

CREATE TABLE `comodityapproved` (
  `comodityId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comodityapproved`
--

INSERT INTO `comodityapproved` (`comodityId`, `userId`, `dateTime`, `remarks`) VALUES
(1, 1, '2018-01-21 19:29:32', 'justified'),
(4, 3, '2018-01-25 19:23:22', 'emergency ');

-- --------------------------------------------------------

--
-- Table structure for table `comodityarchive`
--

CREATE TABLE `comodityarchive` (
  `comodityId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comodityarchive`
--

INSERT INTO `comodityarchive` (`comodityId`, `userId`, `dateTime`, `remarks`) VALUES
(1, 1, '2018-01-25 00:00:00', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `comoditycondition`
--

CREATE TABLE `comoditycondition` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comoditycondition`
--

INSERT INTO `comoditycondition` (`id`, `name`, `description`, `rating`) VALUES
(1, 'Like New', 'Just Unpack for Checking, used for test', 10),
(2, 'Used A+', 'Normal sign of use, full functional', 8),
(3, 'Used', 'one month used', 7),
(4, 'old', 'one year used', 5),
(5, 'New', 'Intake, not used', 10);

-- --------------------------------------------------------

--
-- Table structure for table `comoditydiscussion`
--

CREATE TABLE `comoditydiscussion` (
  `id` int(11) NOT NULL,
  `comodityId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `comments` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comodityimage`
--

CREATE TABLE `comodityimage` (
  `id` int(11) NOT NULL,
  `comodityId` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comodityimage`
--

INSERT INTO `comodityimage` (`id`, `comodityId`, `image`, `title`) VALUES
(1, 1, '30_Lalima.png', 'They would frame them'),
(2, 4, 'vlight bulb.jpg', 'tooth brush pic'),
(3, 2, 't-shirt.jpg', 'T shirt'),
(4, 5, 'tSh.jpg', 'Flash drive'),
(5, 4, 'rice.png', 'Acer'),
(6, 4, 'biscuits.jpg', 'abc see and discover'),
(7, 4, 'green chili.jpg', 'abc see and discover'),
(8, 11, '', 'ffghfgh'),
(9, 11, '', 'kjghjghj'),
(10, 11, '', ''),
(11, 11, '', ''),
(12, 11, '', ''),
(13, 12, '', 'ffghfgh'),
(14, 12, '', 'kjghjghj'),
(15, 12, '', ''),
(16, 12, '', ''),
(17, 12, '', ''),
(18, 13, '2_mm2.jpg', 'ffghfgh'),
(19, 13, 'd3_1_071238503122.jpg', 'kjghjghj'),
(20, 13, '', ''),
(21, 13, '', ''),
(22, 13, '', ''),
(23, 14, 'hqdefault.jpg', 'kjghjghj'),
(24, 14, '10_biscuits.jpg', 'kjghjghj'),
(25, 14, '18_tablet.jpg', 'kjghjghj');

-- --------------------------------------------------------

--
-- Table structure for table `comoditylinks`
--

CREATE TABLE `comoditylinks` (
  `id` int(11) NOT NULL,
  `comodityId` int(11) NOT NULL,
  `Link` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comoditylinks`
--

INSERT INTO `comoditylinks` (`id`, `comodityId`, `Link`, `title`) VALUES
(1, 10, 'abc.com', 'second choice'),
(2, 10, 'bbc.com', 'first choice'),
(3, 11, 'abc.com', 'second choice'),
(4, 11, 'abc.com', 'first choice'),
(5, 12, 'abc.com', 'second choice'),
(6, 12, 'abc.com', 'first choice'),
(7, 13, 'abc.com', 'second choice'),
(8, 13, 'abc.com', 'first choice'),
(9, 14, 'abc.com', 'second choice');

-- --------------------------------------------------------

--
-- Table structure for table `comodityprice`
--

CREATE TABLE `comodityprice` (
  `comodityId` int(11) NOT NULL,
  `regularPrice` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comodityprice`
--

INSERT INTO `comodityprice` (`comodityId`, `regularPrice`, `Price`) VALUES
(1, '55554', '444499999'),
(4, '9999', '7777'),
(5, '600', '500'),
(3, '500', '450'),
(2, '250', '200'),
(6, '200', '250'),
(7, '100', '80'),
(10, '100', '100'),
(11, '12000', '6000'),
(12, '12000', '6000'),
(13, '12000', '6000'),
(14, '30000', '55000');

-- --------------------------------------------------------

--
-- Table structure for table `comoditypublish`
--

CREATE TABLE `comoditypublish` (
  `comodityId` int(11) NOT NULL,
  `startdate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comoditypublish`
--

INSERT INTO `comoditypublish` (`comodityId`, `startdate`, `endDate`, `userId`, `remarks`) VALUES
(1, '2018-01-21', '2018-03-25', 1, 'goodssv');

-- --------------------------------------------------------

--
-- Table structure for table `comodityreject`
--

CREATE TABLE `comodityreject` (
  `comodityId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comodityreject`
--

INSERT INTO `comodityreject` (`comodityId`, `userId`, `dateTime`, `remarks`) VALUES
(1, 3, '2018-11-23 00:00:00', 'vlona');

-- --------------------------------------------------------

--
-- Table structure for table `comoditysold`
--

CREATE TABLE `comoditysold` (
  `comodityId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comodityvedio`
--

CREATE TABLE `comodityvedio` (
  `id` int(11) NOT NULL,
  `comodityId` int(11) NOT NULL,
  `videoLink` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Bangladesh'),
(2, 'India'),
(3, 'Pakistan'),
(9, 'France'),
(5, 'Nepal'),
(8, 'Uganda');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `description`) VALUES
(1, 'Male', 'The destroyer'),
(2, 'Female', 'Please avoid');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cityId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `cityId`) VALUES
(1, 'Panthapath Signal', 1),
(2, 'Dhanmondi32', 1),
(3, 'Mirpur', 1),
(4, 'Mohmodpur', 1),
(5, 'kansat', 10),
(6, 'Bohrompur', 2),
(7, 'Pirgacha', 2);

-- --------------------------------------------------------

--
-- Table structure for table `loginhistory`
--

CREATE TABLE `loginhistory` (
  `userId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginhistory`
--

INSERT INTO `loginhistory` (`userId`, `dateTime`, `ip`) VALUES
(1, '2018-01-21 19:17:08', '34');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `comodityId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `comodityId`, `userId`, `message`, `dateTime`) VALUES
(1, 1, 2, 'Oka Done ki horo', '2018-01-30 18:40:36'),
(2, 4, 2, 'Oka good one, like it, dam koma', '2018-01-30 00:00:00'),
(3, 4, 2, 'no no no dam komano jabe na, apni like na korle dam komatam', '2018-01-30 19:27:57'),
(4, 4, 2, 'no no no dam komano jabe na, apni like na korle dam komatam', '2018-01-30 19:30:44'),
(5, 2, 3, 'OMG, how sweetsssss', '2018-02-01 18:39:19'),
(6, 1, 3, 'tor product vua', '2018-02-01 18:52:13'),
(7, 3, 3, 'good mouse bad mouse', '2018-02-01 18:52:48'),
(8, 2, 4, 'nice tshirt', '2018-02-01 19:10:26'),
(9, 1, 4, 'over rated', '2018-02-01 19:10:57'),
(10, 4, 4, 'warrenty less', '2018-02-01 19:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `name`, `description`) VALUES
(1, 'Very Emergency', 'within 6 Hour'),
(2, 'Emergency', 'within 12 hour'),
(3, 'High', 'within one day'),
(4, 'Medium', 'Needed but not urgent'),
(5, 'Low', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dob` date DEFAULT NULL,
  `genderId` int(11) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  `createDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `createIp` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `dob`, `genderId`, `address`, `cityId`, `image`, `type`, `createDate`, `createIp`) VALUES
(1, 'Mr Kodom Ali', '01912420420', 'kodom@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2018-01-01', 1, 'NA', 1, NULL, 'A', '2018-01-16 20:09:26', '12.12.12.12'),
(2, 'Ms Isse Nei', '01717420420', 'miss_isse@yahoo.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2001-01-16', 2, 'NA', 1, 'noimage.png', 'U', '2017-12-12 00:00:00', '12.1.212.22'),
(3, 'Soriful Islam', '0123433536789', 'soriful@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '1996-01-23', 1, 'NA', 1, 'noimage.png', 'A', '2017-12-12 00:00:00', '12-12-1212'),
(4, 'asik', '0177775555', 'asik@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2018-01-01', 1, 'sukrabd, Dhanmondi32', 1, 'img.jpg', 'U', '2018-02-01 19:06:20', '12.12.12.12'),
(5, 'Salma', '0171111111', 'salam@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', '2018-01-01', 2, 'Banessor, Rajshahi', 10, 'imgage.png', 'U', '2018-02-01 19:08:22', '12.12.12.12');

-- --------------------------------------------------------

--
-- Table structure for table `usersactive`
--

CREATE TABLE `usersactive` (
  `userId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersactive`
--

INSERT INTO `usersactive` (`userId`, `dateTime`, `ip`) VALUES
(1, '2018-01-21 19:06:06', '23'),
(2, '2018-01-21 19:10:52', '34');

-- --------------------------------------------------------

--
-- Table structure for table `usersblock`
--

CREATE TABLE `usersblock` (
  `userId` int(11) NOT NULL,
  `dateFrom` date DEFAULT NULL,
  `dateTo` date DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `adminUserId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersblock`
--

INSERT INTO `usersblock` (`userId`, `dateFrom`, `dateTo`, `remarks`, `adminUserId`) VALUES
(2, '2018-01-23', '2018-03-23', 'bodmaishi korar jonno', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersrating`
--

CREATE TABLE `usersrating` (
  `userId` int(11) NOT NULL,
  `rateByUserId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `rating` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersrating`
--

INSERT INTO `usersrating` (`userId`, `rateByUserId`, `dateTime`, `rating`) VALUES
(1, 3, '2018-01-23 18:55:16', 8);

-- --------------------------------------------------------

--
-- Table structure for table `usersverified`
--

CREATE TABLE `usersverified` (
  `userId` int(11) NOT NULL,
  `method` varchar(200) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `adminUserId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersverified`
--

INSERT INTO `usersverified` (`userId`, `method`, `dateTime`, `adminUserId`) VALUES
(3, 'By Phone', '2018-01-23 18:56:50', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryId` (`countryId`);

--
-- Indexes for table `comodity`
--
ALTER TABLE `comodity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conditionId` (`conditionId`),
  ADD KEY `locationId` (`locationId`),
  ADD KEY `priorityId` (`priorityId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `comodityapproved`
--
ALTER TABLE `comodityapproved`
  ADD PRIMARY KEY (`comodityId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `comodityarchive`
--
ALTER TABLE `comodityarchive`
  ADD PRIMARY KEY (`comodityId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `comoditycondition`
--
ALTER TABLE `comoditycondition`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comoditydiscussion`
--
ALTER TABLE `comoditydiscussion`
  ADD PRIMARY KEY (`id`,`comodityId`),
  ADD KEY `comodityId` (`comodityId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `comodityimage`
--
ALTER TABLE `comodityimage`
  ADD PRIMARY KEY (`id`,`comodityId`),
  ADD KEY `comodityId` (`comodityId`);

--
-- Indexes for table `comoditylinks`
--
ALTER TABLE `comoditylinks`
  ADD PRIMARY KEY (`id`,`comodityId`),
  ADD KEY `comodityId` (`comodityId`);

--
-- Indexes for table `comodityprice`
--
ALTER TABLE `comodityprice`
  ADD PRIMARY KEY (`comodityId`);

--
-- Indexes for table `comoditypublish`
--
ALTER TABLE `comoditypublish`
  ADD PRIMARY KEY (`comodityId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `comodityreject`
--
ALTER TABLE `comodityreject`
  ADD PRIMARY KEY (`comodityId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `comoditysold`
--
ALTER TABLE `comoditysold`
  ADD PRIMARY KEY (`comodityId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `comodityvedio`
--
ALTER TABLE `comodityvedio`
  ADD PRIMARY KEY (`id`,`comodityId`),
  ADD KEY `comodityId` (`comodityId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityId` (`cityId`);

--
-- Indexes for table `loginhistory`
--
ALTER TABLE `loginhistory`
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`,`comodityId`),
  ADD KEY `comodityId` (`comodityId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `genderId` (`genderId`),
  ADD KEY `cityId` (`cityId`);

--
-- Indexes for table `usersactive`
--
ALTER TABLE `usersactive`
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `comodity`
--
ALTER TABLE `comodity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `comoditycondition`
--
ALTER TABLE `comoditycondition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comodityimage`
--
ALTER TABLE `comodityimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `comoditylinks`
--
ALTER TABLE `comoditylinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

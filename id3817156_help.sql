-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 05:49 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3817156_help`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_controllers`
--

CREATE TABLE `assigned_controllers` (
  `controller_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_controllers`
--

INSERT INTO `assigned_controllers` (`controller_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 2),
(9, 2),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `controllers`
--

CREATE TABLE `controllers` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `controllers`
--

INSERT INTO `controllers` (`id`, `name`) VALUES
(1, 'help'),
(2, 'jobposts'),
(3, 'jobcomments'),
(4, 'notifications'),
(5, 'users'),
(6, 'roles'),
(7, 'modules'),
(8, 'home'),
(9, 'jobposts_users'),
(10, 'notifications_users');

-- --------------------------------------------------------

--
-- Table structure for table `jobcomments`
--

CREATE TABLE `jobcomments` (
  `id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(255) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobposts`
--

CREATE TABLE `jobposts` (
  `id` varchar(11) NOT NULL,
  `img` varchar(65) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `min_cost` varchar(11) NOT NULL,
  `actual_cost` varchar(11) NOT NULL,
  `max_cost` varchar(11) NOT NULL,
  `asker_id` int(11) NOT NULL,
  `helper_id` varchar(2) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rate_helper` varchar(11) NOT NULL,
  `rate_asker` varchar(11) NOT NULL,
  `testimonial` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobposts`
--

INSERT INTO `jobposts` (`id`, `img`, `title`, `description`, `min_cost`, `actual_cost`, `max_cost`, `asker_id`, `helper_id`, `datetime`, `rate_helper`, `rate_asker`, `testimonial`) VALUES
('5a22c641caa', '', 'Plumbing', 'Plumbing service', '950', '1000', '1050', 2, '', '2017-12-02 15:26:57', '', '', ''),
('5a22c692935', '', 'Babysitting', 'Babysitting service', '450', '550', '650', 3, '', '2017-12-02 15:28:18', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rolename` varchar(65) NOT NULL,
  `roletasks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rolename`, `roletasks`) VALUES
(1, 'Administrator', 'Administrator'),
(2, 'User', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(35) NOT NULL,
  `firstname` varchar(65) NOT NULL,
  `middlename` varchar(65) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `address`, `city`, `email`, `contact`, `role_id`, `username`, `password`) VALUES
(1, 'Super Admin', 'Super Admin', 'Super Admin', 'Manila', 'Manila', 'admin@help.com', '09278201930', 1, 'superadmin', '129204a243524e7934b0d9258dc0f7d44ca20de3332f190e8812b1bb4267094b'),
(2, 'Zachary', 'Ivery', 'Heiman', 'Maple Street', 'New York', 'heimanzachary21@gmail.com', '09151951048', 2, 'heiman.zachary', '129204a243524e7934b0d9258dc0f7d44ca20de3332f190e8812b1bb4267094b'),
(3, 'Armando', 'Crawford', 'Weise', 'Grimsborough', 'Houston', 'weisearmando21@gmail.com', '09278201930', 2, 'weise.armando', '129204a243524e7934b0d9258dc0f7d44ca20de3332f190e8812b1bb4267094b'),
(4, 'Patrick', 'Flynn', 'Shaw', 'Boston', 'Boston', 'shawpatrick21@gmail.com', '09093300045', 2, 'shaw.patrick', '129204a243524e7934b0d9258dc0f7d44ca20de3332f190e8812b1bb4267094b'),
(5, 'Michael', 'Harland', 'Flynn', 'Mabuhay', 'California', 'flynnmichael21@gmail.com', '09565264777', 2, 'flynn.michael', '129204a243524e7934b0d9258dc0f7d44ca20de3332f190e8812b1bb4267094b'),
(6, 'Robin', 'Lagrama', 'Correa', 'Calamba Laguna', 'Calamba', 'Robin.correa@help.com', '09208922193', 2, 'correa.robin', 'c4ac4907f788a82788ce8ff53c4a260afa6bfba225541e33a4c94746bfa5be61');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `controllers`
--
ALTER TABLE `controllers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobposts`
--
ALTER TABLE `jobposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `controllers`
--
ALTER TABLE `controllers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

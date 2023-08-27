-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 08:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `tracking_num` text NOT NULL,
  `bill_date` datetime DEFAULT current_timestamp(),
  `center_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `receiver_email` varchar(100) NOT NULL,
  `receiver_address` varchar(200) NOT NULL,
  `courier_type` varchar(50) NOT NULL DEFAULT 'Normal',
  `delivery_date` text DEFAULT NULL,
  `courier_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `courier_company_id` int(11) NOT NULL,
  `delivery_charges` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'accepted it wil deliverd soon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `tracking_num`, `bill_date`, `center_id`, `sender_id`, `receiver_name`, `receiver_email`, `receiver_address`, `courier_type`, `delivery_date`, `courier_id`, `weight`, `courier_company_id`, `delivery_charges`, `status`) VALUES
(19, 'MqO59Qouyf', '2023-08-23 22:31:49', 19, 5, 'Anus', 'abc@gmail.com', 'abc', 'bag', '2023-08-21', 5, 25, 12, 24975, 'Delivered'),
(20, 'vNdCvvbNVz', '2023-08-23 22:33:21', 20, 7, 'Ahsan', 'abc@gmail.com', 'abc', 'bag', '2023-08-26', 4, 25, 13, 24975, 'accepted it wil deliverd soon'),
(21, 'rdtCoepO82', '2023-08-23 22:37:37', 19, 15, 'ahmed', 'abc@gmail.com', 'abc', 'bag', '2023-08-25', 5, 25, 12, 24975, 'accepted it wil deliverd soon'),
(22, 'vuY1oR1GyU', '2023-08-23 23:03:10', 19, 15, 'saad', 'abc@gmail.com', 'ad', 'bag', '2023-08-25', 3, 50, 12, 49950, 'accepted it wil deliverd soon');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip code` text NOT NULL,
  `country` text NOT NULL,
  `contact` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `street`, `city`, `state`, `zip code`, `country`, `contact`, `date`) VALUES
(1, 'Malir ', 'karachi', 'liaquatabad', '71600', 'Pakistan', '03402423615', '2023-08-06 14:55:29'),
(7, 'Karachi Maymar', 'karachi', 'DHA', '71600', 'Pakistan', '03402423615', '2023-08-07 16:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city`) VALUES
(1012, 'Islamabad'),
(1016, 'Lahore'),
(1017, 'karachi'),
(1019, 'Peeshawar'),
(1021, 'Faisalabad');

-- --------------------------------------------------------

--
-- Table structure for table `couriercompanies`
--

CREATE TABLE `couriercompanies` (
  `courier_company_id` int(11) NOT NULL,
  `courier_company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `couriercompanies`
--

INSERT INTO `couriercompanies` (`courier_company_id`, `courier_company_name`) VALUES
(2, 'Leopards'),
(12, 'daraz'),
(13, 'dhl'),
(15, 'TCS');

-- --------------------------------------------------------

--
-- Table structure for table `deliverystatus`
--

CREATE TABLE `deliverystatus` (
  `status_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retailcenter`
--

CREATE TABLE `retailcenter` (
  `center_id` int(11) NOT NULL,
  `center_name` varchar(35) NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `center_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `retailcenter`
--

INSERT INTO `retailcenter` (`center_id`, `center_name`, `city_id`, `user_id`, `center_address`) VALUES
(19, 'Poster', 1017, 5, 'Malir Karachi at Post Plaza'),
(20, 'aptech', 1017, 2, 'shrah-e-faisal'),
(21, 'aptech', 1012, 2, 'sd'),
(22, 'aptech', 1012, 4, 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'agent'),
(3, 'users');

-- --------------------------------------------------------

--
-- Table structure for table `shippeditem`
--

CREATE TABLE `shippeditem` (
  `courier_id` int(11) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `dimension` varchar(100) NOT NULL,
  `insuranceamount` varchar(100) NOT NULL,
  `destination` int(11) NOT NULL,
  `finaldeliverydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shippeditem`
--

INSERT INTO `shippeditem` (`courier_id`, `weight`, `dimension`, `insuranceamount`, `destination`, `finaldeliverydate`) VALUES
(1, '5', '5', '1000', 1019, '2023-08-11'),
(2, '50', '10', '5200', 1016, '2023-08-26'),
(3, '50', '10', '900', 1012, '2023-08-31'),
(4, '25', '11*14', '200', 1017, '2023-08-26'),
(5, '25kg', '12*15', '9999', 1017, '2023-09-01'),
(6, '40kg', '11*14', '9999', 1019, '2023-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `trackin_no` int(11) NOT NULL,
  `dateofarrival` date NOT NULL,
  `dateofdispach` date NOT NULL,
  `city_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `middlename`, `lastname`, `gender`, `phonenumber`, `email`, `street`, `city`, `state`, `country`, `username`, `password`, `role_id`) VALUES
(2, 'Muhammad', 'Saad', 'Khurram', 'male', '0315-2491621', 'saadkhurram9@gmail.com', 'hose#5', 'Karachi', 'Sindh', 'Pakistan', 'admin', '123', 1),
(4, 'Syed', 'Murtaza', 'Hussain', 'male', '0314-2308332', 'sirmurtazaaptechtr@outlook.com', 'Stadium Road', 'Karachi', 'Sindh', 'Pakistan', 'agent', '123', 2),
(5, 'Muhammad', '', 'Zubair', 'Male', '03402423615', 'muhammadzubair@gmail.com', 'Nazimabad', 'Karachi', 'Sindh', 'Pakistan', 'zubair', '123', 1),
(7, 'Zubair', 'karachi', 'khan', 'Male', '03402423615', 'zkb8618202@gmail.com', 'liaquatabad karachi', 'karachi', 'liaquatabad', 'Pakistan', 'user', '123', 3),
(15, 'Muhammad', 'Anus', 'Khan', 'male', '03152491621', 'lfsm.muhammadsaad9@gmail.com', '25', 'karachi', 'sindh', 'pakistan', 'user', 'admin@123', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `courier_company_id` (`courier_company_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `center_id` (`center_id`),
  ADD KEY `courier_id` (`courier_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `couriercompanies`
--
ALTER TABLE `couriercompanies`
  ADD PRIMARY KEY (`courier_company_id`);

--
-- Indexes for table `deliverystatus`
--
ALTER TABLE `deliverystatus`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `retailcenter`
--
ALTER TABLE `retailcenter`
  ADD PRIMARY KEY (`center_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shippeditem`
--
ALTER TABLE `shippeditem`
  ADD PRIMARY KEY (`courier_id`),
  ADD KEY `destination` (`destination`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`trackin_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT for table `couriercompanies`
--
ALTER TABLE `couriercompanies`
  MODIFY `courier_company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deliverystatus`
--
ALTER TABLE `deliverystatus`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retailcenter`
--
ALTER TABLE `retailcenter`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shippeditem`
--
ALTER TABLE `shippeditem`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `trackin_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `retailcenter`
--
ALTER TABLE `retailcenter`
  ADD CONSTRAINT `retailcenter_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`),
  ADD CONSTRAINT `retailcenter_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `shippeditem`
--
ALTER TABLE `shippeditem`
  ADD CONSTRAINT `shippeditem_ibfk_1` FOREIGN KEY (`destination`) REFERENCES `cities` (`city_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

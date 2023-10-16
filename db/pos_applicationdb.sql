-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 07:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_applicationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `deductiontbl`
--

CREATE TABLE `deductiontbl` (
  `id` int(11) NOT NULL,
  `deduction_date` varchar(50) NOT NULL,
  `sss_contri` double NOT NULL,
  `philHealth_contri` double NOT NULL,
  `pagibig_contri` double NOT NULL,
  `sss_loan` double NOT NULL,
  `pagibig_loan` double NOT NULL,
  `faculty_savings_deposit` double NOT NULL,
  `faculty_savings_loan` double NOT NULL,
  `salary_loan` double NOT NULL,
  `other_loans` double NOT NULL,
  `total_deduction` double NOT NULL,
  `employee_no` varchar(30) NOT NULL,
  `income_tax_contri` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `incometbl`
--

CREATE TABLE `incometbl` (
  `id` int(11) NOT NULL,
  `income_date` varchar(50) NOT NULL,
  `basic_rate_hour` double NOT NULL,
  `basic_num_hrs` double NOT NULL,
  `basic_income` double NOT NULL,
  `hono_rate_hour` double NOT NULL,
  `hono_num_hrs` double NOT NULL,
  `hono_income` double NOT NULL,
  `other_rate_hour` double NOT NULL,
  `other_num_hrs` double NOT NULL,
  `other_income` double NOT NULL,
  `gross_income` double NOT NULL,
  `net_income` double NOT NULL,
  `employee_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_infotbl`
--

CREATE TABLE `personal_infotbl` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(30) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `civil_status` varchar(30) NOT NULL,
  `department` varchar(50) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(50) NOT NULL,
  `qualified_dependent_status` varchar(50) NOT NULL,
  `employee_status` varchar(50) NOT NULL,
  `pay_date` date NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `other_social_media_acccount` varchar(50) NOT NULL,
  `social_media_account_id` varchar(50) NOT NULL,
  `address_line1` text NOT NULL,
  `address_line2` text NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `state_province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip_code` int(30) NOT NULL,
  `picpath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salestbl`
--

CREATE TABLE `salestbl` (
  `cash_given` double NOT NULL,
  `customer_change` double NOT NULL,
  `discounted_amount` double NOT NULL,
  `discount_option` varchar(50) NOT NULL,
  `employee_no` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_discounted_amount` double NOT NULL,
  `total_discount_given` double NOT NULL,
  `total_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounttbl`
--

CREATE TABLE `user_accounttbl` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `privelege` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deductiontbl`
--
ALTER TABLE `deductiontbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incometbl`
--
ALTER TABLE `incometbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_infotbl`
--
ALTER TABLE `personal_infotbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salestbl`
--
ALTER TABLE `salestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounttbl`
--
ALTER TABLE `user_accounttbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deductiontbl`
--
ALTER TABLE `deductiontbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incometbl`
--
ALTER TABLE `incometbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_infotbl`
--
ALTER TABLE `personal_infotbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salestbl`
--
ALTER TABLE `salestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_accounttbl`
--
ALTER TABLE `user_accounttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

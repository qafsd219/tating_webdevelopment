-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 07:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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
  `deduction_date` varchar(255) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `faculty_savings_deposit` double NOT NULL,
  `faculty_savings_loan` double NOT NULL,
  `id` int(11) NOT NULL,
  `income_tax_contri` double NOT NULL,
  `other_loans` double NOT NULL,
  `pagibig_contri` double NOT NULL,
  `pagibig_loan` double NOT NULL,
  `philHealth_contri` double NOT NULL,
  `salary_loan` double NOT NULL,
  `sss_contri` double NOT NULL,
  `total_deduction` double NOT NULL,
  `sss_loan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incometbl`
--

CREATE TABLE `incometbl` (
  `id` int(11) NOT NULL,
  `income_date` varchar(255) NOT NULL,
  `basic_rate_hour` double NOT NULL,
  `basic_income` double NOT NULL,
  `hono_rate_hour` double NOT NULL,
  `hono_num_hrs` double NOT NULL,
  `hono_income` double NOT NULL,
  `other_rate_hour` double NOT NULL,
  `other_num_hrs` double NOT NULL,
  `other_income` double NOT NULL,
  `gross_income` double NOT NULL,
  `net_income` double NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `basic_num_hrs` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_infotbl`
--

CREATE TABLE `personal_infotbl` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `address_line1` text NOT NULL,
  `address_line2` text NOT NULL,
  `birth_date` date NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `employee_status` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `other_social_media_account` varchar(255) NOT NULL,
  `pay_date` date NOT NULL,
  `picpath` text NOT NULL,
  `qualified_dependent_status` varchar(255) NOT NULL,
  `social_media_account_id` varchar(255) NOT NULL,
  `state_province` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_infotbl`
--

INSERT INTO `personal_infotbl` (`id`, `employee_no`, `address_line1`, `address_line2`, `birth_date`, `civil_status`, `contact_no`, `country`, `department`, `designation`, `email_address`, `employee_status`, `fname`, `gender`, `lname`, `mname`, `municipality`, `nationality`, `other_social_media_account`, `pay_date`, `picpath`, `qualified_dependent_status`, `social_media_account_id`, `state_province`, `suffix`, `zip_code`) VALUES
(19, '1111111', '2345678', 'sadhajsda', '2001-12-25', 'S', '09123456789', 'Phillipines', 'DOE', 'Studetn', 'askdasa@gmail.com', 'Job Order', 'earl', 'M', 'eustacio', 'mark', 'imus', 'Filipino', 'facebook_messenger', '1111-11-11', 'temp/E PAANO KUNG.png', 'S or ME', 'earl', 'cavite', '', 0),
(20, '1234567890', 'dsfgahdjkas', 'asfdvhgabjsnkl', '2033-01-19', 'S', '09123456789', 'Phillipines', 'COECSA', 'Student', 'asdsa@gmail.com', 'Job Order', 'joans', 'M', 'tating', 'austin', 'Imus', 'Filipino', 'facebook_messenger', '0000-00-00', 'temp/niggadora.png', 'S or ME', 'john andrei chua', 'Cavite', '', 4103),
(24, '57890', 'isahdiasuhdk', 'asdhaksdhask', '2003-01-19', 'S', '09123456789', 'Phillipines', 'coecsa', 'student', 'gasjdhas@gmail.com', 'job oreder', 'jonas', 'M', 'tating', 'austin', 'imus', 'Filipino', 'facebook_messenger', '2023-12-25', '', 'S or ME', 'jet mark', 'cavite', '', 4103),
(5, '67890', 'asdasda', 'sadasda', '2003-01-19', 'S', '09123456789', 'Pakistan', 'COECSA', 'Student', 'joiasndhiasd', 'Job Order', 'Jonas', 'M', 'Tating', 'Austin', 'asdads', 'Filipino', 'facebook_messenger', '2023-11-16', '', 'S or ME', 'asdasdas', 'sadasd', '', 4103),
(26, 'bnm,', 'sadbnm,/', 'dsfghm,.', '2025-01-19', 'S', '2134567890', 'Phillipines', 'gfhjk', 'ghjk', 'jnkml', 'cgvbhnm', 'jonas', 'M', 'tating', 'uasitn', 'imus', 'Filipino', 'facebook_messenger', '0031-01-12', 'temp/siidol.jpg', 'S or ME', 'asdasdsadsa', 'cavite', '', 4103);

-- --------------------------------------------------------

--
-- Table structure for table `salestbl`
--

CREATE TABLE `salestbl` (
  `cash_given` double NOT NULL,
  `customer_change` double NOT NULL,
  `discounted_amount` double NOT NULL,
  `discount_amount` double NOT NULL,
  `discount_option` varchar(255) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_discounted_amount` double NOT NULL,
  `total_discount_given` double NOT NULL,
  `total_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salestbl`
--

INSERT INTO `salestbl` (`cash_given`, `customer_change`, `discounted_amount`, `discount_amount`, `discount_option`, `employee_no`, `id`, `item_name`, `price`, `quantity`, `total_discounted_amount`, `total_discount_given`, `total_quantity`) VALUES
(50000, 10, 49990, 0, 'on', '', 17, 'Iphone 15', 49990, 1, 49990, 0, 1),
(120000, 419, 119581.6, 10398.4, 'on', '', 18, 'Samsung Galaxy Z Flip5', 64990, 2, 119581, 10398, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounttbl`
--

CREATE TABLE `user_accounttbl` (
  `confirm_password` varchar(255) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `privilege` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_accounttbl`
--

INSERT INTO `user_accounttbl` (`confirm_password`, `employee_no`, `id`, `password`, `username`, `privilege`) VALUES
('', '67890', 3, '', '', 0),
('', '1111111', 4, '', '', 0),
('', '1234567890', 5, '', '', 0),
('', '57890', 6, '', '', 0),
('', 'bnm,', 7, '', '', 0);

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
  ADD PRIMARY KEY (`employee_no`),
  ADD UNIQUE KEY `id` (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `incometbl`
--
ALTER TABLE `incometbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_infotbl`
--
ALTER TABLE `personal_infotbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `salestbl`
--
ALTER TABLE `salestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_accounttbl`
--
ALTER TABLE `user_accounttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

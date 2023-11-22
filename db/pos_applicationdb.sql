-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 03:18 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deductiontbl`
--

INSERT INTO `deductiontbl` (`deduction_date`, `employee_no`, `faculty_savings_deposit`, `faculty_savings_loan`, `id`, `income_tax_contri`, `other_loans`, `pagibig_contri`, `pagibig_loan`, `philHealth_contri`, `salary_loan`, `sss_contri`, `total_deduction`, `sss_loan`) VALUES
('October 9 2023', '67890', 100, 100, 45, 0, 100, 100, 100, 1080, 100, 1080, 2860, 100),
('October 9 2023', '67890', 100, 100, 46, 3000, 150, 100, 100, 675, 100, 675, 5100, 100),
('1999-11-16', '357159', 150, 250, 49, 0, 150, 100, 100, 450, 0, 225, 1625, 200),
('', '36912', 320, 410, 50, 2240, 110, 120, 120, 504, 100, 495, 4549, 150);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incometbl`
--

INSERT INTO `incometbl` (`id`, `income_date`, `basic_rate_hour`, `basic_income`, `hono_rate_hour`, `hono_num_hrs`, `hono_income`, `other_rate_hour`, `other_num_hrs`, `other_income`, `gross_income`, `net_income`, `employee_no`, `basic_num_hrs`) VALUES
(57, 'October 9 2023', 500, 4000, 100, 8, 800, 100, 8, 800, 5600, 4203, '67890', 8),
(59, 'October 9 2023', 500, 5000, 500, 10, 5000, 500, 10, 5000, 15000, 9900, '67890', 10),
(60, '', 100, 1600, 100, 16, 1600, 100, 16, 1600, 4800, 3175, '', 16),
(61, '1999-11-16', 100, 1600, 100, 16, 1600, 100, 16, 1600, 4800, 3175, '', 16),
(62, '1999-11-16', 100, 1600, 100, 16, 1600, 100, 16, 1600, 4800, 3175, '357159', 16),
(63, '', 400, 4800, 300, 8, 2400, 500, 8, 4000, 11200, 6651, '36912', 12);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_infotbl`
--

INSERT INTO `personal_infotbl` (`id`, `employee_no`, `address_line1`, `address_line2`, `birth_date`, `civil_status`, `contact_no`, `country`, `department`, `designation`, `email_address`, `employee_status`, `fname`, `gender`, `lname`, `mname`, `municipality`, `nationality`, `other_social_media_account`, `pay_date`, `picpath`, `qualified_dependent_status`, `social_media_account_id`, `state_province`, `suffix`, `zip_code`) VALUES
(35, '098765', 'block 5 lot 56 ', 'carsadang bago 2 dyan street', '2005-05-26', 'S', '09987654321', 'Phillipines', 'COECSA', 'Student', 'okok@gmail.com', 'Job Order', 'jonas', 'M', 'tating', 'jonas', 'imus', 'Filipino', 'telegram', '2023-12-12', 'temp/lpu.jpg', 'S or ME', 'okokkkk', 'cavite', '', 1324),
(19, '1111111', '2345678', 'sadhajsda', '2001-12-25', 'S', '09123456789', 'Phillipines', 'DOE', 'Studetn', 'askdasa@gmail.com', 'Job Order', 'earl', 'M', 'eustacio', 'mark', 'imus', 'Filipino', 'facebook_messenger', '1111-11-11', 'temp/E PAANO KUNG.png', 'S or ME', 'earl', 'cavite', '', 0),
(34, '1231234', 'block 3 lot 26', 'baranggay malagasang 3', '2323-01-01', 'S', '09123456789', 'Phillipines', 'doe', 'cpe', 'asdas@gmail.com', 'studyante', 'jonas', 'M', 'tating', 'austin', 'imus', 'Filipino', 'snapchat', '2023-12-12', 'temp/lpu.jpg', 'S or ME', 'okok', 'cavite', '', 4102),
(36, '123456', 'block 5 lot 69 phase 9 acm homes', 'alapan1b daisy street', '2003-01-19', 'S', '09123456789', 'Phillipines', 'DOE', 'Student', 'jonas@gmail.com', 'CPE', 'jonas', 'M', 'tating', 'austin', 'city of imus', 'Filipino', 'telegram', '2023-12-12', 'temp/BREWMASTA.jpg', 'S or ME', 'google.com', 'cavite', '', 4103),
(20, '1234567890', 'dsfgahdjkas', 'asfdvhgabjsnkl', '2033-01-19', 'S', '09123456789', 'Phillipines', 'COECSA', 'Student', 'asdsa@gmail.com', 'Job Order', 'joans', 'M', 'tating', 'austin', 'Imus', 'Filipino', 'facebook_messenger', '0000-00-00', 'temp/niggadora.png', 'S or ME', 'john andrei chua', 'Cavite', '', 4103),
(37, '126317', 'Block 5 Lot 78 ACM Phase 7', 'Alapan 3C', '2001-01-01', 'S', '09123456789', 'Phillipines', 'DOE', 'Student', 'docbrewmaster@lpunetwork.edu.ph', 'CPE', 'Dave', 'F', 'Cambarjan', 'Mark', 'City of General Trias', 'Filipino', 'telegram', '2023-12-12', 'temp/BREWMASTA.jpg', 'S or ME', 'brewmasterayayayay', 'Cavite', 'III', 4108),
(38, '357159', 'dave', 'dave', '1999-11-16', 'M', '09123456781', 'Phillipines', 'DOE', 'CpE', 'dave@email.com', 'dating tambay', 'Dave', 'M', 'Cambarijan', 'Villamor', 'naic', 'Bahamian', 'facebook_messenger', '2023-11-26', 'temp/doctorjen.jpg', 'S4 or ME4', 'dave', 'cavit', '', 4107),
(39, '36912', 'sa aming bahay', 'ang aming bati', '2001-01-01', 'LS', '093691215', 'Phillipines', 'COECSA', 'CpE', 'emial@email.com', 'Student', 'jeffrey', 'M', 'catamio', 'villamor', 'imus', 'American', 'facebook_messenger', '2023-12-25', 'temp/doctorjen.jpg', 'S or ME', 'jepjep', 'cavite', '', 4103),
(24, '57890', 'isahdiasuhdk', 'asdhaksdhask', '2003-01-19', 'S', '09123456789', 'Phillipines', 'coecsa', 'student', 'gasjdhas@gmail.com', 'job oreder', 'jonas', 'M', 'tating', 'austin', 'imus', 'Filipino', 'facebook_messenger', '2023-12-25', '', 'S or ME', 'jet mark', 'cavite', '', 4103),
(5, '67890', 'asdasda', 'sadasda', '2003-01-19', 'S', '09123456789', 'Pakistan', 'COECSA', 'Student', 'joiasndhiasd', 'Job Order', 'Jonas', 'M', 'Tating', 'Austin', 'asdads', 'Filipino', 'facebook_messenger', '2023-11-16', '', 'S or ME', 'asdasdas', 'sadasd', '', 4103);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salestbl`
--

INSERT INTO `salestbl` (`cash_given`, `customer_change`, `discounted_amount`, `discount_amount`, `discount_option`, `employee_no`, `id`, `item_name`, `price`, `quantity`, `total_discounted_amount`, `total_discount_given`, `total_quantity`) VALUES
(150, 13, 137.08, 11.92, 'discount card', '', 33, 'Ben10 Toy Cellphone', 149, 1, 137, 11, 1),
(7500000, 140000, 7360000, 640000, 'discount card', '', 34, 'Car 6', 8000000, 1, 7360000, 640000, 1),
(2900000, 84000, 2816000, 384000, 'senior discount', '', 35, 'Car 1', 3200000, 1, 2816000, 384000, 1),
(1000, 101, 899.1, 99.9, 'employee discount', '', 36, 'A4tech Optical Mouse', 999, 1, 899, 99, 1),
(200, 50, 150, 0, 'no discount', '', 37, 'Pringles Original', 150, 1, 150, 0, 1),
(500, 300, 200, 0, 'no discount', '', 38, 'Vcut Barbeque', 40, 5, 350, 0, 6),
(1500, 501, 999, 0, 'no discount', '', 39, 'Redragon M612', 999, 1, 999, 0, 1),
(1000, 121, 879.12, 119.88, 'senior discount', '', 40, 'Logitech G Pro X', 999, 1, 1878, 119, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounttbl`
--

INSERT INTO `user_accounttbl` (`confirm_password`, `employee_no`, `id`, `password`, `username`, `privilege`) VALUES
('', '67890', 3, '', '', 0),
('', '1111111', 4, '', '', 0),
('', '1234567890', 5, '', '', 0),
('', '57890', 6, '', '', 0),
('', '1231234', 9, '', '', 0),
('', '098765', 10, '', '', 0),
('', '123456', 11, '', '', 0),
('', '126317', 12, '', '', 0),
('', '357159', 13, '', '', 0),
('', '36912', 14, '', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `incometbl`
--
ALTER TABLE `incometbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `personal_infotbl`
--
ALTER TABLE `personal_infotbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `salestbl`
--
ALTER TABLE `salestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_accounttbl`
--
ALTER TABLE `user_accounttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

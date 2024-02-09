-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 01:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gsm_pioneer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `_id` int(11) NOT NULL,
  `_transaction_num` varchar(255) NOT NULL,
  `_date` date NOT NULL,
  `_time` varchar(255) NOT NULL,
  `_customer_email` varchar(255) NOT NULL,
  `_customer_name` varchar(255) NOT NULL,
  `_customer_contact` varchar(255) NOT NULL,
  `_customer_address` varchar(255) NOT NULL,
  `_origin` varchar(255) NOT NULL,
  `_stall_id` varchar(255) NOT NULL,
  `_status` varchar(255) NOT NULL,
  `_cancel_reason` varchar(255) NOT NULL,
  `_rating` int(11) NOT NULL,
  `_feedback` varchar(10000) NOT NULL,
  `_date_feedback` date NOT NULL,
  `_emp_email` varchar(255) NOT NULL,
  `_emp_name` varchar(255) NOT NULL,
  `_date_processed` datetime NOT NULL,
  `_date_completed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`_id`, `_transaction_num`, `_date`, `_time`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_origin`, `_stall_id`, `_status`, `_cancel_reason`, `_rating`, `_feedback`, `_date_feedback`, `_emp_email`, `_emp_name`, `_date_processed`, `_date_completed`) VALUES
(27, '20221119130438505323', '2022-11-20', '7:00 AM - 8:00 AM', 'charlie@gmail.com', 'Charlie Vergara Marasigan', '09124142123', 'Quezon', 'appointment', 'Stall 2', 'completed', '', 5, 'nice', '2022-11-19', 'randel@gmail.com', 'Randel Allan Famini', '2022-11-19 20:07:29', '2022-11-19 20:07:33'),
(28, '20221119130852909603', '2022-11-20', '7:00 AM - 8:00 AM', 'charlie@gmail.com', 'Charlie Vergara Marasigan', '09124142123', 'Quezon', 'appointment', 'Stall 2', 'cancelled', 'Found much cheaper offer', 0, '', '0000-00-00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '20221119133156761037', '2022-11-20', '7:00 AM - 8:00 AM', 'charlie@gmail.com', 'Charlie Vergara Marasigan', '09124142123', 'Quezon', 'appointment', 'Stall 1', 'completed', '', 5, 'lupit', '2022-11-19', 'arisharen@gmail.com', 'Ari Sharen Mae', '2022-11-19 20:32:47', '2022-11-19 20:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_device_list`
--

CREATE TABLE `tbl_device_list` (
  `_id` int(11) NOT NULL,
  `_type` varchar(255) NOT NULL,
  `_device_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_device_list`
--

INSERT INTO `tbl_device_list` (`_id`, `_type`, `_device_unit`) VALUES
(10, 'Laptop', 'Acer'),
(4, 'Cellphone', 'Apple'),
(12, 'Laptop', 'Asus'),
(15, 'Laptop', 'Dell'),
(9, 'Laptop', 'Hp'),
(11, 'Laptop', 'Lenovo'),
(7, 'Cellphone', 'Oppo'),
(16, 'Laptop', 'rog'),
(5, 'Cellphone', 'Samsung'),
(8, 'Cellphone', 'Vivo'),
(6, 'Cellphone', 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `_id` int(11) NOT NULL,
  `_title` varchar(255) NOT NULL,
  `_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`_id`, `_title`, `_img`) VALUES
(8, 'Hello November', '1668825840308.jpg'),
(9, 'GSM Pioneer', '1668825855979.jpg'),
(10, 'GSM Pioneer', '1668825870539.jpg'),
(11, 'Fun Fact', '1668825885795.jpg'),
(12, 'GSM Pioneer', '1668825906387.jpg'),
(13, 'Free Checkup', '1668825962154.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `_id` int(11) NOT NULL,
  `_date` datetime NOT NULL,
  `_item_code` varchar(255) NOT NULL,
  `_item` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `_price` double NOT NULL,
  `_stall_id` varchar(255) NOT NULL,
  `_beginning` int(11) NOT NULL,
  `_in` int(11) NOT NULL,
  `_out` int(11) NOT NULL,
  `_void_sales` int(11) NOT NULL,
  `_void_replenishment` int(11) NOT NULL,
  `_ending` int(11) NOT NULL,
  `_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`_id`, `_date`, `_item_code`, `_item`, `description`, `_price`, `_stall_id`, `_beginning`, `_in`, `_out`, `_void_sales`, `_void_replenishment`, `_ending`, `_user`) VALUES
(37, '2022-11-19 19:59:32', 'C-222', 'Battery', 'Battery for andoid', 1000, 'Stall 2', 10, 0, 0, 0, 0, 10, 'Administrator'),
(38, '2022-11-19 20:02:57', 'C-222', 'Battery', 'Battery for andoid', 1000, 'Stall 2', 10, 40, 0, 0, 0, 50, 'Administrator'),
(39, '2022-11-19 20:03:27', 'C-222', 'Battery', 'Battery for andoid', 1000, 'Stall 2', 50, 0, 0, 0, 40, 10, 'Administrator'),
(40, '2022-11-19 20:07:29', 'C-222', 'Battery', 'Battery for andoid', 1000, 'Stall 2', 10, 0, 1, 0, 0, 9, 'Randel Allan Famini'),
(41, '2022-11-19 20:24:33', '111', 'LCD', 'LCD for android', 1000, 'Stall 1', 20, 0, 0, 0, 0, 20, 'Administrator'),
(42, '2022-11-19 20:25:08', '222', 'keyboard', 'laptop keyboard', 1000, 'Stall 1', 20, 0, 0, 0, 0, 20, 'Administrator'),
(43, '2022-11-19 20:26:00', '333', 'charger port', 'charger port for android', 500, 'Stall 1', 20, 0, 0, 0, 0, 20, 'Administrator'),
(44, '2022-11-19 20:32:47', '222', 'keyboard', 'laptop keyboard', 1000, 'Stall 1', 20, 0, 1, 0, 0, 19, 'Ari Sharen Mae');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `_id` int(11) NOT NULL,
  `_item_code` varchar(255) NOT NULL,
  `_item` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `_price` double NOT NULL,
  `_quantity` int(11) NOT NULL,
  `_img` varchar(255) NOT NULL,
  `_stall_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`_id`, `_item_code`, `_item`, `description`, `_price`, `_quantity`, `_img`, `_stall_id`) VALUES
(23, 'C-222', 'Battery', 'Battery for andoid', 1000, 9, '1668860824170.png', 'Stall 2'),
(24, '111', 'LCD', 'LCD for android', 1000, 20, '1668860804827.jpeg', 'Stall 1'),
(25, '222', 'keyboard', 'laptop keyboard', 1000, 19, '1668860796507.jpg', 'Stall 1'),
(26, '333', 'charger port', 'charger port for android', 500, 20, '1668860785933.png', 'Stall 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replenishment`
--

CREATE TABLE `tbl_replenishment` (
  `_id` int(11) NOT NULL,
  `_date` datetime NOT NULL,
  `_item_code` varchar(255) NOT NULL,
  `_item` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `_price` double NOT NULL,
  `_quantity` int(11) NOT NULL,
  `_stall_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `_id` int(11) NOT NULL,
  `_device_type` varchar(255) NOT NULL,
  `_device_unit` varchar(255) NOT NULL,
  `_service_type` varchar(255) NOT NULL,
  `_service` varchar(255) NOT NULL,
  `_service_charge` double NOT NULL,
  `_emp_rate` double NOT NULL,
  `_item_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`_id`, `_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`, `_emp_rate`, `_item_code`) VALUES
(12, 'Cellphone', 'Apple', 'Hardware', 'Change batt', 1000, 500, 'C-222'),
(13, 'Cellphone', 'Apple', 'Hardware', 'LCD Replacement', 1000, 500, '111'),
(14, 'Cellphone', 'Apple', 'Hardware', 'Charger port replacement', 500, 300, '333'),
(15, 'Laptop', 'Acer', 'Hardware', 'keyboard replacement', 1000, 500, '222');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_rendered`
--

CREATE TABLE `tbl_service_rendered` (
  `_id` int(11) NOT NULL,
  `_transaction_num` varchar(255) NOT NULL,
  `_customer_email` varchar(255) NOT NULL,
  `_customer_name` varchar(255) NOT NULL,
  `_customer_contact` varchar(255) NOT NULL,
  `_customer_address` varchar(255) NOT NULL,
  `_device_type` varchar(255) NOT NULL,
  `_device_unit` varchar(255) NOT NULL,
  `_service_type` varchar(255) NOT NULL,
  `_service` varchar(255) NOT NULL,
  `_service_charge` double NOT NULL,
  `_qty` int(11) NOT NULL,
  `_sub_total` double NOT NULL,
  `_item_code` varchar(255) NOT NULL,
  `_item` varchar(255) NOT NULL,
  `_unit_price` double NOT NULL,
  `_quantity` int(11) NOT NULL,
  `_sub_total_item` double NOT NULL,
  `_total_amount` double NOT NULL,
  `_emp_email` varchar(255) NOT NULL,
  `_emp_name` varchar(255) NOT NULL,
  `_emp_rate` double NOT NULL,
  `_stall_id` varchar(255) NOT NULL,
  `_status` varchar(255) NOT NULL,
  `_date_processed` datetime NOT NULL,
  `_date_completed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_rendered`
--

INSERT INTO `tbl_service_rendered` (`_id`, `_transaction_num`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`, `_qty`, `_sub_total`, `_item_code`, `_item`, `_unit_price`, `_quantity`, `_sub_total_item`, `_total_amount`, `_emp_email`, `_emp_name`, `_emp_rate`, `_stall_id`, `_status`, `_date_processed`, `_date_completed`) VALUES
(24, '20221119130438505323', 'charlie@gmail.com', 'Charlie Vergara Marasigan', '09124142123', 'Quezon', 'Cellphone', 'Apple', 'Hardware', 'Change batt', 1000, 1, 1000, 'C-222', 'Battery', 1000, 1, 1000, 2000, 'randel@gmail.com', 'Randel Allan Famini', 500, 'Stall 2', 'completed', '2022-11-19 20:07:29', '2022-11-19 20:07:33'),
(25, '20221119133156761037', 'charlie@gmail.com', 'Charlie Vergara Marasigan', '09124142123', 'Quezon', 'Laptop', 'Acer', 'Hardware', 'keyboard replacement', 1000, 1, 1000, '222', 'keyboard', 1000, 1, 1000, 2000, 'arisharen@gmail.com', 'Ari Sharen Mae', 500, 'Stall 1', 'completed', '2022-11-19 20:32:47', '2022-11-19 20:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stall`
--

CREATE TABLE `tbl_stall` (
  `_id` int(11) NOT NULL,
  `_stall_id` varchar(255) NOT NULL,
  `_location` varchar(255) NOT NULL,
  `_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stall`
--

INSERT INTO `tbl_stall` (`_id`, `_stall_id`, `_location`, `_status`) VALUES
(7, 'Stall 1', 'Inside Presnet', 'active'),
(8, 'Stall 2', '2nd floor front of AC Hardware', 'active'),
(9, 'Stall 3', '2nd Floor near Eskwela', 'active'),
(11, 'Stall 4', 'Calamba', 'active'),
(12, 'Stall 5', 'malapit sa mr diy', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `_id` int(11) NOT NULL,
  `_email` varchar(255) NOT NULL,
  `_first_name` varchar(255) NOT NULL,
  `_middle_name` varchar(255) NOT NULL,
  `_surname` varchar(255) NOT NULL,
  `_contact` varchar(255) NOT NULL,
  `_address` varchar(1000) NOT NULL,
  `_usertype` varchar(255) NOT NULL,
  `_password` varchar(255) NOT NULL,
  `_status` varchar(255) NOT NULL,
  `_stall` varchar(255) NOT NULL,
  `_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`_id`, `_email`, `_first_name`, `_middle_name`, `_surname`, `_contact`, `_address`, `_usertype`, `_password`, `_status`, `_stall`, `_img`) VALUES
(8, 'Administrator', 'admin', 'admin', 'admin', '0999', 'admin', 'Administrator', 'a', 'active', '', '1668407321555.jpg'),
(12, 'arisharen@gmail.com', 'Ari', 'Sharen', 'Mae', '09132313422', 'Sto. Tomas Batangas', 'Employee', 'a', 'active', 'Stall 1', ''),
(11, 'charlie@gmail.com', 'Charlie', 'Vergara', 'Marasigan', '09124142123', 'Quezon', 'Customer', 'a', 'active', '', ''),
(14, 'raf@gmail.com', 'raf', 'raf', 'raf', '09876543234', 'manila', 'Employee', '&i58g7xv', 'active', 'Stall 2', ''),
(13, 'randel@gmail.com', 'Randel', 'Allan', 'Famini', '0914312124', 'Tanauan Batangas', 'Employee', 'a', 'active', 'Stall 2', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_device_list`
--
ALTER TABLE `tbl_device_list`
  ADD PRIMARY KEY (`_device_unit`),
  ADD KEY `_id` (`_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_replenishment`
--
ALTER TABLE `tbl_replenishment`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_service_rendered`
--
ALTER TABLE `tbl_service_rendered`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_stall`
--
ALTER TABLE `tbl_stall`
  ADD PRIMARY KEY (`_stall_id`),
  ADD KEY `_id` (`_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`_email`),
  ADD KEY `_id` (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_device_list`
--
ALTER TABLE `tbl_device_list`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_replenishment`
--
ALTER TABLE `tbl_replenishment`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_service_rendered`
--
ALTER TABLE `tbl_service_rendered`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_stall`
--
ALTER TABLE `tbl_stall`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

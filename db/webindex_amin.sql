-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2019 at 08:07 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webindex_amin`
--

-- --------------------------------------------------------

--
-- Table structure for table `rs_admin_master`
--

CREATE TABLE `rs_admin_master` (
  `admin_id` smallint(6) NOT NULL,
  `admin_fname` varchar(255) NOT NULL,
  `admin_lname` varchar(255) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_phone` varchar(20) NOT NULL,
  `user_type` int(11) NOT NULL,
  `admin_last_login` varchar(30) NOT NULL,
  `admin_last_ip` varchar(20) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_admin_master`
--

INSERT INTO `rs_admin_master` (`admin_id`, `admin_fname`, `admin_lname`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `user_type`, `admin_last_login`, `admin_last_ip`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', '12345781245', 1, '', '', 'Active'),
(3, 'Steve', 'Joves', 'managerA', 'e35bece6c5e6e0e86ca51d0440e92282a9d6ac8a', 'm@gmail.com', '', 2, '', '', 'Active'),
(6, 'Mridul', 'Halder', 'inspectora', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'inspectorA@gmail.com', '', 3, '', '', 'Active'),
(7, 'John', 'Smith', 'inspectorb', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'inspectora@gmail.com', '78954666', 3, '', '', 'Active'),
(11, 'Biplab', 'Roy', 'broy', 'e35bece6c5e6e0e86ca51d0440e92282a9d6ac8a', 'broy@advanced-matrix.com', '234-222-2222', 2, '', '', 'Active'),
(9, 'Sudipta', 'Das', 'sdas', 'ca040d256b7309b7dfb08fa8007115086e9d8c31', 'sudipto.impmail@gmail.com', '2247300495', 3, '', '', 'Active'),
(10, 'Kuntal', 'Biswas', 'biswask', 'e35bece6c5e6e0e86ca51d0440e92282a9d6ac8a', 'aaa@gmail.com', '1212233213', 3, '', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `rs_content`
--

CREATE TABLE `rs_content` (
  `page_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `leftttitle` varchar(50) NOT NULL,
  `leftdetails` varchar(255) NOT NULL,
  `leftfootertitle` varchar(100) NOT NULL,
  `righttitle` text NOT NULL,
  `rightdetails` varchar(255) NOT NULL,
  `rightfootertitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_content`
--

INSERT INTO `rs_content` (`page_id`, `title`, `content`, `leftttitle`, `leftdetails`, `leftfootertitle`, `righttitle`, `rightdetails`, `rightfootertitle`) VALUES
(1, 'About Us', '', '', '', '', '', '', ''),
(2, 'Advertisment', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rs_customer`
--

CREATE TABLE `rs_customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fb_id` varchar(255) NOT NULL,
  `fb_name` varchar(255) NOT NULL,
  `fb_link` text NOT NULL,
  `google_id` varchar(255) NOT NULL,
  `google_url` text NOT NULL,
  `verify_code` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_customer`
--

INSERT INTO `rs_customer` (`customer_id`, `name`, `email`, `password`, `address`, `phone`, `fb_id`, `fb_name`, `fb_link`, `google_id`, `google_url`, `verify_code`, `status`) VALUES
(2, 'EPIC Inc', 'sumit@codesive.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Habra', '98364025981', '', '', '', '', '', '', 'Active'),
(3, 'HVAC Exotic Plc', 'sumit.chowdhury@gmail.com', '', '', '123456789', '10153767851478952', 'Sumit Chowdhury', 'https://www.facebook.com/app_scoped_user_id/10153767851478952/', '117362406454511304448', 'https://plus.google.com/117362406454511304448', '', 'Active'),
(7, 'GFL International', 'ranjan@codesive.com', '123456', 'Kolkata', '8777588538', '', '', '', '', '', '', 'Active'),
(12, 'Technical Heat and Cooling', 'tha@tha.com', '388ad1c312a488ee9e12998fe097f2258fa8d5ee', '42354 Oakland dr', '2247300495', '', '', '', '', '', '', 'Active'),
(14, 'Exon Inc', 'ss@exon.com', '', '', '2247300495', '', '', '', '', '', '', 'Active'),
(17, 'ABC Inc', 'abc@gmail.com', '', '', '342342342', '', '', '', '', '', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `rs_customer_address`
--

CREATE TABLE `rs_customer_address` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `street_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rs_customer_address`
--

INSERT INTO `rs_customer_address` (`id`, `customer_id`, `street_address`, `city`, `state`, `zipcode`) VALUES
(1, 2, '12 ST', 'Habra', 'west bengal', '700078'),
(2, 3, '', '', '', ''),
(3, 7, '', 'Kolkata', '', ''),
(4, 12, '42354 Oakland dr', '', '', ''),
(5, 13, 'gdfg', 'dfgd', 'test', '34234'),
(6, 14, '42354 Oakland dr, PURBABARUI PARA', 'Canton', 'MICHIGAN', '48188'),
(7, 15, 'kolkata', 'westbengal', 'AA', '70001'),
(8, 16, 'wqwe', 'eqweqwe', 'qweqwe', 'qweqwe'),
(9, 17, '3234', 'eqweqwe', 'MI', '12456');

-- --------------------------------------------------------

--
-- Table structure for table `rs_menus`
--

CREATE TABLE `rs_menus` (
  `id` int(11) NOT NULL,
  `menu` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_menus`
--

INSERT INTO `rs_menus` (`id`, `menu`) VALUES
(1, 'General Settings'),
(2, 'User Group'),
(3, 'Users'),
(4, 'Category'),
(5, 'Sub Category'),
(6, 'Products'),
(9, 'Customers'),
(10, 'Orders');

-- --------------------------------------------------------

--
-- Table structure for table `rs_permission`
--

CREATE TABLE `rs_permission` (
  `usertype_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_permission`
--

INSERT INTO `rs_permission` (`usertype_id`, `menu_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 5),
(2, 4),
(2, 3),
(2, 2),
(5, 6),
(5, 5),
(5, 1),
(3, 5),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rs_plant`
--

CREATE TABLE `rs_plant` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_plant`
--

INSERT INTO `rs_plant` (`plant_id`, `plant_name`, `address`, `customer_id`, `program_id`, `status`) VALUES
(1, 'Plant A', '777 Brockton Avenue, Abington MA 2351', 7, 1, 'Active'),
(3, 'Plant B', '777 Brockton Avenue, Abington MA 2351', 2, 1, 'Active'),
(4, 'Plant C', '777 Brockton Avenue, Abington MA 2351', 2, 1, 'Active'),
(5, 'Plant B', '777 Brockton Avenue, Abington MA 2351', 2, 2, 'Active'),
(6, 'Plant A', '777 Brockton Avenue, Abington MA 2351', 3, 2, 'Active'),
(13, 'Plant new', '123 www ', 17, 1, 'Active'),
(14, 'plant1', 'uyeiwuerhwhurif', 2, 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `rs_program`
--

CREATE TABLE `rs_program` (
  `id` int(11) NOT NULL,
  `program_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rs_program`
--

INSERT INTO `rs_program` (`id`, `program_name`) VALUES
(1, 'Environmental'),
(2, 'Health and Safety');

-- --------------------------------------------------------

--
-- Table structure for table `rs_settings`
--

CREATE TABLE `rs_settings` (
  `id` int(11) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(15) NOT NULL,
  `orig_img` text NOT NULL,
  `tag` enum('Best Seller','Newly Added') NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `printinterest_link` varchar(255) NOT NULL,
  `top_adv_orgimg` text NOT NULL,
  `left_footer_adv_orgimg` text NOT NULL,
  `right_footer_adv_orgimg` text NOT NULL,
  `copyright` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_settings`
--

INSERT INTO `rs_settings` (`id`, `organization`, `address`, `contact_email`, `contact_phone`, `orig_img`, `tag`, `facebook_link`, `twitter_link`, `youtube_link`, `printinterest_link`, `top_adv_orgimg`, `left_footer_adv_orgimg`, `right_footer_adv_orgimg`, `copyright`) VALUES
(1, 'AMI', 'Test Address, Test Address', 'ami@gmail.com', '1234567890', 'thumb_Logo.jpg', 'Newly Added', 'www.facebook.com', 'www.twitter.com', 'www.youtube.com', 'www.print.com', 'thumb_product1.jpg', 'thumb_banner1.jpg', 'thumb_banner2.jpg', 'Copyright © 2019 AMI.All Rights Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `rs_type`
--

CREATE TABLE `rs_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rs_type`
--

INSERT INTO `rs_type` (`type_id`, `type_name`) VALUES
(1, 'Monthly'),
(2, 'Quarterly'),
(3, 'Bi-weekly'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `rs_usertype`
--

CREATE TABLE `rs_usertype` (
  `type_id` int(11) NOT NULL,
  `typename` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_usertype`
--

INSERT INTO `rs_usertype` (`type_id`, `typename`, `status`) VALUES
(1, 'Super Admin', 'Active'),
(2, 'Project Manager', 'Active'),
(3, 'Inspector', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `rs_work`
--

CREATE TABLE `rs_work` (
  `work_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `inspector_id` int(11) NOT NULL,
  `before_work_date` date NOT NULL,
  `after_work_date` date NOT NULL,
  `pm_upload_templete_name` text NOT NULL,
  `pm_upload_templete_link` text NOT NULL,
  `ins_upload_templete_name` text NOT NULL,
  `ins_upload_templete_link` text NOT NULL,
  `add_date` date NOT NULL,
  `edit_date` date NOT NULL,
  `status` enum('New','Review','Complete') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_work`
--

INSERT INTO `rs_work` (`work_id`, `customer_id`, `plant_id`, `program_id`, `type_id`, `inspector_id`, `before_work_date`, `after_work_date`, `pm_upload_templete_name`, `pm_upload_templete_link`, `ins_upload_templete_name`, `ins_upload_templete_link`, `add_date`, `edit_date`, `status`) VALUES
(1, 2, 3, 2, 1, 0, '2019-10-21', '0000-00-00', '2-3-2-1-1571671647-sample.pdf', './uploads/pdf_upload/', '1-Changes.docx', '', '2019-10-21', '0000-00-00', 'Complete'),
(2, 7, 1, 2, 1, 7, '2019-10-21', '0000-00-00', '', '', '2-AMI_Review_Comments_(1).docx', '', '2019-10-21', '0000-00-00', 'Complete'),
(4, 2, 3, 1, 1, 6, '2019-11-03', '0000-00-00', '2-Plant B-1-1-1572820780-AMI_Phase_2_Requirement.docx', '', '4-test3.txt', '', '2019-11-03', '0000-00-00', 'Review'),
(5, 2, 3, 1, 2, 6, '2019-11-03', '0000-00-00', '', '', '5-test.txt', '', '2019-11-03', '0000-00-00', 'Review'),
(6, 2, 3, 1, 1, 9, '2019-11-03', '0000-00-00', '', '', '6-APRIMTECH_ADVISOR.jpg', '', '2019-11-03', '0000-00-00', 'Complete'),
(7, 2, 3, 1, 1, 7, '2019-11-04', '0000-00-00', '', '', '', '', '2019-11-04', '0000-00-00', 'Review'),
(8, 17, 13, 1, 4, 10, '2019-11-07', '0000-00-00', '17-Plant new-1-4-1573142281-Final_Step-by-step_guide_to_enable_Transactions_using_Application_Descriptors_in_S4HANA_1610_On-Premise.pdf', '', '8-Final_Step-by-step_guide_to_enable_Transactions_using_Application_Descriptors_in_S4HANA_1610_On-Premise.pdf', '', '2019-11-07', '0000-00-00', 'Complete'),
(9, 3, 6, 2, 1, 7, '2019-11-07', '0000-00-00', '3-Plant A-2-1-1573167965-01_Ceratizit_Plant_1_11530_Monthly_Jan,_2017.pdf', '', '9-02_Ceratizit_Plant_1_11530_Monthly_Feb,_2017.pdf', '', '2019-11-07', '0000-00-00', 'Complete'),
(10, 3, 0, 1, 2, 6, '2019-11-07', '0000-00-00', '3-Plant A-1-2-1573168242-12_Ceratizit_Plant_1_11530_Monthly_Dec,_2017.pdf', '', '', '', '2019-11-07', '0000-00-00', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `rs_workform`
--

CREATE TABLE `rs_workform` (
  `id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `report_by` varchar(255) NOT NULL COMMENT 'monthly or yearly',
  `activity_inspected` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `observation_note` text NOT NULL,
  `corrective_action` text NOT NULL,
  `completition_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rs_admin_master`
--
ALTER TABLE `rs_admin_master`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `rs_content`
--
ALTER TABLE `rs_content`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `rs_customer`
--
ALTER TABLE `rs_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `rs_customer_address`
--
ALTER TABLE `rs_customer_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rs_menus`
--
ALTER TABLE `rs_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rs_permission`
--
ALTER TABLE `rs_permission`
  ADD KEY `user_id` (`usertype_id`);

--
-- Indexes for table `rs_plant`
--
ALTER TABLE `rs_plant`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `rs_program`
--
ALTER TABLE `rs_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rs_settings`
--
ALTER TABLE `rs_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rs_type`
--
ALTER TABLE `rs_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `rs_usertype`
--
ALTER TABLE `rs_usertype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `rs_work`
--
ALTER TABLE `rs_work`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `rs_workform`
--
ALTER TABLE `rs_workform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rs_admin_master`
--
ALTER TABLE `rs_admin_master`
  MODIFY `admin_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rs_content`
--
ALTER TABLE `rs_content`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rs_customer`
--
ALTER TABLE `rs_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rs_customer_address`
--
ALTER TABLE `rs_customer_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rs_menus`
--
ALTER TABLE `rs_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rs_plant`
--
ALTER TABLE `rs_plant`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rs_program`
--
ALTER TABLE `rs_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rs_settings`
--
ALTER TABLE `rs_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rs_type`
--
ALTER TABLE `rs_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rs_usertype`
--
ALTER TABLE `rs_usertype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rs_work`
--
ALTER TABLE `rs_work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rs_workform`
--
ALTER TABLE `rs_workform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

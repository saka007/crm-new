-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 04:25 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gm`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(20) NOT NULL,
  `leadid` int(20) DEFAULT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `counsilorid` int(20) DEFAULT NULL,
  `booked` int(10) DEFAULT NULL,
  `done` int(10) DEFAULT NULL,
  `not_done` int(10) DEFAULT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `region` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `leadid`, `date`, `counsilorid`, `booked`, `done`, `not_done`, `type`, `region`) VALUES
(1, 2, '1970-01-01', 3, 1, NULL, NULL, 'in_office', 0),
(2, 2, '1970-01-01', 3, 1, NULL, NULL, 'zoom', 0),
(3, 2, '1970-01-01', 3, 1, NULL, NULL, 'zoom', 0),
(4, 2, '1970-01-01', 3, 1, NULL, NULL, 'walk_in', 0),
(5, 2, '1970-01-01', 3, 1, NULL, NULL, 'in_office', 0),
(6, 2, '2020-09-29', 3, 1, NULL, NULL, 'in_office', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_status`
--

CREATE TABLE `client_status` (
  `id` int(20) NOT NULL,
  `leadid` int(20) DEFAULT NULL,
  `date` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `counselorid` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_status_old`
--

CREATE TABLE `client_status_old` (
  `id` int(20) NOT NULL,
  `agreeNo` varchar(20) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `counselorid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_3party_payment`
--

CREATE TABLE `dm_3party_payment` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `Tax` int(20) NOT NULL,
  `payMethod` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_3party_payment_det`
--

CREATE TABLE `dm_3party_payment_det` (
  `id` int(11) NOT NULL,
  `payId` int(11) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_3party_payment_old`
--

CREATE TABLE `dm_3party_payment_old` (
  `id` int(11) NOT NULL,
  `agreeNo` varchar(111) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `Tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payMethod` varchar(55) NOT NULL,
  `particular` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_accounts`
--

CREATE TABLE `dm_accounts` (
  `id` int(11) NOT NULL,
  `account_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_address` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_beneficiary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_admin`
--

CREATE TABLE `dm_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_admin`
--

INSERT INTO `dm_admin` (`id`, `user`, `pwd`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_branch`
--

CREATE TABLE `dm_branch` (
  `id` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `region` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(555) NOT NULL,
  `mobile` varchar(555) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_branch`
--

INSERT INTO `dm_branch` (`id`, `name`, `region`, `address`, `email`, `mobile`, `status`, `website`) VALUES
(1, 'DUBAI', 1, 'Address', 'test@test.com', '1234567890', 1, ''),
(2, 'ABU DHABHI', 1, 'Address', 'test1@test.com', '12345687890', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `dm_client_edu`
--

CREATE TABLE `dm_client_edu` (
  `id` int(20) NOT NULL,
  `leadid` int(20) DEFAULT NULL,
  `date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `con_mark_sheet_m` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_mark_sheet_m_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_mark_sheet_b` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_mark_sheet_b_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ind_mark_sheet_m` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ind_mark_sheet_m_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `revised_eca_m` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `revised_eca_m_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `revised_eca_b` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `revised_eca_b_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `revised_wes_eca_m` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `revised_wes_eca_m_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conv_cert_m` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conv_cert_m_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `revised_wes_eca_b` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `revised_wes_eca_b_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eca_m` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eca_m_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conv_cert_b` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conv_cert_b_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ind_mark_sheet_b` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ind_mark_sheet_b_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bach_seal_trans_unv` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bach_seal_trans_unv_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eca_b` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eca_b_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intermediate` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intermediate_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssc_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dipthi` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_client_personal`
--

CREATE TABLE `dm_client_personal` (
  `id` int(20) NOT NULL,
  `leadid` int(20) DEFAULT NULL,
  `date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `copr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `copr_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_sheet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `client_sheet_a` int(11) NOT NULL,
  `vphoto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vphoto_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `final_visa_docfb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `final_visa_docfb_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `final_visa_docfull` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `final_visa_docfull_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mcert_re` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mcert_re_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bcert` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bcert_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `niddoc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `niddoc_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marraige` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marraige_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ielts` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ielts_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_new` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_new_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pcc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pcc_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume_a` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dipthi` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_client_personal_old`
--

CREATE TABLE `dm_client_personal_old` (
  `id` int(11) NOT NULL,
  `agreeNo` varchar(111) DEFAULT NULL,
  `copr` varchar(50) DEFAULT NULL,
  `copr_a` varchar(20) DEFAULT NULL,
  `vphoto` varchar(50) DEFAULT NULL,
  `vphoto_a` varchar(20) DEFAULT NULL,
  `final_visa_docfb` varchar(50) DEFAULT NULL,
  `final_visa_docfb_a` varchar(20) DEFAULT NULL,
  `final_visa_docfull` varchar(50) DEFAULT NULL,
  `final_visa_docfull_a` varchar(20) DEFAULT NULL,
  `mcert_re` varchar(50) DEFAULT NULL,
  `mcert_re_a` varchar(20) NOT NULL,
  `bcert` varchar(50) DEFAULT NULL,
  `bcert_a` varchar(20) NOT NULL,
  `niddoc` varchar(50) DEFAULT NULL,
  `niddoc_a` varchar(20) NOT NULL,
  `marraige` varchar(50) DEFAULT NULL,
  `marraige_a` varchar(20) DEFAULT NULL,
  `ielts` varchar(50) DEFAULT NULL,
  `ielts_a` varchar(20) DEFAULT NULL,
  `passport` varchar(50) DEFAULT NULL,
  `passport_a` varchar(20) DEFAULT NULL,
  `passport_new` varchar(50) DEFAULT NULL,
  `passport_new_a` varchar(20) DEFAULT NULL,
  `pcc` varchar(50) DEFAULT NULL,
  `pcc_a` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `photo_a` varchar(20) DEFAULT NULL,
  `resume` varchar(50) DEFAULT NULL,
  `resume_a` varchar(20) DEFAULT NULL,
  `date` date NOT NULL,
  `dipthi` int(10) NOT NULL,
  `harish` int(10) NOT NULL,
  `terence` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_contract_file`
--

CREATE TABLE `dm_contract_file` (
  `id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `file` varchar(555) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_contract_file`
--

INSERT INTO `dm_contract_file` (`id`, `country`, `service`, `file`, `status`) VALUES
(1, 1, 1, '1600118406_datenschutzerklaerung.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_countries`
--

CREATE TABLE `dm_countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_countries`
--

INSERT INTO `dm_countries` (`id`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Croatia (Hrvatska)'),
(53, 'Cuba'),
(54, 'Cyprus'),
(55, 'Czech Republic'),
(56, 'Denmark'),
(57, 'Djibouti'),
(58, 'Dominica'),
(59, 'Dominican Republic'),
(60, 'East Timor'),
(61, 'Ecuador'),
(62, 'Egypt'),
(63, 'El Salvador'),
(64, 'Equatorial Guinea'),
(65, 'Eritrea'),
(66, 'Estonia'),
(67, 'Ethiopia'),
(68, 'Falkland Islands (Malvinas)'),
(69, 'Faroe Islands'),
(70, 'Fiji'),
(71, 'Finland'),
(72, 'France'),
(73, 'France, Metropolitan'),
(74, 'French Guiana'),
(75, 'French Polynesia'),
(76, 'French Southern Territories'),
(77, 'Gabon'),
(78, 'Gambia'),
(79, 'Georgia'),
(80, 'Germany'),
(81, 'Ghana'),
(82, 'Gibraltar'),
(83, 'Guernsey'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-Bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Isle of Man'),
(101, 'Indonesia'),
(102, 'Iran (Islamic Republic of)'),
(103, 'Iraq'),
(104, 'Ireland'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Ivory Coast'),
(108, 'Jersey'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jordan'),
(112, 'Kazakhstan'),
(113, 'Kenya'),
(114, 'Kiribati'),
(115, 'Korea, Democratic People\'s Republic of'),
(116, 'Korea, Republic of'),
(117, 'Kosovo'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People\'s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macau'),
(130, 'Macedonia'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestine'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Kitts and Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Vincent and the Grenadines'),
(187, 'Samoa'),
(188, 'San Marino'),
(189, 'Sao Tome and Principe'),
(190, 'Saudi Arabia'),
(191, 'Senegal'),
(192, 'Serbia'),
(193, 'Seychelles'),
(194, 'Sierra Leone'),
(195, 'Singapore'),
(196, 'Slovakia'),
(197, 'Slovenia'),
(198, 'Solomon Islands'),
(199, 'Somalia'),
(200, 'South Africa'),
(201, 'South Georgia South Sandwich Islands'),
(202, 'Spain'),
(203, 'Sri Lanka'),
(204, 'St. Helena'),
(205, 'St. Pierre and Miquelon'),
(206, 'Sudan'),
(207, 'Suriname'),
(208, 'Svalbard and Jan Mayen Islands'),
(209, 'Swaziland'),
(210, 'Sweden'),
(211, 'Switzerland'),
(212, 'Syrian Arab Republic'),
(213, 'Taiwan'),
(214, 'Tajikistan'),
(215, 'Tanzania, United Republic of'),
(216, 'Thailand'),
(217, 'Togo'),
(218, 'Tokelau'),
(219, 'Tonga'),
(220, 'Trinidad and Tobago'),
(221, 'Tunisia'),
(222, 'Turkey'),
(223, 'Turkmenistan'),
(224, 'Turks and Caicos Islands'),
(225, 'Tuvalu'),
(226, 'Uganda'),
(227, 'Ukraine'),
(228, 'United Arab Emirates'),
(229, 'United Kingdom'),
(230, 'United States'),
(231, 'United States minor outlying islands'),
(232, 'Uruguay'),
(233, 'Uzbekistan'),
(234, 'Vanuatu'),
(235, 'Vatican City State'),
(236, 'Venezuela'),
(237, 'Vietnam'),
(238, 'Virgin Islands (British)'),
(239, 'Virgin Islands (U.S.)'),
(240, 'Wallis and Futuna Islands'),
(241, 'Western Sahara'),
(242, 'Yemen'),
(243, 'Zaire'),
(244, 'Zambia'),
(245, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `dm_country_proces`
--

CREATE TABLE `dm_country_proces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_country_proces`
--

INSERT INTO `dm_country_proces` (`id`, `name`, `status`) VALUES
(1, 'Australia', 1),
(2, 'Canada', 1),
(3, 'UK', 1),
(4, 'USA', 1),
(5, 'Poland', 1),
(6, 'South Africa', 1),
(7, 'Hong Kong', 1),
(8, 'Germany', 1),
(9, 'Austria', 1),
(10, 'Dominica', 1),
(11, 'Others', 1),
(12, 'France', 1),
(13, 'Italy', 1),
(14, 'New Zealand ', 1),
(15, 'Spain', 1),
(16, 'Sweden', 1),
(17, 'Ireland', 1),
(18, 'schengen', 1),
(19, 'Chile', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_department`
--

CREATE TABLE `dm_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_department`
--

INSERT INTO `dm_department` (`id`, `name`, `status`) VALUES
(1, 'Admin', 1),
(2, 'Operations', 1),
(4, 'Sales & Operations', 1),
(5, 'Sales', 1),
(6, 'HR', 1),
(7, 'Accounts', 1),
(8, 'Other', 1),
(9, 'IT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_employee`
--

CREATE TABLE `dm_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(555) NOT NULL,
  `photo` varchar(555) NOT NULL,
  `dob` date NOT NULL,
  `role` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `username` varchar(555) NOT NULL,
  `password` varchar(555) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `ppNo` varchar(255) NOT NULL,
  `visaExp` date NOT NULL,
  `department` int(11) DEFAULT NULL,
  `EID` text,
  `doj` date NOT NULL,
  `nationality` varchar(555) NOT NULL,
  `dol` varchar(50) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_employee`
--

INSERT INTO `dm_employee` (`id`, `name`, `email`, `cemail`, `mobile`, `address`, `photo`, `dob`, `role`, `branch`, `region`, `username`, `password`, `status`, `ppNo`, `visaExp`, `department`, `EID`, `doj`, `nationality`, `dol`, `remark`) VALUES
(1, 'Super Admin', '', '', '', '', '', '0000-00-00', 1, 0, 0, 'superadmin', 'dmconsultant', 1, '', '0000-00-00', NULL, NULL, '0000-00-00', '', '', ''),
(2, 'Sohail', 'sohail@gmail.com', '', '1234567890', 'Address', '1600123735download.jpg', '1970-01-01', 4, 1, 1, 'sohail', '123456', 1, '1234567890', '1970-01-01', 5, 'EM123456', '1970-01-01', 'Indian', '', ''),
(3, 'consultest', 'consul@test.com', '', '1234659870', 'Address', '', '2020-09-14', 4, 1, 1, 'consultest', '123456', 1, '1234567890', '2020-09-16', 5, 'EM123456', '2020-09-15', 'Indian', '', '');

--
-- Triggers `dm_employee`
--
DELIMITER $$
CREATE TRIGGER `change_in_data` AFTER UPDATE ON `dm_employee` FOR EACH ROW BEGIN IF (NEW.role != OLD.role) THEN insert into dm_logs (`message`,`action`,`source`) VALUES ("Promotion or Demotion",NEW.id,concat((SELECT name FROM dm_role where id=OLD.role)," to ",(SELECT name from dm_role WHERE id=NEW.role)));
END IF;
IF (NEW.region != OLD.region) THEN insert into dm_logs (`message`,`action`,`source`) VALUES ("Transfers",NEW.id,concat((SELECT name FROM dm_region where id=OLD.region)," to ",(SELECT name from dm_region WHERE id=NEW.region))); END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dm_enquiry`
--

CREATE TABLE `dm_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_enquiry`
--

INSERT INTO `dm_enquiry` (`id`, `name`, `status`) VALUES
(1, 'Email', 1),
(2, 'Call', 1),
(3, 'Walkin', 1),
(4, 'SMS', 1),
(5, 'Existing Client', 1),
(6, 'Seminar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_expense`
--

CREATE TABLE `dm_expense` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `particular` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `addBy` int(11) NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `region` int(11) NOT NULL,
  `branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_fee`
--

CREATE TABLE `dm_fee` (
  `id` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `upfront` decimal(10,2) NOT NULL,
  `prof_fee` decimal(10,2) NOT NULL,
  `firstMonth` decimal(10,2) NOT NULL,
  `secondMonth` decimal(10,2) NOT NULL,
  `thirdMonth` decimal(10,2) NOT NULL,
  `prof_fee_month` decimal(10,2) NOT NULL,
  `firstStage` decimal(10,2) NOT NULL,
  `secondStage` decimal(10,2) NOT NULL,
  `thirdStage` decimal(10,2) NOT NULL,
  `prof_fee_stage` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_gary_contract`
--

CREATE TABLE `dm_gary_contract` (
  `id` int(20) NOT NULL,
  `leadid` int(20) DEFAULT NULL,
  `contract` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `contract_signed` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead`
--

CREATE TABLE `dm_lead` (
  `id` int(11) NOT NULL,
  `fname` varchar(555) NOT NULL,
  `mname` varchar(555) NOT NULL,
  `lname` varchar(555) NOT NULL,
  `email` varchar(555) NOT NULL,
  `phone` varchar(555) NOT NULL,
  `mobile` varchar(555) NOT NULL,
  `nationality` varchar(555) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(55) NOT NULL,
  `country_interest` varchar(555) NOT NULL,
  `service_interest` varchar(555) NOT NULL,
  `market_source` varchar(555) NOT NULL,
  `appointment` date NOT NULL,
  `followup` date NOT NULL,
  `followupstat` int(10) NOT NULL,
  `enquiry` varchar(555) NOT NULL,
  `convet` varchar(555) NOT NULL,
  `regdate` date NOT NULL,
  `last_updated` varchar(20) NOT NULL,
  `stepComplete` int(11) NOT NULL DEFAULT '1',
  `payType` varchar(55) NOT NULL,
  `assignTo` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `payTotal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `paidYet` decimal(10,2) DEFAULT '0.00',
  `payBalance` decimal(10,2) NOT NULL,
  `feeAgreeDate` date NOT NULL,
  `demandAmt` decimal(10,2) NOT NULL,
  `dueDate` date NOT NULL,
  `demdRemark` text NOT NULL,
  `agreeDate` date NOT NULL,
  `Counsilor` int(11) NOT NULL,
  `status` varchar(55) DEFAULT NULL,
  `notf` int(1) NOT NULL DEFAULT '0',
  `type` text NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `novat` int(10) NOT NULL,
  `i_p` varchar(50) NOT NULL,
  `lead_category` varchar(30) NOT NULL,
  `relative` varchar(30) NOT NULL,
  `mstatus` varchar(20) NOT NULL,
  `fnames` varchar(30) NOT NULL,
  `emails` varchar(30) NOT NULL,
  `phones` varchar(30) NOT NULL,
  `mobiles` varchar(30) NOT NULL,
  `sedu` varchar(30) NOT NULL,
  `kids` varchar(30) NOT NULL,
  `sexp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_lead`
--

INSERT INTO `dm_lead` (`id`, `fname`, `mname`, `lname`, `email`, `phone`, `mobile`, `nationality`, `address`, `dob`, `gender`, `country_interest`, `service_interest`, `market_source`, `appointment`, `followup`, `followupstat`, `enquiry`, `convet`, `regdate`, `last_updated`, `stepComplete`, `payType`, `assignTo`, `branch`, `region`, `payTotal`, `discount`, `paidYet`, `payBalance`, `feeAgreeDate`, `demandAmt`, `dueDate`, `demdRemark`, `agreeDate`, `Counsilor`, `status`, `notf`, `type`, `password`, `novat`, `i_p`, `lead_category`, `relative`, `mstatus`, `fnames`, `emails`, `phones`, `mobiles`, `sedu`, `kids`, `sexp`) VALUES
(1, 'saquib123', 'middle', 'family', 'saquibrahmani007@gmail.com', '1234567890', '1234567890', 'Albania', 'Address', '2021-09-20', 'Male', '1', '', '4', '0000-00-00', '1970-01-01', 0, 'Call', '', '2020-09-21', '21-09-2020 03-43-06a', 1, 'Full', 3, 1, 1, '7000.00', '500.00', '6000.00', '500.00', '2020-09-21', '1000.00', '2020-09-30', 'Ass', '2020-09-21', 3, 'Active', 1, '', NULL, 0, '', 'client', 'Aunty', '0', '', '', '', '21-09-2020', '', '', ''),
(2, 'testlead', 'testleadm', 'testleadf', 'a@a.com', '789465789', '789465789', 'Afghanistan', 'Address', '2020-09-21', 'Male', '1', '1', '3', '0000-00-00', '1970-01-01', 0, 'Call', '', '2020-09-21', '21-09-2020 03-55-11a', 1, '', 3, 1, 1, '0.00', '0.00', '0.00', '0.00', '0000-00-00', '0.00', '0000-00-00', '', '0000-00-00', 3, NULL, 0, '', NULL, 0, '', 'Hot', 'Uncle', '', '', '', '', '21-09-2020', '', '', '');

--
-- Triggers `dm_lead`
--
DELIMITER $$
CREATE TRIGGER `lead_transfers` AFTER UPDATE ON `dm_lead` FOR EACH ROW BEGIN IF (NEW.assignTo != OLD.assignTO OR NEW.Counsilor != OLD.Counsilor) THEN
INSERT into lead_logs (leadid,ACTION) VALUES (NEW.id,concat((SELECT name FROM dm_employee WHERE id=OLD.Counsilor)," to ",(SELECT name FROM dm_employee WHERE id=NEW.Counsilor)));
END if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead_assesment`
--

CREATE TABLE `dm_lead_assesment` (
  `Id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `Type` varchar(55) NOT NULL,
  `cob` varchar(555) NOT NULL,
  `phOffice` varchar(555) NOT NULL,
  `marStatus` varchar(555) NOT NULL,
  `haveChild` varchar(555) NOT NULL,
  `noOfChild` varchar(555) NOT NULL,
  `spfname` varchar(255) NOT NULL,
  `spmname` varchar(255) NOT NULL,
  `splname` varchar(255) NOT NULL,
  `spgender` varchar(255) NOT NULL,
  `spdob` date NOT NULL,
  `spcob` varchar(255) NOT NULL,
  `spcitizenof` varchar(255) NOT NULL,
  `spaddress` text NOT NULL,
  `spmobile` varchar(255) NOT NULL,
  `spphHome` varchar(255) NOT NULL,
  `spphOffice` varchar(255) NOT NULL,
  `spemail` varchar(255) NOT NULL,
  `relName` varchar(555) NOT NULL,
  `reRelation` varchar(555) NOT NULL,
  `reCountry` varchar(555) NOT NULL,
  `reAddress` varchar(555) NOT NULL,
  `reStatus` varchar(555) NOT NULL,
  `moveAsset` varchar(555) NOT NULL,
  `inmoveAsset` varchar(555) NOT NULL DEFAULT '',
  `interestIn` varchar(555) NOT NULL DEFAULT '',
  `ownership` varchar(555) NOT NULL DEFAULT '',
  `document` varchar(50) NOT NULL,
  `assesment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead_assesment_desgn`
--

CREATE TABLE `dm_lead_assesment_desgn` (
  `id` int(11) NOT NULL,
  `skillId` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `fromEmpRecMonth` varchar(555) NOT NULL,
  `fromEmpRecYear` varchar(555) NOT NULL,
  `toEmpRecMonth` varchar(555) NOT NULL,
  `toEmpRecYear` varchar(555) NOT NULL,
  `empRecName` varchar(555) NOT NULL,
  `empRecDesign` varchar(555) NOT NULL,
  `empRecType` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead_assesment_edu`
--

CREATE TABLE `dm_lead_assesment_edu` (
  `id` int(11) NOT NULL,
  `skillId` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `fromMonth` varchar(555) NOT NULL,
  `fromYear` varchar(555) NOT NULL,
  `toMonth` varchar(555) NOT NULL,
  `toYear` varchar(555) NOT NULL,
  `pSEduName` varchar(555) NOT NULL,
  `pSEduCourse` varchar(555) NOT NULL,
  `pSEduDegree` varchar(555) NOT NULL,
  `pSEduType` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead_contract`
--

CREATE TABLE `dm_lead_contract` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `contract` varchar(555) NOT NULL,
  `garys` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_lead_contract`
--

INSERT INTO `dm_lead_contract` (`id`, `leadId`, `contract`, `garys`) VALUES
(1, 1, '1600645677_theory.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead_fee`
--

CREATE TABLE `dm_lead_fee` (
  `id` int(11) NOT NULL,
  `lead` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `taxAmt` decimal(10,2) NOT NULL,
  `payDate` date NOT NULL,
  `paidAmt` decimal(10,2) NOT NULL,
  `paidDate` date NOT NULL,
  `profAmt` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead_observation`
--

CREATE TABLE `dm_lead_observation` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `sheet` varchar(555) NOT NULL,
  `emirateId` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead_observation_old`
--

CREATE TABLE `dm_lead_observation_old` (
  `id` int(11) NOT NULL,
  `agreeNo` varchar(111) NOT NULL,
  `obs_sheet` varchar(555) NOT NULL,
  `agreement_sheet` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead_remark`
--

CREATE TABLE `dm_lead_remark` (
  `id` int(11) NOT NULL,
  `lead` int(11) NOT NULL,
  `date` date NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_lead_remark`
--

INSERT INTO `dm_lead_remark` (`id`, `lead`, `date`, `remark`) VALUES
(1, 2, '2020-09-21', 'asasasa');

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead_remark_g`
--

CREATE TABLE `dm_lead_remark_g` (
  `id` int(11) NOT NULL,
  `lead` int(11) NOT NULL,
  `date` date NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_lead_remark_old`
--

CREATE TABLE `dm_lead_remark_old` (
  `id` int(11) NOT NULL,
  `agreeNo` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_leave_history`
--

CREATE TABLE `dm_leave_history` (
  `id` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `applyDate` date NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `approvBy` varchar(555) NOT NULL,
  `remark` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_leave_history`
--

INSERT INTO `dm_leave_history` (`id`, `custId`, `applyDate`, `fromDate`, `toDate`, `type`, `approvBy`, `remark`, `status`, `file`) VALUES
(1, 1, '2020-09-15', '2020-09-15', '2020-09-15', 'Full Day', '', 'asasa', 1, ''),
(2, 1, '2020-09-15', '2020-09-15', '2020-09-15', 'Half Day', '', 'dsadasdsa', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `dm_leave_type`
--

CREATE TABLE `dm_leave_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_leave_type`
--

INSERT INTO `dm_leave_type` (`id`, `name`, `status`) VALUES
(4, 'Medical', 1),
(5, 'Comp Off', 1),
(6, 'Annual Vacation', 1),
(7, 'Full Day', 1),
(8, 'Half Day', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_logs`
--

CREATE TABLE `dm_logs` (
  `id` int(111) NOT NULL,
  `date/time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_observation_file`
--

CREATE TABLE `dm_observation_file` (
  `id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `file` varchar(555) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_old_data`
--

CREATE TABLE `dm_old_data` (
  `id` int(11) NOT NULL,
  `col_0` varchar(255) NOT NULL,
  `col_1` varchar(255) NOT NULL,
  `col_2` varchar(255) NOT NULL,
  `col_3` varchar(255) NOT NULL,
  `col_4` varchar(255) NOT NULL,
  `col_5` varchar(255) NOT NULL,
  `col_6` varchar(255) NOT NULL,
  `col_7` varchar(255) NOT NULL,
  `col_8` varchar(255) NOT NULL,
  `col_9` varchar(255) NOT NULL,
  `col_10` varchar(255) NOT NULL,
  `col_11` varchar(255) NOT NULL,
  `col_12` varchar(255) NOT NULL,
  `col_13` varchar(255) NOT NULL,
  `col_14` varchar(255) NOT NULL,
  `col_15` varchar(255) NOT NULL,
  `col_16` varchar(255) NOT NULL,
  `col_17` varchar(255) NOT NULL,
  `col_18` varchar(255) NOT NULL,
  `col_19` varchar(255) NOT NULL,
  `col_20` varchar(255) NOT NULL,
  `col_21` varchar(255) NOT NULL,
  `col_22` varchar(255) NOT NULL,
  `col_23` varchar(255) NOT NULL,
  `col_24` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_old_payment`
--

CREATE TABLE `dm_old_payment` (
  `id` int(11) NOT NULL,
  `agreeNo` varchar(111) DEFAULT NULL,
  `payCategory` varchar(55) DEFAULT NULL,
  `payMethod` varchar(55) DEFAULT NULL,
  `payTotal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `taxAmt` decimal(10,2) NOT NULL,
  `payBalance` decimal(10,2) NOT NULL,
  `payAmt` decimal(10,2) NOT NULL,
  `totPayAmt` decimal(10,2) NOT NULL,
  `totBalance` decimal(10,2) NOT NULL,
  `nextPayAmt` decimal(10,2) NOT NULL,
  `nextPayDate` varchar(50) NOT NULL,
  `demdRemark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_busines_canada`
--

CREATE TABLE `dm_ops_busines_canada` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `agreeNo` varchar(255) NOT NULL,
  `retnDate` varchar(55) NOT NULL,
  `ecaReceDate` varchar(55) NOT NULL,
  `ecaPackage` varchar(255) NOT NULL,
  `ecaDocStatus` varchar(255) NOT NULL,
  `ecaAssmBody` varchar(255) NOT NULL,
  `ecaApplyDate` varchar(55) NOT NULL,
  `ecaPayMode` varchar(255) NOT NULL,
  `ecaTranSent` varchar(255) NOT NULL,
  `ecaTranStatus` varchar(255) NOT NULL,
  `ecaStatus` varchar(255) NOT NULL,
  `compDate` varchar(55) NOT NULL,
  `expVisit` varchar(255) NOT NULL,
  `expAgent` varchar(255) NOT NULL,
  `expCounty` varchar(255) NOT NULL,
  `expSdate` varchar(55) NOT NULL,
  `expEdate` varchar(55) NOT NULL,
  `ndPA` varchar(55) NOT NULL,
  `ndSpouse` varchar(55) NOT NULL,
  `ndDepend` varchar(55) NOT NULL,
  `pgPA` varchar(55) NOT NULL,
  `pgSpouse` varchar(55) NOT NULL,
  `pgDepend` varchar(55) NOT NULL,
  `piPA` varchar(55) NOT NULL,
  `piSpouse` varchar(55) NOT NULL,
  `piDepend` varchar(55) NOT NULL,
  `eiReceDate` varchar(55) NOT NULL,
  `eiRewDate` varchar(55) NOT NULL,
  `eiFinDate` varchar(55) NOT NULL,
  `eiSentDate` varchar(55) NOT NULL,
  `eiConfDate` varchar(55) NOT NULL,
  `eiSubDate` varchar(55) NOT NULL,
  `eiInvtDate` varchar(55) NOT NULL,
  `eiValdDate` varchar(55) NOT NULL,
  `visaPaySts` varchar(55) NOT NULL,
  `visaPayDate` varchar(55) NOT NULL,
  `docGivDate` varchar(55) NOT NULL,
  `docRecDate` varchar(55) NOT NULL,
  `docStatus` varchar(55) NOT NULL,
  `docRewDate` varchar(55) NOT NULL,
  `docFowDate` varchar(55) NOT NULL,
  `docFeeDate` varchar(55) NOT NULL,
  `docRepDate` varchar(55) NOT NULL,
  `visaReqRecDate` varchar(55) NOT NULL,
  `visaValdDate` varchar(55) NOT NULL,
  `visaInfDate` varchar(55) NOT NULL,
  `visaApptDate` varchar(55) NOT NULL,
  `visaDocRecDate` varchar(55) NOT NULL,
  `visaDocRewDate` varchar(55) NOT NULL,
  `visaDocSubDate` varchar(55) NOT NULL,
  `visaConSentDate` varchar(55) NOT NULL,
  `intwRecDate` varchar(55) NOT NULL,
  `intSchDate` varchar(55) NOT NULL,
  `intInfmDate` varchar(55) NOT NULL,
  `intFixdDate` varchar(55) NOT NULL,
  `intBrfDate` varchar(55) NOT NULL,
  `intDocDate` varchar(55) NOT NULL,
  `intDocRecDate` varchar(55) NOT NULL,
  `intPrep` varchar(55) NOT NULL,
  `intResult` varchar(55) NOT NULL,
  `paReceDate` varchar(55) NOT NULL,
  `paAgreDate` varchar(55) NOT NULL,
  `paSentDate` varchar(55) NOT NULL,
  `paConfDate` varchar(55) NOT NULL,
  `waRecDate` varchar(55) NOT NULL,
  `waInfDate` varchar(55) NOT NULL,
  `waFixDate` varchar(55) NOT NULL,
  `waHandDate` varchar(55) NOT NULL,
  `waDocRecDate` varchar(55) NOT NULL,
  `waDocRewDate` varchar(55) NOT NULL,
  `waDocSignDate` varchar(55) NOT NULL,
  `waAppFinDate` varchar(55) NOT NULL,
  `waAppSubDate` varchar(55) NOT NULL,
  `waAppSentDate` varchar(55) NOT NULL,
  `waFileRecDate` varchar(55) NOT NULL,
  `waReqRecDate` varchar(55) NOT NULL,
  `waMedRecDate` varchar(55) NOT NULL,
  `waMedSubDate` varchar(55) NOT NULL,
  `waPapRecDate` varchar(55) NOT NULL,
  `remark` text NOT NULL,
  `tab1File` varchar(255) NOT NULL,
  `tab2File` varchar(255) NOT NULL,
  `tab3File` varchar(255) NOT NULL,
  `tab4File` varchar(255) NOT NULL,
  `tab5File` varchar(255) NOT NULL,
  `tab6File` varchar(255) NOT NULL,
  `tab7File` varchar(255) NOT NULL,
  `tab8File` varchar(255) NOT NULL,
  `tab9File` varchar(255) NOT NULL,
  `tab10File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_busines_poland`
--

CREATE TABLE `dm_ops_busines_poland` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `agreeNo` varchar(255) NOT NULL,
  `retnDate` varchar(55) NOT NULL,
  `tvApplyDate` varchar(55) NOT NULL,
  `tvResltDate` varchar(55) NOT NULL,
  `tvApprDate` varchar(55) NOT NULL,
  `tvStatus` varchar(55) NOT NULL,
  `poVisitDate` varchar(55) NOT NULL,
  `poRtrnDate` varchar(55) NOT NULL,
  `poStatus` varchar(55) NOT NULL,
  `crRegDate` varchar(55) NOT NULL,
  `crStatus` varchar(55) NOT NULL,
  `baOpenDate` varchar(55) NOT NULL,
  `baStatus` varchar(55) NOT NULL,
  `fundTranDate` varchar(55) NOT NULL,
  `fundStatus` varchar(55) NOT NULL,
  `afPA` varchar(55) NOT NULL,
  `afSpouse` varchar(55) NOT NULL,
  `afDepend` varchar(55) NOT NULL,
  `visaReqRecDate` varchar(55) NOT NULL,
  `visaValdDate` varchar(55) NOT NULL,
  `visaInfDate` varchar(55) NOT NULL,
  `visaApptDate` varchar(55) NOT NULL,
  `visaDocRecDate` varchar(55) NOT NULL,
  `visaDocRewDate` varchar(55) NOT NULL,
  `visaDocSubDate` varchar(55) NOT NULL,
  `visaConSentDate` varchar(55) NOT NULL,
  `waHandDate` varchar(55) NOT NULL,
  `waDocRecDate` varchar(55) NOT NULL,
  `waDocRewDate` varchar(55) NOT NULL,
  `waDocSignDate` varchar(55) NOT NULL,
  `waAppFinDate` varchar(55) NOT NULL,
  `waAppSubDate` varchar(55) NOT NULL,
  `waFormRecDate` varchar(55) NOT NULL,
  `passPA` varchar(55) NOT NULL,
  `passSpouse` varchar(55) NOT NULL,
  `passDepnd` varchar(55) NOT NULL,
  `passStatus` varchar(55) NOT NULL,
  `rvPA` varchar(55) NOT NULL,
  `rvSpouse` varchar(55) NOT NULL,
  `rvDepnd` varchar(55) NOT NULL,
  `rvStatus` varchar(55) NOT NULL,
  `idPA` varchar(55) NOT NULL,
  `idSpouse` varchar(55) NOT NULL,
  `idDepnd` varchar(55) NOT NULL,
  `idStatus` varchar(55) NOT NULL,
  `bioPA` varchar(55) NOT NULL,
  `bioSpouse` varchar(55) NOT NULL,
  `bioDepnd` varchar(55) NOT NULL,
  `bioStatus` varchar(55) NOT NULL,
  `schePA` varchar(55) NOT NULL,
  `scheSpouse` varchar(55) NOT NULL,
  `scheDepnd` varchar(55) NOT NULL,
  `scheStatus` varchar(55) NOT NULL,
  `insurPA` varchar(55) NOT NULL,
  `insurSpouse` varchar(55) NOT NULL,
  `insurDepnd` varchar(55) NOT NULL,
  `insurStatus` varchar(55) NOT NULL,
  `nocPA` varchar(55) NOT NULL,
  `nocSpouse` varchar(55) NOT NULL,
  `nocDepnd` varchar(55) NOT NULL,
  `nocStatus` varchar(55) NOT NULL,
  `itinPA` varchar(55) NOT NULL,
  `itinSpouse` varchar(55) NOT NULL,
  `itinDepnd` varchar(55) NOT NULL,
  `itinStatus` varchar(55) NOT NULL,
  `purPA` varchar(55) NOT NULL,
  `purSpouse` varchar(55) NOT NULL,
  `purDepnd` varchar(55) NOT NULL,
  `purStatus` varchar(55) NOT NULL,
  `pbsPA` varchar(55) NOT NULL,
  `pbsSpouse` varchar(55) NOT NULL,
  `pbsDepnd` varchar(55) NOT NULL,
  `pbsStatus` varchar(55) NOT NULL,
  `bbsPA` varchar(55) NOT NULL,
  `bbsSpouse` varchar(55) NOT NULL,
  `bbsDepnd` varchar(55) NOT NULL,
  `bbsStatus` varchar(55) NOT NULL,
  `licePA` varchar(55) NOT NULL,
  `liceSpouse` varchar(55) NOT NULL,
  `liceDepnd` varchar(55) NOT NULL,
  `liceStatus` varchar(55) NOT NULL,
  `estaPA` varchar(55) NOT NULL,
  `estaSpouse` varchar(55) NOT NULL,
  `estaDepnd` varchar(55) NOT NULL,
  `estaStatus` varchar(55) NOT NULL,
  `partPA` varchar(55) NOT NULL,
  `partSpouse` varchar(55) NOT NULL,
  `partDepnd` varchar(55) NOT NULL,
  `partStatus` varchar(55) NOT NULL,
  `nocOtherPA` varchar(55) NOT NULL,
  `nocOtherSpouse` varchar(55) NOT NULL,
  `nocOtherDepnd` varchar(55) NOT NULL,
  `nocOtherStatus` varchar(55) NOT NULL,
  `remark` text NOT NULL,
  `tab1File` varchar(255) NOT NULL,
  `tab2File` varchar(255) NOT NULL,
  `tab3File` varchar(255) NOT NULL,
  `tab4File` varchar(255) NOT NULL,
  `tab5File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_busines_uk`
--

CREATE TABLE `dm_ops_busines_uk` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `agreeNo` varchar(255) NOT NULL,
  `retnDate` varchar(55) NOT NULL,
  `passPA` varchar(55) NOT NULL,
  `passSpouse` varchar(55) NOT NULL,
  `passDepnd` varchar(55) NOT NULL,
  `idPA` varchar(55) NOT NULL,
  `idSpouse` varchar(55) NOT NULL,
  `idDepnd` varchar(55) NOT NULL,
  `birthPA` varchar(55) NOT NULL,
  `birthSpouse` varchar(55) NOT NULL,
  `birthDepnd` varchar(55) NOT NULL,
  `eduPA` varchar(55) NOT NULL,
  `eduSpouse` varchar(55) NOT NULL,
  `eduDepnd` varchar(55) NOT NULL,
  `pbsPA` varchar(55) NOT NULL,
  `pbsSpouse` varchar(55) NOT NULL,
  `pbsDepnd` varchar(55) NOT NULL,
  `pbcPA` varchar(55) NOT NULL,
  `pbcSpouse` varchar(55) NOT NULL,
  `pbcDepnd` varchar(55) NOT NULL,
  `tplPA` varchar(55) NOT NULL,
  `tplSpouse` varchar(55) NOT NULL,
  `tplDepnd` varchar(55) NOT NULL,
  `tpbPA` varchar(55) NOT NULL,
  `tpbSpouse` varchar(55) NOT NULL,
  `tpbDepnd` varchar(55) NOT NULL,
  `tpsPA` varchar(55) NOT NULL,
  `tpsSpouse` varchar(55) NOT NULL,
  `tpsDepnd` varchar(55) NOT NULL,
  `tpbsPA` varchar(55) NOT NULL,
  `tpbsSpouse` varchar(55) NOT NULL,
  `tpbsDepnd` varchar(55) NOT NULL,
  `tpbcPA` varchar(55) NOT NULL,
  `tpbcSpouse` varchar(55) NOT NULL,
  `tpbcDepnd` varchar(55) NOT NULL,
  `visaReqRecDate` varchar(55) NOT NULL,
  `visaValdDate` varchar(55) NOT NULL,
  `visaInfDate` varchar(55) NOT NULL,
  `visaApptDate` varchar(55) NOT NULL,
  `visaDocRecDate` varchar(55) NOT NULL,
  `visaDocRewDate` varchar(55) NOT NULL,
  `visaDocSubDate` varchar(55) NOT NULL,
  `visaConSentDate` varchar(55) NOT NULL,
  `intwRecDate` varchar(55) NOT NULL,
  `intSchDate` varchar(55) NOT NULL,
  `intInfmDate` varchar(55) NOT NULL,
  `intFixdDate` varchar(55) NOT NULL,
  `intBrfDate` varchar(55) NOT NULL,
  `intDocDate` varchar(55) NOT NULL,
  `intDocRecDate` varchar(55) NOT NULL,
  `intPrep` varchar(55) NOT NULL,
  `intResult` varchar(55) NOT NULL,
  `waHandDate` varchar(55) NOT NULL,
  `waDocRecDate` varchar(55) NOT NULL,
  `waDocRewDate` varchar(55) NOT NULL,
  `waDocSignDate` varchar(55) NOT NULL,
  `waAppFinDate` varchar(55) NOT NULL,
  `waAppSubDate` varchar(55) NOT NULL,
  `waFormRecDate` varchar(55) NOT NULL,
  `remark` text NOT NULL,
  `tab1File` varchar(255) NOT NULL,
  `tab2File` varchar(255) NOT NULL,
  `tab3File` varchar(255) NOT NULL,
  `tab4File` varchar(255) NOT NULL,
  `tab5File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_busines_usa`
--

CREATE TABLE `dm_ops_busines_usa` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `agreeNo` varchar(255) NOT NULL,
  `retnDate` varchar(55) NOT NULL,
  `escAgre` varchar(55) NOT NULL,
  `escAgreDate` varchar(55) NOT NULL,
  `passCopy` varchar(55) NOT NULL,
  `passCopyDate` varchar(55) NOT NULL,
  `escAgreCopy` varchar(55) NOT NULL,
  `escAgreCopyDate` varchar(55) NOT NULL,
  `acouDets` varchar(55) NOT NULL,
  `acouDetsDate` varchar(55) NOT NULL,
  `wireTrans` varchar(55) NOT NULL,
  `wireTransDate` varchar(55) NOT NULL,
  `profFund` varchar(55) NOT NULL,
  `profFundDate` varchar(55) NOT NULL,
  `subAgre` varchar(55) NOT NULL,
  `subAgreDate` varchar(55) NOT NULL,
  `g28` varchar(55) NOT NULL,
  `g28Date` varchar(55) NOT NULL,
  `i526` varchar(55) NOT NULL,
  `i526Date` varchar(55) NOT NULL,
  `w8Ben` varchar(55) NOT NULL,
  `w8BenDate` varchar(55) NOT NULL,
  `passPA` varchar(55) NOT NULL,
  `passSpouse` varchar(55) NOT NULL,
  `passDepnd` varchar(55) NOT NULL,
  `idPA` varchar(55) NOT NULL,
  `idSpouse` varchar(55) NOT NULL,
  `idDepnd` varchar(55) NOT NULL,
  `birthPA` varchar(55) NOT NULL,
  `birthSpouse` varchar(55) NOT NULL,
  `birthDepnd` varchar(55) NOT NULL,
  `eduPA` varchar(55) NOT NULL,
  `eduSpouse` varchar(55) NOT NULL,
  `eduDepnd` varchar(55) NOT NULL,
  `pbsPA` varchar(55) NOT NULL,
  `resmPA` varchar(55) NOT NULL,
  `nDocPA` varchar(55) NOT NULL,
  `nDocSpouse` varchar(55) NOT NULL,
  `nDocDepnd` varchar(55) NOT NULL,
  `nwrPA` varchar(55) NOT NULL,
  `nwrSpouse` varchar(55) NOT NULL,
  `nwrDepnd` varchar(55) NOT NULL,
  `pifPA` varchar(55) NOT NULL,
  `pifSpouse` varchar(55) NOT NULL,
  `pifDepnd` varchar(55) NOT NULL,
  `i526FeePA` varchar(55) NOT NULL,
  `nvcFeePA` varchar(55) NOT NULL,
  `nvcFeeSpouse` varchar(55) NOT NULL,
  `nvcFeeDepent` varchar(55) NOT NULL,
  `ds260PA` varchar(55) NOT NULL,
  `ds260Spouse` varchar(55) NOT NULL,
  `ds260Depent` varchar(55) NOT NULL,
  `ds260Sts` varchar(55) NOT NULL,
  `passCopyPA` varchar(55) NOT NULL,
  `passCopySpouse` varchar(55) NOT NULL,
  `passCopyDepent` varchar(55) NOT NULL,
  `passCopySts` varchar(55) NOT NULL,
  `birthCertPA` varchar(55) NOT NULL,
  `birthCertSpouse` varchar(55) NOT NULL,
  `birthCertDepent` varchar(55) NOT NULL,
  `birthCertSts` varchar(55) NOT NULL,
  `marCertPA` varchar(55) NOT NULL,
  `marCertSpouse` varchar(55) NOT NULL,
  `marCertDepent` varchar(55) NOT NULL,
  `marCertSts` varchar(55) NOT NULL,
  `natIdPA` varchar(55) NOT NULL,
  `natIdSpouse` varchar(55) NOT NULL,
  `natIdDepent` varchar(55) NOT NULL,
  `natIdSts` varchar(55) NOT NULL,
  `resProfPA` varchar(55) NOT NULL,
  `resProfSpouse` varchar(55) NOT NULL,
  `resProfDepent` varchar(55) NOT NULL,
  `resProfSts` varchar(55) NOT NULL,
  `pasPhotoPA` varchar(55) NOT NULL,
  `pasPhotoSpouse` varchar(55) NOT NULL,
  `pasPhotoDepent` varchar(55) NOT NULL,
  `pasPhotoSts` varchar(55) NOT NULL,
  `polCertPA` varchar(55) NOT NULL,
  `polCertSpouse` varchar(55) NOT NULL,
  `polCertDepent` varchar(55) NOT NULL,
  `polCertSts` varchar(55) NOT NULL,
  `visaReqRecDate` varchar(55) NOT NULL,
  `visaValdDate` varchar(55) NOT NULL,
  `visaInfDate` varchar(55) NOT NULL,
  `visaApptDate` varchar(55) NOT NULL,
  `visaDocRecDate` varchar(55) NOT NULL,
  `visaDocRewDate` varchar(55) NOT NULL,
  `visaDocSubDate` varchar(55) NOT NULL,
  `visaConSentDate` varchar(55) NOT NULL,
  `intwRecDate` varchar(55) NOT NULL,
  `intSchDate` varchar(55) NOT NULL,
  `intInfmDate` varchar(55) NOT NULL,
  `intFixdDate` varchar(55) NOT NULL,
  `intBrfDate` varchar(55) NOT NULL,
  `intDocDate` varchar(55) NOT NULL,
  `intDocRecDate` varchar(55) NOT NULL,
  `intPrep` varchar(55) NOT NULL,
  `intResult` varchar(55) NOT NULL,
  `waHandDate` varchar(55) NOT NULL,
  `waDocRecDate` varchar(55) NOT NULL,
  `waDocRewDate` varchar(55) NOT NULL,
  `waDocSignDate` varchar(55) NOT NULL,
  `waAppFinDate` varchar(55) NOT NULL,
  `waAppSubDate` varchar(55) NOT NULL,
  `waFormRecDate` varchar(55) NOT NULL,
  `remark` text NOT NULL,
  `tab1File` varchar(255) NOT NULL,
  `tab2File` varchar(255) NOT NULL,
  `tab3File` varchar(255) NOT NULL,
  `tab4File` varchar(255) NOT NULL,
  `tab5File` varchar(255) NOT NULL,
  `tab6File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_conversation`
--

CREATE TABLE `dm_ops_conversation` (
  `id` int(10) NOT NULL,
  `leadid` int(10) DEFAULT NULL,
  `date` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conversation` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_conversation_old`
--

CREATE TABLE `dm_ops_conversation_old` (
  `id` int(11) NOT NULL,
  `agreeNo` varchar(111) DEFAULT NULL,
  `date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `conversation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_documents`
--

CREATE TABLE `dm_ops_documents` (
  `id` int(11) NOT NULL,
  `opsId` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `tab` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `file` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_documents_old`
--

CREATE TABLE `dm_ops_documents_old` (
  `id` int(11) NOT NULL,
  `opsId` int(11) NOT NULL,
  `agreeNo` varchar(111) NOT NULL,
  `tab` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `file` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_skill_australia`
--

CREATE TABLE `dm_ops_skill_australia` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `retnDate` varchar(55) NOT NULL,
  `agreeNo` varchar(255) NOT NULL,
  `langTest` varchar(255) NOT NULL,
  `testStatus` varchar(255) NOT NULL,
  `expiryDate` varchar(55) NOT NULL,
  `testDate` varchar(55) NOT NULL,
  `testScore` varchar(255) NOT NULL,
  `spLangTest` varchar(255) NOT NULL,
  `anzCode` varchar(255) NOT NULL,
  `chklistDate` varchar(55) NOT NULL,
  `assmAuthority` varchar(255) NOT NULL,
  `assmSubDate` varchar(55) NOT NULL,
  `assmStatus` varchar(255) NOT NULL,
  `spSkillAssm` varchar(255) NOT NULL,
  `eoiLodgDate` varchar(55) NOT NULL,
  `eoiExpDate` varchar(55) NOT NULL,
  `eoiPoint` varchar(255) NOT NULL,
  `eoiStatus` varchar(255) NOT NULL,
  `eoiFund` varchar(255) NOT NULL,
  `eoiState` varchar(555) NOT NULL,
  `nomState` varchar(555) NOT NULL,
  `nomSubDate` varchar(55) NOT NULL,
  `nomExpDate` varchar(55) NOT NULL,
  `itaDate` varchar(55) NOT NULL,
  `itaExpDate` varchar(55) NOT NULL,
  `visaSubDate` date NOT NULL,
  `medExam` varchar(255) NOT NULL,
  `policeClear` varchar(255) NOT NULL,
  `visaStatus` varchar(255) NOT NULL,
  `landDate` varchar(55) NOT NULL,
  `landService` varchar(555) NOT NULL,
  `remark` text NOT NULL,
  `langFile` varchar(255) NOT NULL,
  `skilFile` varchar(255) NOT NULL,
  `eoiFile` varchar(255) NOT NULL,
  `nomFile` varchar(255) NOT NULL,
  `visaFile` varchar(255) NOT NULL,
  `landFile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_skill_canada`
--

CREATE TABLE `dm_ops_skill_canada` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `retnDate` varchar(55) NOT NULL,
  `agreeNo` varchar(255) NOT NULL,
  `ecaReceDate` varchar(55) NOT NULL,
  `ecaPackage` varchar(255) NOT NULL,
  `ecaDocStatus` varchar(255) NOT NULL,
  `ecaAssmBody` varchar(255) NOT NULL,
  `ecaApplyDate` varchar(55) NOT NULL,
  `ecaPayMode` varchar(255) NOT NULL,
  `ecaTranSent` varchar(255) NOT NULL,
  `ecaTranStatus` varchar(255) NOT NULL,
  `ecaStatus` varchar(255) NOT NULL,
  `compDate` varchar(55) NOT NULL,
  `ecaFile` varchar(555) NOT NULL,
  `spQualify` varchar(255) NOT NULL,
  `specaReceDate` varchar(55) NOT NULL,
  `specaPackage` varchar(255) NOT NULL,
  `specaDocStatus` varchar(255) NOT NULL,
  `specaAssmBody` varchar(255) NOT NULL,
  `specaApplyDate` varchar(55) NOT NULL,
  `specaPayMode` varchar(255) NOT NULL,
  `specaTranSent` varchar(255) NOT NULL,
  `specaTranStatus` varchar(255) NOT NULL,
  `specaStatus` varchar(255) NOT NULL,
  `spcompDate` varchar(55) NOT NULL,
  `spEcaFile` varchar(555) NOT NULL,
  `langTest` varchar(255) NOT NULL,
  `testStatus` varchar(255) NOT NULL,
  `expiryDate` varchar(55) NOT NULL,
  `testDate` varchar(55) NOT NULL,
  `testScore` varchar(255) NOT NULL,
  `spLangTest` varchar(255) NOT NULL,
  `langFile` varchar(255) NOT NULL,
  `eeDocReceDate` varchar(55) NOT NULL,
  `eeDocSts` varchar(255) NOT NULL,
  `eePoint` varchar(255) NOT NULL,
  `eeNoc` varchar(255) NOT NULL,
  `eeProfLauDate` varchar(55) NOT NULL,
  `eeProfExpDate` varchar(55) NOT NULL,
  `eeScore` varchar(255) NOT NULL,
  `eeFile` varchar(255) NOT NULL,
  `pnpLaun` varchar(255) NOT NULL,
  `pnpSubDate` varchar(55) NOT NULL,
  `pnpExpDate` varchar(55) NOT NULL,
  `pnpStatus` varchar(255) NOT NULL,
  `pnpFile` varchar(255) NOT NULL,
  `itaReceDate` varchar(55) NOT NULL,
  `itaSubLastDate` varchar(55) NOT NULL,
  `itaDocReceDate` varchar(55) NOT NULL,
  `itaDocSts` varchar(255) NOT NULL,
  `itaSubDate` varchar(55) NOT NULL,
  `itaSts` varchar(255) NOT NULL,
  `itaAddiReqDate` varchar(55) NOT NULL,
  `itaFile` varchar(255) NOT NULL,
  `visaReqDate` varchar(55) NOT NULL,
  `passSentDate` varchar(55) NOT NULL,
  `passReceDate` varchar(55) NOT NULL,
  `visaFile` varchar(255) NOT NULL,
  `landDate` varchar(55) NOT NULL,
  `landService` varchar(555) NOT NULL,
  `landFile` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `university` varchar(50) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `reading` varchar(10) NOT NULL,
  `writing` varchar(10) NOT NULL,
  `listening` varchar(10) NOT NULL,
  `speaking` varchar(10) NOT NULL,
  `statusS` varchar(20) NOT NULL,
  `expirydateS` varchar(20) NOT NULL,
  `readingS` varchar(10) NOT NULL,
  `writingS` varchar(10) NOT NULL,
  `listeningS` varchar(10) NOT NULL,
  `speakingS` varchar(10) NOT NULL,
  `testdateS` varchar(20) NOT NULL,
  `testscoreS` varchar(10) NOT NULL,
  `meetingreq` varchar(10) NOT NULL,
  `meetingreqS` varchar(10) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_skill_canada_old`
--

CREATE TABLE `dm_ops_skill_canada_old` (
  `id` int(11) NOT NULL,
  `retnDate` varchar(55) NOT NULL,
  `agreeNo` varchar(255) NOT NULL,
  `ecaReceDate` varchar(55) NOT NULL,
  `ecaPackage` varchar(255) NOT NULL,
  `ecaDocStatus` varchar(255) NOT NULL,
  `ecaAssmBody` varchar(255) NOT NULL,
  `ecaApplyDate` varchar(55) NOT NULL,
  `ecaPayMode` varchar(255) NOT NULL,
  `ecaTranSent` varchar(255) NOT NULL,
  `ecaTranStatus` varchar(255) NOT NULL,
  `ecaStatus` varchar(255) NOT NULL,
  `compDate` varchar(55) NOT NULL,
  `ecaFile` varchar(555) NOT NULL,
  `spQualify` varchar(255) NOT NULL,
  `specaReceDate` varchar(55) NOT NULL,
  `specaPackage` varchar(255) NOT NULL,
  `specaDocStatus` varchar(255) NOT NULL,
  `specaAssmBody` varchar(255) NOT NULL,
  `specaApplyDate` varchar(55) NOT NULL,
  `specaPayMode` varchar(255) NOT NULL,
  `specaTranSent` varchar(255) NOT NULL,
  `specaTranStatus` varchar(255) NOT NULL,
  `specaStatus` varchar(255) NOT NULL,
  `spcompDate` varchar(55) NOT NULL,
  `spEcaFile` varchar(555) NOT NULL,
  `langTest` varchar(255) NOT NULL,
  `testStatus` varchar(255) NOT NULL,
  `expiryDate` varchar(55) NOT NULL,
  `testDate` varchar(55) NOT NULL,
  `testScore` varchar(255) NOT NULL,
  `spLangTest` varchar(255) NOT NULL,
  `langFile` varchar(255) NOT NULL,
  `eeDocReceDate` varchar(55) NOT NULL,
  `eeDocSts` varchar(255) NOT NULL,
  `eePoint` varchar(255) NOT NULL,
  `eeNoc` varchar(255) NOT NULL,
  `eeProfLauDate` varchar(55) NOT NULL,
  `eeProfExpDate` varchar(55) NOT NULL,
  `eeScore` varchar(255) NOT NULL,
  `eeFile` varchar(255) NOT NULL,
  `pnpLaun` varchar(255) NOT NULL,
  `pnpSubDate` varchar(55) NOT NULL,
  `pnpExpDate` varchar(55) NOT NULL,
  `pnpStatus` varchar(255) NOT NULL,
  `pnpFile` varchar(255) NOT NULL,
  `itaReceDate` varchar(55) NOT NULL,
  `itaSubLastDate` varchar(55) NOT NULL,
  `itaDocReceDate` varchar(55) NOT NULL,
  `itaDocSts` varchar(255) NOT NULL,
  `itaSubDate` varchar(55) NOT NULL,
  `itaSts` varchar(255) NOT NULL,
  `itaAddiReqDate` varchar(55) NOT NULL,
  `itaFile` varchar(255) NOT NULL,
  `visaReqDate` varchar(55) NOT NULL,
  `passSentDate` varchar(55) NOT NULL,
  `passReceDate` varchar(55) NOT NULL,
  `visaFile` varchar(255) NOT NULL,
  `landDate` varchar(55) NOT NULL,
  `landService` varchar(555) NOT NULL,
  `landFile` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `university` varchar(50) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `reading` varchar(10) NOT NULL,
  `writing` varchar(10) NOT NULL,
  `listening` varchar(10) NOT NULL,
  `speaking` varchar(10) NOT NULL,
  `statusS` varchar(20) NOT NULL,
  `expirydateS` varchar(20) NOT NULL,
  `readingS` varchar(10) NOT NULL,
  `writingS` varchar(10) NOT NULL,
  `listeningS` varchar(10) NOT NULL,
  `speakingS` varchar(10) NOT NULL,
  `testdateS` varchar(20) NOT NULL,
  `testscoreS` varchar(10) NOT NULL,
  `meetingreq` varchar(10) NOT NULL,
  `meetingreqS` varchar(10) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `exp_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_student_visa`
--

CREATE TABLE `dm_ops_student_visa` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `retnDate` varchar(55) NOT NULL,
  `agreeNo` varchar(255) NOT NULL,
  `docSubDate` varchar(55) NOT NULL,
  `planTravDate` varchar(55) NOT NULL,
  `descountry` varchar(55) NOT NULL,
  `university` varchar(555) NOT NULL,
  `docReceDate` varchar(55) NOT NULL,
  `appSub` varchar(555) NOT NULL,
  `appStatus` varchar(55) NOT NULL,
  `remark1` text NOT NULL,
  `docFile` varchar(255) NOT NULL,
  `appFile` varchar(255) NOT NULL,
  `remark2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_updated_by`
--

CREATE TABLE `dm_ops_updated_by` (
  `lead_id` int(11) NOT NULL,
  `counselor_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ops_visit_visa`
--

CREATE TABLE `dm_ops_visit_visa` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `retnDate` varchar(55) NOT NULL,
  `agreeNo` varchar(255) NOT NULL,
  `docSubDate` varchar(55) NOT NULL,
  `planTravDate` varchar(55) NOT NULL,
  `descountry` varchar(55) NOT NULL,
  `university` varchar(555) NOT NULL,
  `docReceDate` varchar(55) NOT NULL,
  `appSub` varchar(555) NOT NULL,
  `appStatus` varchar(55) NOT NULL,
  `remark1` text NOT NULL,
  `docFile` varchar(255) NOT NULL,
  `appFile` varchar(255) NOT NULL,
  `remark2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_pay_history`
--

CREATE TABLE `dm_pay_history` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `payMethod` varchar(555) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `payCategory` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `remark` text NOT NULL,
  `canDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_pay_history`
--

INSERT INTO `dm_pay_history` (`id`, `leadId`, `amount`, `date`, `payMethod`, `tax`, `payCategory`, `status`, `remark`, `canDate`) VALUES
(1, 1, '6000.00', '2020-09-21', 'Cash', '300.00', 'Full', 1, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dm_pnp`
--

CREATE TABLE `dm_pnp` (
  `id` int(50) NOT NULL,
  `opsid` int(50) NOT NULL,
  `leadid` int(50) NOT NULL,
  `pnp` varchar(50) NOT NULL,
  `subdate` varchar(50) NOT NULL,
  `expdate` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_pnp_old`
--

CREATE TABLE `dm_pnp_old` (
  `id` int(50) NOT NULL,
  `opsid` int(50) NOT NULL,
  `agreeNo` varchar(111) NOT NULL,
  `pnp` varchar(50) NOT NULL,
  `subdate` varchar(50) NOT NULL,
  `expdate` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_region`
--

CREATE TABLE `dm_region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_region`
--

INSERT INTO `dm_region` (`id`, `name`, `status`) VALUES
(1, 'UAE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_role`
--

CREATE TABLE `dm_role` (
  `id` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_role`
--

INSERT INTO `dm_role` (`id`, `name`, `status`, `type`) VALUES
(1, 'Superadmin', 1, 'SA'),
(2, 'Regional Manager', 1, 'RM'),
(3, 'Branch Manager', 1, 'BM'),
(4, 'Consultant', 1, 'IC');

-- --------------------------------------------------------

--
-- Table structure for table `dm_service`
--

CREATE TABLE `dm_service` (
  `id` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_service`
--

INSERT INTO `dm_service` (`id`, `name`, `status`) VALUES
(1, 'Australia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_source`
--

CREATE TABLE `dm_source` (
  `id` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_source`
--

INSERT INTO `dm_source` (`id`, `name`, `status`) VALUES
(1, 'Google ', 1),
(2, 'WhatsApp', 1),
(3, 'Facebook', 1),
(4, 'Instagram', 1),
(5, 'Naukri', 1),
(6, 'Job Posting', 1),
(7, 'Reference', 1),
(8, 'Walk-in', 1),
(9, 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_task`
--

CREATE TABLE `dm_task` (
  `id` int(11) NOT NULL,
  `task` varchar(555) NOT NULL,
  `dob` date NOT NULL,
  `asignTo` int(11) NOT NULL,
  `asignBy` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_activity`
--

CREATE TABLE `employee_activity` (
  `id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `region` int(11) NOT NULL,
  `log_in_time` datetime NOT NULL,
  `log_out_time` datetime DEFAULT NULL,
  `break_in_time` varchar(50) NOT NULL,
  `break_out_time` varchar(50) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_activity`
--

INSERT INTO `employee_activity` (`id`, `emp_id`, `region`, `log_in_time`, `log_out_time`, `break_in_time`, `break_out_time`, `created_at`, `updated_at`) VALUES
(48, 1, 1, '2020-09-06 00:28:53', '2020-09-06 00:32:09', '12:29:55 AM', '12:31:54 AM', '2020-09-06', '2020-09-21 02:12:14'),
(49, 1, 1, '2020-09-09 01:54:14', '2020-09-09 01:54:51', '1:54:33 AM', '1:54:42 AM', '2020-09-09', '2020-09-21 02:12:16'),
(50, 1, 1, '2020-09-16 16:19:11', '0000-00-00 00:00:00', '5:49:32 PM', '5:49:41 PM', '2020-09-16', '2020-09-21 02:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `gary_prospectss`
--

CREATE TABLE `gary_prospectss` (
  `id` int(10) NOT NULL,
  `ag_no` int(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `old_new` varchar(20) DEFAULT NULL,
  `noc` varchar(100) DEFAULT NULL,
  `counselorid` int(20) DEFAULT NULL,
  `terence` int(10) DEFAULT NULL,
  `date_edit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gary_work_docs`
--

CREATE TABLE `gary_work_docs` (
  `id` int(20) NOT NULL,
  `ag_no` int(20) DEFAULT NULL,
  `docs` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lead_logs`
--

CREATE TABLE `lead_logs` (
  `id` int(10) NOT NULL,
  `date/time` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `leadid` int(10) DEFAULT NULL,
  `ACTION` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_sheets`
--

CREATE TABLE `master_sheets` (
  `id` int(20) NOT NULL,
  `userid` int(20) DEFAULT NULL,
  `file` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `old_data_1`
--

CREATE TABLE `old_data_1` (
  `id` int(10) NOT NULL,
  `Agno` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SignupDate` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientName` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Mobile` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Country` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Branch` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TotalPackage` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PaidAmount` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PendingAmount` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Counselor` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPO1` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPO2` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EcaStatus` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SpouseEca` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IETSstatus` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EEstatus` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Noc` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CRS` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StatusLastUpdated` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PnpSubmitted` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Decision` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Remarks` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `old_data_2`
--

CREATE TABLE `old_data_2` (
  `temp_id` int(20) NOT NULL,
  `id` double DEFAULT NULL,
  `agreeNo` varchar(111) DEFAULT NULL,
  `sign_up_date` varchar(100) DEFAULT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `total_package` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `pending_amount` varchar(100) DEFAULT NULL,
  `counselor` varchar(100) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `old_data_auh`
--

CREATE TABLE `old_data_auh` (
  `id` int(10) NOT NULL,
  `Agno` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SignupDate` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ClientName` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Mobile` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Country` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Branch` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TotalPackage` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PaidAmount` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PendingAmount` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Counselor` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPO1` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPO2` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EcaStatus` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SpouseEca` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IETSstatus` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EEstatus` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Noc` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CRS` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StatusLastUpdated` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PnpSubmitted` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Decision` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Remarks` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `old_data_pun`
--

CREATE TABLE `old_data_pun` (
  `temp_id` int(20) NOT NULL,
  `id` double DEFAULT NULL,
  `sign_up_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agreeNo` double DEFAULT NULL,
  `client_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `counselor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `old_data_shj`
--

CREATE TABLE `old_data_shj` (
  `temp_id` int(20) NOT NULL,
  `id` double DEFAULT NULL,
  `agreeNo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sign_up_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` double DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `counselor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int(20) NOT NULL,
  `counsilorid` int(20) DEFAULT NULL,
  `month` int(10) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `appointment` int(20) DEFAULT NULL,
  `sales` int(30) DEFAULT NULL,
  `leads` int(30) DEFAULT NULL,
  `cold` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadid` (`leadid`),
  ADD KEY `counsilorid` (`counsilorid`);

--
-- Indexes for table `client_status`
--
ALTER TABLE `client_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadid` (`leadid`);

--
-- Indexes for table `client_status_old`
--
ALTER TABLE `client_status_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_3party_payment`
--
ALTER TABLE `dm_3party_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`),
  ADD KEY `leadId_2` (`leadId`);

--
-- Indexes for table `dm_3party_payment_det`
--
ALTER TABLE `dm_3party_payment_det`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payId` (`payId`);

--
-- Indexes for table `dm_3party_payment_old`
--
ALTER TABLE `dm_3party_payment_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_accounts`
--
ALTER TABLE `dm_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `dm_admin`
--
ALTER TABLE `dm_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_branch`
--
ALTER TABLE `dm_branch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `dm_client_edu`
--
ALTER TABLE `dm_client_edu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadid` (`leadid`);

--
-- Indexes for table `dm_client_personal`
--
ALTER TABLE `dm_client_personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadid` (`leadid`);

--
-- Indexes for table `dm_client_personal_old`
--
ALTER TABLE `dm_client_personal_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_contract_file`
--
ALTER TABLE `dm_contract_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_countries`
--
ALTER TABLE `dm_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_country_proces`
--
ALTER TABLE `dm_country_proces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `dm_department`
--
ALTER TABLE `dm_department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `dm_employee`
--
ALTER TABLE `dm_employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `dm_enquiry`
--
ALTER TABLE `dm_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_expense`
--
ALTER TABLE `dm_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_fee`
--
ALTER TABLE `dm_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_gary_contract`
--
ALTER TABLE `dm_gary_contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadid` (`leadid`);

--
-- Indexes for table `dm_lead`
--
ALTER TABLE `dm_lead`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `dm_lead_assesment`
--
ALTER TABLE `dm_lead_assesment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_lead_assesment_desgn`
--
ALTER TABLE `dm_lead_assesment_desgn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skillId` (`skillId`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_lead_assesment_edu`
--
ALTER TABLE `dm_lead_assesment_edu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skillId` (`skillId`),
  ADD KEY `leadId` (`leadId`),
  ADD KEY `leadId_2` (`leadId`);

--
-- Indexes for table `dm_lead_contract`
--
ALTER TABLE `dm_lead_contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`),
  ADD KEY `leadId_2` (`leadId`);

--
-- Indexes for table `dm_lead_fee`
--
ALTER TABLE `dm_lead_fee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead` (`lead`);

--
-- Indexes for table `dm_lead_observation`
--
ALTER TABLE `dm_lead_observation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_lead_observation_old`
--
ALTER TABLE `dm_lead_observation_old`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq` (`agreeNo`);

--
-- Indexes for table `dm_lead_remark`
--
ALTER TABLE `dm_lead_remark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead` (`lead`);

--
-- Indexes for table `dm_lead_remark_g`
--
ALTER TABLE `dm_lead_remark_g`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_lead_remark_old`
--
ALTER TABLE `dm_lead_remark_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_leave_history`
--
ALTER TABLE `dm_leave_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_leave_type`
--
ALTER TABLE `dm_leave_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `dm_logs`
--
ALTER TABLE `dm_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_observation_file`
--
ALTER TABLE `dm_observation_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_old_data`
--
ALTER TABLE `dm_old_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_old_payment`
--
ALTER TABLE `dm_old_payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq` (`agreeNo`);

--
-- Indexes for table `dm_ops_busines_canada`
--
ALTER TABLE `dm_ops_busines_canada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_ops_busines_poland`
--
ALTER TABLE `dm_ops_busines_poland`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_ops_busines_uk`
--
ALTER TABLE `dm_ops_busines_uk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_ops_busines_usa`
--
ALTER TABLE `dm_ops_busines_usa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_ops_conversation`
--
ALTER TABLE `dm_ops_conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadid` (`leadid`);

--
-- Indexes for table `dm_ops_conversation_old`
--
ALTER TABLE `dm_ops_conversation_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_ops_documents`
--
ALTER TABLE `dm_ops_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_ops_documents_old`
--
ALTER TABLE `dm_ops_documents_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_ops_skill_australia`
--
ALTER TABLE `dm_ops_skill_australia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_ops_skill_canada`
--
ALTER TABLE `dm_ops_skill_canada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_ops_skill_canada_old`
--
ALTER TABLE `dm_ops_skill_canada_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_ops_student_visa`
--
ALTER TABLE `dm_ops_student_visa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_ops_visit_visa`
--
ALTER TABLE `dm_ops_visit_visa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_pay_history`
--
ALTER TABLE `dm_pay_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadId` (`leadId`);

--
-- Indexes for table `dm_pnp`
--
ALTER TABLE `dm_pnp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opsid` (`opsid`),
  ADD KEY `leadid` (`leadid`);

--
-- Indexes for table `dm_region`
--
ALTER TABLE `dm_region`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `dm_role`
--
ALTER TABLE `dm_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `dm_service`
--
ALTER TABLE `dm_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `dm_source`
--
ALTER TABLE `dm_source`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `dm_task`
--
ALTER TABLE `dm_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_activity`
--
ALTER TABLE `employee_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gary_prospectss`
--
ALTER TABLE `gary_prospectss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gary_work_docs`
--
ALTER TABLE `gary_work_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gary_work_docs_ibfk_1` (`ag_no`);

--
-- Indexes for table `lead_logs`
--
ALTER TABLE `lead_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadid` (`leadid`);

--
-- Indexes for table `master_sheets`
--
ALTER TABLE `master_sheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `old_data_1`
--
ALTER TABLE `old_data_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_data_2`
--
ALTER TABLE `old_data_2`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `old_data_auh`
--
ALTER TABLE `old_data_auh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_data_pun`
--
ALTER TABLE `old_data_pun`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `old_data_shj`
--
ALTER TABLE `old_data_shj`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counsilorid` (`counsilorid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `client_status`
--
ALTER TABLE `client_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client_status_old`
--
ALTER TABLE `client_status_old`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_3party_payment`
--
ALTER TABLE `dm_3party_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_3party_payment_det`
--
ALTER TABLE `dm_3party_payment_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_3party_payment_old`
--
ALTER TABLE `dm_3party_payment_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_accounts`
--
ALTER TABLE `dm_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_admin`
--
ALTER TABLE `dm_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_branch`
--
ALTER TABLE `dm_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_client_edu`
--
ALTER TABLE `dm_client_edu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_client_personal`
--
ALTER TABLE `dm_client_personal`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_client_personal_old`
--
ALTER TABLE `dm_client_personal_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_contract_file`
--
ALTER TABLE `dm_contract_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_countries`
--
ALTER TABLE `dm_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `dm_country_proces`
--
ALTER TABLE `dm_country_proces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `dm_department`
--
ALTER TABLE `dm_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dm_employee`
--
ALTER TABLE `dm_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dm_enquiry`
--
ALTER TABLE `dm_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dm_expense`
--
ALTER TABLE `dm_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_fee`
--
ALTER TABLE `dm_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_gary_contract`
--
ALTER TABLE `dm_gary_contract`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_lead`
--
ALTER TABLE `dm_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_lead_assesment`
--
ALTER TABLE `dm_lead_assesment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_lead_assesment_desgn`
--
ALTER TABLE `dm_lead_assesment_desgn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_lead_assesment_edu`
--
ALTER TABLE `dm_lead_assesment_edu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_lead_contract`
--
ALTER TABLE `dm_lead_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_lead_fee`
--
ALTER TABLE `dm_lead_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_lead_observation`
--
ALTER TABLE `dm_lead_observation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_lead_observation_old`
--
ALTER TABLE `dm_lead_observation_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_lead_remark`
--
ALTER TABLE `dm_lead_remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_lead_remark_g`
--
ALTER TABLE `dm_lead_remark_g`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_lead_remark_old`
--
ALTER TABLE `dm_lead_remark_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_leave_history`
--
ALTER TABLE `dm_leave_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_leave_type`
--
ALTER TABLE `dm_leave_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dm_logs`
--
ALTER TABLE `dm_logs`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_observation_file`
--
ALTER TABLE `dm_observation_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_old_data`
--
ALTER TABLE `dm_old_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_old_payment`
--
ALTER TABLE `dm_old_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_busines_canada`
--
ALTER TABLE `dm_ops_busines_canada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_busines_poland`
--
ALTER TABLE `dm_ops_busines_poland`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_busines_uk`
--
ALTER TABLE `dm_ops_busines_uk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_busines_usa`
--
ALTER TABLE `dm_ops_busines_usa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_conversation`
--
ALTER TABLE `dm_ops_conversation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_conversation_old`
--
ALTER TABLE `dm_ops_conversation_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_documents`
--
ALTER TABLE `dm_ops_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_documents_old`
--
ALTER TABLE `dm_ops_documents_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_skill_australia`
--
ALTER TABLE `dm_ops_skill_australia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_skill_canada`
--
ALTER TABLE `dm_ops_skill_canada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_skill_canada_old`
--
ALTER TABLE `dm_ops_skill_canada_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_student_visa`
--
ALTER TABLE `dm_ops_student_visa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_ops_visit_visa`
--
ALTER TABLE `dm_ops_visit_visa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_pay_history`
--
ALTER TABLE `dm_pay_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_pnp`
--
ALTER TABLE `dm_pnp`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_region`
--
ALTER TABLE `dm_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_role`
--
ALTER TABLE `dm_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dm_service`
--
ALTER TABLE `dm_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_source`
--
ALTER TABLE `dm_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dm_task`
--
ALTER TABLE `dm_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_activity`
--
ALTER TABLE `employee_activity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `gary_prospectss`
--
ALTER TABLE `gary_prospectss`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gary_work_docs`
--
ALTER TABLE `gary_work_docs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lead_logs`
--
ALTER TABLE `lead_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_sheets`
--
ALTER TABLE `master_sheets`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `old_data_1`
--
ALTER TABLE `old_data_1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `old_data_2`
--
ALTER TABLE `old_data_2`
  MODIFY `temp_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `old_data_auh`
--
ALTER TABLE `old_data_auh`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `old_data_pun`
--
ALTER TABLE `old_data_pun`
  MODIFY `temp_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `old_data_shj`
--
ALTER TABLE `old_data_shj`
  MODIFY `temp_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dm_3party_payment`
--
ALTER TABLE `dm_3party_payment`
  ADD CONSTRAINT `dm_3party_payment_ibfk_1` FOREIGN KEY (`leadId`) REFERENCES `dm_lead` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dm_3party_payment_det`
--
ALTER TABLE `dm_3party_payment_det`
  ADD CONSTRAINT `dm_3party_payment_det_ibfk_1` FOREIGN KEY (`payId`) REFERENCES `dm_3party_payment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

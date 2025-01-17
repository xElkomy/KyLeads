-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2018 at 07:21 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c9`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apps_settings`
--

CREATE TABLE `apps_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `default_value` text NOT NULL,
  `description` text NOT NULL,
  `required` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps_settings`
--

INSERT INTO `apps_settings` (`id`, `name`, `value`, `default_value`, `description`, `required`, `created_at`, `modified_at`) VALUES
(1, 'elements_dir', 'elements', 'elements', '<h4>Elements Directory</h4>\r\n<p>\r\nThe directory where all your element HTML files are stored. This value is relative to the directory in which you installed the application. Do not add a trailing \"/\"\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'images_dir', 'images', 'images', '<h4>Image Directory</h4>\r\n<p>\r\nThis is the main directory for the images used by your elements. The images located in this directory belong to the administrator and can not be deleted by regular users. This directory needs to have <b>full read and write permissions!</b>\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'images_uploadDir', 'images/uploads', 'images/uploads', '<h4>Image Upload Directory</h4>\r\n<p>\r\nThis directory is used to store images uploaded by regular users. Each user will have his/her own directory within this directory. This directory needs to have <b>full read and write permissions!</b>.\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'upload_allowed_types', 'image/gif, image/jpg, image/png', 'image/gif, image/jpg, image/png', '<h4>Allowed Image Types</h4>\r\n<p>\r\nThe types of images users are allowed to upload, separated by \"|\".\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'upload_max_size', '1000', '1000', '<h4>Maximum Upload Filesize</h4>\r\n<p>\r\nThe maximum allowed filesize for images uploaded by users. This number is represents the number of kilobytes. Please note that this number of overruled by possible server settings.\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'images_allowedExtensions', 'jpg|png|gif|svg', 'jpg|png|gif|svg', '<h4>Allowed Extensions</h4>\r\n<p>\r\nThese allowed extensions are used when displayed the image library to the user, only these file types will be visible. \r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'export_pathToAssets', 'elements/bundles|elements/css|images', 'elements/bundles|elements/css|images', '<h4>Assets Included in the export</h4>\r\n<p>\r\nThe collection of asset paths included in the export function. These paths are relative to the folder in which the application was installed and should have NO trailing \"/\". The paths are separated by \"|\".\r\n</p>', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'export_fileName', 'website.zip', 'website.zip', '<h4>The Export File Name</h4>\r\n<p>\r\nThe name of the ZIP archive file downloaded when exporting a site. We recommend using the \".zip\" file extension (others might work, but have not been tested).\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'language', 'english', 'english', '<h4>Application Language</h4>\r\n<p>\r\n\"english\" by default. If you\'re changing this to anything else, please be sure to have all required language files translated and located in the correct folder inside \"/application/languages/yourlanguage\".\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'google_api', '', '', '<h4>Google Maps API</h4>\r\n<p>\r\nTo be able to use Google Maps within blocks, you will need to provide a properly functioning Google Maps API with access to the Geocoding library.\".\r\n</p>', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value` varchar(200) NOT NULL,
  `question_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `outcome_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `auth_token`, `value`, `question_token`, `outcome_token`) VALUES
(78, '61a0bbb6e127e15ae87880e4060f04', 'yes', '', '18986c3ac9e6fb8ad6860ba41173a'),
(79, '2af5f223ac6ae61d4b7940f610dd83', 'Sometimes', '', '068fa7e8992f9a010a10cedb10d9e9'),
(80, '69756c4b05f7acb4908046a49a2467', 'No', '', '616fbfc8c447436d0395c7df5ee57'),
(81, 'bb6944cc4c0388db0881de1cae6a3f', 'yes', 'af868b3e0366a634826816f11c0b45', '18986c3ac9e6fb8ad6860ba41173a'),
(82, '3fc3857d68203456b3823c290b5d93', 'Sometimes', 'af868b3e0366a634826816f11c0b45', '068fa7e8992f9a010a10cedb10d9e9'),
(83, 'c9223660bc7e3ec3f1838143bb83f6', 'no', 'af868b3e0366a634826816f11c0b45', '616fbfc8c447436d0395c7df5ee57'),
(87, '4ce270c340a22d713c87ff04a49f94', 'yes', '6149ea88d6b6678bd8704b981b7fd4', '18986c3ac9e6fb8ad6860ba41173a'),
(88, '93ec18cdc146face7b88e3b2d0a2a5', 'Sometimes', '6149ea88d6b6678bd8704b981b7fd4', '616fbfc8c447436d0395c7df5ee57'),
(89, 'daf170df7d29b6a0f18903aa44062b', 'No', '6149ea88d6b6678bd8704b981b7fd4', '18986c3ac9e6fb8ad6860ba41173a'),
(90, '0c65d282f836c260f390707a9bfb7c', 'yes', '462143223ec7e971d5719677ca0b68', '18986c3ac9e6fb8ad6860ba41173a'),
(91, '08cbcf83f5ab36fd1191fab1d47fe9', 'sometimes', '462143223ec7e971d5719677ca0b68', '616fbfc8c447436d0395c7df5ee57'),
(92, 'd72306116b128abe2d9234d0c4891b', 'no', '462143223ec7e971d5719677ca0b68', '068fa7e8992f9a010a10cedb10d9e9'),
(93, '7ff52b5b5bbcfaa31793cc667180fa', '0 - $40,000', '33a6d33eeedf63e26372aaadda0d74', '5ed3b7a84b5b306c20116dc0309de7'),
(94, 'd0b38aa9b42a8c465894e0ba151cb0', '$40,000 - $60,000', '33a6d33eeedf63e26372aaadda0d74', '02ae949f149f4e9bc61224ef3fbe64'),
(95, '1f0dc114d7d89f5bfa959fc7ffd4b7', '$60,000 - $100,000', '33a6d33eeedf63e26372aaadda0d74', '4b79378ba576beb6a21328a00c3c2c'),
(96, 'b57389bd50d65cde1f96d9c0ef713e', 'More than $100,000', '33a6d33eeedf63e26372aaadda0d74', '4b79378ba576beb6a21328a00c3c2c'),
(106, 'b2835e55f1e56110a1106fc3e38b57a', 'I’m excited. I’ve always wanted to have a garden, ', '066b5cb11261f48138758c197aee2a', '4b79378ba576beb6a21328a00c3c2c'),
(107, '4697542b2847bb649a107c00409f5ae', 'I’m not sure. I might enjoy it, but then again, I’', '066b5cb11261f48138758c197aee2a', '02ae949f149f4e9bc61224ef3fbe64'),
(108, 'be82b29a94a20f8318108d07e9672e6', 'Isn’t there an app for that? Yard work isn’t my th', '066b5cb11261f48138758c197aee2a', '5ed3b7a84b5b306c20116dc0309de7'),
(119, 'b1f7db250053ef4598119f98a374bce', 'yes', '65c0b7657ed40977847665142d7c19', '7d64d2a50d862b2780142bc52b8429'),
(120, '13eaa89088f0dd13371205da44a5c5d', 'no', '65c0b7657ed40977847665142d7c19', '96faf78401fd19e92b1544c3fe4fb5'),
(121, 'c99a5407979115bed7121f4109361e2', 'maybe', '65c0b7657ed40977847665142d7c19', '7d64d2a50d862b2780142bc52b8429'),
(122, 'a91d81e82295a155111223b37088931', 'yes', 'bd9144e49c5ebb2ed077fb9ab0e212', '7d64d2a50d862b2780142bc52b8429'),
(123, 'ac541703988792461f123f85ed64ee2', 'no', 'bd9144e49c5ebb2ed077fb9ab0e212', '96faf78401fd19e92b1544c3fe4fb5'),
(124, '4a7b5de08d267ce8db1244f38d162a2', 'maybe', 'bd9144e49c5ebb2ed077fb9ab0e212', '7d64d2a50d862b2780142bc52b8429'),
(125, '04700104a28a00ca8a12553c35c3dd7', 'Yes', '7ba586cd8f14e0b2b778f0afb77ea4', NULL),
(126, '358518f1a730e39731126ddd1c814ea', 'Sometimes', '7ba586cd8f14e0b2b778f0afb77ea4', NULL),
(127, 'd97fc595e8df155197127a91dc01c1f', 'No', '7ba586cd8f14e0b2b778f0afb77ea4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `choices_template`
--

CREATE TABLE `choices_template` (
  `id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL,
  `outcome_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices_template`
--

INSERT INTO `choices_template` (`id`, `value`, `question_id`, `outcome_id`) VALUES
(2, 'fly', 1, 5),
(3, 'Yes', 2, NULL),
(4, 'Sometimes', 2, NULL),
(5, 'No', 2, NULL),
(6, 'one', 11, NULL),
(7, 'one', 11, NULL),
(8, 'dragon', 1, NULL),
(10, 'one', 3, 6),
(11, 'two', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('7v9gfl0e0fair1ot3tv37qclneipn53i', '::1', 1518226060, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383232363036303b),
('9sgcu3l77oeb3h621ap4jmd6894m32e0', '::1', 1518226984, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383232363938343b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b),
('k2kch4m3t1av8tksrskpdsq918nghugj', '::1', 1518227295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383232373239353b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b),
('j23na1mv5ll3pqpojrk283d526scuf8p', '::1', 1518233691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383233333639313b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b),
('pec83q1lbp43gjcalv3qagqmae3u87lh', '::1', 1518240066, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234303036363b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b),
('4fp4a85o7thm2t2pvuk0g73vteo1qeng', '::1', 1518240416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234303431363b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b),
('94ecf93g7n4j6prhuped3nu44u9jpqp2', '::1', 1518240086, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234303038363b),
('qkhuroqu8hg1tkc35a3s5d2bbuj368vo', '::1', 1518240750, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234303735303b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b),
('1m9urvhe8v8jvqdo20akrue2s7ml9gcc', '::1', 1518241058, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234313035383b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b),
('mcfls1437g7krb7619pet54p1ds7hk3o', '::1', 1518241415, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234313431353b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b),
('ufi8mhj1rvuju99vp0ffni1ulnodki7i', '::1', 1518241791, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234313739313b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b),
('2rhiga4mjl1muicrv54h1uolm984r531', '::1', 1518242108, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234323130383b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b),
('kksvu2cskie3uk1p0dtgib05j58oou7b', '::1', 1518242425, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234323432353b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b),
('kvif733m31pgl99bb44quovbqn4v6f3v', '::1', 1518243042, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234333034323b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b),
('l1f0qqtec0hchv60af20srqm9l4idjid', '::1', 1518243168, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383234333034323b757365725f69647c733a32393a223136333037663764333837643139646361313261663235643761613338223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b7175697a70726f6a5f69647c733a32393a226433363236343263623562303363613935653165633136656663626663223b637175697a5f69647c733a33303a22666433663464666364343064643864613739313661353139323637326365223b);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_token`, `auth_token`, `first_name`, `last_name`, `email`, `create_at`) VALUES
(1, '16307f7d387d19dca12af25d7aa38', 'fc003235f3c22f1fc61658175cd13', 'new', '', 'con@gmail.com', '2018-01-14 20:56:33'),
(2, '16307f7d387d19dca12af25d7aa38', '71cabd44346eba43272c85d5d0fb3', 'contact', '', 'con@yahoo.com', '2018-01-14 21:03:13'),
(3, '16307f7d387d19dca12af25d7aa38', '782f95084b540bb2cb306a85c635d', 'K', '', 'K@EMAIL.COM', '2018-01-14 21:47:01'),
(4, '16307f7d387d19dca12af25d7aa38', '22e2f0758ad58c902c4930064638f', 'new', '', 'con@yaho.com', '2018-01-16 01:58:39'),
(5, '16307f7d387d19dca12af25d7aa38', '01b3b37001b43e907351fd7e75dae', 'new', '', 'name@email.org', '2018-01-17 00:42:34'),
(6, '16307f7d387d19dca12af25d7aa38', 'bd513fc6d3fb0ba6b86ac8106174e', 'asdf', '', 'dd@em.com', '2018-01-17 00:43:50'),
(7, '16307f7d387d19dca12af25d7aa38', 'e53548bc4d25ea2a1e7f248586b85', 'Glaidel Guinabo', '', 'anneglaidel@gmail.com', '2018-01-17 16:21:47'),
(8, '16307f7d387d19dca12af25d7aa38', '997f8e5ccc45fed72b80770ba3706', 'lk', '', 'klklklk@l.nlm', '2018-01-18 17:48:05'),
(9, '16307f7d387d19dca12af25d7aa38', '5b33ea536e92ab81a19589fb5d210', 'me', '', 'me@email.com', '2018-01-20 15:27:52'),
(10, '16307f7d387d19dca12af25d7aa38', '38c0637cb47865e93310663fe1f0be', 'em', '', 'mail@e.com', '2018-01-20 15:29:01'),
(11, '16307f7d387d19dca12af25d7aa38', 'bbc047ff7929a7f9d4112f3ed8d234', 'fasdf', '', 'asdf@em.com', '2018-01-20 18:10:53'),
(12, '16307f7d387d19dca12af25d7aa38', 'ed81773ca4a8331c4412b18d8d9894', 'new', '', 'data@email.com', '2018-01-24 01:58:43'),
(13, '16307f7d387d19dca12af25d7aa38', 'ef285ac22e1db57be513771a539661', 'ddd', '', 'ed@mail.com', '2018-01-24 02:02:10'),
(14, 'e0ff604c509bf7ae4a5d177395e086f47', '6d2ac91f6fd147fa2d14efbf5e2dbf', 'NEW', '', 'new@mai.com', '2018-01-24 02:39:37'),
(15, '16307f7d387d19dca12af25d7aa38', 'a92a07ce020a68447c153a6a3f57be', 'kdkd', '', 'kdkd@mail.com', '2018-01-24 21:39:45'),
(16, '16307f7d387d19dca12af25d7aa38', '70a1224eb1e3f30d21161fddf3152c', 'first', '', 'last@mail.com', '2018-01-25 22:00:51'),
(17, '16307f7d387d19dca12af25d7aa38', 'b56f7b750c92e2d06a172de9479da6', 'click', '', 'here@tosubscribe.com', '2018-01-25 22:04:07'),
(18, '16307f7d387d19dca12af25d7aa38', 'edb3bd60364349fded184a1c2d2126', '', '', 'dsdssdsd@sdsdsds', '2018-01-26 00:13:21'),
(19, '16307f7d387d19dca12af25d7aa38', '122d62e9813a61eea4199562decbc7', 'name', '', 'lastname@mail.com', '2018-02-09 21:41:49'),
(20, '16307f7d387d19dca12af25d7aa38', 'bd17900e723c4e4c00201e8dc7211f', 'asdf', '', 'asdf@l.com', '2018-02-09 21:44:10'),
(21, '16307f7d387d19dca12af25d7aa38', '0530529e49933013a22158b607aae9', 'asdf', '', 'asdf@mail.com', '2018-02-10 13:48:20'),
(22, '16307f7d387d19dca12af25d7aa38', 'f14e5363158ba663d42226dba6311e', 'asdf', '', 's@mail.com', '2018-02-10 13:48:38'),
(23, '16307f7d387d19dca12af25d7aa38', '6d42f7e553e847b9cd232e37e6e60a', 'ssdf', '', 'asd@df.com', '2018-02-10 13:54:44'),
(24, '16307f7d387d19dca12af25d7aa38', '77a5d81b154bdf5bd8246e4773144b', 'asdf', '', 'sdf@gl.com', '2018-02-10 13:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_results`
--

CREATE TABLE `contacts_results` (
  `id` int(11) NOT NULL,
  `contact_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `quiz_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `outcome_id` int(11) NOT NULL,
  `outcome_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts_results`
--

INSERT INTO `contacts_results` (`id`, `contact_token`, `quiz_id`, `quiz_token`, `outcome_id`, `outcome_token`, `create_at`) VALUES
(1, 'fc003235f3c22f1fc61658175cd13', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 11, '5ed3b7a84b5b306c20116dc0309de7', '2018-01-14 20:56:33'),
(2, '71cabd44346eba43272c85d5d0fb3', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 11, '5ed3b7a84b5b306c20116dc0309de7', '2018-01-14 21:03:13'),
(3, '782f95084b540bb2cb306a85c635d', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 13, '4b79378ba576beb6a21328a00c3c2c', '2018-01-14 21:47:02'),
(4, '22e2f0758ad58c902c4930064638f', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 12, '02ae949f149f4e9bc61224ef3fbe64', '2018-01-16 01:58:39'),
(5, '01b3b37001b43e907351fd7e75dae', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 11, '5ed3b7a84b5b306c20116dc0309de7', '2018-01-17 00:42:34'),
(6, 'bd513fc6d3fb0ba6b86ac8106174e', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 13, '4b79378ba576beb6a21328a00c3c2c', '2018-01-17 00:43:51'),
(7, 'e53548bc4d25ea2a1e7f248586b85', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 11, '5ed3b7a84b5b306c20116dc0309de7', '2018-01-17 16:21:47'),
(8, '997f8e5ccc45fed72b80770ba3706', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 11, '5ed3b7a84b5b306c20116dc0309de7', '2018-01-18 17:48:06'),
(9, '5b33ea536e92ab81a19589fb5d210', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 12, '02ae949f149f4e9bc61224ef3fbe64', '2018-01-20 15:27:52'),
(10, '38c0637cb47865e93310663fe1f0be', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 11, '5ed3b7a84b5b306c20116dc0309de7', '2018-01-20 15:29:01'),
(11, 'bbc047ff7929a7f9d4112f3ed8d234', 16, 'fd3f4dfcd40dd8da7916a5192672ce', 13, '4b79378ba576beb6a21328a00c3c2c', '2018-01-20 18:10:53'),
(12, 'ed81773ca4a8331c4412b18d8d9894', 0, 'fd3f4dfcd40dd8da7916a5192672ce', 0, '4b79378ba576beb6a21328a00c3c2c', '2018-01-24 01:58:43'),
(13, 'ef285ac22e1db57be513771a539661', 0, 'fd3f4dfcd40dd8da7916a5192672ce', 0, '5ed3b7a84b5b306c20116dc0309de7', '2018-01-24 02:02:10'),
(14, '6d2ac91f6fd147fa2d14efbf5e2dbf', 0, '3616a3c9516ed0aeba2025d48a2a30', 0, '7d64d2a50d862b2780142bc52b8429', '2018-01-24 02:39:38'),
(15, 'a92a07ce020a68447c153a6a3f57be', 0, 'fd3f4dfcd40dd8da7916a5192672ce', 0, '5ed3b7a84b5b306c20116dc0309de7', '2018-01-24 21:39:45'),
(16, '70a1224eb1e3f30d21161fddf3152c', 0, 'fd3f4dfcd40dd8da7916a5192672ce', 0, '4b79378ba576beb6a21328a00c3c2c', '2018-01-25 22:00:51'),
(17, 'b56f7b750c92e2d06a172de9479da6', 0, 'fd3f4dfcd40dd8da7916a5192672ce', 0, '5ed3b7a84b5b306c20116dc0309de7', '2018-01-25 22:04:07'),
(18, 'edb3bd60364349fded184a1c2d2126', 0, 'fd3f4dfcd40dd8da7916a5192672ce', 0, '4b79378ba576beb6a21328a00c3c2c', '2018-01-26 00:13:21'),
(19, '122d62e9813a61eea4199562decbc7', 0, 'fd3f4dfcd40dd8da7916a5192672ce', 0, '02ae949f149f4e9bc61224ef3fbe64', '2018-02-09 21:41:50'),
(20, 'bd17900e723c4e4c00201e8dc7211f', 0, 'fd3f4dfcd40dd8da7916a5192672ce', 0, '5ed3b7a84b5b306c20116dc0309de7', '2018-02-09 21:44:10'),
(21, 'f14e5363158ba663d42226dba6311e', 0, 'fd3f4dfcd40dd8da7916a5192672ce', 0, '4b79378ba576beb6a21328a00c3c2c', '2018-02-10 13:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `core_settings`
--

CREATE TABLE `core_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `default_value` text NOT NULL,
  `description` text NOT NULL,
  `required` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `core_settings`
--

INSERT INTO `core_settings` (`id`, `name`, `value`, `default_value`, `description`, `required`, `created_at`, `modified_at`) VALUES
(1, 'auto_update', 'yes', 'yes', '<h5>Auto Update</h5>\n<p>\nAutomatic update core system when there is update available in SBPro.\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'license_key', '', '', '<h5>License Key</h5>\n			<p>\n				License Key, without this key you are unable to get further updates.\n			</p>', 1, '2017-12-08 15:15:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cta_clicks`
--

CREATE TABLE `cta_clicks` (
  `id` int(11) NOT NULL,
  `quiz_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cta_clicks`
--

INSERT INTO `cta_clicks` (`id`, `quiz_token`, `user_token`, `create_at`) VALUES
(1, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-11 22:51:03'),
(2, '', '', '2018-01-13 18:01:41'),
(3, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 02:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `frames`
--

CREATE TABLE `frames` (
  `frames_id` int(11) NOT NULL,
  `pages_id` int(11) NOT NULL,
  `sites_id` int(11) NOT NULL,
  `frames_content` text NOT NULL,
  `frames_height` varchar(20) NOT NULL,
  `frames_original_url` varchar(255) NOT NULL,
  `frames_loaderfunction` varchar(255) NOT NULL,
  `frames_sandbox` int(1) NOT NULL DEFAULT '0',
  `frames_timestamp` int(11) NOT NULL,
  `frames_global` int(1) NOT NULL DEFAULT '0',
  `revision` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frames`
--

INSERT INTO `frames` (`frames_id`, `pages_id`, `sites_id`, `frames_content`, `frames_height`, `frames_original_url`, `frames_loaderfunction`, `frames_sandbox`, `frames_timestamp`, `frames_global`, `revision`, `created_at`, `modified_at`) VALUES
(1, 7, 7, '<html><head>\n    <meta charset=\"utf-8\">\n    <title>Header</title>\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    \n    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->\n    <!--[if lt IE 9]>\n      <script src=\"js/html5shiv.js\"></script>\n      <script src=\"js/respond.min.js\"></script>\n    <![endif]-->\n<link href=\"../bundles/Yummy_content.css\" rel=\"stylesheet\"><style type=\"text/css\">@import url(https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900);</style><style type=\"text/css\">@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700,900);</style><link rel=\"stylesheet\" href=\"blob:http://localhost:8084/1c09a2a9-30bf-436c-ab90-20ea635d8b45\"><link rel=\"stylesheet\" href=\"../css/blocks.css\" type=\"text/css\" media=\"screen\" charset=\"utf-8\" id=\"mediumCss0\"></head><body style=\"\">\n\n    <div id=\"page\" class=\"page\">\n\n        <div class=\"block content background-cover center-center padding-top-100 padding-bottom-100\" style=\"background-color: #2D8598\" id=\"content2\">\n\n            <div class=\"container\">\n\n                <div class=\"row v-center\" data-component=\"grid\" draggable=\"true\">\n\n                    <div class=\"col-md-5 v-align\">\n\n                        <div class=\"sbpro-bg-styler text-center text-white\" data-container=\"true\">\n\n                            <div data-content=\"true\" data-component=\"heading\" draggable=\"true\">\n                                <h3 style=\"margin-top: 0px;\" class=\"\">Revolutionairy Builder</h3>\n                            </div>\n\n                            <div data-content=\"true\" data-component=\"text\" draggable=\"true\">\n                                <p>\n                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven\n                                </p>\n                            </div>\n\n                            <div data-component=\"button\" draggable=\"true\">\n                                <a href=\"#\" class=\"btn btn-info btn-wide\">Explore SiteBuilder</a>\n                            </div>\n\n                        </div><!-- /data-container -->\n\n                    </div><!-- /.col -->\n\n                    <div class=\"col-md-6 col-md-offset-1\">\n\n                        <div data-container=\"true\">\n\n                            <div data-component=\"image\" draggable=\"true\">\n                                <img src=\"../bundles/fd1abbac95ae4d9f2633e6f391414103.jpg\" class=\"img-rounded\">\n                            </div>\n\n                        </div><!-- /data-container -->\n\n                    </div><!-- /.col -->\n\n                </div><!-- /.row -->\n\n            </div><!-- /.container -->\n\n        </div>\n\n    </div>\n    \n<script type=\"text/javascript\" src=\"../bundles/Yummy_content.bundle.js\"></script>\n\n</body>', '843', 'http://localhost:8084/elements/Yummy/content2.html', '', 0, 1512930472, 0, 1, NULL, NULL),
(2, 7, 7, '<html><head>\n    <meta charset=\"utf-8\">\n    <title>Header</title>\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    \n    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->\n    <!--[if lt IE 9]>\n      <script src=\"js/html5shiv.js\"></script>\n      <script src=\"js/respond.min.js\"></script>\n    <![endif]-->\n<link href=\"../bundles/Yummy_content.css\" rel=\"stylesheet\"><style type=\"text/css\">@import url(https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900);</style><style type=\"text/css\">@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700,900);</style><link rel=\"stylesheet\" href=\"blob:http://localhost:8084/253e6c83-35b9-4d43-bf9a-38ecb0805abe\"><link rel=\"stylesheet\" href=\"../css/blocks.css\" type=\"text/css\" media=\"screen\" charset=\"utf-8\" id=\"mediumCss0\"></head><body style=\"\">\n\n    <div id=\"page\" class=\"page\">\n\n        <div class=\"block content background-cover center-center padding-top-100 padding-bottom-100\" id=\"content8\">\n\n            <div class=\"container\">\n\n                <div class=\"row sb_hover\" data-component=\"grid\" draggable=\"true\">\n\n                    <div class=\"col-md-12\">\n\n                        <div data-container=\"true\">\n\n                            <div data-content=\"true\" data-component=\"heading\" draggable=\"true\">\n                                <h2>RLorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>\n                            </div>\n\n                            <div data-content=\"true\" data-component=\"text\" draggable=\"true\">\n                                <p class=\"lead\" style=\"margin-bottom: 50px;\">\n                                    Suspendisse potenti. Proin hendrerit ornare dictum. Quisque nunc arcu, lacinia et elit et, adipiscing malesuada felis. Nullam quam augue, euismod vitae turpis sed.\n                                </p>\n                            </div>\n\n                        </div><!-- /data-container -->\n\n                    </div><!-- /.col -->\n\n                </div><!-- /.row -->\n\n                <div class=\"row\" data-component=\"grid\" draggable=\"true\">\n\n                    <div class=\"col-md-4\">\n\n                        <div class=\"sbpro-bg-styler padding-sm\" data-container=\"true\">\n\n                            <div data-component=\"image\" draggable=\"true\">\n                                <img src=\"../bundles/3e3d69e3fe6896fc37aa2542462fe05e.jpg\" class=\"img-rounded\">\n                            </div>\n\n                            <div data-content=\"true\" data-component=\"heading\" draggable=\"true\">\n                                <h3 class=\"\">Column One</h3>\n                            </div>\n\n                            <div data-content=\"true\" data-component=\"text\" draggable=\"true\">\n                                <p>\n                                    Ut non lobortis est. Ut dictum scelerisque luctus. Aliquam condimentum interdum odio, et fermentum nulla pharetra in. Praesent pellentesque neque nec eros tempus, ac venenatis ante interdum.\n                                </p>\n                            </div>\n\n                        </div><!-- /data-container -->\n\n                    </div><!-- /.col -->\n\n                    <div class=\"col-md-4\">\n\n                        <div class=\"sbpro-bg-styler padding-sm\" data-container=\"true\">\n\n                            <div data-component=\"image\" draggable=\"true\">\n                                <img src=\"../bundles/63e2a45aeb51eb331c87e579acb4c111.jpg\" class=\"img-rounded\">\n                            </div>\n\n                            <div data-content=\"true\" data-component=\"heading\" draggable=\"true\">\n                                <h3>Column Two</h3>\n                            </div>\n\n                            <div data-content=\"true\" data-component=\"text\" draggable=\"true\">\n                                <p>\n                                    Ut non lobortis est. Ut dictum scelerisque luctus. Aliquam condimentum interdum odio, et fermentum nulla pharetra in. Praesent pellentesque neque nec eros tempus, ac venenatis ante interdum.\n                                </p>\n                            </div>\n\n                        </div><!-- /data-container -->\n\n                    </div><!-- /.col -->\n\n                    <div class=\"col-md-4\">\n\n                        <div class=\"sbpro-bg-styler padding-sm\" data-container=\"true\">\n\n                            <div data-component=\"image\" draggable=\"true\">\n                                <img src=\"../bundles/3015796187f7488d04acd4c82b311ae9.jpg\" class=\"img-rounded\">\n                            </div>\n\n                            <div data-content=\"true\" data-component=\"heading\" draggable=\"true\">\n                                <h3>Column Three</h3>\n                            </div>\n\n                            <div data-content=\"true\" data-component=\"text\" draggable=\"true\">\n                                <p>\n                                    Ut non lobortis est. Ut dictum scelerisque luctus. Aliquam condimentum interdum odio, et fermentum nulla pharetra in. Praesent pellentesque neque nec eros tempus, ac venenatis ante interdum.\n                                </p>\n                            </div>\n\n                        </div><!-- /data-container -->\n\n                    </div><!-- /.col -->\n\n                </div><!-- /.row -->\n\n            </div><!-- /.container -->\n\n        </div>\n\n    </div>\n    \n<script type=\"text/javascript\" src=\"../bundles/Yummy_content.bundle.js\"></script>\n\n<div class=\"canvasElToolbar top\" style=\"top: 70px; left: 115.5px;\"><button class=\"edit\"><img src=\"/img/icons/design-24px-glyph_pen-01@2x.png\"></button></div></body>', '2266', 'http://localhost:8084/elements/Yummy/content8.html', '', 0, 1512930568, 0, 0, NULL, NULL),
(3, 10, 10, '<html><head>\n    <meta charset=\"utf-8\">\n    <title>Header</title>\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    \n    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->\n    <!--[if lt IE 9]>\n      <script src=\"js/html5shiv.js\"></script>\n      <script src=\"js/respond.min.js\"></script>\n    <![endif]-->\n<link href=\"../bundles/Yummy_contact.css\" rel=\"stylesheet\"><style type=\"text/css\">@import url(https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900);</style><style type=\"text/css\">@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700,900);</style><link rel=\"stylesheet\" href=\"blob:http://localhost:8084/ca025248-1876-4fae-8bbe-0de328951f44\"><link rel=\"stylesheet\" href=\"../css/blocks.css\" type=\"text/css\" media=\"screen\" charset=\"utf-8\" id=\"mediumCss0\"></head><body>\n\n    <div id=\"page\" class=\"page\">\n\n        <div class=\"block contact full-vheight bottom-center v-align v-single padding-top-20 background-cover\" style=\"background-image: url(\'../bundles/3a075e08d3407a2254e6b534545bb20e.jpg\');\" id=\"contact6\">\n\n            <div class=\"container\">\n\n                <div class=\"row\" data-component=\"grid\" draggable=\"true\">\n\n                    <div class=\"col-md-10 col-md-offset-1 col-sm-12 col-xs-12\">\n\n                        <div data-container=\"true\" class=\"sbpro-bg-styler bg-white border-radius-lg\">\n\n                            <div class=\"row\" data-component=\"grid\" draggable=\"true\">\n\n                                <div class=\"col-md-6\">\n\n                                    <div data-container=\"true\" class=\"sbpro-bg-styler padding-lg\">\n\n                                        <div data-content=\"true\" data-component=\"heading\" draggable=\"true\">\n                                            <h4 class=\"text-uppercase\">GET IN TOUCH</h4>\n                                        </div>\n\n                                        <div data-content=\"true\" data-component=\"text\" draggable=\"true\">\n                                            <p>\n                                                St. Maorqet<br>\n                                                Sabestian Park,<br>\n                                                Niveda\n                                            </p>\n                                        </div>\n\n                                        <div data-content=\"true\" data-component=\"heading\" draggable=\"true\">\n                                            <h4 class=\"text-uppercase\">OFFICE HOURS</h4>\n                                        </div>\n\n                                        <div data-content=\"true\" data-component=\"text\" draggable=\"true\">\n                                            <p>\n                                                Monday - Saturday<br>\n                                                Morning: <b>10.00 AM - 4.00 PM</b>\n                                            </p>\n                                            <p class=\"\">\n                                                Sunday\'s<br>\n                                                Morning: <b>12.00 AM - 2.00 PM</b>\n                                            </p>\n                                        </div>\n\n                                    </div><!-- /data-container -->\n\n                                </div><!-- /.col -->\n\n                                <div class=\"col-md-6\">\n\n                                    <div data-container=\"true\" class=\"sbpro-bg-styler padding-lg\">\n\n                                        <div data-component=\"form\" draggable=\"true\">\n                                        \n                                            <form action=\"\" method=\"post\" class=\"\">\n\n                                                <input type=\"text\" name=\"_honey\" value=\"\" style=\"display:none\">\n                                                <input type=\"hidden\" name=\"_subject\" value=\"Thanks for reaching out.\">\n\n                                                <div data-component=\"form-group\" data-content=\"true\">\n                                                    <div class=\"form-group\">\n                                                        <label for=\"exampleInputEmail1\">Your Name:</label>\n                                                        <input type=\"text\" class=\"form-control\" id=\"name\" placeholder=\"Your name\" name=\"name\">\n                                                    </div>\n                                                </div>\n\n                                                <div data-component=\"form-group\" data-content=\"true\">\n                                                    <div class=\"form-group\">\n                                                        <label for=\"exampleInputEmail1\">Your Email:</label>\n                                                        <input type=\"email\" class=\"form-control\" id=\"email\" placeholder=\"Your email\" name=\"email\">\n                                                    </div>\n                                                </div>\n\n                                                <div data-component=\"form-group\" data-content=\"true\">\n                                                    <div class=\"form-group\">\n                                                        <label for=\"exampleInputEmail1\">Your Message:</label>\n                                                        <textarea class=\"form-control\" id=\"yourmessage\" name=\"message\" rows=\"10\">Your message</textarea>\n                                                    </div>\n                                                </div>\n\n                                                <button type=\"submit\" class=\"btn btn-info btn-block\">Send message</button>\n\n                                            </form>\n\n                                        </div>\n\n                                    </div><!-- /data-container -->\n\n                                </div><!-- /.col -->\n\n                            </div><!-- /data-container -->\n\n                        </div><!-- /data-container -->\n\n                    </div><!-- /.col -->\n\n                </div><!-- /.row -->\n\n            </div><!-- /.container -->\n\n        </div>\n\n    </div>\n    \n<script type=\"text/javascript\" src=\"../bundles/Yummy_contact.bundle.js\"></script>\n\n</body>', '90vh', 'http://localhost:8084/elements/Yummy/contact6.html', '', 0, 1513229622, 0, 0, NULL, NULL),
(4, 10, 10, '<html><head>\n    <meta charset=\"utf-8\">\n    <title>Header</title>\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    \n    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->\n    <!--[if lt IE 9]>\n      <script src=\"js/html5shiv.js\"></script>\n      <script src=\"js/respond.min.js\"></script>\n    <![endif]-->\n<link href=\"../bundles/Yummy_contact.css\" rel=\"stylesheet\"><style type=\"text/css\">@import url(https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900);</style><style type=\"text/css\">@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700,900);</style><link rel=\"stylesheet\" href=\"blob:http://localhost:8084/3cebec3d-c589-46b9-8fba-cf373eae8049\"><link rel=\"stylesheet\" href=\"../css/blocks.css\" type=\"text/css\" media=\"screen\" charset=\"utf-8\" id=\"mediumCss0\"></head><body style=\"\">\n\n    <div id=\"page\" class=\"page\">\n\n        <div class=\"block contact background-cover center-center padding-top-100 padding-bottom-100\" id=\"contact7\">\n\n            <div class=\"container\">\n\n                <div class=\"row v-center\" data-component=\"grid\" draggable=\"true\">\n\n                    <div class=\"col-md-6\">\n\n                        <div data-container=\"true\">\n\n                            <div data-component=\"image\" draggable=\"true\">\n                                <img src=\"../bundles/fbef1503bca37af89961210a566f015a.jpg\" class=\"img-thumbnail\">\n                            </div>\n\n                        </div><!-- /data-container -->\n\n                    </div><!-- /.col -->\n\n                    <div class=\"col-md-5 col-md-offset-1\">\n\n                        <div data-container=\"true\">\n\n                            <div data-component=\"form\" draggable=\"true\">\n\n                                <div data-content=\"true\" data-component=\"heading\" draggable=\"true\">\n                                    <h4 class=\"sb_hover\">we\'d love to hear from you!</h4>\n                                </div>\n                                \n                                <div data-content=\"true\" data-component=\"text\" draggable=\"true\">\n                                    <p>\n                                        E: <a href=\"mailto:info@something.com\">info@something.com</a><br>\n                                        P: +12 345 6789\n                                    </p>\n                                    <p>\n                                        21 Somewhere Street<br>\n                                        Something Town<br>\n                                        90110 Some Country\n                                    </p>  \n                                </div>\n                                \n                                <form action=\"\" method=\"post\" class=\"\">\n\n                                    <input type=\"text\" name=\"_honey\" value=\"\" style=\"display:none\">\n                                    <input type=\"hidden\" name=\"_subject\" value=\"Thanks for reaching out.\">\n\n                                    <div class=\"row\">\n\n                                        <div class=\"col-md-6\">\n\n                                            <div data-component=\"form-group\" data-content=\"true\">\n                                                <div class=\"form-group\">\n                                                    <label for=\"exampleInputEmail1\">Your Name:</label>\n                                                    <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" placeholder=\"Your name\">\n                                                </div>\n                                            </div>\n\n                                        </div><!-- /.col -->\n\n                                        <div class=\"col-md-6\">\n\n                                            <div data-component=\"form-group\" data-content=\"true\">\n                                                <div class=\"form-group\">\n                                                    <label for=\"exampleInputEmail1\">Your Email:</label>\n                                                    <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Your email\">\n                                                </div>\n                                            </div>\n\n                                        </div><!-- /.col -->\n\n                                        <div class=\"col-md-12\">\n\n                                            <div data-component=\"form-group\" data-content=\"true\">\n                                                <div class=\"form-group\">\n                                                    <label for=\"exampleInputEmail1\">Your Message:</label>\n                                                    <textarea class=\"form-control\" id=\"message\" name=\"message\" rows=\"10\">Your message</textarea>\n                                                </div>\n                                            </div>\n\n                                        </div><!-- /.col -->\n\n                                        <div class=\"col-md-12\">\n\n                                            <button type=\"submit\" class=\"btn btn-primary btn-wide\">Send message</button>\n\n                                        </div>\n\n                                    </div><!-- /.row -->\n\n                                </form>\n\n                            </div>\n\n                        </div><!-- /data-container -->\n\n                    </div><!-- /.col -->\n\n                </div><!-- /.row -->\n\n            </div><!-- /.container -->\n\n        </div>\n\n    </div>\n    \n<script type=\"text/javascript\" src=\"../bundles/Yummy_contact.bundle.js\"></script>\n\n<div class=\"canvasElToolbar top\" style=\"top: 1174.81px; left: 125.5px;\"><button class=\"edit\"><img src=\"/img/icons/design-24px-glyph_pen-01@2x.png\"></button><button class=\"content\"><img src=\"/img/icons/design-24px-glyph_text@2x.png\"></button></div></body>', '1975', 'http://localhost:8084/elements/Yummy/contact7.html', '', 0, 1513229622, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `outcomes`
--

CREATE TABLE `outcomes` (
  `id` int(11) NOT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `quiz_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_at` datetime NOT NULL,
  `modify_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outcomes`
--

INSERT INTO `outcomes` (`id`, `auth_token`, `title`, `description`, `quiz_token`, `create_at`, `modify_at`) VALUES
(8, '18986c3ac9e6fb8ad6860ba41173a', 'Your score is 20', 'Newly Added Outcome', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '616fbfc8c447436d0395c7df5ee57', 'Your score is 30', 'Newly Added Outcome', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '068fa7e8992f9a010a10cedb10d9e9', 'Your score is 50', 'Newly Added Outcome', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '5ed3b7a84b5b306c20116dc0309de7', 'Keep renting. It’s the best option for your situation.', 'At this point in your life, your lifestyle and/or your financial situation just don’t line up with home ownership. You prefer independence, having someone else fix and maintain things, and not having a yard to take care of. Even if you did want a home, you might have a bit too much debt, not enough savings, or too low of an income to qualify for a loan.\n\nSo for now, keep renting, and enjoy the flexible lifestyle it affords you. If you’re in an apartment, consider renting something different, like a townhome, condo, or even a house, and see how you like the differences.\nIf you do someday want to purchase a home, get started on improving your financial situation. Here are some goals you can set for yourself:\n\n1)      Pay down your debts. Too much debt makes it much harder to get a loan, unless you have high enough income to put the banks at ease.\n\n2)      Boost your savings. You don’t need tons of money for a down payment, but you do need something. Get something going so you’ll have it when the time comes.\n\n3)      Boost your income. Easier said than done, right? Well, you have time, so look for ways to grow your income. New education or certifications can help in some fields, and so can career switches to jobs with more opportunities for promotion. Start thinking about it…\n\nDisclaimer: This quiz does not constitute formal financial advice. Always seek the help of a professional realtor and/or loan officer before beginning the home-buying process.', 'fd3f4dfcd40dd8da7916a5192672ce', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '02ae949f149f4e9bc61224ef3fbe64', 'You should buy a home or condo, but wait a couple years.', 'You want a place to call your own. You want to change things, make improvements, and make it fit your personality and lifestyle. But your finances just aren’t quite there.\n\nYou might have too-low credit scores, too much debt, or not quite enough savings or income. You might also be self-employed, or you’re juggling multiple part-time jobs. Whatever the case, banks will look for a little more in these areas. So your best option is to wait a couple years and focus on improving your financial situation. A few tips:\n\n1)      Improve your credit scores. Make sure you pay off bills every month, and reduce your debts, starting with the highest interest accounts first.\n\n2)      Build up your savings. You’ll want something for a down payment. It won’t have to be as large as you might think, but you’ll need more than you have now.\n\n3)      Look for ways to grow your income. If you want a home, you’ll need enough so your debts are less than 43% of your income. But if you have a lot of debt, that’s also why paying that down is so important.\n\nDisclaimer: This quiz does not constitute formal financial advice. Always seek the help of a professional realtor and/or loan officer before beginning the home-buying process.', 'fd3f4dfcd40dd8da7916a5192672ce', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '4b79378ba576beb6a21328a00c3c2c', 'You’re ready for your first home!', ' You have the perspective of a homeowner. You’re okay making your own repairs and doing your own maintenance. A yard doesn’t freak you out (or if it does, you can always buy a condo or townhome). And most important of all, you have good financial health: good credit scores, consistently high enough income, few debts, and enough savings.\n\nThis doesn’t mean you should go out and get a loan tomorrow, but it means you should start preparing to see yourself as an owner, and not a renter.\n\nSome things you should do to get prepared for ownership:\n\n1)      Start looking at houses and condos. It’s never too early to see what’s out there. Don’t make any offers yet. Just get a sense of the market, and hopefully some free cookies at open houses too.\n\n2)      Learn the basics of how home loans work. You could research online, or take a training course (realtors sometimes put these on for free). But you need to know how mortgage interest works, the various types of loan options, who pays what fees to whom, and some technical terms like “amortization” and “equity.”\n\n3)      Start researching realtors if you don’t already know a good one. Again, get a feel for what’s out there.\n\n4)      Ask friends who’ve bought homes for advice. Avoid mistakes they may have made.\n\nDisclaimer: This quiz does not constitute formal financial advice. Always seek the help of a professional realtor and/or loan officer before beginning the home-buying process.', 'fd3f4dfcd40dd8da7916a5192672ce', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '7d64d2a50d862b2780142bc52b8429', 'a', 'you choose a\r\n', '3616a3c9516ed0aeba2025d48a2a30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '96faf78401fd19e92b1544c3fe4fb5', 'b', 'you choose b\r\n', '3616a3c9516ed0aeba2025d48a2a30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '088155dd7d1b18ec2917b446b97d07', 'Your Skin Score is 37', 'my description. ', '23b8858c5309d5143c265c060ab9f0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'bc61b893653b349cb318538ce20b15', 'Your Skin Score is 67', 'Your skin is in decent shape.\r\n\r\nYour skin has seen better days, but it could see worse. At the rate that you are going your skin is not going to be in such great shape in the next few years. \r\n\r\n \r\n\r\nThis is mainly because of the many harmful factors of the world today, including pollution and processed food.\r\n\r\n \r\n\r\nBoth of which wreck havoc on the skin.  \r\n\r\n \r\n\r\nTo help combat this you need to start a skin regimen that is designed specifically for the stressors in your environment. \r\n\r\n \r\n\r\nClick the button above the learn more and get started!\r\n\r\n ', '23b8858c5309d5143c265c060ab9f0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'e8111987257e631dc7190635a226fa', 'Your Skin Score is 87', 'Your skin seems to be in pretty great condition! \r\n\r\n \r\n\r\nYou take steps to nourish your skin with care. Have relatively good habits, and your lifestyle somewhat contributes to your skin’s wellness.\r\n\r\n \r\n\r\nHowever, your skin can easily turn from good to bad.\r\n\r\n \r\n\r\nThis is mainly because of the many harmful factors of the world today, including pollution and processed food.\r\n\r\n \r\n\r\nBoth of which wreck havoc on the skin.  \r\n\r\n \r\n\r\nTo help combat this you need to start a skin regimen that is designed specifically for the stressors in your environment. \r\n\r\n \r\n\r\nClick the button above the learn more and get started!\r\n\r\n ', '23b8858c5309d5143c265c060ab9f0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `outcomes_template`
--

CREATE TABLE `outcomes_template` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `modify_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outcomes_template`
--

INSERT INTO `outcomes_template` (`id`, `title`, `description`, `quiz_id`, `create_at`, `modify_at`) VALUES
(5, 'outcome1', 'Newly Added Outcome', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'outcome2', 'Newly Added Outcome', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `gateway` varchar(20) NOT NULL,
  `stripe_id` varchar(100) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `sites_number` int(11) NOT NULL,
  `hosting_option` varchar(100) NOT NULL,
  `export_site` varchar(10) NOT NULL,
  `disk_space` varchar(50) NOT NULL,
  `templates` text NOT NULL,
  `price` double NOT NULL,
  `currency` varchar(20) NOT NULL,
  `subscription` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `gateway`, `stripe_id`, `name`, `sites_number`, `hosting_option`, `export_site`, `disk_space`, `templates`, `price`, `currency`, `subscription`, `status`, `created_at`, `modified_at`) VALUES
(1, '', NULL, 'Free Trial', 4, '', '', '', '', 0, 'dolllar', 'free', 'Active', '2017-12-20 15:21:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` int(11) NOT NULL,
  `sites_id` int(11) NOT NULL,
  `pages_name` varchar(255) NOT NULL,
  `pages_timestamp` int(11) NOT NULL,
  `pages_title` varchar(255) NOT NULL,
  `pages_meta_keywords` text NOT NULL,
  `pages_meta_description` text NOT NULL,
  `pages_header_includes` text NOT NULL,
  `pages_preview` text NOT NULL,
  `pages_template` int(1) NOT NULL DEFAULT '0',
  `pages_css` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `pagethumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `sites_id`, `pages_name`, `pages_timestamp`, `pages_title`, `pages_meta_keywords`, `pages_meta_description`, `pages_header_includes`, `pages_preview`, `pages_template`, `pages_css`, `created_at`, `modified_at`, `pagethumb`) VALUES
(1, 1, 'index', 1512742710, '', '', '', '', '', 0, '', NULL, NULL, ''),
(2, 2, 'index', 1512821794, '', '', '', '', '', 0, '', NULL, NULL, ''),
(3, 3, 'index', 1512821866, '', '', '', '', '', 0, '', NULL, NULL, ''),
(4, 4, 'index', 1512835104, '', '', '', '', '', 0, '', NULL, NULL, ''),
(5, 5, 'index', 1512835137, '', '', '', '', '', 0, '', NULL, NULL, ''),
(6, 6, 'index', 1512835335, '', '', '', '', '', 0, '', NULL, NULL, ''),
(7, 7, 'index', 1512930568, '', '', '', '', '', 0, '', NULL, NULL, ''),
(8, 8, 'index', 1512931593, '', '', '', '', '', 0, '', NULL, NULL, ''),
(9, 9, 'index', 1512935308, '', '', '', '', '', 0, '', NULL, NULL, ''),
(10, 10, 'index', 1513229622, '', '', '', '', '', 0, '', NULL, NULL, ''),
(11, 11, 'index', 1513251481, '', '', '', '', '', 0, '', NULL, NULL, ''),
(12, 12, 'index', 1513405155, '', '', '', '', '', 0, '', NULL, NULL, ''),
(13, 13, 'index', 1513405868, '', '', '', '', '', 0, '', NULL, NULL, ''),
(14, 14, 'index', 1513405909, '', '', '', '', '', 0, '', NULL, NULL, ''),
(15, 15, 'index', 1513761163, '', '', '', '', '', 0, '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_log`
--

CREATE TABLE `payment_log` (
  `id` int(11) NOT NULL,
  `request` text NOT NULL,
  `response` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `default_value` text NOT NULL,
  `description` text NOT NULL,
  `required` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `name`, `value`, `default_value`, `description`, `required`, `created_at`, `modified_at`) VALUES
(1, 'stripe_secret_key', '', '', 'Your Stripe Secret Key.\r\n<br>For more information <a href=\"https://stripe.com/docs/dashboard#api-keys\" target=\"_blank\">Click Here</a>', 0, '0000-00-00 00:00:00', NULL),
(2, 'stripe_publishable_key', '', '', 'Your Stripe Publishable Key.\r\n<br>For more information <a href=\"https://stripe.com/docs/dashboard#api-keys\" target=\"_blank\">Click Here</a>', 0, '0000-00-00 00:00:00', NULL),
(3, 'stripe_test_mode', 'test', 'test', 'Your Stripe Environment', 0, '0000-00-00 00:00:00', NULL),
(4, 'paypal_api_username', '', '', 'Enter your PayPal API username.\r\n<br> For more details <a href=\"https://developer.paypal.com/docs/classic/api/apiCredentials/#create-an-api-signature\" target=\"_blank\">Click Here</a>', 0, '0000-00-00 00:00:00', NULL),
(5, 'paypal_api_password', '', '', 'Enter PayPal API password.\r\n<br> For more details <a href=\"https://developer.paypal.com/docs/classic/api/apiCredentials/#create-an-api-signature\" target=\"_blank\">Click Here</a>', 0, '0000-00-00 00:00:00', NULL),
(6, 'paypal_api_signature', '', '', 'Enter PayPal API signature.\r\n<br> For more details <a href=\"https://developer.paypal.com/docs/classic/api/apiCredentials/#create-an-api-signature\" target=\"_blank\">Click Here</a>', 0, '0000-00-00 00:00:00', NULL),
(7, 'paypal_test_mode', '', '', 'Your PayPal Environment', 0, '0000-00-00 00:00:00', NULL),
(8, 'payment_gateway', 'stripe', 'stripe', 'Select Payment gateway you want for end users.', 0, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `quiz_token` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `auth_token`, `title`, `description`, `quiz_id`, `quiz_token`) VALUES
(67, '42b42ac4b71dd82b446764f27eb2cf', 'Is your skin oily and prone to pimples or acne ?', 'Newly Added Question', 17, '130c9ad7675d1d9a1917e48bd971aa'),
(68, 'af868b3e0366a634826816f11c0b45', 'Is your skin dry ?', 'Newly Added Question', 17, '130c9ad7675d1d9a1917e48bd971aa'),
(70, '6149ea88d6b6678bd8704b981b7fd4', 'Is your skin sensitive ?', 'Newly Added Question', 17, '130c9ad7675d1d9a1917e48bd971aa'),
(71, '462143223ec7e971d5719677ca0b68', 'Skin Question ?', 'Newly Added Question', 17, '130c9ad7675d1d9a1917e48bd971aa'),
(72, '33a6d33eeedf63e26372aaadda0d74', 'What’s your approximate annual income?', 'Newly Added Question', 16, 'fd3f4dfcd40dd8da7916a5192672ce'),
(75, '066b5cb11261f48138758c197aee2a', 'How do you feel about having to take care of a yard ?', 'Newly Added Question', 16, 'fd3f4dfcd40dd8da7916a5192672ce'),
(76, '65c0b7657ed40977847665142d7c19', 'Question to answer  ?', 'Newly Added Question', 0, '3616a3c9516ed0aeba2025d48a2a30'),
(77, 'bd9144e49c5ebb2ed077fb9ab0e212', 'new question ?', 'Newly Added Question', 0, '3616a3c9516ed0aeba2025d48a2a30'),
(78, '7ba586cd8f14e0b2b778f0afb77ea4', 'Is your skin oily and prone to pimples or acne ?', 'Newly Added Question', 0, '23b8858c5309d5143c265c060ab9f0');

-- --------------------------------------------------------

--
-- Table structure for table `questions_template`
--

CREATE TABLE `questions_template` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_template`
--

INSERT INTO `questions_template` (`id`, `title`, `description`, `quiz_id`) VALUES
(1, 'What is your favorite animal ?', 'First Question from template First template', 1),
(2, 'Is your skin oily and prone to pimples or acne?', 'Description', 2),
(3, 'What comes to mind when you think of buying a home?', 'description', 1),
(8, 'New  Question for this quiz try ?', 'Newly Added Question', 2),
(9, 'New  Question for this quiz try ?', 'Newly Added Question', 2);

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `parent_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `create_at` varchar(100) CHARACTER SET utf8 NOT NULL,
  `modify_at` varchar(100) CHARACTER SET utf8 NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `parent_token`, `user_token`, `auth_token`, `title`, `description`, `create_at`, `modify_at`, `isactive`) VALUES
(16, 'd362642cb5b03ca95e1ec16efcbfc', '16307f7d387d19dca12af25d7aa38', 'fd3f4dfcd40dd8da7916a5192672ce', 'Rent vs. Buying Quiz', 'Should I Keep Renting or Buy My First Home?', '1512742710', '1517226472', 1),
(17, '', '', '130c9ad7675d1d9a1917e48bd971aa', 'How healthy is your skin', 'Test you skin', '1512742710', '1512742710', 1),
(20, '3d26a293f3108107ae249ad95d405', 'e0ff604c509bf7ae4a5d177395e086f47', '3616a3c9516ed0aeba2025d48a2a30', 'Yes or no', 'no description', '1516731809', '', 0),
(25, 'd362642cb5b03ca95e1ec16efcbfc', '16307f7d387d19dca12af25d7aa38', '65185f29f1d79a757125dd9e41acb3', 'new quiz', 'new quiz', '1517035678', '1517049345', 0),
(26, 'd362642cb5b03ca95e1ec16efcbfc', '16307f7d387d19dca12af25d7aa38', '23b8858c5309d5143c265c060ab9f0', 'New quiz', 'newly create quiz for documentation', '1518007012', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes_and_categories`
--

CREATE TABLE `quizzes_and_categories` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes_template`
--

CREATE TABLE `quizzes_template` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `create_at` date NOT NULL,
  `modify_at` date NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes_template`
--

INSERT INTO `quizzes_template` (`id`, `user_id`, `title`, `description`, `create_at`, `modify_at`, `isactive`) VALUES
(1, 1, 'First Quiz Template', 'Quiz template', '2017-12-16', '0000-00-00', 1),
(2, 1, 'Second Template', 'Template', '2017-12-17', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_categories`
--

CREATE TABLE `quiz_categories` (
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_completions`
--

CREATE TABLE `quiz_completions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `quiz_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_completions`
--

INSERT INTO `quiz_completions` (`id`, `quiz_id`, `quiz_token`, `user_token`, `user_id`, `create_at`) VALUES
(3, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-14 20:56:21'),
(4, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-14 20:57:15'),
(5, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-14 20:57:36'),
(6, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-14 21:00:15'),
(7, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-14 21:02:26'),
(8, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-14 21:46:51'),
(9, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-16 01:58:30'),
(10, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-17 00:41:45'),
(11, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-17 00:43:42'),
(12, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-17 16:21:29'),
(13, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-18 17:47:52'),
(14, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-20 15:25:25'),
(15, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-20 15:27:43'),
(16, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-20 15:28:51'),
(17, 16, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 2, '2018-01-20 18:10:47'),
(18, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-01-24 01:58:11'),
(19, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-01-24 02:01:59'),
(20, 0, '3616a3c9516ed0aeba2025d48a2a30', 'e0ff604c509bf7ae4a5d177395e086f47', 0, '2018-01-24 02:39:12'),
(21, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-01-24 18:22:24'),
(22, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-01-24 21:39:37'),
(23, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-01-25 22:00:27'),
(24, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-01-25 22:03:52'),
(25, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-01-25 22:18:23'),
(26, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-01-26 00:13:04'),
(27, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-01-29 19:51:41'),
(28, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-01-29 20:20:44'),
(29, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-02-09 19:58:11'),
(30, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-02-09 21:41:27'),
(31, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-02-09 21:44:01'),
(32, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-02-10 13:40:03'),
(33, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-02-10 13:44:53'),
(34, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-02-10 13:48:07'),
(35, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-02-10 13:48:31'),
(36, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-02-10 13:54:37'),
(37, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', 0, '2018-02-10 13:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_projects`
--

CREATE TABLE `quiz_projects` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `create_at` varchar(100) CHARACTER SET utf8 NOT NULL,
  `modify_at` varchar(100) CHARACTER SET utf8 NOT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_projects`
--

INSERT INTO `quiz_projects` (`id`, `title`, `description`, `create_at`, `modify_at`, `auth_token`, `user_token`) VALUES
(1, 'Social Survey Test', 'Description here', '1512742710', '', 'd362642cb5b03ca95e1ec16efcbfc', '16307f7d387d19dca12af25d7aa38'),
(2, 'New Quiz Project', 'first project quiz', '1516731759', '', '3d26a293f3108107ae249ad95d405', 'e0ff604c509bf7ae4a5d177395e086f47'),
(3, 'Ready For A New Car?', 'new project\r\n', '1517485692', '', '07e55faca0ff57bbf53511031a1ba', '16307f7d387d19dca12af25d7aa38');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_starts`
--

CREATE TABLE `quiz_starts` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_starts`
--

INSERT INTO `quiz_starts` (`id`, `quiz_id`, `user_id`, `quiz_token`, `user_token`, `create_at`) VALUES
(1, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-11 22:51:03'),
(2, 17, 1, '', '', '2018-01-13 18:01:41'),
(3, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 02:19:42'),
(4, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 20:48:32'),
(5, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 20:52:55'),
(6, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 20:56:06'),
(7, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 20:57:09'),
(8, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 20:57:33'),
(9, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:00:10'),
(10, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:02:10'),
(11, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:34:59'),
(12, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:38:36'),
(13, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:46:46'),
(14, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-16 01:57:34'),
(15, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-17 00:41:35'),
(16, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-17 00:43:12'),
(17, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-17 16:20:54'),
(18, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-18 17:47:13'),
(19, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-18 18:14:26'),
(20, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-20 01:09:34'),
(21, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-20 14:32:05'),
(22, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-20 14:48:17'),
(23, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-20 14:58:01'),
(24, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-20 15:04:34'),
(25, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-20 15:25:22'),
(26, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-20 15:27:36'),
(27, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 15:28:47'),
(28, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 15:41:19'),
(29, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 18:10:43'),
(30, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-23 00:53:51'),
(31, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-23 01:10:50'),
(32, 0, 16307, '', '', '2018-01-24 01:24:02'),
(33, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 01:27:51'),
(34, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 01:55:06'),
(35, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 01:57:45'),
(36, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 02:01:53'),
(37, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 02:14:36'),
(38, 0, 0, '3616a3c9516ed0aeba2025d48a2a30', 'e0ff604c509bf7ae4a5d177395e086f47', '2018-01-24 02:23:43'),
(39, 0, 0, '3616a3c9516ed0aeba2025d48a2a30', 'e0ff604c509bf7ae4a5d177395e086f47', '2018-01-24 02:39:09'),
(40, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 18:22:20'),
(41, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 20:17:38'),
(42, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 21:39:31'),
(43, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 21:50:05'),
(44, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:57:34'),
(45, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 22:00:20'),
(46, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 22:03:38'),
(47, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 22:03:48'),
(48, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 22:04:29'),
(49, 0, 0, '65185f29f1d79a757125dd9e41acb3', '16307f7d387d19dca12af25d7aa38', '2018-01-27 14:48:37'),
(50, 0, 0, '65185f29f1d79a757125dd9e41acb3', '16307f7d387d19dca12af25d7aa38', '2018-01-27 14:51:06'),
(51, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-29 19:51:39'),
(52, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-29 20:20:42'),
(53, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:58:06'),
(54, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 21:41:24'),
(55, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 21:43:58'),
(56, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:22:44'),
(57, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:27:02'),
(58, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:39:19'),
(59, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:39:22'),
(60, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:41:12'),
(61, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:44:45'),
(62, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:48:01'),
(63, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:48:26'),
(64, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:53:15'),
(65, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:54:50'),
(66, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 14:00:21'),
(67, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 14:12:31'),
(68, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 14:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_views`
--

CREATE TABLE `quiz_views` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_views`
--

INSERT INTO `quiz_views` (`id`, `quiz_id`, `user_id`, `quiz_token`, `user_token`, `create_at`) VALUES
(1, 17, 1, '', '', '2018-01-11 19:56:35'),
(2, 17, 1, '', '', '2018-01-11 20:00:03'),
(3, 17, 1, '', '', '2018-01-11 20:01:50'),
(4, 17, 1, '', '', '2018-01-11 20:02:16'),
(5, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-11 22:51:01'),
(6, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-11 22:51:36'),
(7, 17, 1, '', '', '2018-01-13 18:00:50'),
(8, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-13 18:21:09'),
(9, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-13 18:21:19'),
(10, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 02:03:17'),
(11, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 02:03:33'),
(12, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 02:03:40'),
(13, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 02:04:28'),
(14, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 02:18:56'),
(15, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 20:48:25'),
(16, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 20:52:25'),
(17, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 20:56:04'),
(18, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 20:57:06'),
(19, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 20:57:31'),
(20, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:00:05'),
(21, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:02:06'),
(22, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:12:08'),
(23, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:14:26'),
(24, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:34:56'),
(25, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:38:33'),
(26, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:45:34'),
(27, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-14 21:45:50'),
(28, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-16 01:56:39'),
(29, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-17 00:41:20'),
(30, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-17 00:43:09'),
(31, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-17 16:20:21'),
(32, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-18 17:47:11'),
(33, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-18 18:14:20'),
(34, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-18 19:51:06'),
(35, 21, 2, '', '', '2018-01-20 01:08:33'),
(36, 21, 2, '', '', '2018-01-20 01:09:05'),
(37, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 01:09:23'),
(38, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 01:09:29'),
(39, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 01:12:38'),
(40, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 01:15:07'),
(41, 21, 2, '', '', '2018-01-20 01:15:18'),
(42, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 01:16:01'),
(43, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 14:31:50'),
(44, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 14:48:12'),
(45, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 14:57:59'),
(46, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 15:04:31'),
(47, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 15:24:49'),
(48, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 15:27:33'),
(49, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 15:28:44'),
(50, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 15:40:49'),
(51, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 17:55:15'),
(52, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-20 18:10:39'),
(53, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-23 00:53:43'),
(54, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-23 00:54:32'),
(55, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-23 00:54:40'),
(56, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-23 00:56:28'),
(57, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-23 00:56:39'),
(58, 16, 2, 'fd3f4dfcd40dd8da7916a5192672ce', '', '2018-01-23 00:58:02'),
(59, 16, 2, '', '', '2018-01-23 00:58:06'),
(60, 16, 2, '', '', '2018-01-23 01:00:10'),
(61, 16, 2, '', '', '2018-01-23 01:00:16'),
(62, 16, 2, '', '', '2018-01-23 01:00:24'),
(75, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 01:27:00'),
(76, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 01:55:03'),
(77, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 01:57:26'),
(78, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 02:01:29'),
(79, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 02:12:09'),
(80, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 02:13:38'),
(81, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 02:14:02'),
(82, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 02:14:44'),
(83, 0, 0, '3616a3c9516ed0aeba2025d48a2a30', 'e0ff604c509bf7ae4a5d177395e086f47', '2018-01-24 02:23:41'),
(84, 0, 0, '3616a3c9516ed0aeba2025d48a2a30', 'e0ff604c509bf7ae4a5d177395e086f47', '2018-01-24 02:39:03'),
(85, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 18:22:17'),
(86, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 18:46:55'),
(87, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 18:47:03'),
(88, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 18:54:30'),
(89, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 19:44:11'),
(90, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 19:52:00'),
(91, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 19:55:33'),
(92, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 20:17:19'),
(93, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 21:39:06'),
(94, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 21:44:24'),
(95, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-24 21:44:31'),
(96, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 19:04:19'),
(97, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 19:04:30'),
(98, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:44:48'),
(99, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:45:59'),
(100, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:47:27'),
(101, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:47:27'),
(102, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:47:43'),
(103, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:49:03'),
(104, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:52:06'),
(105, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:53:59'),
(106, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:54:26'),
(107, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:54:27'),
(108, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:54:39'),
(109, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:54:40'),
(110, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:55:02'),
(111, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:55:02'),
(112, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:55:28'),
(113, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:55:33'),
(114, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:55:34'),
(115, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:57:57'),
(116, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:57:57'),
(117, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 21:58:36'),
(118, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 22:02:09'),
(119, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 22:02:18'),
(120, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 22:03:28'),
(121, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 22:03:39'),
(122, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 22:04:27'),
(123, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-25 22:34:19'),
(124, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-26 00:32:55'),
(125, 0, 0, '90d430413bebf9a6e521bf56244d24', '16307f7d387d19dca12af25d7aa38', '2018-01-26 20:07:16'),
(126, 0, 0, '65185f29f1d79a757125dd9e41acb3', '16307f7d387d19dca12af25d7aa38', '2018-01-27 14:48:30'),
(127, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-27 14:49:43'),
(128, 0, 0, '65185f29f1d79a757125dd9e41acb3', '16307f7d387d19dca12af25d7aa38', '2018-01-27 14:50:39'),
(129, 0, 0, '65185f29f1d79a757125dd9e41acb3', '16307f7d387d19dca12af25d7aa38', '2018-01-27 14:50:56'),
(130, 0, 0, '65185f29f1d79a757125dd9e41acb3', '16307f7d387d19dca12af25d7aa38', '2018-01-27 17:37:22'),
(131, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-27 17:37:25'),
(132, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-29 19:51:37'),
(133, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-29 20:20:40'),
(134, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-01-30 22:24:11'),
(135, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:27:21'),
(136, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:28:27'),
(137, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:29:29'),
(138, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:29:30'),
(139, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:54:06'),
(140, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:54:25'),
(141, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:56:58'),
(142, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:57:20'),
(143, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:57:54'),
(144, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 19:59:58'),
(145, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 20:09:45'),
(146, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 20:10:21'),
(147, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 20:11:04'),
(148, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 20:16:08'),
(149, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 20:23:04'),
(150, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 20:24:38'),
(151, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 21:32:00'),
(152, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 21:32:39'),
(153, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 21:34:04'),
(154, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 21:39:06'),
(155, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 21:39:46'),
(156, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 21:43:53'),
(157, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 22:00:27'),
(158, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 22:00:44'),
(159, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 22:57:31'),
(160, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 23:00:04'),
(161, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-09 23:00:36'),
(162, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:22:38'),
(163, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:24:25'),
(164, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:25:11'),
(165, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:25:55'),
(166, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:26:06'),
(167, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:26:17'),
(168, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:26:35'),
(169, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:26:44'),
(170, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:27:13'),
(171, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:27:26'),
(172, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:27:40'),
(173, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:27:57'),
(174, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:29:54'),
(175, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:46:33'),
(176, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:46:35'),
(177, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 09:46:53'),
(178, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:21:06'),
(179, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:23:28'),
(180, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:24:45'),
(181, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:24:54'),
(182, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:26:56'),
(183, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:27:50'),
(184, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:28:02'),
(185, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:29:01'),
(186, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:29:09'),
(187, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:29:24'),
(188, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:32:30'),
(189, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:32:43'),
(190, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:33:21'),
(191, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:33:37'),
(192, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:34:41'),
(193, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:35:40'),
(194, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:37:24'),
(195, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:37:39'),
(196, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:38:15'),
(197, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:38:17'),
(198, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:39:04'),
(199, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:39:11'),
(200, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:40:22'),
(201, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:41:06'),
(202, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:43:36'),
(203, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:44:04'),
(204, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:44:21'),
(205, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:44:28'),
(206, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:47:59'),
(207, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:48:24'),
(208, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:49:52'),
(209, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:54:47'),
(210, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:57:23'),
(211, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:57:39'),
(212, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:59:33'),
(213, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 13:59:57'),
(214, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 14:12:17'),
(215, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 14:12:25'),
(216, 0, 0, 'fd3f4dfcd40dd8da7916a5192672ce', '16307f7d387d19dca12af25d7aa38', '2018-02-10 14:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `contacts_results_id` int(11) NOT NULL,
  `question_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `quiz_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `answer_token` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `contacts_results_id`, `question_token`, `quiz_token`, `answer_token`) VALUES
(1, 1, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '7ff52b5b5bbcfaa31793cc667180fa'),
(2, 1, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', 'b247a42f6dab30cf8897bdbac1c5cd'),
(3, 1, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '3130464e1aab3f948b103300e345766'),
(4, 1, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', '4697542b2847bb649a107c00409f5ae'),
(5, 2, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '7ff52b5b5bbcfaa31793cc667180fa'),
(6, 2, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', 'b247a42f6dab30cf8897bdbac1c5cd'),
(7, 2, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '870a82af7d655dab601057c3d1f2bb3'),
(8, 2, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'be82b29a94a20f8318108d07e9672e6'),
(9, 3, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', 'd0b38aa9b42a8c465894e0ba151cb0'),
(10, 3, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', ''),
(11, 3, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '8acba24f01da2e530c104625228f434'),
(12, 3, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'b2835e55f1e56110a1106fc3e38b57a'),
(13, 4, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', 'd0b38aa9b42a8c465894e0ba151cb0'),
(14, 4, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', ''),
(15, 4, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '8acba24f01da2e530c104625228f434'),
(16, 4, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', '4697542b2847bb649a107c00409f5ae'),
(17, 5, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', 'd0b38aa9b42a8c465894e0ba151cb0'),
(18, 5, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', ''),
(19, 5, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '8acba24f01da2e530c104625228f434'),
(20, 5, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'be82b29a94a20f8318108d07e9672e6'),
(21, 6, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '1f0dc114d7d89f5bfa959fc7ffd4b7'),
(22, 6, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', ''),
(23, 6, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', 'ccad7d4c4243acdbd81025df9fd1693'),
(24, 6, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'b2835e55f1e56110a1106fc3e38b57a'),
(25, 7, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '7ff52b5b5bbcfaa31793cc667180fa'),
(26, 7, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', ''),
(27, 7, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '870a82af7d655dab601057c3d1f2bb3'),
(28, 7, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'b2835e55f1e56110a1106fc3e38b57a'),
(29, 8, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '7ff52b5b5bbcfaa31793cc667180fa'),
(30, 8, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', 'b247a42f6dab30cf8897bdbac1c5cd'),
(31, 8, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '3130464e1aab3f948b103300e345766'),
(32, 8, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', '4697542b2847bb649a107c00409f5ae'),
(33, 9, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', 'd0b38aa9b42a8c465894e0ba151cb0'),
(34, 9, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', 'b247a42f6dab30cf8897bdbac1c5cd'),
(35, 9, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', 'ccad7d4c4243acdbd81025df9fd1693'),
(36, 9, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'b2835e55f1e56110a1106fc3e38b57a'),
(37, 10, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '7ff52b5b5bbcfaa31793cc667180fa'),
(38, 10, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', 'b247a42f6dab30cf8897bdbac1c5cd'),
(39, 10, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '3130464e1aab3f948b103300e345766'),
(40, 10, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'b2835e55f1e56110a1106fc3e38b57a'),
(41, 11, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '7ff52b5b5bbcfaa31793cc667180fa'),
(42, 11, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', 'b247a42f6dab30cf8897bdbac1c5cd'),
(43, 11, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', 'ccad7d4c4243acdbd81025df9fd1693'),
(44, 11, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'b2835e55f1e56110a1106fc3e38b57a'),
(45, 12, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '7ff52b5b5bbcfaa31793cc667180fa'),
(46, 12, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', 'b247a42f6dab30cf8897bdbac1c5cd'),
(47, 12, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', 'ccad7d4c4243acdbd81025df9fd1693'),
(48, 12, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'b2835e55f1e56110a1106fc3e38b57a'),
(49, 13, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', 'd0b38aa9b42a8c465894e0ba151cb0'),
(50, 13, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', '79c1fead52f9445ff01170bca090947'),
(51, 13, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '870a82af7d655dab601057c3d1f2bb3'),
(52, 13, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'be82b29a94a20f8318108d07e9672e6'),
(53, 14, '65c0b7657ed40977847665142d7c19', '3616a3c9516ed0aeba2025d48a2a30', 'b1f7db250053ef4598119f98a374bce'),
(54, 14, 'bd9144e49c5ebb2ed077fb9ab0e212', '3616a3c9516ed0aeba2025d48a2a30', 'a91d81e82295a155111223b37088931'),
(55, 15, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '7ff52b5b5bbcfaa31793cc667180fa'),
(56, 15, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', '79c1fead52f9445ff01170bca090947'),
(57, 15, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '3130464e1aab3f948b103300e345766'),
(58, 15, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', '4697542b2847bb649a107c00409f5ae'),
(59, 16, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '1f0dc114d7d89f5bfa959fc7ffd4b7'),
(60, 16, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', '79c1fead52f9445ff01170bca090947'),
(61, 16, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '8acba24f01da2e530c104625228f434'),
(62, 16, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'be82b29a94a20f8318108d07e9672e6'),
(63, 17, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '7ff52b5b5bbcfaa31793cc667180fa'),
(64, 17, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', '8f1cc443663132c8ef11695504707c9'),
(65, 17, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '8acba24f01da2e530c104625228f434'),
(66, 17, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'be82b29a94a20f8318108d07e9672e6'),
(67, 18, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '1f0dc114d7d89f5bfa959fc7ffd4b7'),
(68, 18, 'cf0ad339a622c0fa4e733dc655c336', 'fd3f4dfcd40dd8da7916a5192672ce', '79c1fead52f9445ff01170bca090947'),
(69, 18, 'be5f9c0d3d0adb28f974821d556fd4', 'fd3f4dfcd40dd8da7916a5192672ce', '8acba24f01da2e530c104625228f434'),
(70, 18, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'be82b29a94a20f8318108d07e9672e6'),
(71, 19, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', 'd0b38aa9b42a8c465894e0ba151cb0'),
(72, 19, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', '4697542b2847bb649a107c00409f5ae'),
(73, 20, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '7ff52b5b5bbcfaa31793cc667180fa'),
(74, 20, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'be82b29a94a20f8318108d07e9672e6'),
(75, 0, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', '1f0dc114d7d89f5bfa959fc7ffd4b7'),
(76, 0, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'be82b29a94a20f8318108d07e9672e6'),
(77, 21, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', 'b57389bd50d65cde1f96d9c0ef713e'),
(78, 21, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'b2835e55f1e56110a1106fc3e38b57a'),
(79, 0, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', 'b57389bd50d65cde1f96d9c0ef713e'),
(80, 0, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'be82b29a94a20f8318108d07e9672e6'),
(81, 0, '33a6d33eeedf63e26372aaadda0d74', 'fd3f4dfcd40dd8da7916a5192672ce', 'd0b38aa9b42a8c465894e0ba151cb0'),
(82, 0, '066b5cb11261f48138758c197aee2a', 'fd3f4dfcd40dd8da7916a5192672ce', 'be82b29a94a20f8318108d07e9672e6');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `sites_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `sites_name` varchar(255) NOT NULL,
  `custom_domain` varchar(150) DEFAULT NULL,
  `sub_domain` varchar(150) DEFAULT NULL,
  `sub_folder` varchar(150) DEFAULT NULL,
  `sites_created_on` varchar(100) NOT NULL,
  `sites_lastupdate_on` varchar(100) NOT NULL,
  `ftp_server` varchar(255) NOT NULL,
  `ftp_user` varchar(255) NOT NULL,
  `ftp_password` varchar(255) NOT NULL,
  `ftp_path` varchar(255) NOT NULL DEFAULT '/',
  `ftp_port` int(8) NOT NULL DEFAULT '21',
  `ftp_ok` int(1) NOT NULL,
  `ftp_published` int(1) NOT NULL DEFAULT '0',
  `publish_date` int(11) NOT NULL DEFAULT '0',
  `global_css` text NOT NULL,
  `remote_url` varchar(255) NOT NULL,
  `sites_trashed` int(1) NOT NULL DEFAULT '0',
  `viewmode` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `sitethumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`sites_id`, `users_id`, `sites_name`, `custom_domain`, `sub_domain`, `sub_folder`, `sites_created_on`, `sites_lastupdate_on`, `ftp_server`, `ftp_user`, `ftp_password`, `ftp_path`, `ftp_port`, `ftp_ok`, `ftp_published`, `publish_date`, `global_css`, `remote_url`, `sites_trashed`, `viewmode`, `created_at`, `modified_at`, `sitethumb`) VALUES
(1, 1, 'My New Site', NULL, NULL, NULL, '1512742710', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(2, 1, 'My New Site', NULL, NULL, NULL, '1512821794', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(3, 1, 'My New Site', NULL, NULL, NULL, '1512821866', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(4, 1, 'My New Site', NULL, NULL, NULL, '1512835103', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(5, 1, 'My New Site', NULL, NULL, NULL, '1512835137', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(6, 1, 'My New Site', NULL, NULL, NULL, '1512835334', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(7, 1, 'Sample Site', '', '', '', '1512930440', '1512930568', '', '', '', '/', 21, 0, 0, 0, '', '', 1, 'desktop', NULL, NULL, ''),
(8, 1, 'My New Site', NULL, NULL, NULL, '1512931593', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(9, 1, 'My New Site', NULL, NULL, NULL, '1512935308', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(10, 1, 'Site Preview', '', '', '', '1513229221', '1513229621', '', '', '', '/', 21, 0, 0, 0, '', '', 0, 'desktop', NULL, NULL, 'tmp/sitethumbs/sitethumb_10.jpg'),
(11, 2, 'My New Site', NULL, NULL, NULL, '1513251481', '', '', '', '', '/', 21, 0, 0, 0, '', '', 0, '', NULL, NULL, ''),
(12, 2, 'My New Site', NULL, NULL, NULL, '1513405155', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(13, 2, 'My New Site', NULL, NULL, NULL, '1513405868', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(14, 2, 'My New Site', NULL, NULL, NULL, '1513405909', '', '', '', '', '/', 21, 0, 0, 0, '', '', 1, '', NULL, NULL, ''),
(15, 1, 'My New Site', NULL, NULL, NULL, '1513761163', '', '', '', '', '/', 21, 0, 0, 0, '', '', 0, '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `package_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgot_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `stripe_cus_id` varchar(50) DEFAULT NULL,
  `stripe_sub_id` varchar(50) DEFAULT NULL,
  `paypal_token` varchar(255) DEFAULT NULL,
  `paypal_profile_id` varchar(255) DEFAULT NULL,
  `paypal_profile_status` varchar(20) DEFAULT NULL,
  `paypal_last_transaction_id` varchar(30) DEFAULT NULL,
  `current_subscription_gateway` enum('stripe','paypal') NOT NULL,
  `payer_id` varchar(128) DEFAULT NULL,
  `paypal_next_payment_date` varchar(128) DEFAULT NULL,
  `paypal_previous_payment_date` varchar(128) DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `auth_token`, `package_id`, `username`, `email`, `password`, `first_name`, `last_name`, `activation_code`, `forgot_code`, `remember_code`, `last_login`, `stripe_cus_id`, `stripe_sub_id`, `paypal_token`, `paypal_profile_id`, `paypal_profile_status`, `paypal_last_transaction_id`, `current_subscription_gateway`, `payer_id`, `paypal_next_payment_date`, `paypal_previous_payment_date`, `type`, `status`, `created_at`, `modified_at`) VALUES
(1, 'e0ff604c509bf7ae4a5d177395e086f47', 0, 'admin@bearzu.com', 'admin@bearzu.com', 'f865b53623b121fd34ee5426c792e5c3', 'Admin', 'istrator', '1b21159590f6513bdbe7094d4ad327b1', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', 'Admin', 'Active', '2016-11-30 04:44:51', '2017-07-14 13:48:35'),
(2, '16307f7d387d19dca12af25d7aa38', 0, 'mainuser@gmail.com', 'mainuser@gmail.com', 'f865b53623b121fd34ee5426c792e5c3', 'First', 'User', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 'User', 'Active', '2017-12-14 00:00:00', '2017-12-14 05:55:16'),
(3, '8c9f112ad19eeb66243af89483168', 1, 'account@gmail.com', 'account@gmail.com', '356a192b7913b04c54574d18c28d46e6', 'Acc', 'ount', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'stripe', NULL, NULL, NULL, 'User', 'Active', '2017-12-20 22:37:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps_settings`
--
ALTER TABLE `apps_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices_template`
--
ALTER TABLE `choices_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts_results`
--
ALTER TABLE `contacts_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_settings`
--
ALTER TABLE `core_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cta_clicks`
--
ALTER TABLE `cta_clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frames`
--
ALTER TABLE `frames`
  ADD PRIMARY KEY (`frames_id`);

--
-- Indexes for table `outcomes`
--
ALTER TABLE `outcomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outcomes_template`
--
ALTER TABLE `outcomes_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `payment_log`
--
ALTER TABLE `payment_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_template`
--
ALTER TABLE `questions_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes_and_categories`
--
ALTER TABLE `quizzes_and_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes_template`
--
ALTER TABLE `quizzes_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_categories`
--
ALTER TABLE `quiz_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_completions`
--
ALTER TABLE `quiz_completions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_projects`
--
ALTER TABLE `quiz_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_starts`
--
ALTER TABLE `quiz_starts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_views`
--
ALTER TABLE `quiz_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`sites_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps_settings`
--
ALTER TABLE `apps_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `choices_template`
--
ALTER TABLE `choices_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `contacts_results`
--
ALTER TABLE `contacts_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `core_settings`
--
ALTER TABLE `core_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cta_clicks`
--
ALTER TABLE `cta_clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `frames`
--
ALTER TABLE `frames`
  MODIFY `frames_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `outcomes`
--
ALTER TABLE `outcomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `outcomes_template`
--
ALTER TABLE `outcomes_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `payment_log`
--
ALTER TABLE `payment_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `questions_template`
--
ALTER TABLE `questions_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `quizzes_and_categories`
--
ALTER TABLE `quizzes_and_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quizzes_template`
--
ALTER TABLE `quizzes_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quiz_categories`
--
ALTER TABLE `quiz_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz_completions`
--
ALTER TABLE `quiz_completions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `quiz_projects`
--
ALTER TABLE `quiz_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quiz_starts`
--
ALTER TABLE `quiz_starts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `quiz_views`
--
ALTER TABLE `quiz_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `sites_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

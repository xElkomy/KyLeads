-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 05:46 PM
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
  `value` varchar(50) NOT NULL,
  `question_id` int(11) NOT NULL,
  `outcome_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `value`, `question_id`, `outcome_id`) VALUES
(78, 'yes', 67, 8),
(79, 'Sometimes', 67, 10),
(80, 'No', 67, 9),
(81, 'yes', 68, 8),
(82, 'Sometimes', 68, 10),
(83, 'no', 68, 9),
(87, 'yes', 70, 8),
(88, 'Sometimes', 70, 9),
(89, 'No', 70, 8),
(90, 'yes', 71, 8),
(91, 'sometimes', 71, 9),
(92, 'no', 71, 10),
(93, '0 - $40,000', 72, 11),
(94, '$40,000 - $60,000', 72, 12),
(95, '$60,000 - $100,000', 72, 13),
(96, 'More than $100,000', 72, 13),
(97, 'Full time', 73, 13),
(98, 'Part time', 73, 11),
(99, 'I have more than one part-time job', 73, 12),
(100, 'I’m self-employed', 73, 12),
(101, 'I’m unemployed', 73, 11),
(102, 'It costs a lot of money up front.', 74, 12),
(103, 'Qualifying for a loan is hard.', 74, 11),
(104, 'Building my own equity rather than paying a landlo', 74, 13),
(105, 'Having a place to call my own.', 74, 13),
(106, 'I’m excited. I’ve always wanted to have a garden, ', 75, 13),
(107, 'I’m not sure. I might enjoy it, but then again, I’', 75, 12),
(108, 'Isn’t there an app for that? Yard work isn’t my th', 75, 11);

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
('4lhj2ijia98473ia8hfp9mvg9kmiiffd', '::1', 1516115981, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363131353938313b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b),
('9ccq1b9f2ipplnv0fv0g4h0r5d5l2g0g', '::1', 1516117048, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363131373034383b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b),
('gdfa9pjbn7tn6opqnpp8hdtq158135jn', '::1', 1516117739, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363131373733393b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b),
('6ne8k46mubhml1lerc2bno41nsadco4c', '::1', 1516118049, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363131383034393b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b),
('md79op160f5fhss9ptsr7knivdm20esv', '::1', 1516118530, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363131383533303b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b),
('nfk8nmecoa2rqj8f57gpqhue16dbnv8r', '::1', 1516118831, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363131383833313b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b),
('nnqgldcmg3pl22j79uibl08up3t48v51', '::1', 1516119170, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363131393137303b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b),
('ld27a7nbom023gdeeatvfnqqdtfm7adq', '::1', 1516119563, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363131393536333b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b),
('d92p53upmss3tmshs1f5bge2cpjuqfc2', '::1', 1516119966, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363131393936363b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b),
('oli5b80oi6r8cek72t57smmo7v47a6ko', '::1', 1516120379, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363132303337393b),
('rs0a4l9bi3v9kv9oqeu61pv6cuagsi95', '::1', 1516120864, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363132303836343b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b),
('m3iq83a22qfi405utff6qmf0fici44rt', '::1', 1516121044, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363132303836343b757365725f69647c733a313a2232223b7061636b6167655f69647c733a313a2230223b757365725f666e616d657c733a353a224669727374223b757365725f6c6e616d657c733a343a2255736572223b757365725f656d61696c7c733a31383a226d61696e7573657240676d61696c2e636f6d223b757365725f747970657c733a343a2255736572223b);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `first_name`, `last_name`, `email`, `create_at`) VALUES
(1, 2, 'new', '', 'con@gmail.com', '2018-01-14 20:56:33'),
(2, 2, 'contact', '', 'con@yahoo.com', '2018-01-14 21:03:13'),
(3, 2, 'K', '', 'K@EMAIL.COM', '2018-01-14 21:47:01'),
(4, 2, 'new', '', 'con@yaho.com', '2018-01-16 01:58:39'),
(5, 2, 'new', '', 'name@email.org', '2018-01-17 00:42:34'),
(6, 2, 'asdf', '', 'dd@em.com', '2018-01-17 00:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_results`
--

CREATE TABLE `contacts_results` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `outcome_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts_results`
--

INSERT INTO `contacts_results` (`id`, `contact_id`, `quiz_id`, `outcome_id`, `create_at`) VALUES
(1, 1, 16, 11, '2018-01-14 20:56:33'),
(2, 2, 16, 11, '2018-01-14 21:03:13'),
(3, 3, 16, 13, '2018-01-14 21:47:02'),
(4, 4, 16, 12, '2018-01-16 01:58:39'),
(5, 5, 16, 11, '2018-01-17 00:42:34'),
(6, 6, 16, 13, '2018-01-17 00:43:51');

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
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `started_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cta_clicks`
--

INSERT INTO `cta_clicks` (`id`, `quiz_id`, `user_id`, `started_at`) VALUES
(1, 16, 2, '2018-01-11 22:51:03'),
(2, 17, 1, '2018-01-13 18:01:41'),
(3, 16, 2, '2018-01-14 02:19:42');

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
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `modify_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outcomes`
--

INSERT INTO `outcomes` (`id`, `title`, `description`, `quiz_id`, `create_at`, `modify_at`) VALUES
(8, 'Your score is 20', 'Newly Added Outcome', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Your score is 30', 'Newly Added Outcome', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Your score is 50', 'Newly Added Outcome', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Keep renting. It’s the best option for your situation.', 'At this point in your life, your lifestyle and/or your financial situation just don’t line up with home ownership. You prefer independence, having someone else fix and maintain things, and not having a yard to take care of. Even if you did want a home, you might have a bit too much debt, not enough savings, or too low of an income to qualify for a loan.\r\n\r\n \r\n\r\nSo for now, keep renting, and enjoy the flexible lifestyle it affords you. If you’re in an apartment, consider renting something different, like a townhome, condo, or even a house, and see how you like the differences.\r\nIf you do someday want to purchase a home, get started on improving your financial situation. Here are some goals you can set for yourself:\r\n\r\n1)      Pay down your debts. Too much debt makes it much harder to get a loan, unless you have high enough income to put the banks at ease.\r\n\r\n2)      Boost your savings. You don’t need tons of money for a down payment, but you do need something. Get something going so you’ll have it when the time comes.\r\n\r\n3)      Boost your income. Easier said than done, right? Well, you have time, so look for ways to grow your income. New education or certifications can help in some fields, and so can career switches to jobs with more opportunities for promotion. Start thinking about it…\r\n\r\nDisclaimer: This quiz does not constitute formal financial advice. Always seek the help of a professional realtor and/or loan officer before beginning the home-buying process.', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'You should buy a home or condo, but wait a couple years.', 'You want a place to call your own. You want to change things, make improvements, and make it fit your personality and lifestyle. But your finances just aren’t quite there.\r\n\r\n \r\n\r\nYou might have too-low credit scores, too much debt, or not quite enough savings or income. You might also be self-employed, or you’re juggling multiple part-time jobs. Whatever the case, banks will look for a little more in these areas. So your best option is to wait a couple years and focus on improving your financial situation. A few tips:\r\n\r\n \r\n\r\n1)      Improve your credit scores. Make sure you pay off bills every month, and reduce your debts, starting with the highest interest accounts first.\r\n\r\n \r\n\r\n2)      Build up your savings. You’ll want something for a down payment. It won’t have to be as large as you might think, but you’ll need more than you have now.\r\n\r\n \r\n\r\n3)      Look for ways to grow your income. If you want a home, you’ll need enough so your debts are less than 43% of your income. But if you have a lot of debt, that’s also why paying that down is so important.\r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\nDisclaimer: This quiz does not constitute formal financial advice. Always seek the help of a professional realtor and/or loan officer before beginning the home-buying process.', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'You’re ready for your first home!', 'You have the perspective of a homeowner. You’re okay making your own repairs and doing your own maintenance. A yard doesn’t freak you out (or if it does, you can always buy a condo or townhome). And most important of all, you have good financial health: good credit scores, consistently high enough income, few debts, and enough savings.\r\n\r\n \r\n\r\nThis doesn’t mean you should go out and get a loan tomorrow, but it means you should start preparing to see yourself as an owner, and not a renter.\r\n\r\n \r\n\r\nSome things you should do to get prepared for ownership:\r\n\r\n \r\n\r\n1)      Start looking at houses and condos. It’s never too early to see what’s out there. Don’t make any offers yet. Just get a sense of the market, and hopefully some free cookies at open houses too.\r\n\r\n \r\n\r\n2)      Learn the basics of how home loans work. You could research online, or take a training course (realtors sometimes put these on for free). But you need to know how mortgage interest works, the various types of loan options, who pays what fees to whom, and some technical terms like “amortization” and “equity.”\r\n\r\n \r\n\r\n3)      Start researching realtors if you don’t already know a good one. Again, get a feel for what’s out there.\r\n\r\n \r\n\r\n4)      Ask friends who’ve bought homes for advice. Avoid mistakes they may have made.\r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\nDisclaimer: This quiz does not constitute formal financial advice. Always seek the help of a professional realtor and/or loan officer before beginning the home-buying process.', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `quiz_id`) VALUES
(67, 'Is your skin oily and prone to pimples or acne ?', 'Newly Added Question', 17),
(68, 'Is your skin dry ?', 'Newly Added Question', 17),
(70, 'Is your skin sensitive ?', 'Newly Added Question', 17),
(71, 'Skin Question ?', 'Newly Added Question', 17),
(72, 'What’s your approximate annual income? ?', 'Newly Added Question', 16),
(73, 'Are you employed full-time or part-time ?', 'Newly Added Question', 16),
(74, 'What comes to mind when you think of buying a home ?', 'Newly Added Question', 16),
(75, 'How do you feel about having to take care of a yard ?', 'Newly Added Question', 16);

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
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL,
  `modify_at` datetime NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `user_id`, `title`, `description`, `create_at`, `modify_at`, `isactive`) VALUES
(16, 2, 'Rent vs. Buying Quiz', 'Should I Keep Renting or Buy My First Home?', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(17, 1, 'How healthy is your skin', 'Test you skin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

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
  `user_id` int(11) NOT NULL,
  `completed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_completions`
--

INSERT INTO `quiz_completions` (`id`, `quiz_id`, `user_id`, `completed_at`) VALUES
(3, 16, 2, '2018-01-14 20:56:21'),
(4, 16, 2, '2018-01-14 20:57:15'),
(5, 16, 2, '2018-01-14 20:57:36'),
(6, 16, 2, '2018-01-14 21:00:15'),
(7, 16, 2, '2018-01-14 21:02:26'),
(8, 16, 2, '2018-01-14 21:46:51'),
(9, 16, 2, '2018-01-16 01:58:30'),
(10, 16, 2, '2018-01-17 00:41:45'),
(11, 16, 2, '2018-01-17 00:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_starts`
--

CREATE TABLE `quiz_starts` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `started_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_starts`
--

INSERT INTO `quiz_starts` (`id`, `quiz_id`, `user_id`, `started_at`) VALUES
(1, 16, 2, '2018-01-11 22:51:03'),
(2, 17, 1, '2018-01-13 18:01:41'),
(3, 16, 2, '2018-01-14 02:19:42'),
(4, 16, 2, '2018-01-14 20:48:32'),
(5, 16, 2, '2018-01-14 20:52:55'),
(6, 16, 2, '2018-01-14 20:56:06'),
(7, 16, 2, '2018-01-14 20:57:09'),
(8, 16, 2, '2018-01-14 20:57:33'),
(9, 16, 2, '2018-01-14 21:00:10'),
(10, 16, 2, '2018-01-14 21:02:10'),
(11, 16, 2, '2018-01-14 21:34:59'),
(12, 16, 2, '2018-01-14 21:38:36'),
(13, 16, 2, '2018-01-14 21:46:46'),
(14, 16, 2, '2018-01-16 01:57:34'),
(15, 16, 2, '2018-01-17 00:41:35'),
(16, 16, 2, '2018-01-17 00:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_views`
--

CREATE TABLE `quiz_views` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `viewed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_views`
--

INSERT INTO `quiz_views` (`id`, `quiz_id`, `user_id`, `viewed_at`) VALUES
(1, 17, 1, '2018-01-11 19:56:35'),
(2, 17, 1, '2018-01-11 20:00:03'),
(3, 17, 1, '2018-01-11 20:01:50'),
(4, 17, 1, '2018-01-11 20:02:16'),
(5, 16, 2, '2018-01-11 22:51:01'),
(6, 16, 2, '2018-01-11 22:51:36'),
(7, 17, 1, '2018-01-13 18:00:50'),
(8, 16, 2, '2018-01-13 18:21:09'),
(9, 16, 2, '2018-01-13 18:21:19'),
(10, 16, 2, '2018-01-14 02:03:17'),
(11, 16, 2, '2018-01-14 02:03:33'),
(12, 16, 2, '2018-01-14 02:03:40'),
(13, 16, 2, '2018-01-14 02:04:28'),
(14, 16, 2, '2018-01-14 02:18:56'),
(15, 16, 2, '2018-01-14 20:48:25'),
(16, 16, 2, '2018-01-14 20:52:25'),
(17, 16, 2, '2018-01-14 20:56:04'),
(18, 16, 2, '2018-01-14 20:57:06'),
(19, 16, 2, '2018-01-14 20:57:31'),
(20, 16, 2, '2018-01-14 21:00:05'),
(21, 16, 2, '2018-01-14 21:02:06'),
(22, 16, 2, '2018-01-14 21:12:08'),
(23, 16, 2, '2018-01-14 21:14:26'),
(24, 16, 2, '2018-01-14 21:34:56'),
(25, 16, 2, '2018-01-14 21:38:33'),
(26, 16, 2, '2018-01-14 21:45:34'),
(27, 16, 2, '2018-01-14 21:45:50'),
(28, 16, 2, '2018-01-16 01:56:39'),
(29, 16, 2, '2018-01-17 00:41:20'),
(30, 16, 2, '2018-01-17 00:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `contacts_results_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `contacts_results_id`, `quiz_id`, `question_id`, `answer_id`) VALUES
(1, 1, 16, 72, 93),
(2, 1, 16, 73, 97),
(3, 1, 16, 74, 103),
(4, 1, 16, 75, 107),
(5, 2, 16, 72, 93),
(6, 2, 16, 73, 97),
(7, 2, 16, 74, 105),
(8, 2, 16, 75, 108),
(9, 3, 16, 72, 94),
(10, 3, 16, 73, 98),
(11, 3, 16, 74, 104),
(12, 3, 16, 75, 106),
(13, 4, 16, 72, 94),
(14, 4, 16, 73, 100),
(15, 4, 16, 74, 104),
(16, 4, 16, 75, 107),
(17, 5, 16, 72, 94),
(18, 5, 16, 73, 98),
(19, 5, 16, 74, 104),
(20, 5, 16, 75, 108),
(21, 6, 16, 72, 95),
(22, 6, 16, 73, 99),
(23, 6, 16, 74, 102),
(24, 6, 16, 75, 106);

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

INSERT INTO `users` (`id`, `package_id`, `username`, `email`, `password`, `first_name`, `last_name`, `activation_code`, `forgot_code`, `remember_code`, `last_login`, `stripe_cus_id`, `stripe_sub_id`, `paypal_token`, `paypal_profile_id`, `paypal_profile_status`, `paypal_last_transaction_id`, `current_subscription_gateway`, `payer_id`, `paypal_next_payment_date`, `paypal_previous_payment_date`, `type`, `status`, `created_at`, `modified_at`) VALUES
(1, 0, 'admin@bearzu.com', 'admin@bearzu.com', 'f865b53623b121fd34ee5426c792e5c3', 'Admin', 'istrator', '1b21159590f6513bdbe7094d4ad327b1', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', 'Admin', 'Active', '2016-11-30 04:44:51', '2017-07-14 13:48:35'),
(2, 0, 'mainuser@gmail.com', 'mainuser@gmail.com', 'f865b53623b121fd34ee5426c792e5c3', 'First', 'User', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 'User', 'Active', '2017-12-14 00:00:00', '2017-12-14 05:55:16'),
(3, 1, 'account@gmail.com', 'account@gmail.com', '356a192b7913b04c54574d18c28d46e6', 'Acc', 'ount', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'stripe', NULL, NULL, NULL, 'User', 'Active', '2017-12-20 22:37:22', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `choices_template`
--
ALTER TABLE `choices_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contacts_results`
--
ALTER TABLE `contacts_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `questions_template`
--
ALTER TABLE `questions_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `quiz_starts`
--
ALTER TABLE `quiz_starts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `quiz_views`
--
ALTER TABLE `quiz_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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

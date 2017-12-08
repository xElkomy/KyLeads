-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2017 at 04:40 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 5.6.30-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `co_sbpro`
--

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
(1, 'elements_dir', 'elements', 'elements', '<h4>Elements Directory</h4>\r\n<p>\r\nThe directory where all your element HTML files are stored. This value is relative to the directory in which you installed the application. Do not add a trailing "/"\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'images_dir', 'images', 'images', '<h4>Image Directory</h4>\r\n<p>\r\nThis is the main directory for the images used by your elements. The images located in this directory belong to the administrator and can not be deleted by regular users. This directory needs to have <b>full read and write permissions!</b>\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'images_uploadDir', 'images/uploads', 'images/uploads', '<h4>Image Upload Directory</h4>\r\n<p>\r\nThis directory is used to store images uploaded by regular users. Each user will have his/her own directory within this directory. This directory needs to have <b>full read and write permissions!</b>.\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'upload_allowed_types', 'image/gif, image/jpg, image/png', 'image/gif, image/jpg, image/png', '<h4>Allowed Image Types</h4>\r\n<p>\r\nThe types of images users are allowed to upload, separated by "|".\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'upload_max_size', '1000', '1000', '<h4>Maximum Upload Filesize</h4>\r\n<p>\r\nThe maximum allowed filesize for images uploaded by users. This number is represents the number of kilobytes. Please note that this number of overruled by possible server settings.\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'images_allowedExtensions', 'jpg|png|gif|svg', 'jpg|png|gif|svg', '<h4>Allowed Extensions</h4>\r\n<p>\r\nThese allowed extensions are used when displayed the image library to the user, only these file types will be visible. \r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'export_pathToAssets', 'elements/bundles|elements/css|images', 'elements/bundles|elements/css|images', '<h4>Assets Included in the export</h4>\r\n<p>\r\nThe collection of asset paths included in the export function. These paths are relative to the folder in which the application was installed and should have NO trailing "/". The paths are separated by "|".\r\n</p>', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'export_fileName', 'website.zip', 'website.zip', '<h4>The Export File Name</h4>\r\n<p>\r\nThe name of the ZIP archive file downloaded when exporting a site. We recommend using the ".zip" file extension (others might work, but have not been tested).\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'language', 'english', 'english', '<h4>Application Language</h4>\r\n<p>\r\n"english" by default. If you\'re changing this to anything else, please be sure to have all required language files translated and located in the correct folder inside "/application/languages/yourlanguage".\r\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'google_api', '', '', '<h4>Google Maps API</h4>\r\n<p>\r\nTo be able to use Google Maps within blocks, you will need to provide a properly functioning Google Maps API with access to the Geocoding library.".\r\n</p>', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 'auto_update', 'yes', 'yes', '<h5>Auto Update</h5>\n<p>\nAutomatic update core system when there is update available in SBPro.\n</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 'stripe_secret_key', '', '', 'Your Stripe Secret Key.\r\n<br>For more information <a href="https://stripe.com/docs/dashboard#api-keys" target="_blank">Click Here</a>', 0, '0000-00-00 00:00:00', NULL),
(2, 'stripe_publishable_key', '', '', 'Your Stripe Publishable Key.\r\n<br>For more information <a href="https://stripe.com/docs/dashboard#api-keys" target="_blank">Click Here</a>', 0, '0000-00-00 00:00:00', NULL),
(3, 'stripe_test_mode', 'test', 'test', 'Your Stripe Environment', 0, '0000-00-00 00:00:00', NULL),
(4, 'paypal_api_username', '', '', 'Enter your PayPal API username.\r\n<br> For more details <a href="https://developer.paypal.com/docs/classic/api/apiCredentials/#create-an-api-signature" target="_blank">Click Here</a>', 0, '0000-00-00 00:00:00', NULL),
(5, 'paypal_api_password', '', '', 'Enter PayPal API password.\r\n<br> For more details <a href="https://developer.paypal.com/docs/classic/api/apiCredentials/#create-an-api-signature" target="_blank">Click Here</a>', 0, '0000-00-00 00:00:00', NULL),
(6, 'paypal_api_signature', '', '', 'Enter PayPal API signature.\r\n<br> For more details <a href="https://developer.paypal.com/docs/classic/api/apiCredentials/#create-an-api-signature" target="_blank">Click Here</a>', 0, '0000-00-00 00:00:00', NULL),
(7, 'paypal_test_mode', '', '', 'Your PayPal Environment', 0, '0000-00-00 00:00:00', NULL),
(8, 'payment_gateway', 'stripe', 'stripe', 'Select Payment gateway you want for end users.', 0, '0000-00-00 00:00:00', NULL);

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
(1, 0, 'admin@admin.com', 'admin@admin.com', 'f865b53623b121fd34ee5426c792e5c3', 'Admin', 'istrator', '1b21159590f6513bdbe7094d4ad327b1', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', 'Admin', 'Active', '2016-11-30 04:44:51', '2017-07-14 13:48:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps_settings`
--
ALTER TABLE `apps_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `core_settings`
--
ALTER TABLE `core_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frames`
--
ALTER TABLE `frames`
  ADD PRIMARY KEY (`frames_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps_settings`
--
ALTER TABLE `apps_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `core_settings`
--
ALTER TABLE `core_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `frames`
--
ALTER TABLE `frames`
  MODIFY `frames_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_log`
--
ALTER TABLE `payment_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `sites_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// From address is used for all emails send by the script
$config['email_from_address'] = "info@example.com";

// From name is used for all emails send by the script
$config['email_from_name'] = "SBPro";

// Subject for the email send to user when payment received
$config['email_confirmation_subject'] = "SBPro: Confirmation email!";

// Subject for the email send to user when admin create an user from admin panel with paid plan
$config['email_activation_subject'] = "SBPro: Activation email!";

// Subject for the email send to user when admin create an user from admin panel with free plan
$config['email_login_subject'] = "SBPro: Account created!";

// Subject for the email send to user when password forgot
$config['email_forgot_password_subject'] = "SBPro: Forgot Password!";

// Subject for the email send to user when admin send reset password email
$config['email_reset_password_subject'] = "SBPro: Reset Password!";

// SentAPI email from address is used for all emails send by the script
$config['sent_email_from_address'] = "info@example.com";

// SentAPI email from name is used for all emails send by the script
$config['sent_email_from_name'] = "SBPro";

// SentAPI email subject for the email send to user by the script
$config['sent_email_default_subject'] = "SBPro: Mail from your site!";

$config['email_sub_cancel_subject'] = "SBPro: Profile Cancelled!";

$config['sub_cancel_failed_subject'] = "SBPro: Profile Cancellation Failed!";

// CoreUpdate URI
$config['autoupdate_uri'] = 'http://updates.sbpro.io/updates.json';
// $config['autoupdate_uri'] = 'http://sbpro.dev/updates.json';

// License URI
$config['license_uri'] = 'http://license.sbpro.io/api/verify_key/';
//$config['license_uri'] = 'http://sbprolicense.dev/api/verify_key/';

// Screenshot API Key
$config['screenshot_api_key'] = "2e94ee";
$config['screenshot_secret'] = "lksejhfefghug75765";

//  Screenshot folder for site thumbs
$config['screenshot_sitethumbs_folder'] = "tmp/sitethumbs/";


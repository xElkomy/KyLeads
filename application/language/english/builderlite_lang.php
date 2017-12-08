<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Builder Language file
 */

/**** Common text used in all modules Start ****/
$lang['flashdata_success'] = 'Success!';
$lang['flashdata_error'] = 'Error!';
$lang['OR'] = "OR";
$lang['logo_alt_text'] = "SiteBuilder Pro";
$lang['loading'] = "Loading...";
$lang['alternative_page_title'] = "Site Builder Pro";
$lang['newsite_default_title'] = "My New Site";
$lang['modal_close'] = "Close";
$lang['modal_areyousure'] = "Are you sure?";
$lang['modal_cancelclose'] = "Cancel & Close";
$lang['modal_delete'] = "Delete";
$lang['back'] = "back";
$lang['cancel'] = "Cancel";
$lang['imsure'] = "Yes, I'm sure";
$lang['loading_site_data'] = "Loading site data...";
$lang['loading_saving_data'] = "Saving data...";
$lang['admin_permission_error'] = "You need to be admin to do this.";

/**** Common text used in all moduels End ****/



/**** Asset Module Start ****/

// asset/controllers/Asset.php
$lang['asset_imageUploadAjax_error1_heading'] = "Ouch! Something went wrong:";
$lang['asset_imageUploadAjax_error1_message'] = "Something went wrong when trying to upload your image, please see the details below:<br>";

$lang['asset_imageUploadAjax_success1_heading'] = "All set!";
$lang['asset_imageUploadAjax_success1_message'] = "Your image was uploaded successfully and can now be found under the 'My Images' tab.";

$lang['asset_slim_filesize_error'] = "The file you are trying to upload is too large, the maximum file size is $0 MB";
$lang['asset_slim_filetype_error'] = "Invalid file type, expects: $0";
$lang['asset_slim_toosmall_error'] = "Image is too small, minimum size is: $0 pixels";
$lang['asset_slim_no_data_error'] = 'No data posted';
$lang['asset_slim_no_images_error'] = 'No images found';
$lang['asset_slim_no_imagedata_error'] = "No image data";
$lang['asset_slim_disk_space_error'] = "You have reached the limit of images you're allowed to upload. Please consider upgrading to different plan.";
$lang['asset_slim_unkown_error'] = "An unknown error occurred";
$lang['asset_slim_upload_success'] = "Your image was uploaded";
$lang['asset_slim_button_cancel'] = "Cancel";
$lang['asset_slim_button_confirm'] = "Confirm";

$lang['asset_open_image'] = "Click to open image";

$lang['asset_dimensions_label'] = "Image Dimensions:";
$lang['asset_dimensions_by'] = "By";
$lang['asset_dimensions_aspect_ratio'] = "Fix aspect ratio";
$lang['asset_dimensions_button'] = "Update dimensions";
$lang['asset_dimensions_button_loading'] = "Updating image...";
$lang['asset_dimensions_button_confirm'] = "Image resized!";

$lang['asset_imagedelete_button'] = "Delete image";
$lang['asset_imagedelete_areyousure'] = "Are you sure?";
$lang['asset_imagedelete_areyousure_yes'] = "Yes";
$lang['asset_imagedelete_areyousure_no'] = "No";

$lang['asset_resize_error'] = "We could not resize this image.";
$lang['asset_resize_success'] = "Your image has been resized.";

// asset/views/images.php
$lang['images_heading'] = "My Image Library";
$lang['images_uploadimages'] = "Upload Image(s)";
$lang['images_button_selectimage'] = "Select Image";
$lang['images_button_change'] = "Change";
$lang['images_button_remove'] = "Remove";
$lang['images_button_upload'] = "Upload Image";

$lang['images_error_heading'] = "Ouch! Something went wrong";
$lang['images_success_heading'] = "Success!";
$lang['images_success_message'] = "Your image was uploaded successfully!";

$lang['images_tab_myimages'] = "My Images";
$lang['images_tab_otherimages'] = "Other Images";

$lang['images_button_view'] = "view";
$lang['images_button_delete'] = "delete";

$lang['images_message_noimages'] = "You currently have no images uploaded. To upload images, please use the upload panel on your left.";
$lang['images_label_admin'] = "Admin";
$lang['images_label_view'] = "view";

$lang['modal_deleteimage_message'] = "Deleting this image is permanent and <b>can not be undone</b>. Are you sure you want to continue?";
$lang['modal_deleteimage_button_cancel'] = "Cancel";
$lang['modal_deleteimage_button_delete'] = "Permanently delete image";

/**** Asset Module End ****/



/**** Auth Module Start ****/

// auth/controllers/Auth.php
$lang['auth_index_title'] = "SBPro User Login.";
$lang['auth_index_validation_error'] = "The login was unsucessful.";
$lang['auth_index_login_error'] = "The login was unsucessful.";

$lang['auth_register_title'] = "SBPro user registration.";
$lang['auth_register_user_limit_error'] = "Unfortunately we already reached our customer limit. Sorry for the inconvenience.";
$lang['auth_register_form_errors'] = "Some fields were not filled out properly: ";
$lang['auth_register_captcha_error'] = "Captcha validation mismatch.";
$lang['auth_register_email_exist_error'] = "User email already exists.";
$lang['auth_register_stripe_base_error'] = "Customer create has some problem. Please try again.";
$lang['auth_register_stripe_exception_error'] = "Customer create has some problem. Please try again.";
$lang['auth_register_user_success'] = "User register successfully. <br>Please pay the package price.";
$lang['auth_register_free_user_success'] = "User register successfully. <br>Please click below link for login to your account.";

$lang['auth_payment_stripe_title'] = "SBPro user registration.";
$lang['auth_payment_stripe_payment_success'] = "Payment successful. <br>Please click below link for login to your account. Be sure to check your email for a payment confirmation.";
$lang['auth_payment_stripe_payment_base_error'] = "Payment has some issues. <br>Please check your payment details and submit again.<br>";
$lang['auth_payment_stripe_payment_exception_error'] = "Payment has some issues. <br>Please check your payment details and submit again.<br>";

$lang['auth_payment_confirm_title'] = "SBPro user registration.";

$lang['auth_free_user_confirm_title'] = "SBPro user registration.";

$lang['auth_payment_card_update_title'] = "SBPro user registration.";
$lang['auth_payment_card_update_success'] = "Card update successful. <br>You can login.";
$lang['auth_payment_card_update_base_error'] = "Card update has some issues. <br>Please check your card details and submit again.<br>";
$lang['auth_payment_card_update_exception_error'] = "Card update has some issues. <br>Please check your card details and submit again.<br>";

$lang['auth_activate_key_error'] = "Activation key is invalid or expired.";

$lang['auth_forgot_title'] = "SBPro forgot password.";
$lang['auth_forgot_email_error'] = "We cant find your email address.";
$lang['auth_forgot_status_error'] = "Your account is not active.";
$lang['auth_forgot_message1'] = "<strong>A password reset has been requested for this email account</strong><br>";
$lang['auth_forgot_message2'] = "<strong>Please click:</strong> ";
$lang['auth_forgot_success'] = "A password reset link has been sent to your email address. Please check your email.";
$lang['auth_forgot_error'] = "There is an error occurred, please try again later.";

$lang['auth_reset_password_title'] = "SBPro reset password.";
$lang['auth_reset_password_url_error'] = "Can't reset password, invalid reset link.";
$lang['auth_reset_password_invalid_key_error'] = "Password reset key is invalid or expired.";
$lang['auth_reset_password_update_error'] = "There was a problem updating your password.";
$lang['auth_reset_password_update_success'] = "Your password has been updated. You may now login.";

// auth/views/forgot.php
$lang['forgot_password_subheading'] = "Please enter your Email so we can send you an email to reset your password.";
$lang['forgot_password_input_email_placeholder'] = "Your email address";
$lang['forgot_password_submit_btn'] = "Submit";
$lang['forgot_backlink'] = "back to login";

// auth/views/login.php
$lang['login_input_email_placeholder'] = "Your email address";
$lang['login_input_password_placeholder'] = "Your password";
$lang['login_remember_me'] = "Remember me";
$lang['login_button_login'] = "Log me in";
$lang['login_lost_password'] = "Lost your password?";
$lang['login_signup_heading'] = "Join <b>today</b>";
$lang['login_button_signup'] = "SIGN UP NOW";

// auth/views/payment_card_update.php
$lang['payment_card_update_heading'] = "<b>SBPro</b> Card Update";
$lang['payment_card_update_input_card_number_placeholder'] = "Card Number";
$lang['payment_card_update_select_card_month_placeholder'] = "Select Expire Month";
$lang['payment_card_update_select_card_year_placeholder'] = "Select Expire Year";
$lang['payment_card_update_input_card_cvc_placeholder'] = "CVC Number";
$lang['payment_card_update_button'] = "Update Card Details";
$lang['payment_card_update_backlink'] = "back to login";

// auth/views/payment_confirm.php
$lang['payment_confirm_backlink'] = "back to login";

// auth/views/payment_stripe.php
$lang['payment_stripe_heading'] = "<b>SBPro</b> Signup";
$lang['payment_stripe_input_card_number_placeholder'] = "Card Number";
$lang['payment_stripe_select_card_month_placeholder'] = "Select Expire Month";
$lang['payment_stripe_select_card_year_placeholder'] = "Select Expire Year";
$lang['payment_stripe_input_card_cvc_placeholder'] = "CVC Number";
$lang['payment_stripe_button'] = "Create Account";
$lang['payment_stripe_upgrade_button'] = "Upgrade now";
$lang['payment_stripe_backlink'] = "back to login";

// auth/views/register.php
$lang['register_heading'] = "<b>SB</b>Pro Signup";
$lang['register_input_first_name_placeholder'] = "First name *";
$lang['register_input_last_name_placeholder'] = "Last name *";
$lang['register_input_email_placeholder'] = "Email *";
$lang['register_input_password_placeholder'] = "Password *";
$lang['register_input_password_confirm_placeholder'] = "Confirm password *";
$lang['register_select_package'] = "Choose a package";
$lang['register_input_captcha_placeholder'] = "Enter the letters from the image";
$lang['register_create_account_button'] = "Create Account";
$lang['register_backlink'] = "back to login";

// auth/views/reset_password.php
$lang['reset_password_subheading'] = "Please enter your new password.";
$lang['reset_password_input_password_placeholder'] = "Please enter your new password.";
$lang['reset_password_input_re_password_placeholder'] = "Please re-enter your new password.";

// auth/views/email/confirmation.tpl.php
$lang['email_confirmation_heading'] = "Dear %s";
$lang['email_confirmation_sub_heading'] = "Your payment is successful and your account is activated. %s";
$lang['email_confirmation_link'] = "Click here for login";

// auth/views/email/forgot_password.tpl.php
$lang['email_forgot_password_heading'] = "Reset Password for %s";
$lang['email_forgot_password_sub_heading'] = "Please click this link to %s.";
$lang['email_forgot_password_link'] = "Reset Your Password";

// auth/views/email/free_user_confirmation.tpl.php
$lang['email_free_user_confirmation_heading'] = "Dear %s";
$lang['email_free_user_confirmation_sub_heading'] = "Your free account is activated successfully. %s";
$lang['email_free_user_confirmation_link'] = "Click here for login";

// auth/views/email/new_password.tpl.php
$lang['email_new_password_heading'] = "New Password for %s";
$lang['email_new_password_sub_heading'] = "Your password has been reset to: %s";

// auth/views/email/payment_failed.tpl.php
$lang['email_payment_failed_heading'] = "Dear %s";
$lang['email_payment_failed_sub_heading'] = "Your payment (amount %s) is failed. Please update your card details. %s";
$lang['email_payment_failed_link'] = "Click here for update your card details.";

/**** Auth Module End ****/



/**** Migrate Module Start ****/

// migrate/controllers/Migrate.php
$lang['migrate_success'] = "Your database has been updated to the latest version.";
$lang['migrate_failure'] = "Your database has not been updated to the latest version. please contact owner.";

/**** Migrate Module End ****/



/**** Package Module Start ****/

// package/controllers/Package.php
$lang['package_admin_permission_error'] = "You need to be admin to do this.";

$lang['package_create_form_validation_error_heading'] = "Ouch! Something went wrong:";
$lang['package_create_form_validation_error_message'] = "Something went wrong when trying to cerate the new package, please see the errors below:<br><br>";
$lang['package_create_statement_descriptor'] = "SBPro Subscription.";
$lang['package_create_stripe_base_error_heading'] = "Ouch! Something went wrong:";
$lang['package_create_stripe_base_error_message'] = "Something went wrong when trying to update the package, please see the errors below:<br><br>";
$lang['package_create_stripe_exception_error_heading'] = "Ouch! Something went wrong:";
$lang['package_create_stripe_exception_error_message'] = "Something went wrong when trying to update the package, please see the errors below:<br><br>";
$lang['package_create_success_heading'] = "Hooray!";
$lang['package_create_success_message'] = "The new package created successfully!";

$lang['package_update_form_validation_error_heading'] = "Ouch! Something went wrong:";
$lang['package_update_form_validation_error_message'] = "Something went wrong when trying to update the package, please see the errors below:<br><br>";
$lang['package_update_stripe_base_error_heading'] = "Ouch! Something went wrong:";
$lang['package_update_stripe_base_error_message'] = "Something went wrong when trying to update the package, please see the errors below:<br><br>";
$lang['package_update_stripe_exception_error_heading'] = "Ouch! Something went wrong:";
$lang['package_update_stripe_exception_error_message'] = "Something went wrong when trying to update the package, please see the errors below:<br><br>";
$lang['package_update_success_heading'] = "Hooray!";
$lang['package_update_success_message'] = "The package updated successfully!";

$lang['package_delete_stripe_invalid_request_error'] = "No such plan.";
$lang['package_delete_stripe_base_error'] = "Facing issue with stripe, <br>";
$lang['package_delete_stripe_exception_error'] = "Facing issue with stripe, <br>";
$lang['package_delete_success'] = "The package has been deleted.";
$lang['package_delete_error'] = "We couldn't remove the package. Please reload and try again.";

$lang['package_toggle_status_inactive'] = "The package has been deactivated; user can not register under this package.";
$lang['package_toggle_status_active'] = "The package has been activated; user can now register under this package.";

// package/views/package_details.php
$lang['package_details_price_label'] = "Price : ";
$lang['package_details_input_name_placeholder'] = "Package Name";
$lang['package_details_input_sites_number_placeholder'] = "Number of Sites";
$lang['package_details_input_hosting_option_placeholder'] = "Hosting Option";
$lang['package_details_input_price_placeholder'] = "Price";
$lang['package_details_input_currency_placeholder'] = "Currency";
$lang['package_details_input_subscription_placeholder'] = "Interval";
$lang['package_details_button_udpate_package'] = "Update Package";
$lang['package_details_button_delete_package'] = "Delete Package";
$lang['package_details_button_disable_package'] = "Disable";
$lang['package_details_button_enable_package'] = "Enable";
$lang['package_details_ribbon_label'] = "disabled";

// package/views/package_details_form.php
$lang['package_details_form_input_name_placeholder'] = "Package Name";
$lang['package_details_form_input_sites_number_placeholder'] = "Number of Sites";
$lang['package_details_form_input_hosting_option_placeholder'] = "Hosting Option";
$lang['package_details_form_input_price_placeholder'] = "Price";
$lang['package_details_form_input_currency_placeholder'] = "Currency";
$lang['package_details_form_input_subscription_placeholder'] = "Interval";
$lang['package_details_form_button_udpate_package'] = "Update Package";

// package/views/package_table.php
$lang['package_table_package'] = "Package";
$lang['package_table_price'] = "Price";
$lang['package_table_currency'] = "Currency";
$lang['package_table_interval'] = "Interval";
$lang['package_table_status'] = "Status";

// package/views/packages.php
$lang['package_heading'] = "Packages";
$lang['package_button_addnew'] = "Add New Package";
$lang['package_empty_paypal_api_heading'] = "PayPal API details are missing";
$lang['package_empty_paypal_api_message'] = "Your PayPal <b>API details</b> have not yet been provided. You can only create free (0 amount) packages. To create paid package, please enters these <b>API details</b> through Settings > Payment Settings. Once entered, you can start adding paid packages.";
$lang['package_empty_stripe_key_heading'] = "Stripe keys are missing";
$lang['package_empty_stripe_key_message'] = "Your Stripe <b>Secret key</b> and <b>Publishable key</b> have not yet been provided. You can only create free (0 amount) packages. To create paid package, please enters these keys through Settings > Payment Settings. Once entered, you can start adding paid packages.";
$lang['package_empty_package_heading'] = "No packages found";
$lang['package_empty_package_message'] = "You dont have any package, please add one by clicking the <b>Add New Package</b> button.";

$lang['package_modal_newpackage_heading'] = "Create a new package";
$lang['package_modal_newpackage_loadertext'] = "Creating new package...";
$lang['package_modal_newpackage_name'] = "Package name";
$lang['package_modal_newpackage_number_of_sites'] = "Number of sites";
$lang['package_modal_newpackage_hosting_option'] = "Hosting Option";
$lang['package_modal_newpackage_placeholder_hosting_option'] = "Choose one or more options";
$lang['package_modal_newpackage_hosting_subfolder'] = "Sub-Folder";
$lang['package_modal_newpackage_hosting_subdomain'] = "Sub-Domain";
$lang['package_modal_newpackage_hosting_custom_domain'] = "Custom Domain";
$lang['package_modal_newpackage_export'] = "Export Site";
$lang['package_modal_newpackage_disk_space'] = "Upload space (in MB)";
$lang['package_modal_newpackage_placeholder_disk_space'] = "Disk Space in MB";
$lang['package_modal_newpackage_templates'] = "Templates";
$lang['package_modal_newpackage_price'] = "Price";
$lang['package_modal_newpackage_currency'] = "Currency";
$lang['package_modal_newpackage_subscription'] = "Interval";
$lang['package_modal_newpackage_status'] = "Status";
$lang['package_modal_newpackage_status_active'] = "Active";
$lang['package_modal_newpackage_status_inactive'] = "Inactive";
$lang['package_modal_newpackage_button_create'] = "Create Package";

$lang['package_modal_edit_heading'] = "Edit package";
$lang['package_modal_edit_package_button_update'] = "Update Package";
$lang['package_modal_delete_package_message'] = "Deleting this package will result in all associated data being deleted and <b>can not be undone</b>. Are you sure you want to continue?";
$lang['package_modal_delete_package_delete_in_stripe'] = "Also it will delete the plan from stripe but it's subsribers will remain in this plan unless you change their plan. For more information <a href='https://stripe.com/docs/subscriptions/plans#changing-and-deleting-plans' target='_blank'>Click Here</a>";
$lang['package_create_error1_heading'] = "Ouch! Something went wrong:";
$lang['package_create_error1_message'] = "Something went wrong when trying to cerate the new package, please see the errors below:<br><br>";

/**** Package Module End ****/



/**** Settings Module Start ****/

// settings/controllers/Settings.php
$lang['settings_update_error'] = "There were some issues with your data and we could not save your data right now, please see the details below:<br><br>";
$lang['settings_update_success'] = "Your settings were saved successfully!";
$lang['settings_update_invalid_key_error'] = "Your settings were saved successfully! But the License Key is invalid, Please re-check your License key. If your license key is correct but you still get this message, please contact with suppor@chillyorange.com";

// settings/views/settings.php
$lang['settings_heading'] = "Settings";

$lang['settings_tab_application_settings'] = "Application Settings";
$lang['settings_tab_payment_settings'] = "Payment Settings";
$lang['settings_tab_update_settings'] = "Update Settings";

$lang['settings_warning_heading'] = "Be careful please!";
$lang['settings_warning_message'] = "Please be cautious when making changes to the settings below. Unless you know what you're doing, don't make changes to any of these.";

$lang['settings_requiredfields'] = "* required fields, can not be empty!";
$lang['settings_button_update'] = "Update Settings";

$lang['settings_confighelp_heading'] = "Config help";
$lang['settings_confighelp_message'] = "Click any of the setting boxes will display details about that setting in this box here :)";

/**** Settings Module End ****/



/**** Shared Module Start ****/

// shared/views/alert.php
$lang['application_link'] = '<a href="https://sbpro.io/">SBPro</a>';
$lang['alert_page_title'] = "SB Pro form submission";

// shared/views/ftplist.php
$lang['ftplist_uponelevel'] = "Up one level";

// shared/views/modal_account.php
$lang['account_myaccount'] = "My Account";
$lang['account_tab_account'] = "Account";
$lang['account_tab_membership'] = "My Membership";
$lang['account_tab_settings'] = "Settings";

$lang['account_label_first_name'] = "First name";
$lang['account_label_last_name'] = "Last name";
$lang['account_button_updatedetails'] = "Update Details";
$lang['account_label_username'] = "Username";
$lang['account_label_password'] = "Password";

$lang['account_label_package'] = "Package";
$lang['account_label_package_option'] = "Choose a package";
$lang['account_button_update_package'] = "Update Package";
$lang['account_button_cancel_package'] = "Cancel Subscription";

// shared/views/modal_sitesettings.php
$lang['sitesettings_sitesettings'] = "Site Settings";
$lang['sitesettings_button_savesettings'] = "Save Settings";

// shared/views/my404.php
$lang['my404_header'] = "404, Not Found!";
$lang['my404_message'] = "Opps! You have requested the page that is no longer there.";

// shared/views/myimages
$lang['myimages_newimage_label'] = "<b>+</b><strong>Add Image</strong><br>max size: %sMB";

// shared/views/nav.php
$lang['nav_toggle_navigation'] = "Toggle Navigation";
$lang['nav_name'] = "<b class='text-primary'>SB</b>PRO";
$lang['nav_sites'] = "Sites";
$lang['nav_imagelibrary'] = "Image Library";
$lang['nav_membership'] = "My Membership";
$lang['nav_users'] = "Users";
$lang['nav_settings'] = "Settings";
$lang['nav_packages'] = "Packages";
$lang['nav_greeting'] = "Hi,";
$lang['nav_myaccount'] = "My Account";
$lang['nav_logout'] = "Logout";
$lang['nav_goback_sites'] = "Return to Sites";
$lang['nav_goback_users'] = "Back to Users";

// shared/views/pagedata.php
$lang['modal_pagesettings_pagetitle'] = "Page Title";
$lang['modal_pagesettings_pagedescription'] = "Page Meta Description";
$lang['modal_pagesettings_pagekeywords'] = "Page Meta Keywords";
$lang['modal_pagesettings_pageheaderincludes'] = "Header Includes";
$lang['modal_pagesettings_pagecss'] = "Page CSS";

// shared/views/sitedata.php
$lang['sitedata_sitedetails'] = "Site details";
$lang['sitedata_label_name'] = "Site name";
$lang['sitedata_label_globalcss'] = "Global CSS";
$lang['sitedata_hostingdetails'] = "Publishing details";
$lang['sitedata_hosting_dropdown_choose'] = "Choose an option";
$lang['sitedata_hosting_dropdown_subfolder'] = "Sub folder";
$lang['sitedata_hosting_dropdown_subdomain'] = "Sub domain";
$lang['sitedata_hosting_dropdown_customdomain'] = "Custom domain";
$lang['sitedata_hosting_info_subfolder'] = "<p>Your site will be published on the domain + sub folder as specified above. Changes made to your site will be automatically published. If you wish to unpublish your site, simply empty the field above and click the \"Save Settings\" button. You can re-publish your site at any time.</p>";
$lang['sitedata_hosting_info_subdomain'] = "<p>Your site will be published on the sub domain as specified above. Changes made to your site will be automatically published. If you wish to unpublish your site, simply empty the field above and click the \"Save Settings\" button. You can re-publish your site at any time.</p>";
$lang['sitedata_hosting_info_customdomain'] = "<p>Your site will be published on the custom domain specified above. Please note for this to work, you will need to create an \"A\"-type DNS record for the domain and point to <b>%s</b></p><p>If you wish to unpublish your site, simply empty the field above and click the \"Save Settings\" button. You can re-publish your site at any time.</p>";
$lang['sitedata_hosting_not_published_heading'] = "Site not published";
$lang['sitedata_hosting_not_published_message'] = "Your site is not currently published and can not be visited from the Internet.";
$lang['sitedata_hosting_published_heading'] = "Site published:";
$lang['sitedata_hosting_published_message'] = "Your site is currently published as shown below:";

/**** Shared Module End ****/



/**** Sites Module Start ****/

// sites/controllers/sites.php
$lang['sites_index_title'] = "SBPro Dashboard.";
$lang['sites_index_reach_site_number'] = "<a href=\"#accountModal\" data-toggle=\"modal\" data-open-tab=\"2\">Click here</a> to upgrade your plan.";
$lang['sites_index_almost_reach_site_number'] = "You have almost reach the allowed number of sites. <a href=\"#accountModal\" data-toggle=\"modal\" data-open-tab=\"2\">Click here</a> to upgrade your plan.";

$lang['sites_create_site_exceed'] = "You have exceed the number of sites for your package.";

$lang['sites_tsave_no_page_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_tsave_no_page_error_message'] = "There is nothing to save or update. Please try saving again after making some changes to your site.";
$lang['sites_tsave_template_save_success_heading'] = "Success!";
$lang['sites_tsave_template_save_success_message'] = "The template was saved successfully. The new template will be available from the left menu after reloading this page.";
$lang['sites_tsave_template_save_fail_heading'] = "Ouch!";
$lang['sites_tsave_template_save_fail_message'] = "The template good not be saved. Please reload the page and try again.";

$lang['sites_save_no_data_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_save_no_data_error_message'] = "The siteData is missing, please try again.";
$lang['sites_save_no_frame_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_save_no_frame_error_message'] = "There's noting to save. Try making some changes and saving again.";
$lang['sites_save_after_publish_success_heading'] = "Success!";
$lang['sites_save_after_publish_success_message'] = "The site has been saved successfully!";
$lang['sites_save_before_publish_success_heading'] = "Success!";
$lang['sites_save_before_publish_success_message'] = "The site has been saved successfully! You can now proceed with publishing your site.";

$lang['sites_site_could_not_load_error'] = "The site you're trying to load does not exist.";

$lang['sites_siteAjax_siteID_missing_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_siteAjax_siteID_missing_error_message'] = "It appears the site ID is missing. Please refresh your page and try again.";
$lang['sites_siteAjax_site_save_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_siteAjax_site_save_error_message'] = "Something went wrong when loading the site data. Please refresh your page and try again.";

$lang['sites_siteAjaxUpdate_validation_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_siteAjaxUpdate_validation_error_message'] = "Something went wrong when saving the site data, please see the errors below:<br><br>";
$lang['sites_siteAjaxUpdate_sub_folder_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_siteAjaxUpdate_sub_folder_error_message'] = "Sub folder name already taken, please choose something else.";
$lang['sites_siteAjaxUpdate_sub_domain_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_siteAjaxUpdate_sub_domain_error_message'] = "Sub domain name already taken, please choose something else.";
$lang['sites_siteAjaxUpdate_custom_domain_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_siteAjaxUpdate_custom_domain_error_message'] = "Domain name already taken, please choose something else.";
$lang['sites_siteAjaxUpdate_save_success_heading'] = "Yeah! All went well.";
$lang['sites_siteAjaxUpdate_save_success_message'] = "The site's details were saved successfully!";
$lang['sites_siteAjaxUpdate_save_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_siteAjaxUpdate_save_error_message'] = "Something went wrong when saving the site data, please try again later.";

$lang['sites_publish_ftp_no_site_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_publish_ftp_no_site_error_message'] = "It appears the site ID is missing OR incorrect. Please refresh your page and try again.";
$lang['sites_publish_ftp_noting_to_upload_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_publish_ftp_noting_to_upload_error_message'] = "It appears there are no assets selected for publication. Please select the assets you'd like to publish and try again.";
$lang['sites_publish_ftp_connection_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_publish_ftp_connection_error_message'] = "We can not establish a connection to your FTP server, this caused by faulty connection data (server, user, password and/or port number). Please verify your connection details and update if needed before trying again. If you keep getting this error, your FTP server could be down as well.";
$lang['sites_publish_ftp_tmp_not_writable_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_publish_ftp_tmp_not_writable_error_message'] = "It appears the /tmp folder is not writable. Please make sure the server can write to this folder.";

$lang['sites_publish_no_site_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_publish_no_site_error_message'] = "It appears the site ID is missing OR incorrect. Please refresh your page and try again.";
$lang['sites_publish_noting_to_upload_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_publish_noting_to_upload_error_message'] = "It appears there are no assets selected for publication. Please select the assets you'd like to publish and try again.";

$lang['sites_trash_no_site_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_trash_no_site_error_message'] = "The site ID is missing or corrupt. Please try reloading the page and then try deleting the site once more.";
$lang['sites_trash_success_heading'] = "All set!";
$lang['sites_trash_success_message'] = "The site was successfully deleted from the system.";

$lang['sites_updatePageData_no_site_error_heading'] = "Ouch! Something went wrong:";
$lang['sites_updatePageData_no_site_error_message'] = "The site ID is missing or corrupt. Please try reloading the page and then try deleting the site once more.";
$lang['sites_updatePageData_success_heading'] = "All set!";
$lang['sites_updatePageData_success_message'] = "The page settings were successfully updated.";

$lang['sites_deltempl_delete_success'] = "The page template was successfully deleted.";

$lang['sites_rpreview_error'] = "Missing data, revision could not be loaded.";

$lang['sites_deleterevision_delete_error'] = "Some data is missing, we can not delete this revision right now. Please try again later.";
$lang['sites_deleterevision_delete_success'] = "The revision was removed successfully.";

$lang['sites_restorerevision_error'] = "Error!, data missing.";

// sites/views/create.php
$lang['mainside_templates'] = "templates";
$lang['mainside_blocks'] = "blocks";
$lang['mainside_components'] = "components";
$lang['mainside_pages'] = "pages";

$lang['templates_heading'] = "Templates";
$lang['choose_template'] = "Choose Template";

$lang['elements_heading'] = "Blocks";
$lang['comopnents_heading'] = "Components";
$lang['pages'] = "Pages";

$lang['button_add_page'] = "Add Page";
$lang['button_publish_page'] = "Publish";

$lang['actionbuttons_sitesettings'] = "Site Settings";
$lang['actionbuttons_pagesettings'] = "Page Settings";
$lang['actionbuttons_preview'] = "Preview";
$lang['actionbuttons_save_nothing'] = "Nothing to save";
$lang['actionbuttons_save'] = "Save now (!)";
$lang['actionbuttons_loading'] = "Saving...";
$lang['actionbuttons_versions'] = "Older versions";
$lang['actionbuttons_versions_tooltip_preview'] = "Preview Revision";
$lang['actionbuttons_versions_tooltip_delete'] = "Delete Revision";
$lang['actionbuttons_versions_tooltip_restore'] = "Restore Revision";
$lang['actionbuttons_savesite'] = "Save entire site";
$lang['actionbuttons_savepagetemplate'] = "Save page template";
$lang['actionbuttons_export'] = "Export";
$lang['actionbuttons_publish'] = "Publish";

$lang['create_all_good'] = "All good!";

$lang['create_tab_placeholder_linktext'] = "Link text";

$lang['create_tab_panel_page'] = "Choose a page";
$lang['create_tab_panel_block'] = "Choose a block";

$lang['link_tab_link_active'] = "Link is active";

$lang['form_tab_email_data_to'] = "Email data to:";
$lang['form_tab_placeholder_emailaddress'] = "Email address";
$lang['form_tab_custom_action'] = "Custom action:";
$lang['form_tab_placeholder_confirmation'] = "Custom confirmation message";
$lang['form_tab_placeholder_action'] = "Action";

$lang['map_tab_zoomlevel'] = "Map zoom level";
$lang['map_tab_address'] = "Your address";
$lang['map_tab_infomessage'] = "Info box message";
$lang['map_tab_blackandwhite'] = "Black & White";

$lang['slideshow_tab_autoplay'] = "Auto play:";
$lang['slideshow_tab_pauseonhover'] = "Pause on hover:";
$lang['slideshow_tab_effect'] = "Effect:";
$lang['slideshow_tab_effect_slide'] = "Slide";
$lang['slideshow_tab_effect_fade'] = "Fade";
$lang['slideshow_tab_interval'] = "Interval (in ms):";
$lang['slideshow_tab_navarrows'] = "Nav arrows:";
$lang['slideshow_tab_navarrows_inside'] = "Inside";
$lang['slideshow_tab_navarrows_outside'] = "Outside";
$lang['slideshow_tab_navarrows_none'] = "Hidden";
$lang['slideshow_tab_navindicators'] = "Nav indicators:";

$lang['label_building_mode'] = "Mode";
$lang['label_building_mode_elements'] = "Blocks";
$lang['label_building_mode_content'] = "Content";
$lang['label_building_mode_details'] = "Details";

$lang['mode_tooltip_elements'] = "Allows you to add, remove and re-order blocks on the canvas. You can also view and edit the block's source HTML";
$lang['mode_tooltip_content'] = "Allows you to edit written conten on your pages. Editable elements will display a red dashed outline when hovering the mouse cursor over it.";
$lang['mode_tooltip_styling'] = "Allows you edit certain style attributes, images, links and videos. Editable Elements will display a red dashed outline when hovering the cursor over it.";

$lang['canvas_empty'] = "Build your page by dragging blocks onto the canvas";

$lang['detail_editor_heading'] = "Detail Editor";
$lang['detail_editor_label_editing'] = "editing";
$lang['detail_editor_tab_style'] = "Style";
$lang['detail_editor_tab_link'] = "Link";
$lang['detail_editor_tab_image'] = "Image";
$lang['detail_editor_tab_icons'] = "Icons";
$lang['detail_editor_tab_video'] = "Video";
$lang['detail_editor_tab_brand'] = "Brand";
$lang['detail_editor_tab_form'] = "Form";
$lang['detail_editor_tab_slideshow'] = "Slider";
$lang['detail_editor_tab_map'] = "Map";

$lang['enter_youtube_id'] = "Youtube Video ID";
$lang['video_placeholder_youtubeid'] = "Enter a Youtube video ID";
$lang['enter_vimeo_id'] = "Vimeo Video ID";
$lang['video_placeholder_vimeoid'] = "Enter a Vimeo video ID";

$lang['choose_a_page'] = "Choose a page";
$lang['choose_a_block'] = "Choose a block (one page sites)";

$lang['enter_image_path'] = "Enter image path";
$lang['upload_image'] = "Upload image";
$lang['select_image'] = "Select image";
$lang['change'] = "Change";
$lang['remove'] = "Remove";
$lang['open_image_library'] = "Open image library";
$lang['label_image_gallery'] = "Image gallery";
$lang['label_image_title'] = "Title attribute";
$lang['label_image_alt'] = "Alt attribute";

$lang['choose_an_icon'] = "Choose an icon below";

$lang['the_changes_were_applied'] = "The changes were applied successfully!";

$lang['sidebuttons_apply_changes'] = "Apply changes";
$lang['sidebuttons_apply_clone'] = "Clone";
$lang['sidebuttons_apply_reset'] = "Reset";
$lang['sidebuttons_apply_remove'] = "Remove";

$lang['modalexport_export_your_markup'] = "Export your markup";
$lang['modalexport_doctype'] = "Doc type";
$lang['modalexport_placeholder_doctype'] = "Doc type";
$lang['modalexport_export_now'] = "Export Now";

$lang['modaldeleteblock_areyousure'] = "Are you sure you want to delete this block?";

$lang['modaldeleterevision_areyousure'] = "Are you sure you want to delete this revision?";

$lang['modalpublish_publishyoursite'] = "Publish your site";

$lang['modalpublish_success_heading'] = "Hooray!";
$lang['modalpublish_success_message'] = "Publishing has finished and all your selected pages and/or assets were successfully published.";

$lang['modalpublish_pendingchanges_heading'] = "You have pending changes";
$lang['modalpublish_pendingchanges_message'] = "It appears the latest changes to this site have not been saved yet. Before you can publish this site, you will need to save the last changes.";
$lang['modalpublish_pendingchanges_button_savechanges'] = "Save Changes";

$lang['modalpublish_siteassets'] = "Site assets";
$lang['modalpublish_asset'] = "Asset";

$lang['modalpublish_publishing'] = "Publishing...";
$lang['modalpublish_published'] = "Published";

$lang['modalpublish_sitepages'] = "Site pages";
$lang['modalpublish_page'] = "Page";

$lang['modalpublish_publish_now'] = "Publish Now";

$lang['modalresetblock_areyousure'] = "Are you sure you want to reset this block?";
$lang['modalresetblock_message'] = "All changes made to the content will be destroyed.";
$lang['modalresetblock_button_reset'] = "Reset Block";

$lang['modaldeletepage_areyousure'] = "Are you sure you want to delete this entire page?";
$lang['modaldeletepage_button_deletepage'] = "Delete Page";

$lang['modaldeleteelement_areyousure'] = "Are you sure you want to delete this element? Once deleted, it can not be restored.";
$lang['modaldeleteelement_button_deleteelement'] = "Delete Block";

$lang['sites_loading'] = "Loading Builder...";

$lang['modal_pendingchanges_areyousure'] = "You've got pending changes, if you leave this page your changes will be lost. Are you sure?";
$lang['modal_pendingchanges_button_stay'] = "Stay on this page!";
$lang['modal_pendingchanges_button_leave'] = "Leave the page";

$lang['modal_editcontent_updatecontent'] = "Update Content";

$lang['modal_preview_heading'] = "Site Preview";
$lang['modal_preview_message'] = "Please note that the preview will always show your latest saved version; changes which haven't been saved yet will not be visible in the preview. <br><b>Links do not work in the preview; you can only preview the page you are currently working on.</b>";
$lang['modal_preview_button'] = "Open Preview";

$lang['modal_deltemplate_heading'] = "Remove page template?";
$lang['modal_deltemplate_message'] = "Are you sure you want to permanently delete this page template? Deleting this template <b>will not affect</b> any existing sites.";
$lang['modal_deltemplate_button'] = "Yes, delete template";

$lang['modal_imagelibrary_heading'] = "Image Library";
$lang['modal_imagelibrary_loadertext'] = "Uploading image...";
$lang['modal_imagelibrary_tab_myimages'] = 'My Images (<span>%s</span>MB of %sMB)';
$lang['modal_imagelibrary_tab_otherimages'] = "Other Images";
$lang['modal_imagelibrary_message_noimages'] = "You currently have no images uploaded. To upload images, please use the upload panel on your left.";
$lang['modal_imagelibrary_button_selectimage'] = "Select Image";
$lang['modal_imagelibrary_button_change'] = "Change";
$lang['modal_imagelibrary_button_remove'] = "Remove";
$lang['modal_imagelibrary_button_upload'] = "Upload Image";
$lang['modal_imagelibrary_ribbon_admin'] = "Admin";
$lang['modal_imagelibrary_button_insert'] = "Use and Insert Image";
$lang['modal_imagelibrary_button_insertimage'] = "Insert Image";
$lang['modal_imagelibrary_restrictions_heading'] = "Image upload restrictions";
$lang['modal_imagelibrary_restrictions_message'] = "Please observer the following restrictions when uploading images:";
$lang['modal_imagelibrary_restrictions_filesize'] = "File size:";
$lang['modal_imagelibrary_restrictions_dimensions'] = "Dimensions:";
$lang['modal_imagelibrary_restrictions_filetypes'] = "File types:";

$lang['modal_pagesettings_header'] = "Page Settings for";
$lang['modal_pagesettings_loadertext'] = "Saving page settings...";

// sites/views/sites.php
$lang['sites_page_title'] = "Sites | Site Builder Pro";
$lang['sites_header'] = "Sites";
$lang['sites_createnewsite'] = "Create New Site";
$lang['sites_filterbyuser'] = "Filter By User";
$lang['sites_filterbyuserall'] = "All";

$lang['sites_sortby'] = "Sort by";
$lang['sites_sortby_creationdate'] = "Creation date";
$lang['sites_sortby_lastupdated'] = "Last updated";
$lang['sites_sortby_numberofpages'] = "Number of pages";

$lang['sites_details_owner'] = "Owner";
$lang['sites_details_pages'] = "Page(s)";
$lang['sites_details_createdon'] = "Created on";
$lang['sites_details_lasteditedon'] = "Last edited on";

$lang['sites_published_on'] = "Site was published on ";

$lang['sites_empty_placeholder'] = "No preview available";

$lang['sites_sitehasnotbeenpublished'] = "Site has not been published";
$lang['sites_button_publishnow'] = "Publish Now";

$lang['sites_button_editthissite'] = "Edit This Site";
$lang['sites_button_settings'] = "Settings";
$lang['sites_button_delete'] = "Delete";

$lang['sites_deletesite_loadertext'] = 'Deleting site...';
$lang['sites_deletesite_areyousure'] = "Are you sure you want to delete this site?";
$lang['sites_deletesite_button_deleteforever'] = "Delete Forever";

$lang['sites_nosites_heading'] = "Well, hello there!";
$lang['sites_nosites_message'] = "It appears you might be new around these parts. At the moment, you don't have any sites to call your own just yet, so why not get started and build yourself one awesome little website?";
$lang['sites_nosites_button_confirm'] = "Yes, I want to build a website!";
$lang['sites_nosites_button_cancel'] = "Nah, maybe later";

/**** Sites Module End ****/



/**** User Module Start ****/

// user/controllers/User.php
$lang['user_create_limit_error_heading'] = "Ouch! Something went wrong:";
$lang['user_create_limit_error_message'] = "You already reached your user limit. Sorry for the inconvenience.";
$lang['user_create_validation_error_heading'] = "Ouch! Something went wrong:";
$lang['user_create_validation_error_message'] = "Something went wrong when trying to cerate the new account, please see the errors below:<br><br>";
$lang['user_create_no_user_error_heading'] = "Ouch! Something went wrong:";
$lang['user_create_no_user_error_message'] = "The email address you're trying to use is already used by different account. Please choose a different email address";
$lang['user_create_stripe_base_error_heading'] = "Ouch! Something went wrong:";
$lang['user_create_stripe_base_error_message'] = "Something went wrong when trying to cerate the new account, please see the errors below:<br><br>";
$lang['user_create_stripe_exception_error_heading'] = "Ouch! Something went wrong:";
$lang['user_create_stripe_exception_error_message'] = "Something went wrong when trying to cerate the new account, please see the errors below:<br><br>";
$lang['user_create_success_heading'] = "Hooray!";
$lang['user_create_success_message'] = "The new account was created successfully!";

$lang['user_update_validation_error_heading'] = "Ouch! Something went wrong:";
$lang['user_update_validation_error_message'] = "Something went wrong when trying to cerate the new account, please see the errors below:<br><br>";
$lang['user_update_not_allowed_email_error_heading'] = "Ouch! Something went wrong:";
$lang['user_update_not_allowed_email_error_message'] = "The email address you're trying to use is already used by different account. Please choose a different email address";
$lang['user_update_cancel_stripe_base_error_heading'] = "Ouch! Something went wrong:";
$lang['user_update_cancel_stripe_base_error_message'] = "Something went wrong when trying to cancel the subscription, please see the errors below:<br><br>";
$lang['user_update_cancel_stripe_exception_error_heading'] = "Ouch! Something went wrong:";
$lang['user_update_cancel_stripe_exception_error_message'] = "Something went wrong when trying to cancel the subscription, please see the errors below:<br><br>";
$lang['user_update_empty_stripe_key_heading'] = "Stripe keys are missing";
$lang['user_update_empty_stripe_key_message'] = "Your Stripe <b>Secret key</b> and <b>Publishable key</b> have not yet been provided. Please enters these keys through Settings > Payment Settings. Once entered, you can start update to paid packages. <br><br>";
$lang['user_update_cancel_paypal_error_heading'] = "Ouch! Something went wrong:";
$lang['user_update_cancel_paypal_error_message'] = "Something went wrong when trying to cancel the subscription, please see the errors below:<br><br>";

$lang['user_update_success_heading'] = "Hooray!";
$lang['user_update_success_message'] = "The account was updated successfully!";

$lang['user_send_password_reset_message1'] = "<strong>Admin send a password reset link.</strong><br>";
$lang['user_send_password_reset_message2'] = "<sbrong>Please click here:</strong> ";

$lang['user_send_password_reset_success_heading'] = "Hooray!";
$lang['user_send_password_reset_success_message'] = "Password Reset Email send successfully.";

$lang['user_send_password_reset_error_heading'] = "Ouch! Something went wrong:";
$lang['user_send_password_reset_error_message'] = "Something went wrong when trying to send Password Reset Email, Please try again later.";

$lang['user_details_update_validation_error_heading'] = "Ouch! Something went wrong:";
$lang['user_details_update_validation_error_message'] = "Something went wrong when trying to update your details, please see the errors below:<br><br>";
$lang['user_details_update_success_heading'] = "Hooray!";
$lang['user_details_update_success_message'] = "Your account details were updated successfully.";
$lang['user_details_update_error_heading'] = "Ouch! Something went wrong:";
$lang['user_details_update_error_message'] = "We weren't able to save your details just now. Please reload the page and try again.";

$lang['user_login_update_validation_error_heading'] = "Ouch! Something went wrong:";
$lang['user_login_update_validation_error_message'] = "Something went wrong when trying to update your details, please see the errors below:<br><br>";
$lang['user_login_update_success_heading'] = "Hooray!";
$lang['user_login_update_success_message'] = "Your account details were updated successfully.";
$lang['user_login_update_error_heading'] = "Ouch! Something went wrong:";
$lang['user_login_update_error_message'] = "We weren't able to save your details just now. Please reload the page and try again.";

$lang['user_toggle_status_user_limit_error'] = "You already reached your user limit. Please Inactive some user first then you can Active this user.";
$lang['user_toggle_status_inactive'] = "The user account has been deactivated; this user can not login and create web sites.";
$lang['user_toggle_status_active'] = "The user account has been activated; this user can now login and create web sites.";

$lang['user_delete_success'] = "The user account has been deleted, this user can not login and create web sites.";
$lang['user_delete_error'] = "There is some problem arised, please try again later.";

$lang['user_package_update_success_heading'] = "Hooray!";
$lang['user_package_update_success_message'] = "Your subscription has been changed. You will soon redirect to payment page.";
$lang['user_package_update_free_free_success_heading'] = "Hooray!";
$lang['user_package_update_free_free_success_message'] = "Your subscription has been changed. Now you are with another free package.";
$lang['user_package_update_free_paid_success_heading'] = "Hooray!";
$lang['user_package_update_free_paid_success_message'] = "Your subscription has been changed. You will soon redirect to payment page.";
$lang['user_package_update_paid_free_success_heading'] = "Hooray!";
$lang['user_package_update_paid_free_success_message'] = "Your subscription has been changed. Now you are with a free package.";
$lang['user_package_update_paid_paid_success_heading'] = "Hooray!";
$lang['user_package_update_paid_paid_success_message'] = "Your subscription has been changed. You will soon redirect to payment page.";

$lang['user_package_update_stripe_base_error_heading'] = "Ouch! Something went wrong:";
$lang['user_package_update_stripe_base_error_message'] = "Something went wrong when trying to update the package, please see the errors below:<br><br>";
$lang['user_package_update_stripe_exception_error_heading'] = "Ouch! Something went wrong:";
$lang['user_package_update_stripe_exception_error_message'] = "Something went wrong when trying to update the package, please see the errors below:<br><br>";
$lang['user_package_update_error_heading'] = "Ouch! Something went wrong:";
$lang['user_package_update_error_message'] = "Subscription change has some issue. Please try again later.";
$lang['user_package_update_no_change_error_heading'] = "Ouch! Something went wrong:";
$lang['user_package_update_no_change_error_message'] = "It seems you try to update with the same package";

$lang['user_payment_stripe_payment_success'] = "Payment successful. <br>Your new package is activated.";
$lang['user_payment_stripe_payment_base_error'] = "Payment has some issues. <br>Please check your payment details and submit again.<br>";
$lang['user_payment_stripe_payment_exception_error'] = "Payment has some issues. <br>Please check your payment details and submit again.<br>";

$lang['user_payment_paypal_getting_token_error'] = 'Ouch! Something went wrong while accessing paypal. Please try again!';

$lang['user_payment_paypal_payment_success'] = "Payment successful. <br>Your new package is activated.";
$lang['user_payment_paypal_subscription_error'] = "Payment successful, but subscription not eastablished. Please contact site owner to eastablish subscription for your package.";

$lang['user_package_cancel_success_heading'] = "Hooray!";
$lang['user_package_cancel_success_message'] = "Your subscription has been cancelled.";
$lang['user_package_cancel_stripe_base_error_heading'] = "Ouch! Something went wrong:";
$lang['user_package_cancel_stripe_base_error_message'] = "Something went wrong when trying to cancel the subscription, please see the errors below:<br><br>";
$lang['user_package_cancel_stripe_exception_error_heading'] = "Ouch! Something went wrong:";
$lang['user_package_cancel_stripe_exception_error_message'] = "Something went wrong when trying to cancel the subscription, please see the errors below:<br><br>";
$lang['user_package_cancel_error_heading'] = "Ouch! Something went wrong:";
$lang['user_package_cancel_error_message'] = "Subscription cancel has some issue. Please try again later.";

// views/users/users.php
$lang['users_heading'] = "Users";

$lang['users_button_addnew'] = "Add New User";

$lang['users_tab_account'] = "Account";
$lang['users_tab_sites'] = "Sites";

$lang['users_nosites'] = "This user has not created any sites yet.";

$lang['users_button_edit'] = "Edit";
$lang['users_button_settings'] = "Settings";
$lang['users_button_delete'] = "Delete";

$lang['users_emailfield_placeholder'] = "Email address";
$lang['users_emailfield_password'] = "Password";
$lang['users_adminpermissions'] = "Admin permissions";
$lang['users_button_udpate'] = "Update Details";

$lang['users_button_sendpasswordreset'] = "Send Password Reset Email";
$lang['users_button_deleteaccount'] = "Delete Account";
$lang['users_button_disableaccount'] = "Disable";
$lang['users_button_enableaccount'] = "Enable";

$lang['users_modal_deleteuser_message'] = "Deleting this user account will result in all associated data being deleted (with the exception of externally published sites) and <b>can not be undone</b>. Are you sure you want to continue?";

$lang['users_modal_newuser_heading'] = "Create a new user account";
$lang['users_modal_newuser_loadertext'] = "Creating new account...";
$lang['users_modal_newuser_firstname'] = "First name";
$lang['users_modal_newuser_lastname'] = "Last name";
$lang['users_modal_newuser_email'] = "Email";
$lang['users_modal_newuser_password'] = "Password";
$lang['users_modal_newuser_package'] = "Package";
$lang['users_modal_newuser_adminpermissions'] = "Admin permissions";
$lang['users_modal_newuser_sendnotification'] = "Send notification";
$lang['users_modal_newuser_button_create'] = "Create Account";

// user/views/payment_stripe.php
$lang['users_payment_stripe_heading'] = "Pay with Stripe";
$lang['users_payment_stripe_message'] = "If there is any leftover from previous package, we will refund that amount.";

// user/views/payment_paypal.php
$lang['users_payment_paypal_heading'] = "Pay with PayPal";
$lang['users_payment_paypal_message'] = "If there is any leftover from previous package, we will refund that amount.";

// user/views/email/activation.tpl.php
$lang['email_activation_heading'] = 'Dear %s';
$lang['email_activation_sub_heading'] = 'Your account is created, please pay subscription charge. %s';
$lang['email_activation_link'] = 'Click here for payment';

// user/views/email/login.tpl.php
$lang['email_login_heading'] = 'Dear %s';
$lang['email_login_sub_heading'] = 'Your account is created. %s';
$lang['email_login_link'] = 'Click here for login';

// user/views/email/update.tpl.php
$lang['email_update_heading'] = 'Dear %s';
$lang['email_update_sub_heading'] = 'Your account is updated to the paid package, please pay subscription charge. %s';
$lang['email_update_link'] = 'Click here for payment';

/**** User Module End ****/



/**** Sent Module Start ****/

// sent/controllers/Sent.php
$lang['no_email_error_header_error'] = 'Ouch!';
$lang['no_email_error_content'] = "<small>We don't know where to send this data to; it appears the email or email ID is missing.";

$lang['error_button_go_back'] = "Go back";

$lang['empty_fields_error_header'] = 'Ouch!';
$lang['empty_fields_error_content'] = "<small>You can not submittt an empty form. Please go back to the previous page and enter some values.</small>";

$lang['honey_error_header'] = 'Ouch!';
$lang['honey_error_content'] = "<small>Our API has identified the submitted data as being entered by a bot and can therefor not process the data.</small>";

$lang['validation_error_header'] = 'Ouch!';
$lang['validation_error_content'] = "<small>Something is not right with the data you've submitted, please see the details below:</small><br>";

$lang['file_error_header'] = 'Ouch!';
$lang['file_error_content'] = "<small>Something went wrong with the file you are trying to send. Please see the error(s) below:</small><br>";

$lang['after_error_header'] = 'Ouch!';
$lang['after_error_content'] = "<small>It seems  an invalud redirection URL has been specified. We can't not redirect you to</small><br>";

$lang['success_header'] = 'Success!';
$lang['success_content'] = "<small>Your message has been received and we will back to you as soon as possible.</small>";

$lang['error_header'] = 'Ouch!';
$lang['error_content'] = "<small>We can't submit the form data. Please return to the original form and resubmit the data from there.</small>";

/**** Sent Module End ****/



/**** Autoupdate Module Start ****/

// autoupdate/controllers/Autoupdate.php
$lang['autoupdate_index_error_heading'] = "SB Pro is unable to update itself!";
$lang['autoupdate_index_error_content'] = '<p>There is an update avilable but your server might not properly configured. It seems your files and folders is owned by different user than the web-server (apache/httpd) user.</p>';

$lang['autoupdate_index_invalid_error_heading'] = "SB Pro is unable to update itself!";
$lang['autoupdate_index_invalid_error_content'] = "<p>There is an update available but your license key is invalid or no license key has been provided (you can enter your license key in the settings panel). Please re-check your license key and if you find it's correct then contact with support@chillyorange.com</p>";

$lang['autoupdate_index_alert_heading'] = "SB Pro is being updated...";
$lang['autoupdate_index_alert_content'] = '<p>SB Pro is currently updating. This shouldn\'t take more then a minute.</p>';

$lang['autoupdate_update_success_content'] = '<p>Update complete, please <a href="%s">click here to continue</a>.</p>';
$lang['autoupdate_update_error_content'] = '<p>The update could not be completed due to a file permission error.</p>';
$lang['autoupdate_update_no_update_content'] = '<p>Nothing to update, please <a href="%s">click here to continue</a>.</p>';

// autoupdate/views/error.php
$lang['autoupdate_site_link'] = '<a href="%s">Click here to proceed to the dashboard</a>';

/**** Autoupdate Module End ****/



/**** Paypal SUbscription Module Start ****/

// subscription/views/subscription.php
$lang['pay_now_txt'] = 'Pay Now';

$lang['auth_payment_paypal_payment_success'] = "Payment successful. <br>Please login to your account. Be sure to check your email for a payment confirmation.";
$lang['auth_payment_paypal_payment_error'] = "Payment has some issues. <br>Please try again.<br>";
$lang['auth_payment_paypal_subscription_error'] = "Payment successful, but subscription not eastablished. Please contact site owner to eastablish subscription for your package. <br>Please login to your account. <br>(Be sure to check your email for a payment confirmation.)";

$lang['paypal_payment_no_subscription'] = "Note: Your subscription is not eastablished yet. Please contact site owner to eastablish it.";

$lang['payment_fail_try_again'] = 'Unfortunately your payment is not completed. Please try again!';
$lang['paypal_getting_token_error'] = 'Ouch! Something went wrong while accessing paypal. Please try again!';

/* User/controllers/user.php*/

$lang['package_changed_from'] = 'Your package changed from';
$lang['package_changed_to'] = 'to';
$lang['package_changed_sucsess'] = 'Your account is updated to the paid package, please pay subscription charge.';
$lang['click_below_to_pay'] = 'Click here to pay.';
$lang['refund_reason'] = 'This refund is done due to package change in SB Pro';

$lang['refund_failed_subject'] = 'Automatic refund failed';
$lang['refund_failed_message'] = 'A refund process get failed while changing subscription. Details are as follows';
$lang['refund_failed_user_id'] = 'User ID';
$lang['refund_failed_name'] = 'User name';
$lang['refund_failed_trnsctn'] = 'Transaction ID';
$lang['refund_failed_amount'] = 'Refund Amount';


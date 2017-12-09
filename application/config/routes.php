<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// Check subdomain
$req_host = $_SERVER['SERVER_NAME'];
$base_url = parse_url($this->config->item('base_url'));
$app_host = $base_url['host'];
if ($req_host == $app_host)
{
	$route['default_controller'] = 'auth';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

	$route['temple/([0-9]+?)'] = "temple/index/$1";
	$route['loadsinglepage/([0-9]+?)'] = "sites/loadsinglepage/$1";

	// Auth controller's method route
	$route['auth'] = 'auth';
	$route['auth/(.+)'] = 'auth/$1';

	// Site controller's method route
	$route['sites'] = 'sites';
	$route['sites/([0-9]+?)'] = 'sites/site/$1';
	$route['sites/(.+)'] = 'sites/$1';

	// Asset controller's method route
	$route['asset'] = 'asset';
	$route['asset/(.+)'] = 'asset/$1';

	// Package controller's method route
	$route['package'] = 'package';
	$route['package/(.+)'] = 'package/$1';

	// User controller's method route
	$route['user'] = 'user';
	$route['user/(.+)'] = 'user/$1';

	// Declare all the controller so that subfolder string poing to subfolder controller
	$route['settings'] = 'settings';
	$route['settings/(.+)'] = 'settings/$1';

	// Autoupdate controller's method route
	$route['autoupdate'] = 'autoupdate';
	$route['autoupdate/(.+)'] = 'autoupdate/$1';

	// SentAPI controller's method route
	$route['sent'] = 'sent';
	$route['sent/(.+)'] = 'sent/$1';

	// SentAPI controller's method route
	$route['subscription'] = 'subscription';
	$route['subscription/(.+)'] = 'subscription/$1';
	
	//dashboard
    $route['dashboard'] = 'dashboard';

	//quiz
	$route['quiz'] = 'quiz';
	$route['quiz/(.+)'] = 'quiz/$1';
	//forms
	$route['forms'] = 'forms';

	// Migrate controller's method route
	$route['migrate'] = 'migrate';

	// With regular expressions, we can catch multiple segments at once.
	$route['(.+)'] = 'subfolder/index/$1';
}
else
{
	// Check if its sub-domain or custom domain
	if (strpos($req_host, $app_host) !== false)
	{
		$route['default_controller'] = 'subdomain';
		$route['(.+)'] = 'subdomain/index/$1';
	}
	else
	{
		$route['default_controller'] = 'customdomain';
		$route['(.+)'] = 'customdomain/index/$1';
	}

}
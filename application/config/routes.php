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
$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

require('routes_users.php');
require('routes_auth.php');

//$route['dashboard'] = 'dashboard/index';
//$route['widgets'] = 'dashboard/widgets';
//$route['charts'] = 'dashboard/charts';
//$route['buttons'] = 'dashboard/buttons';
//$route['forms'] = 'dashboard/forms';
//$route['tables'] = 'dashboard/tables';
//$route['panels'] = 'dashboard/panels';
//$route['icons'] = 'dashboard/icons';
//$route['gallery'] = 'dashboard/gallery';
//$route['search'] = 'dashboard/search';
////$route['pendaftaran'] = 'dashboard/pendaftaran';
//$route['data_tki'] = 'dashboard/data_tki';
//$route['data_tki_bio'] = 'dashboard/data_tki_bio';
//$route['data_rekom'] = 'dashboard/data_rekom';
//$route['data_market'] = 'dashboard/data_market';
//$route['data_lanjut'] = 'dashboard/data_lanjut';

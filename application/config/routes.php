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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
// $route['topic/(:num)'] = 'Welcome/index/$1';
$route['topic/?(:any)?'] = 'welcome/topic/$1';
$route['people/?(:any)?'] = 'welcome/people/$1';
$route['trending/?(:any)?'] = 'welcome/trending/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['upload'] = 'Upload';

//form route
$route['header']['GET'] = 'header/index';
$route['header']['POST'] = 'header/save_form';
$route['header'] = 'header/index';
$route['header/save_form'] = 'header/save_form';
$route['header/page'] = 'header/page';

$route['login']['GET'] = 'admin/login/index';
$route['login']['POST'] = 'admin/login/create';
$route['register_admin'] = 'admin/login/register_admin';
$route['logout'] = 'admin/login/logout';
$route['dashboard'] = 'admin/dashboard';

$route['Project-Funding'] = 'admin/header/page';
$route['Our-Services'] = 'Welcome/services';
$route['About-Us'] = 'Welcome/aboutus';
$route['Contact-Us'] = 'Welcome/contact_us';
$route['Project-Engineering'] = 'Welcome/Project_Engineering';
$route['Project-Techno-Financial-Due-Diligence'] = 'Welcome/Project_Techno_Financial_Due_diligence';
$route['Government-Incentives'] = 'Welcome/Government_Incentives';
$route['Ease-of-Doing-Business'] = 'Welcome/Ease_of_Doing_Business';
$route['Project-Approvals'] = 'Welcome/Project_Approvals';
$route['Project-Application-Flow'] = 'Welcome/Project_Application_Flow';

// manage blogs
$route['blog'] = 'admin/blog/index';
$route['add_blog'] = 'admin/blog/save_blog';
$route['blog/edit/(:any)'] = 'admin/blog/edit_blog/$1';
$route['update_blog/(:any)'] = 'admin/blog/blog_update/$1';
$route['blog/delete/(:any)'] = 'admin/blog/delete_blog/$1';
$route['blog_detail/(:any)'] = 'admin/blog/blog_detail_view/$1';

// admin miscellaneous
$route['home_query_form'] = 'admin/blog/home_query_form';
$route['home_query/delete/(:any)'] = 'admin/blog/delete_home_query/$1';
$route['home_query/edit/(:any)'] = 'admin/blog/edit_home_query/$1';
$route['contact_us'] = 'admin/blog/contact_us';
$route['contact_us/delete/(:any)'] = 'admin/blog/delete_contact_us/$1';
$route['contact_us/edit/(:any)'] = 'admin/blog/edit_contact_us/$1';

$route['disclaimer'] = 'admin/blog/disclaimer';
$route['adddisclaimer'] = 'admin/blog/adddisclaimer';
$route['update_disclaimer'] = 'admin/blog/update_disclaimer';
$route['disclaimer/delete/(:any)'] = 'admin/blog/disclaimer_delete/$1';

$route['term_condition'] = 'admin/blog/term_condition';
$route['addterm_condition'] = 'admin/blog/addterm_condition';
$route['update_term_condition'] = 'admin/blog/update_term_condition';
$route['term_condition/delete/(:any)'] = 'admin/blog/term_condition_delete/$1';

$route['privacy_policy'] = 'admin/blog/privacy_policy';
$route['addprivacy_policy'] = 'admin/blog/addprivacy_policy';
$route['update_privacy_policy'] = 'admin/blog/update_privacy_policy';
$route['privacy_policy/delete/(:any)'] = 'admin/blog/privacy_policy_delete/$1';

// front-end miscellaneous 
$route['privacy-policy'] = 'Welcome/privacypolicy';
$route['Disclaimer'] = 'Welcome/disclaimer';
$route['Term-Condition'] = 'Welcome/TermCondition';
//signin for admin

$route['signin']['GET'] = 'admin/signin/index';
$route['signin']['POST'] = 'admin/signin/create';
$route['logout'] = 'admin/login/logout';

$route['loan_group'] = 'loan';
// manage bank
$route['updateBank/(:any)'] = 'admin/Header/update_Bank/$1';

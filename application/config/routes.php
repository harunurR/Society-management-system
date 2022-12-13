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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/* auth all route */
$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['dashboard'] = 'dashboard/index';
$route['logout'] = 'auth/logout';
$route['forget'] = 'auth/forget_pass';
$route['resetpassword/(:any)'] = 'auth/reset_password/$1';
$route['changepassword/(:any)'] = 'auth/change_password/$1';
/* /auth all route */

/* house owner entry crud */
$route['houseowner'] = 'house_owner/index';
$route['houseowneradd'] = 'house_owner/create';
$route['houseowneredit/(:any)'] = 'house_owner/update/$1';
$route['houseownerdelete/(:any)'] = 'house_owner/delete_data/$1';
$route['paymentrecord/(:any)'] = 'House_owner/payment_record/$1';

/* /house owner entry crud */



/* house owner payment entry crud */
$route['payment'] = 'house_owner_payment/index';
$route['paymentadd'] = 'house_owner_payment/create';
$route['paymentedit/(:any)'] = 'house_owner_payment/update/$1';
$route['paymentdelete/(:any)'] = 'house_owner_payment/delete_data/$1';
$route['paynow/(:any)/(:any)/(:any)'] = 'house_owner_payment/paynow/$1/$2/$3';

/* house owner payment entry crud */

/* master account crud */
$route['main_account'] = 'master_ac/index';
$route['main_accountadd'] = 'master_ac/create';
$route['main_accountedit/(:any)'] = 'master_ac/update/$1';
$route['main_accountdelete/(:any)'] = 'master_ac/delete_data/$1';
/* master account crud */


/* root account crud */
$route['root_account'] = 'root_ac/index';
$route['root_accountadd'] = 'root_ac/create';
$route['root_accountedit/(:any)'] = 'root_ac/update/$1';
$route['root_accountdelete/(:any)'] = 'root_ac/delete_data/$1';
/* root account crud */

/* genaral account crud */
$route['genaral_account'] = 'genaral_ac/index';
$route['genaral_accountadd'] = 'genaral_ac/create';
$route['genaral_accountedit/(:any)'] = 'genaral_ac/update/$1';
$route['genaral_accountdelete/(:any)'] = 'genaral_ac/delete_data/$1';
/* root account crud */


/*for cr voucher */
$route['cr_vc'] = 'credit_voucher/index';
$route['section_list_ajax'] = 'credit_voucher/section_list_ajax';
$route['cradd'] = 'credit_voucher/add';
$route['genaral_accountedit/(:any)'] = 'credit_voucher/update/$1';
$route['genaral_accountdelete/(:any)'] = 'credit_voucher/delete_data/$1';
/* for cr voucher */

/* genaral account crud */
$route['acc_head_report'] = 'acc_head_report/index';
$route['genaral_accountadd'] = 'genaral_ac/create';
$route['genaral_accountedit/(:any)'] = 'genaral_ac/update/$1';
$route['genaral_accountdelete/(:any)'] = 'genaral_ac/delete_data/$1';
/* root account crud */


$route['rnp_report'] = 'rnp_report/index';
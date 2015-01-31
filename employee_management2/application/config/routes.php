<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = 'user/index';
$route['404_override'] = '';

/*admin*/
$route['admin'] = 'user/index';
$route['admin/signup'] = 'user/signup';
$route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'user/index';
$route['admin/logout'] = 'user/logout';
$route['admin/login/validate_credentials'] = 'user/validate_credentials';

//$route['admin/dashboard'] = 'dashboard/index';
//$route['admin/v_dashboard'] = 'dashboard/v_dashboard';
//$route['admin/dashboard/editLeave'] = 'dashboard/editLeave';
//$route['admin/dashboard/editLeave/(:any)'] = 'dashboard/editLeave/$1';

$route['admin/employee'] = 'admin_employee/index';
$route['admin/employee/ajax_data'] = 'admin_employee/ajax_data';
$route['admin/employee/add'] = 'admin_employee/add';
$route['admin/employee/get_change_value'] = 'admin_employee/get_change_value';
$route['admin/employee/view'] = 'admin_employee/view';
$route['admin/employee/view/(:any)'] = 'admin_employee/view/$1';
$route['admin/employee/update'] = 'admin_employee/update';
$route['admin/employee/get_change_value/(:any)'] = 'admin_employee/get_change_value/$1';
$route['admin/employee/update/(:any)'] = 'admin_employee/update/$1';
$route['admin/employee/delete/(:any)'] = 'admin_employee/delete/$1';
$route['admin/employee/(:any)'] = 'admin_employee/index/$1'; //$1 = page number

$route['admin/employee/editAction'] = 'admin_employee/editAction';
$route['admin/employee/editAction/(:any)'] = 'admin_employee/editAction/$1';


$route['admin/department'] = 'admin_department/index';
$route['admin/department/add'] = 'admin_department/add';
$route['admin/department/update'] = 'admin_department/update';
$route['admin/department/update/(:any)'] = 'admin_department/update/$1';
$route['admin/department/delete/(:any)'] = 'admin_department/delete/$1';
$route['admin/department/(:any)'] = 'admin_department/index/$1'; //$1 = page number

$route['admin/company'] = 'admin_company/index';
$route['admin/company/add'] = 'admin_company/add';
$route['admin/company/update'] = 'admin_company/update';
$route['admin/company/update/(:any)'] = 'admin_company/update/$1';
$route['admin/company/delete/(:any)'] = 'admin_company/delete/$1';
$route['admin/company/(:any)'] = 'admin_company/index/$1'; //$1 = page number


/* End of file routes.php */
/* Location: ./application/config/routes.php */
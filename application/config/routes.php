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
$route['default_controller'] = 'admin';
$route['login']['get'] = 'admin/login';
$route['login']['post'] = 'admin/login';
$route['logout']['get'] = 'admin/logout';

$route['admin/user']['get'] = 'user/list';
$route['admin/user/add']['get'] = 'user/add';
$route['admin/user/add']['post'] = 'user/add';
$route['admin/user/edit/(:num)']['get'] = 'user/edit/$1';
$route['admin/user/edit/(:num)']['post'] = 'user/edit/$1';
$route['admin/user/delete/(:num)']['get'] = 'user/delete/$1';

$route['admin/work-unit']['get'] = 'workunit/list';
$route['admin/work-unit/add']['get'] = 'workunit/add';
$route['admin/work-unit/add']['post'] = 'workunit/add';
$route['admin/work-unit/edit/(:num)']['get'] = 'workunit/edit/$1';
$route['admin/work-unit/edit/(:num)']['post'] = 'workunit/edit/$1';
$route['admin/work-unit/delete/(:num)']['get'] = 'workunit/delete/$1';

$route['admin/work-unit/(:num)/member']['get'] = 'workunit/member/$1';
$route['admin/work-unit/(:num)/member/add']['get'] = 'workunit/addmember/$1';
$route['admin/work-unit/(:num)/member/add']['post'] = 'workunit/addmember/$1';
$route['admin/work-unit/(:num)/member/delete/(:num)']['get'] = 'workunit/deletemember/$1/$2';

$route['admin/work-unit/(:num)/detail']['get'] = 'workunit/detail/$1';

$route['admin/task']['get'] = 'task/list';
$route['admin/task/add']['get'] = 'task/add';
$route['admin/task/add']['post'] = 'task/add';
$route['admin/task/edit/(:num)']['get'] = 'task/edit/$1';
$route['admin/task/edit/(:num)']['post'] = 'task/edit/$1';
$route['admin/task/delete/(:num)']['get'] = 'task/delete/$1';
$route['admin/task/progress/(:num)']['get'] = 'task/progress/$1';
$route['admin/task/progress/(:num)']['post'] = 'task/progress/$1';

$route['admin/monitor']['get'] = 'monitor/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

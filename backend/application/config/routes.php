<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['dashboard'] = 'dashboard/index';

$route['users'] = 'users/index';
$route['users/create'] = 'users/create';
$route['users/edit/(:num)'] = 'users/edit/$1';
$route['users/delete/(:num)'] = 'users/delete/$1';

$route['departments'] = 'departments/index';
$route['departments/create'] = 'departments/create';
$route['departments/edit/(:num)'] = 'departments/edit/$1';
$route['departments/delete/(:num)'] = 'departments/delete/$1';

$route['leaves'] = 'leaves/index';
$route['leaves/apply'] = 'leaves/apply';
$route['leaves/approve/(:num)'] = 'leaves/approve/$1';
$route['leaves/reject/(:num)'] = 'leaves/reject/$1';

$route['attendance'] = 'attendance/index';
$route['attendance/check-in'] = 'attendance/checkIn';
$route['attendance/check-out'] = 'attendance/checkOut';
$route['calendar'] = 'attendance/calendar';

$route['holidays'] = 'holidays/index';
$route['holidays/create'] = 'holidays/create';
$route['holidays/edit/(:num)'] = 'holidays/edit/$1';
$route['holidays/delete/(:num)'] = 'holidays/delete/$1';

$route['reports/attendance'] = 'reports/attendance';
$route['reports/leaves'] = 'reports/leaves';

$route['api/login'] = 'api/auth/login';
$route['api/attendance/check-in'] = 'api/attendance/checkIn';
$route['api/attendance/check-out'] = 'api/attendance/checkOut';
$route['api/leaves'] = 'api/leaves/index';
$route['api/leaves/apply'] = 'api/leaves/apply';
$route['api/calendar'] = 'api/calendar/index';

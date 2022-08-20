<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Main';
$route['404_override'] = 'Notfound';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = "User/login";
$route['d4ft4r'] = "User/register";
$route['beranda'] = "aspanel/home";

/* Controller Frontend - Pembuka*/
$route['main'] = "Main/index";
$route['vendors'] = "vendors/all";
$route['vendors/(:any)'] = "vendors/read/$1";
$route['projek-detail/(:any)'] = "vendors/readprojek/$1";
$route['harga-detail/(:any)'] = "vendors/readharga/$1";


/* Controller Default - Pembuka*/

$route['petacrawl\.xml'] = "petacrawl";
/* Controller Default - Penutup*/

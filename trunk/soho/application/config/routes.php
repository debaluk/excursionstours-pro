<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "login";
$route['404_override'] = 'core/index/$0';

$route['browse_fleet']          = "rentacar/browse_fleet";
$route['details']               = "rentacar/details";
$route['getCarQuote']           = "rentacar/getCarQuote";
$route['step_2']                = "rentacar/step_2";
$route['step_3']                = "rentacar/step_3";
$route['show_order']            = "rentacar/show_order";
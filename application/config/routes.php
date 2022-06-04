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
$route['default_controller'] = 'home';
$route['admin'] = 'admin/admin';
$route['about-us'] = "page/aboutus";
$route['contact-us'] = "page/contactus";
$route['search-results'] = "page/searchresults";
$route['terms-conditions'] = "page/terms";
$route['disclaimer'] = "page/disclaimer";
$route['privacy-policy'] = "page/privacy";
$route['payment-security'] = "page/paymentsecurity";
$route['user-agreement'] = "page/agreement";
$route['search-results'] = "page/searchresults";
$route['my-account'] = "page/myaccounts";
$route['my-dashboard'] = "page/mydashboard";
$route['hotel-results'] = "page/hotelresults";
$route['agents'] = "page/agents";
$route['car-results'] = "page/carresults";
$route['agents-dahboard'] = "page/agentdashboard";
$route['feedback'] = "page/feedback";
$route['domestic-trips'] = "home/domestictrips";
$route['weekend-trips'] = "home/weekendtrips";
$route['international-trips'] = "home/internationaltrips";
$route['dream-trips'] = "home/dreamtrips";
$route['blogs'] = "page/blog";
$route['sitemap'] = "page/sitemap";
$route['all-package/(:any)'] = 'package/allpackage/$1';
$route['tour-details/(:any)'] = 'package/tourdetails/$1';
$route['blog-details/(:any)'] = 'page/blogdetails/$1';
$route['booking/(:any)'] = 'booking/index/$1';
$route['what-suits-you'] = 'solutions/whatsuitsyou';
$route['trip-detail/(:any)'] = 'trip/tripdetail/$1';
//$route['trip-details/(:any)'] = 'home/searching?$1';
$route['blog-detail/(:any)'] = 'page/blogdetail/$1';
$route['trips/(:any)'] = 'trip/tripBycategory/$1';
//$route['404_override'] = '404.php';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;


//$route['phase/(:any)'] = 'phase/index/$1';
//$route['phases/(:any)'] = 'phase/index/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */

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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the 'welcome' class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/*
| -------------------------------------------------------------------------
| USERS APIS
| -------------------------------------------------------------------------
*/
$route['api/auth/register'] = 'api/UsersController/register'; // POST Method
$route['api/auth/login'] = 'api/UsersController/login'; // POST Method
$route['api/auth/changePassword'] = 'api/UsersController/changePassword'; // POST Method
$route['api/auth/logout'] = 'api/UsersController/logout'; // get Method
$route['api/auth/sendForgotPasswordLink'] = 'api/UsersController/sendForgotPasswordLink'; // POST Method
$route['api/auth/forgotPassword'] = 'api/UsersController/forgotPassword'; // POST Method
$route['api/users/getUser'] = 'api/UsersController/getUser'; // GET Method
$route['api/users/updateUser'] = 'api/UsersController/update'; // PUT Method
$route['api/users/deleteUser'] = 'api/UsersController/delete'; // DELETE Method

/*
| -------------------------------------------------------------------------
| Events REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/events'] = 'api/EventsController/fetch'; // GET Method
$route['api/event/create'] = 'api/EventsController/create'; // POST Method
$route['api/event/update/(:num)'] = 'api/EventsController/update/$1'; // PUT Method
$route['api/event/delete/(:num)'] = 'api/EventsController/delete/$1'; // DELETE Method

/*
| -------------------------------------------------------------------------
| Categories REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/categories'] = 'api/CategoriesController/fetch'; // GET Method
$route['api/category/create'] = 'api/CategoriesController/create'; // POST Method
$route['api/category/update/(:num)'] = 'api/CategoriesController/update/$1'; // PUT Method
$route['api/category/delete/(:num)'] = 'api/CategoriesController/delete/$1'; // DELETE Method

/*
| -------------------------------------------------------------------------
| Sponsors REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/sponsors'] = 'api/SponsorsController/fetch'; // GET Method
$route['api/sponsor/create'] = 'api/SponsorsController/create'; // POST Method
$route['api/sponsor/update/(:num)'] = 'api/SponsorsController/update/$1'; // PUT Method
$route['api/sponsor/delete/(:num)'] = 'api/SponsorsController/delete/$1'; // DELETE Method

/*
| -------------------------------------------------------------------------
| Stalls REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/stalls'] = 'api/StallsController/fetch'; // GET Method
$route['api/stall/create'] = 'api/StallsController/create'; // POST Method
$route['api/stall/update/(:num)'] = 'api/StallsController/update/$1'; // PUT Method
$route['api/stall/delete/(:num)'] = 'api/StallsController/delete/$1'; // DELETE Method
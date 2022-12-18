<?php defined('BASEPATH') OR exit('No direct script access allowed');

# Default routes
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

# AUTH ROUTES
$route['auth/login'] = 'Auth/login';
$route['auth/login/user'] = 'Auth/userLogin';
$route['auth/register'] = 'Auth/register';
$route['auth/insert/user'] = 'Auth/insertUser';
$route['auth/verify/otp/(:any)'] = 'Auth/verifyOtp/$1';
$route['auth/verify/user'] = 'Auth/verifyUser';
$route['auth/forgotpassword'] = 'Auth/forgotPassword';
$route['auth/verifyotp'] = 'Auth/verifyOtpToResetPass';
$route['auth/resetpassword'] = 'Auth/resetPassword';
$route['auth/change/password'] = 'Auth/changePassword';
$route['auth/logout'] = 'Auth/logout';

# HOME ROUTES
$route['home'] = 'Home/home';

##
## ADMIN ROUTES
##

# PRODUCTS
$route['products'] = 'Admin/products';
$route['product/insert'] = 'Admin/insertProduct';
$route['product/edit/(:any)'] = 'Admin/editProduct/$1';
$route['product/update'] = 'Admin/updateProduct';
$route['product/delete/(:any)'] = 'Admin/deleteProduct/$1';

# ORDERS
$route['orders/live'] = 'Admin/liveOrders';
$route['orders/history'] = 'Admin/ordersHistory';
$route['order/update/(:any)'] = 'Admin/orderUpdate/$1';

# SUPER ADMINS
$route['superadmins'] = 'Admin/superadmins';
$route['superadmin/insert'] = 'Admin/insertSuperadmin';
$route['superadmin/delete/(:any)'] = 'Admin/deleteSuperadmin/$1';

# USERS
$route['users'] = 'Admin/users';
$route['user/view/(:any)'] = 'Admin/userView/$1';

# SALES BOYS
$route['salesboys'] = 'Admin/salesBoys';
$route['salesboy/insert'] = 'Admin/insertSalesBoy';
$route['salesboy/edit/(:any)'] = 'Admin/salesBoyEdit/$1';
$route['salesboy/update'] = 'Admin/salesBoyUpdate';
$route['salesboy/view/(:any)'] = 'Admin/salesBoyView/$1';
$route['salesboy/address/insert'] = 'Admin/insertSalesBoyAddress';
$route['salesboy/address/delete/(:any)/(:any)'] = 'Admin/deleteSalesBoyAddress/$1/$2';
$route['salesboy/delete/(:any)'] = 'Admin/deleteSalesBoy/$1';

# COUNTRY
$route['country'] = 'Admin/country';
$route['country/insert'] = 'Admin/insertCountry';
$route['country/update/(:any)'] = 'Admin/updateCountry/$1';
$route['country/delete/(:any)'] = 'Admin/deleteCountry/$1';

# STATE
$route['state'] = 'Admin/state';
$route['state/insert'] = 'Admin/insertState';
$route['state/update/(:any)'] = 'Admin/updateState/$1';
$route['state/delete/(:any)'] = 'Admin/deleteState/$1';

# CITY
$route['city'] = 'Admin/city';
$route['city/insert'] = 'Admin/insertCity';
$route['city/update/(:any)'] = 'Admin/updateCity/$1';
$route['city/delete/(:any)'] = 'Admin/deleteCity/$1';

# AREA
$route['area'] = 'Admin/area';
$route['area/insert'] = 'Admin/insertArea';
$route['area/update/(:any)'] = 'Admin/updateArea/$1';
$route['area/delete/(:any)'] = 'Admin/deleteArea/$1';

##
## USER ROUTES
##

# ADDRESS
$route['user/address'] = 'User/address';
$route['user/address/insert'] = 'User/insertAddress';
$route['user/address/delete/(:any)'] = 'User/deleteAddress/$1';

# ORDERS
$route['user/orders'] = 'User/userOrders';
$route['user/order/insert'] = 'User/insertOrder';
$route['user/orders/history'] = 'User/ordersHistory';

# PDF DOWNLOAD
$route['order/download/bill/(:any)'] = 'HtmlToPdf/downloadOrderBill/$1';

##
##  SALES BOYS
##
$route['salesboy/orders'] = 'SalesBoy/orders';
$route['salesboy/order/delivered'] = 'SalesBoy/orderDelivered';
$route['salesboy/orders/history'] = 'SalesBoy/ordersHistory';

##
##  GLOBAL FOR ALL USERS
##
$route['user/profile/(:any)'] = 'Home/userProfile/$1';
$route['user/updateprofile'] = 'Home/updateProfile';
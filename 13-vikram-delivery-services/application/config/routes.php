<?php defined('BASEPATH') OR exit('No direct script access allowed');

# Default routes
$route['default_controller'] = 'Vikram';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

# DEFAULT HOME PAGE
$route['home'] = 'Vikram/home';

# LOGIN
$route['auth/login'] = 'Auth/login';
$route['auth/login/user'] = 'Auth/userLogin';

# REGISTER
$route['auth/register'] = 'Auth/register';
$route['auth/insert/user'] = 'Auth/insertUser';
$route['auth/verify/otp/(:any)'] = 'Auth/verifyOtp/$1';
$route['auth/verify/user'] = 'Auth/verifyUser';
$route['auth/forceverify/user/(:any)'] = 'Auth/forceVerify/$1';

# FORGOT PASSWORD
$route['auth/forgotpassword'] = 'Auth/forgotPassword';
$route['auth/verifyotp'] = 'Auth/verifyOtpToResetPass';
$route['auth/resetpassword'] = 'Auth/resetPassword';

# CHANGE PASSWORD
$route['auth/change/password'] = 'Auth/changePassword';

# LOGOUT
$route['auth/logout'] = 'Auth/logout';

# DELIVERY BOYS
$route['deliveryboys'] = 'Vikram/deliveryboys';
$route['deliveryboy/view/(:any)'] = 'Vikram/deliveryboyView/$1';
$route['deliveryboy/create'] = 'Vikram/createDeliveryboy';
$route['deliveryboy/insert'] = 'Vikram/insertDeliveryboy';
$route['deliveryboy/orders'] = 'Vikram/deliveryboyOrders';
$route['deliveryboy/orders/history'] = 'Vikram/deliveryboyOrdersHistory';
$route['deliveryboy/edit/(:any)'] = 'Vikram/editDeliveryboy/$1';
$route['deliveryboy/update'] = 'Vikram/createDeliveryboy';
$route['deliveryboy/delete/(:any)'] = 'Vikram/deleteDeliveryboy/$1';
$route['deliveryboy/order/update/status'] = 'Vikram/deliveryboyOrderUpdateStatus';
$route['deliveryboy/order/delivered'] = 'Vikram/deliveryboyOrderDelivered';

# ORDERS
$route['orders/create'] = 'Vikram/createOrders';
$route['orders/history'] = 'Vikram/ordersHistory';
$route['orders/income'] = 'Vikram/ordersIncome';
$route['orders/live'] = 'Vikram/liveOrders';
$route['order/vdsupdate/status'] = 'Vikram/vdsUpdateStatus';
$route['order/userupdate/status'] = 'Vikram/userUpdateStatus';
$route['order/vdsupdate/deliveryboy'] = 'Vikram/vdsUpdateDeliveryboy';
$route['order/item/update/(:any)'] = 'Vikram/orderItemUpdate/$1';
$route['order/offline/insert'] = 'Vikram/insertOfflineOrder';
$route['order/download/bill/(:any)'] = 'HtmlToPdf/downloadOrderBill/$1';

# USERS
$route['users'] = 'Vikram/users';
$route['user/view/(:any)'] = 'Vikram/userView/$1';
$route['user/orders'] = 'Vikram/userOrders';
$route['user/orders/history'] = 'Vikram/userOrdersHistory';
$route['user/orders/expenses'] = 'Vikram/userOrdersExpenses';
$route['user/delete/(:any)'] = 'Vikram/deleteUser/$1';
$route['user/profile/(:any)'] = 'Vikram/userProfile/$1';
$route['user/updateprofile'] = 'Vikram/updateProfile';
$route['user/address'] = 'Vikram/address';
$route['user/address/insert'] = 'Vikram/insertAddress';
$route['user/address/delete/(:any)'] = 'Vikram/deleteAddress/$1';
$route['user/order/insert'] = 'Vikram/insertUserOrder';

# SUPER ADMINS
$route['superadmins'] = 'Vikram/superadmins';
$route['superadmin/create'] = 'Vikram/createSuperadmin';
$route['superadmin/insert'] = 'Vikram/insertSuperadmin';
$route['superadmin/delete/(:any)'] = 'Vikram/deleteSuperadmin/$1';
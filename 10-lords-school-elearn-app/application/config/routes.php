<?php defined('BASEPATH') OR exit('No direct script access allowed');

# Default routes
$route['default_controller'] = 'User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

#################################################################################
###                         ADMIN ROUTES                                      ###
#################################################################################

# Admin Dashboard
$route['admin/dashboard'] = 'Administrator/Dashboard';

# Admin Branches
$route['admin/branches'] = 'Administrator/Branches';
$route['admin/branch/insert'] = 'Administrator/InsertBranch';
$route['admin/branch/delete'] = 'Administrator/DeleteBranch';

# Admin Classes
$route['admin/classes'] = 'Administrator/Classes';
$route['admin/class/insert'] = 'Administrator/InsertClass';
$route['admin/class/delete'] = 'Administrator/DeleteClass';

# Admin Sections
$route['admin/sections'] = 'Administrator/Sections';
$route['admin/section/insert'] = 'Administrator/InsertSection';
$route['admin/section/edit/(:any)'] = 'Administrator/EditSection/$1';
$route['admin/section/update/(:any)'] = 'Administrator/UpdateSection/$1';
$route['admin/section/delete/(:any)'] = 'Administrator/DeleteSection/$1';

# Admin Subjects
$route['admin/subjects'] = 'Administrator/Subjects';
$route['admin/subject/insert'] = 'Administrator/InsertSubject';
$route['admin/subject/delete'] = 'Administrator/DeleteSubject';

# Admin Users
$route['admin/users'] = 'Administrator/Users';
$route['admin/user/insert'] = 'Administrator/InsertUser';
$route['admin/user/edit/(:any)'] = 'Administrator/EditUser/$1';
$route['admin/user/update/(:any)'] = 'Administrator/UpdateUser/$1';
$route['admin/user/delete/(:any)'] = 'Administrator/DeleteUser/$1';

# Admin Teacher Mappings
$route['admin/teacher/mappings/(:any)'] = 'Administrator/TeacherMappings/$1';
$route['admin/teacher/mapping/insert'] = 'Administrator/InsertTeacherMappings';
$route['admin/teacher/mapping/delete/(:any)/(:any)'] = 'Administrator/DeleteTeacherMapping/$1/$2';

# Admin Home Works
$route['admin/homeworks'] = 'Administrator/Homeworks';
$route['admin/homework/insert'] = 'Administrator/InsertHomework';
$route['admin/homework/edit/(:any)'] = 'Administrator/EditHomework/$1';
$route['admin/homework/update/(:any)'] = 'Administrator/UpdateHomework/$1';
$route['admin/homework/delete/(:any)'] = 'Administrator/DeleteHomework/$1';

# Admin Posts
$route['admin/posts'] = 'Administrator/Posts';
$route['admin/post/insert'] = 'Administrator/InsertPost';
$route['admin/post/edit/(:any)'] = 'Administrator/EditPost/$1';
$route['admin/post/update/(:any)'] = 'Administrator/UpdatePost/$1';
$route['admin/post/delete/(:any)'] = 'Administrator/DeletePost/$1';


#################################################################################
###                         USER ROUTES                                       ###
#################################################################################

# Login & Logout
$route['login'] = 'User/Login';
$route['logout'] = 'User/Logout';

# Videos
$route['videos'] = 'User/Videos';
$route['video/(:any)'] = 'User/Video/$1';

# Notes
$route['notes'] = 'User/Notes';
$route['note/(:any)'] = 'User/Note/$1';

# Notifications
$route['notifications'] = 'User/Notifications';
$route['notification/(:any)'] = 'User/Notification/$1';

# Homeworks
$route['homeworks'] = 'User/Homeworks';
$route['submit/homework'] = 'User/SubmitHomework';
$route['homework/(:any)'] = 'User/Homework/$1';

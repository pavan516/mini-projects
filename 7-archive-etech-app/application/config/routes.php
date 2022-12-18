<?php defined('BASEPATH') OR exit('No direct script access allowed');

# Default routes
$route['default_controller'] = 'User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

# Admin Auth
$route['admin'] = 'Administrator';
$route['admin/login'] = 'Administrator/Login';

# Admin Dashboard
$route['admin/dashboard'] = 'Administrator/Dashboard';

# Admin Categories
$route['admin/categories'] = 'Administrator/Categories';
$route['admin/category/insert'] = 'Administrator/InsertCategory';
$route['admin/category/delete'] = 'Administrator/DeleteCategory';

# Admin Branches
$route['admin/branches'] = 'Administrator/Branches';
$route['admin/branch/insert'] = 'Administrator/InsertBranch';
$route['admin/branch/delete'] = 'Administrator/DeleteBranch';

# Admin Materials
$route['admin/materials'] = 'Administrator/Materials';
$route['admin/material/insert'] = 'Administrator/InsertMaterial';
$route['admin/material/delete'] = 'Administrator/DeleteMaterial';

# Admin Subjects
$route['admin/subjects'] = 'Administrator/Subjects';
$route['admin/subject/insert'] = 'Administrator/InsertSubject';
$route['admin/subject/delete'] = 'Administrator/DeleteSubject';

# Admin Instructions
$route['admin/instructions'] = 'Administrator/Instructions';

# Admin Articles
$route['admin/articles'] = 'Administrator/Articles';
$route['admin/article/insert'] = 'Administrator/InsertArticle';
$route['admin/article/edit/(:any)'] = 'Administrator/EditArticle/$1';
$route['admin/article/update/(:any)'] = 'Administrator/UpdateArticle/$1';
$route['admin/article/delete/(:any)'] = 'Administrator/DeleteArticle/$1';

# Admin Notifications
$route['admin/notifications'] = 'Administrator/Notifications';
$route['admin/notification/insert'] = 'Administrator/InsertNotification';
$route['admin/notification/edit/(:any)'] = 'Administrator/EditNotification/$1';
$route['admin/notification/update/(:any)'] = 'Administrator/UpdateNotification/$1';
$route['admin/notification/delete/(:any)'] = 'Administrator/DeleteNotification/$1';

# Admin Posts
$route['admin/posts'] = 'Administrator/Posts';
$route['admin/post/insert'] = 'Administrator/InsertPost';
$route['admin/post/edit/(:any)'] = 'Administrator/EditPost/$1';
$route['admin/post/update/(:any)'] = 'Administrator/UpdatePost/$1';
$route['admin/post/delete/(:any)'] = 'Administrator/DeletePost/$1';

# Posts 
$route['posts/search'] = 'User/SearchPosts';
$route['posts/(:any)'] = 'User/Post/$1';

# Articles
$route['articles'] = 'User/Articles';
$route['articles/search'] = 'User/SearchArticles';
$route['articles/(:any)'] = 'User/Article/$1';

# Articles
$route['notifications'] = 'User/Notifications';
$route['notifications/search'] = 'User/SearchNotifications';
$route['notifications/(:any)'] = 'User/Notification/$1';

# Subscribe
$route['subscriber/insert'] = 'User/InsertSubscriber';
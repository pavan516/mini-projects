<?php
include('connect.php');

$delete_id = $_GET['del'];

$query = "delete from register where id='$delete_id'";

if(mysql_query($query)){

echo "<script>window.open('view_users.php?deleted=user has been deleted!!!','_self')</script>";

}



?>
<?php 
$db_host = "localhost:3306";
$db_username = "iandipho_arjun"; 
$db_pass = "Arjun@iandi"; 
$db_name = "iandipho_iandi";

mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to
mysql");
mysql_select_db("$db_name") or die ("no database");             
?>
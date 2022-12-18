<?php

$mysql_host='localhost:3306';
$mysql_user='bloodcen_pavan';
$mysql_password='24552028';

@mysql_connect($mysql_host,$mysql_user,$mysql_password);
@mysql_select_db('bloodcen_blood');
if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password))
{
   die('cannot connect to database');
}
else
{ 
  if(@mysql_select_db('bloodcen_blood'))
   {
       
   }
  	else
	{
	    die('cannot connect to database');
    }		
}	

?>

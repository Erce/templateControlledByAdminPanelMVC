<?php



/* Database config */
/*
$db_host		= '109.232.216.74';
$db_user		= 'ercecanb_ercecan';
$db_pass		= '231231';
$db_database	= 'ercecanb_database';*/


$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database            = 'users';
/* End config */



$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");



?>
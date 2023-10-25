<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$db_host     = "localhost";
$db_name = "workgram";
$db_username = "root";
$db_password = "";

$con = mysql_connect($db_host,$db_username,$db_password) or die("Could not connect to Server" .mysql_error());
mysql_select_db($db_name) or die("Could not connect to Database" .mysql_error());

?>
<?php
// подключение к БД
$host="localhost";
$user="id9520144_root";
$password = "root";
$db_name="id9520144";
$connect = mysql_connect($host,$user,$password,$db_name);
if(!$connect){
	die('error'.mysqli.error());
	
	
}
?>
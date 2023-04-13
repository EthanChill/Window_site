<?php
// Удаление заказа по ID
/*$host="localhost";
$user="id9520144_root";
$password = "root";
$db_name="id9520144";
$connect = mysqli_connect($host,$user,$password,$db_name);
if(!$connect){
	die('error'.mysqli.error());
}*/
require 'connect.php';
if(isset($_POST['id'])){
	
	$id = $_POST['id'];
	$query="Delete from ordettab where id='".$id."'";
	$result = mysqli_query($connect,$query);
	if($result){	
		echo 'data updated';
	}
}
?>
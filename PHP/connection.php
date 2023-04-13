<?php
$host="localhost";
$user="id9520144_root";
$password = "root";
$db_name="id9520144";
$connect = mysqli_connect($host,$user,$password,$db_name);
if(!$connect){
	die('error'.mysqli.error());
}
// Обновление таблицы заказов
if(isset($_POST['addr'])){
	$addr=$_POST['addr'];
	$telm =$_POST['telm'];
	$fioz=$_POST['fioz'];
	$price = $_POST['price'];
	$id = $_POST['id'];
	$query="Update ordertab set addr='".$addr."',telm='".$telm."',fioz='".$fioz."',price='".$price."' where id ='".$id."'";
	$result = mysqli_query($connect,query);
	if($result){
		echo 'data updated';
	}
}
?>
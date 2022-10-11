<?php
// Получение данных о заказах
require_once('connect.php');
$result = mysqli_query($connect,"Select* from ordertab");
$data = array();
while($row = mysqli_fetch_assoc($result)){	
	$data[]=$row;
}
echo json_encode($data);
?>

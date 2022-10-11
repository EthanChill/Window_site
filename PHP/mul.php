<?php

//multiple_update.php
session_start();
// Получение фио из бд по текущему логину и присваивание статуса выполнения заказа этому человеку.

if(isset($_SESSION['User'])){
    require_once('connect.php');
$result = mysqli_query($connect,"Select fio  from logtab  where mail = '".$_SESSION['User']."'");
$data2 = array();
while($row = mysqli_fetch_assoc($result)){
	
	$data2=$row['fio'];}

if(isset($_POST['hidden_id']))
{
 $fioz = $_POST['fioz'];
 $addr = $_POST['addr'];
 $price = $_POST['price'];
 $odate = $_POST['odate'];
 $telm = $_POST['telm'];
 $id = $_POST['hidden_id'];
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':fioz'   => $fioz[$count],
   ':addr'  => $addr[$count],
   ':price'  => $price[$count],
   ':odate' => $odate[$count],
   ':telm'   => $telm[$count],
   ':id'   => $id[$count]
  );
  $query = "
  UPDATE ordertab 
  SET vipol = '".$data2."' 
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>
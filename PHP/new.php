<?php
//Сортировка в убывающем порядке заказов.
include('connect.php');
$query = "SELECT * FROM ordertab ORDER BY odate DESC";
$statement = $connect->prepare($query);
if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

?>
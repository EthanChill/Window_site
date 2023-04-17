<?php
session_start();
require_once('connect.php');
//$admin='yunchikvlad@mail.ru';
//$adminpw='root';
// Осуществление авторизации.Проверка на заполнение полей.
if(isset($_POST['login']))
{
 if(empty($_POST['uname'])|| empty($_POST['pas']))
{
	 header("location:auth.php?Empty=Заполните все поля");
}
//Введены верные данные.
 else{
 if(($_POST['uname']==$admin)&&($_POST['pas']==$adminpw)){
  $query = "select fio from logtab where mail ='" .$_POST['uname'].  "' and pas='" .$_POST['pas'].  "'";
  $result =mysqli_query($connect,$query);
 if(mysqli_fetch_row($result)){
  $_SESSION['User']=$_POST['uname'];
  header("location:welcome.php");
}
}
//Введены неверные данные
else{
 $query = "select fio from logtab where mail ='" .$_POST['uname'].  "' and pas='" .$_POST['pas'].  "'";
 $result =mysqli_query($connect,$query);
 if(mysqli_fetch_row($result)){
 $_SESSION['User']=$_POST['uname'];
 header("location:welcome.php");
}
else{
 header("location:auth.php?invalid=Не верные данные");
}
}
}
}

?>
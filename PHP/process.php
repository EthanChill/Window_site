<?php
// процесс авторизации в личный кабинет
session_start();
require_once('connect.php');
if(isset($_POST['login']))
{
	if(empty($_POST['uname'])|| empty($_POST['pas']))
	{
		header("location:auth.php?Empty")
		
	}
	else{
		$query = "select * from logtab where mail ='" .$_POST['uname'].  "' and pas='" .$_POST['pas'].  "'";
		$result =mysqli_query($connect,$query);
		if(mysqli_fetch_assoc($result)){
			$_SESSION['User']=$_POST['uname'];
			header("location:welcome.php");
			
		}
		else{
			
			header("location:auth.php?invalid=Не верные данные")
		}
		
	}
	
}

?>
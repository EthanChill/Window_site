<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset="UTF-8">
</head>
<body>
<!-- авторизация-->
<form action ="process.php" method ="post">
<input type ="text" name ="uname" placeholder ="Example@123.com">
<input type = "password" name = "pas" placeholder = "Пароль">
<button name ="login">Войти</button>
<?php
if(@$_GET['Empty'] ==true)
{
?>
<div>
<?php
echo $_GET['Empty']
?>
</div>
<?php
}
?>
<?php
if(@$_GET['invalid'] ==true)
{
?>
<h1>
<?php
echo $_GET['invalid']
?>
</h1>
<?php
}
?>
</form>
</body>
</html>
<?php
require "db.php";?>

<!DOCTYPE HTML>
<html>
<head>
<title>Регистрация</title>
<?php 
$title = "Sign up";
require_once"connect.php" ?>
<meta charset="utf-8?">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title><?=$title ?></title>

<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require_once"blocks/header.php" ?>

<div id="wrapper">
<div id="leftcol">
<div id="forma2">

<form action="/signup.php" method="POST">
<br />
<p style="font-size:25px; text-decoration:underline;"><i>Регистрация на сайте</i></p>
<?php
$data=$_POST;
if (isset($data['do_signup'])) 
{
//	здесь регистрируем , проверка ошибок
	$errors=array();
	if (trim($data['login']==''))
	{
	$errors[]='Введите логин!';
	}
	if (trim($data['email']==''))
	{
	$errors[]='Введите email!';
	}
	if (trim($data['password']==''))
	{
	$errors[]='Введите пароль!';
	}
	if ($data['password_2']!=$data['password'])
	{
	$errors[]='Повторный пароль введён не верно!';
	}
	if (R::count('users',"login=? ",array($data['login']))>0 )
	{
	$errors[]='Пользователь с таким логином уже существует!';	
	}
	if (R::count('users',"email=? ",array($data['email']))>0 )
	{
	$errors[]='Пользователь с таким email уже существует!';	
	}
	if (empty($errors))
	{
	//	Всё хорошо , регистрируем
	$user=R::dispense('users');
	$user->login = $data['login'];
	$user->email = $data['email'];
	$user->password = md5($data['password']);
	R::store($user);
	echo ' <script>window.location=\'login.php\'</script> ';
	}
	else
	{
		
		echo '<div id="messageShow" >'.array_shift($errors).'</div>';
	}
}
?>
<br />
<p>
<p style="margin-left:0px;"><i>*Все поля обязательны для заполнения</i></p>
<br /><br />
<p>
<p><b>Ваш логин: </b></p>
<input type="text" name="login" placeholder="Придумайте логин" value="<?php echo @$data['login']; ?>">
</p><br /><br /><br />
<p>
<p><b>Ваш email: </b></p>
<input type="email" name="email" placeholder="adress@example.ru"value="<?php echo @$data['email'];?>">
</p><br /><br /><br />
<p>
<p><b>Ваш пароль: </b></p>
<input type="password" name="password" placeholder="Придумайте пароль">
</p><br /><br /><br />
<p><b>Введите ваш пароль еще раз: </b></p>
<input type="password" name="password_2" placeholder="Повторите ввод">
</p>
<p><div id="messageShow"></div></p>
<p>
<button type="submit" name="do_signup" class="button button-3d button-primary button-rounded">Зарегестрироваться</button>
</p>
<br /><br />

</form>
</div>
</div>
<?php require_once"blocks/rightcol.php"?>
</div>
<?php require_once"blocks/footer.php"?>
</body>
</html>



<?php
require_once "db.php";?>

<!DOCTYPE HTML>
<html>
<head>
<title>Авторизация</title>
<?php 
$title = "Authorization";
require_once"connect.php" ;
?>
<meta charset="cp1251?">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title><?=$title ?></title>

<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require_once"blocks/header.php" ?>
<div id="wrapper">
<div id="leftcol">
<div id="forma">

<form action="login.php" method="POST">
<p style="font-size:25px; text-decoration:underline;"><i>Авторизация на сайте</i></p>
<?php
$data=$_POST;

if (isset($data['do_login'])) 
{
if (trim($data['login']==''))
	{
	$errors[]='Введите логин!';
	
	}
if ($data['password']=='')
	{
	$errors[]='Введите пароль!';
	
	}	
$errors=array();
$user= R::findOne('users','login=?',array($data['login']));
if ($user)
{
	//логин существует
	if (md5($data['password'])== $user->password )
	{
		//Всё хорошо , логиним
		$_SESSION['logged_user']= $user;
		$_SESSION['admin'] = $user ['admin'];
		$_SESSION['block'] = $user ['block'];
		echo ' <script>window.location=\'user.php\'</script> ';
		
	}	
	else
	{
		$errors[]='Неверный пароль';

	}
}
else
{
	$errors[]='Пользователь с таким логином не найден!';
}
if (!empty($errors))
{
echo '<div id="messageShow" >'.array_shift($errors).'</div>';	

}	
}
if ($admin)
{
	
	if (md5($admin['password'])== $admin->password )
	{
	
		$_SESSION['logged_admin']= $admin;
		echo ' <script>window.location=\'admin.php\'</script> ';
		
	}
}
?>
<br /><br />
<p>
<p>
<p>
<p><b>Логин: </b></p>
<input type="text" name="login" placeholder="Ваш логин" value="<?php echo @$data['login']; ?>">
</p>
<br /><br /><br />
<p >
<p><b>Пароль: </b></p>
<input type="password" name="password" placeholder="Ваш пароль" value="<?php echo @$data['password']; ?>">
<div id="messageShow" ></div>
</p>
<p><br /><br /><br />
<button type="submit" name="do_login"  class="button button-3d button-primary button-rounded">Войти</button>
</p>


</form>
</div>
</div>

<?php require_once"blocks/rightcol.php"?>
</div>

<?php require_once"blocks/footer.php"?>
</body>
</html>





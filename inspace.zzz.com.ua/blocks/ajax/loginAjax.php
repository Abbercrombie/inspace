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
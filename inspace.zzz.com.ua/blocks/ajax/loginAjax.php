<?php

				$data=$_POST;

if (isset($data['do_login'])) 
{
if (trim($data['login']==''))
	{
	$errors[]='������� �����!';
	
	}
if ($data['password']=='')
	{
	$errors[]='������� ������!';
	
	}	
$errors=array();
$user= R::findOne('users','login=?',array($data['login']));
if ($user)
{
	//����� ����������
	if (md5($data['password'])== $user->password )
	{
		//�� ������ , �������
		$_SESSION['logged_user']= $user;
		$_SESSION['admin'] = $user ['admin'];
		$_SESSION['block'] = $user ['block'];
		echo ' <script>window.location=\'user.php\'</script> ';
		
	}	
	else
	{
		$errors[]='�������� ������';

	}
}
else
{
	$errors[]='������������ � ����� ������� �� ������!';
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
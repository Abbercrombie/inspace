<?php
require "db.php";?>

<!DOCTYPE HTML>
<html>
<head>
<title>�����������</title>
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
<p style="font-size:25px; text-decoration:underline;"><i>����������� �� �����</i></p>
<?php
$data=$_POST;
if (isset($data['do_signup'])) 
{
//	����� ������������ , �������� ������
	$errors=array();
	if (trim($data['login']==''))
	{
	$errors[]='������� �����!';
	}
	if (trim($data['email']==''))
	{
	$errors[]='������� email!';
	}
	if (trim($data['password']==''))
	{
	$errors[]='������� ������!';
	}
	if ($data['password_2']!=$data['password'])
	{
	$errors[]='��������� ������ ����� �� �����!';
	}
	if (R::count('users',"login=? ",array($data['login']))>0 )
	{
	$errors[]='������������ � ����� ������� ��� ����������!';	
	}
	if (R::count('users',"email=? ",array($data['email']))>0 )
	{
	$errors[]='������������ � ����� email ��� ����������!';	
	}
	if (empty($errors))
	{
	//	�� ������ , ������������
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
<p style="margin-left:0px;"><i>*��� ���� ����������� ��� ����������</i></p>
<br /><br />
<p>
<p><b>��� �����: </b></p>
<input type="text" name="login" placeholder="���������� �����" value="<?php echo @$data['login']; ?>">
</p><br /><br /><br />
<p>
<p><b>��� email: </b></p>
<input type="email" name="email" placeholder="adress@example.ru"value="<?php echo @$data['email'];?>">
</p><br /><br /><br />
<p>
<p><b>��� ������: </b></p>
<input type="password" name="password" placeholder="���������� ������">
</p><br /><br /><br />
<p><b>������� ��� ������ ��� ���: </b></p>
<input type="password" name="password_2" placeholder="��������� ����">
</p>
<p><div id="messageShow"></div></p>
<p>
<button type="submit" name="do_signup" class="button button-3d button-primary button-rounded">������������������</button>
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



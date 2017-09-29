
<?php

 require_once "db.php";
 
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Кабинет администратора</title>
<meta charset="cp1251?">
<title><?=$title ?></title>
<link href="styles.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?php require_once"blocks/header.php";
require_once"connect.php";
 ?>
<?php 
session_start();
$_SESSION['auth'] = true;
if ( $_SESSION['auth'] == true and $_SESSION['admin'] == 1):

?>
<div id="wrapper">
<div id="Articles" style="font-size:2em; font-family:gabriola; border-bottom:4px solid maroon;"><span style="color:#B22222; font-size:1.5em;  ">A</span>dministrator's profile</div>
<div id="leftcol"> 

<div id="UserProfile">
<br/><br/><br/>

<div class="container">

<table class="admin-table">
<tr>
<th>Идентификатор</th>
<th>Логин</th>
<th>Блок?</th>
<th></th>
<th></th>
</tr>
<?php foreach($users as $a) : ?>
<tr>
<td><?= $a ['id']?></td>
<td><?= $a ['login']?></td>
<td><?= $a ['block']?></td>
<td> 
<a href="block_users.php?action=ban&id=<?=$a['id']?>">Блокировать</a> 
</td>
<td>
<a href="block_users.php?action=unban&id=<?=$a['id']?>">Разблокировать</a>
</td>
</tr>
<?php endforeach ?>

</table>

</div>
</div>
<?php
require_once ("connect.php");
connectDB();

 
 $action=$_GET['action'];
 if ($action=="ban")
{
$id= $_GET['id'];	
banUser($id);
header ("Location:block_users.php");
 }
 
 if ($action=="unban")
{
$id= $_GET['id'];	
unbanUser($id);
header ("Location:block_users.php");
 }
 

?>	

<div class=\"clear\"></div>


					</div>
 <?php require_once"blocks/rightcol.php"?>
 </div>
 
 <div class=\"clear\"></div>
<?php require_once"blocks/footer.php"?>
<?php
if (!( $_SESSION['auth'] == true and $_SESSION['admin'] == 1)) : 
?>
<div id="wrapper">
<div id="Articles" style="font-size:2em; font-family:gabriola; border-bottom:4px solid maroon;"><span style="color:#B22222; font-size:1.5em;  ">U</span>ser profile</div>
<div id="leftcol"> 

<div id="UserProfile">
<h2 style="display:flex;justify-content:center;">У вас нет доступа к этой странице!</h2>
</div>





<?php 
endif;
?>
<div class=\"clear\"></div>


 
 </div>
 <?php require_once"blocks/rightcol.php"?>
 </div>
 
 <div class=\"clear\"></div>
<?php require_once"blocks/footer.php"?>
</body>
</html>
	<?php 
	endif;
	?>
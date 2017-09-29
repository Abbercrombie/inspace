
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
<a href="add_right_article.php">Добавить статью</a>

<table class="admin-table">
<tr>
<th>Идентификатор</th>
<th>Заголовок</th>
<th></th>
<th></th>
</tr>
<?php foreach($dailynews as $a) : ?>
<tr>
<td><?= $a ['id']?></td>
<td><?= $a ['title']?></td>
<td> 
<a href="edit_right_article.php?action=edit&id=<?=$a['id']?>">Редактировать</a> 
</td>
<td>
<a href="articles_right_admin.php?action=delete&id=<?=$a['id']?>">Удалить</a>
</td>
</tr>
<?php endforeach ?>

</table>

</div>
</div>
<?php
require_once ("connect.php");
connectDB();

if (isset($_POST["button_newarticle"]))
{
addRightArticle($_POST['id'],$_POST['title'],$_POST['full']);
header ("Location:articles_right_admin.php");
 }
 
 
 $action=$_GET['action'];
 if ($action=="delete")
{
$id= $_GET['id'];	
delRightArticle($id);
header ("Location:articles_right_admin.php");
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
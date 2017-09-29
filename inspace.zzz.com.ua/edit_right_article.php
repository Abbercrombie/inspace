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

<div id="UserProfile" style="height:399px;">
<form method="post" action="edit_right_article.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
	
	<input type="number" name="id" value="<?=$dailynews['id']?>" placeholder="id" class="form-item" autofocus required>
	<br/><br/>
	<input type="text" name="title" value="<?=$dailynews['title']?>" placeholder="Заголовок" class="form-item" autofocus required>
	</label>
				
				<textarea placeholder="Содержимое" class="form-item"  name="full" required><?=$dailynews['full']?></textarea>
			
	<input type="submit" name="button_editArticle" value="Редактировать" class="btn">
<?php
  if (isset($_POST["button_editArticle"]))
{	
editRightArticle ($_POST['id'],$_POST['title'],$_POST['full']);
header ("Location:articles_right_admin.php");
 }

?>
</form>

</div>
<div class=\"clear\"></div>


					</div>
 <?php require_once"blocks/rightcol.php"?>
 </div>
 
 <div class=\"clear\"></div>
<?php require_once"blocks/footer.php"?>
<?php
else : 
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

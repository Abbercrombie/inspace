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

///if (isset($_POST['showmsg']))
//{
//	refreshMessageCount();
//}

?>
<div id="wrapper">
<div id="Articles" style="font-size:2em; font-family:gabriola; border-bottom:4px solid maroon;"><span style="color:#B22222; font-size:1.5em;  ">A</span>dministrator's profile</div>
<div id="leftcol"> 

<div id="UserProfile">
<pre><br/>                                                                  <a href="https://mail.google.com/mail/u/0/#inbox" class="button button-circle button-caution"><h5>post</h5></a></pre>

<form action="admin.php" method="POST">
<div style="display:flex;align-items:center;flex-wrap:wrap;">
<div class="button button-3d button-primary button-rounded"><a href="articles_admin.php" style="color:white;">Управление основными статьями</a></div>
<br/><br/><br/>
<div class="button button-3d button-primary button-rounded"><a href="articles_right_admin.php" style="color:white;">Управление статьями правой колонки</a></div>
<br/><br/><br/>
<div class="button button-3d button-primary button-rounded"><a href="block_users.php" style="color:white;">Управление пользователями</a></div>
<br/><br/><br/>
<div class="button button-3d button-primary button-rounded"><a href="parser.php" style="color:white;">Parser</a></div>
<br/>


</div>
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

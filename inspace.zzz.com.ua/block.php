<?php

 require "db.php";
 
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Кабинет пользователя</title>
<meta charset="cp1251?">
<title><?=$title ?></title>
<link href="styles.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?php require_once"blocks/header.php" ?>

<br /><br /><br /><br />

<div id="wrapper">
<?php 
session_start();
$_SESSION['auth'] = true;
if ( $_SESSION['auth'] == true and $_SESSION['block'] == 1):
?>
<div id="Articles" style="font-size:2em; font-family:gabriola; border-bottom:4px solid maroon;"><span style="color:#B22222; font-size:1.5em;  ">U</span>ser profile</div>
<div id="leftcol"> 

<div id="UserProfile">
<h1>Извините , ваш аккаунт заблокирован</h1>
 <?php require_once"blocks/rightcol.php"?>
 </div>
 </div>
 </div>
 <div class=\"clear\"></div>
<?php require_once"blocks/footer.php"?>
</body>
</html>













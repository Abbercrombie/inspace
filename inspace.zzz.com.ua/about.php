<?php

 require "db.php";
 
?>
<!DOCTYPE HTML>
<html>
<head>
<title>� ��� </title>
<meta charset="cp1251?">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title><?=$title ?></title>

<link href="styles.css" rel="stylesheet" type="text/css">
<?php 
require_once"connect.php";
$title = "Info about us";

 ?>

</head>
<body>
<?php require_once"blocks/header.php" ?>
<div id="wrapper">
<div id="leftcol">
<p id="about_us">���� ��� ���� ������ ��� ��������������� ����� . �� ������� ��� ������ ������ � �������� 
� ����� ��������� ������� , � � ��������� � ����� , � ���������� ��� ����������� ������������.

</p>

</div>

<?php require_once"blocks/rightcol.php"?>
</div>
<div class=\"clear\"></div>
<?php require_once"blocks/footer.php"?>
</body>
</html>
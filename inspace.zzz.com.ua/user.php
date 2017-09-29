<?php

 require_once "db.php";
 
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
<?php require_once"blocks/header.php";
//require_once "feedback.php";
 ?>

<br /><br /><br /><br />

<div id="wrapper">
<?php 
if (isset($_SESSION['logged_user'])&&($_SESSION['block']==0)) :
?>
<div id="Articles" style="font-size:2em; font-family:gabriola; border-bottom:4px solid maroon;"><span style="color:#B22222; font-size:1.5em;  ">U</span>ser profile</div>
<div id="leftcol"> 

<div id="UserProfile">
<h3><a href="admin.php">Admin Panel</a></h3>


 <p><b><span><?php echo ($_SESSION['logged_user']->login) ?></span></b> , Здравствуйте!</p>
<p>Ваш email- <b><span><?php echo  ($_SESSION['logged_user']->email) ?></span></b></p>
<p>Ваш id- <b><span><?php echo  ($_SESSION['logged_user']->id) ?></span></b></p>
<?php require_once "connect.php" ;?>
	
<p>Информация о вас - <b><span><?php   foreach ($infouser as $i) : echo $i['infoaboutuser'] ; endforeach;?></span></b></p>

<div name="infoTo"><?php echo @$valInfoTo ?></div>

<a href="#" id="changeInfoButton" >Изменить инфорамацию о себе[...]</a>
<?php



 ?>


<div id="aboutMe" style="display:none;" >
<form action="user.php" method="POST">
<div name="infoTo"><?php echo @$valInfoTo ?></div>
<textarea name="textAbout" type="text" style="float:left;" placeholder="Напишите немного о себе..."><?php   @$valInfoFrom['textAbout']; ?></textarea>
<br /><br /><br /><br /><br /><br /><br /><br /><br />
<button name="AddInfoButton" type="submit" class="button button-pill button-raised button-primary">Добавить</button>
</form>

</div>
	<script type="text/javascript"> 
	$('document').ready(function(){
	$("#changeInfoButton").click(function()
		{
			
		$("#aboutMe").show();
		});
		
	$("AddInfoButton").click(function()
		{
			
		$("#aboutMe").hide();
		});	
		
	});
	</script>
<?php
else : ($_SESSION['block'] == 1) 
?>
<div id="Articles" style="font-size:2em; font-family:gabriola; border-bottom:4px solid maroon;"><span style="color:#B22222; font-size:1.5em;  ">U</span>ser profile</div>
<div id="leftcol"> 

<div id="UserProfile">
<h2>Извините , ваш аккаунт заблокирован!</h2>

<?php endif; ?>	
<?php 
if (!isset($_SESSION['logged_user']))  :
?>
<div id="Articles" style="font-size:2em; font-family:gabriola; border-bottom:4px solid maroon;"><span style="color:#B22222; font-size:1.5em;  ">U</span>ser profile</div>
<div id="leftcol"> 

<div id="UserProfile">
<h2>Вы не авторизованы!</h2>
	

<?php endif; ?>

	
	<?php 
	
	$idval = ($_SESSION['logged_user']->id);
	$valInfo =$_POST;
	$valInfoTo = $_POST['infoTo'];
	$valInfoFrom=$_POST['textAbout'];
	
		
	
	if (isset ($valInfo['AddInfoButton']))
	{
	require_once "connect.php" ;
	connectDB();
	$mysqli->query ("UPDATE  `abercrombie111`.`users` SET  `infoaboutuser` =  '$valInfoFrom' WHERE  `users`.`id` = '$idval'");	  
      $infoaboutuser = ($_SESSION['logged_user']->infoaboutuser);
	closeDB();
	header("Location: user.php");
	}




	?>
	

</div>
<div class=\"clear\"></div>


 
 </div>
 <?php require_once"blocks/rightcol.php"?>
 </div>
 
 <div class=\"clear\"></div>
<?php require_once"blocks/footer.php"?>
</body>
</html>

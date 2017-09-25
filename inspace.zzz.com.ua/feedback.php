<?php

 require_once "db.php";
 
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Обратная связь</title>
<meta charset="utf-8?">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title><?=$title ?></title>

<link href="styles.css" rel="stylesheet" type="text/css">
<?php 
$data=$_POST;
$title = "Feedback";
require_once"connect.php";


//if (isset($_POST['done']))
//{
///	$messagess++;
//}



 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
$('document').ready(function(){
	$("#done").click(function(){
	$("#messageShow").hide();
var fail=false;
var name = $("#name").val();
var email = $("#email").val();
var subject = $("#subject").val();
var message = $("#message").val();

if (name=="" || name==" ") fail="Вы не ввели имя";
else if (email==""||email==" ") fail="Введите email";
else if (subject==""||subject.length<4) fail="Тема сообщения пуста либо короче 4 символов";
else if (message==""||message.length<15) fail="Сообщение не введено либо короче 15 символов";
if (fail) 
{
	$('#messageShow').html(fail+"<div class='clear'><br></div>"); 
	$('#messageShow').show();
	
	return false;
	}
	$.ajax
	({
	url: 'blocks/ajax/feedback2.php',
	type: 'POST',
	cache: false,
	data: {'name':name,'email':email,'subject':subject,'message':message},
	dataType:'html',
	success:function(data) 
		{

	$('#messageShow').html(data +"<div class='clear'><br></div>"); 
	$('#messageShow').show();
	
	
		}
	});
}); 
}); 
  </script>
</head>
<body>

<?php require_once"blocks/header.php" ?>

<div id="wrapper">
<div id="leftcol">
<form action="/feedback.php" method="POST">
<input type="text" placeholder="Имя" id="name" name="name"><br />
<input type="email" placeholder="Email" id="email" name="email" value="<?php echo @$data['email'];?>"><br />
<input type="text" placeholder="Тема сообщения" id="subject" name="subject"><br />
<textarea name="message" placeholder="Введите сообщение..." id="message"></textarea><br />
<div id="messageShow" ></div>
<input type="button"  id="done" name="done" value="Отправить письмо"  class="button button-3d button-box button-jumbo">
</form>
</div>

<?php require_once"blocks/rightcol.php"?>
</div>

<?php require_once"blocks/footer.php"?>
</body>
</html>
<?php 
$name=htmlspecialchars($_POST['name']);
$email=htmlspecialchars($_POST['email']);
$subject=htmlspecialchars($_POST['subject']);
$message=htmlspecialchars($_POST['message']);
if ($name==''||$email==''||$subject==''|$message=='') 
{
	echo 'Заполните все поля';
exit;
	}
	//its ok , sending
	$subject="=?utf-8?B?".base64_encode($subject)."?=";
	$headers = "From: abercrombie111@inspace.zzz.com.ua\r\nReply-to: $email\r\nContent type: text/plain; charset=utf-8\r\n";
	if (mail("aabbercrombie@gmail.com",$subject,$message,$headers))
	echo "Message is sended";
else echo "Message is not sended";
 ?>
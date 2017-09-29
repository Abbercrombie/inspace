<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
header ('content-type: text/html; charset=utf-8');
$fd= fopen("ftp://abercrombie111@zzz.com.ua/inspace.zzz.com.ua/lol.txt","r+") or die("не удалось создать файл");
echo 'ads';
$strinm="loooooooooooooooooool";
fwrite($fd,$strinm);
fclose($fd);
?>
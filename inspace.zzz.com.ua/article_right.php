<?php

 require "db.php";
 
?>

<!DOCTYPE HTML>
<html>
<head>
<title>inspace</title>
<?php 

require_once "connect.php" 
?>
<meta charset="utf-8?">
<title><?=$title ?></title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require_once"blocks/header.php" ?>

<br /><br /><br /><br />

<div id="wrapper">
<div id="Articles" style="font-size:2em; font-family:gabriola; border-bottom:4px solid maroon;"><span style="color:#B22222; font-size:1.5em;  ">D</span>aily news</div>
<div id="leftcol"> 
<?php 
echo '<div id="bigArticle">
<img src="/img/dailynews/'.$dailynews["id"].'.jpg">
<h2>'.$dailynews["title"].'</h2><br />
<p>'.$dailynews["full"].'</p> <br />
 <br /></div><br /> ' ?>
 <br />

 <br />
 
 <?php 
if (isset($_SESSION['logged_user'])) :
?>


	
	<span style="color:green;"><b> Авторизованы и можете оставить комментарий </b></span>
	<div id="disqus_thread" style="display:block;">
	
<?php
else :
?>

<span style="color:#B22222;"><b>*Комментарии могут оставлять только зарегестрированные пользователи </b></span>



 
 <?php endif; ?>







</div>

<div class=\"clear\"></div>
<div id="disqus_thread">
</div>
<script>

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://httpmysite.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

 
 </div>
 
 <?php require_once"blocks/rightcol.php"?>
 </div>
 
 <div class=\"clear\"></div>
<?php require_once"blocks/footer.php"?>
</body>
</html>

<?php

 require "db.php";
 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="cp1251?">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title><?=$title ?></title>

<link href="styles.css" rel="stylesheet" type="text/css">
<?php 
$title = "Info about us";
?>
<?php 
require_once "connect.php";

?>
</head>
<body>
<?php require_once"blocks/header.php" ?>
<div id="wrapper">
<div id="leftcol">
<?php 

	echo "<div id=\"bigArticle\">";
echo '<img src="/img/dailynews/'.$dailynews["id"].'.jpg" alt="article'.$dailynews["id"].'" title="article'.$dailynews["id"].'">
<h2 >'.$dailynews["title"].'</h2>
<p>'.$dailynews["full"].'</p>
<a href="/article.php?id='.$dailynews[$i]["id"].'">

</a>

</div>';
	echo "<div class=\"clear\"><br></div>";
	
?>
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

<?php require_once"blocks/rightcol.php"?>


 
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
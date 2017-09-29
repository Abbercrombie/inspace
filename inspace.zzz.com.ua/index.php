<?php

 require "db.php";
 
?>
<?php 
if (isset($_SESSION['logged_user'])) :
?>
	
<?php
else :
?>

	

<?php endif; ?>
<!DOCTYPE HTML>
<html>
<head>
<title>inspace</title>
<meta charset="utf-8?">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title><?=$title ?></title>

<link href="styles.css" rel="stylesheet" type="text/css">
<?php 

$title = "In Space";
require_once "connect.php" 

//$news = getNews(3);
?>

</head>
<body>
<?php require_once"blocks/header.php" ?>

	
		
<br /><br /><br /><br />

<div id="wrapper">
<div id="Articles" style="font-size:2em; font-family:gabriola; border-bottom:4px solid maroon;"><span style="color:#B22222; font-size:1.5em;  ">D</span>aily news</div>
<div id="leftcol"> 
<?php 
for ($i=0;$i<count($news);$i++)
{
	if ($i==0) echo "<div id=\"bigArticle\">";
	else echo "<div class=\"article\">";
echo '<img src="/img/'.$news[$i]["id"].'.jpg" alt="article'.$news[$i]["id"].'" title="article'.$news[$i]["id"].'">
<h2 >'.$news[$i]["title"].'</h2>
<p>'.$news[$i]["intro"].'</p>
<a href="/article.php?id='.$news[$i]["id"].'">
<div>Читать</div>
</a>

</div>';
	if ($i==0) {echo "<div class=\"clear\"><br></div>";}
	}
?>

</div>

<?php require_once"blocks/rightcol.php"?>


</div>


</div>
<?php require_once"blocks/footer.php"?>
</body>
</html>

<div id="rightcol">

<?php 
require_once "connect.php";
for ($i=0;$i<=count($dailynews);$i++)
{
	 echo '<div class="banner"> 
								<a href="article_right.php?id='. $dailynews [$i]["id"] .'">
								<h3>'.$dailynews[$i]["title"]. '</h3>
								<img src="/img/dailynews/'.$dailynews[$i]["id"].'.jpg" >
								</a>
										</div>';

	}

?>
</div>
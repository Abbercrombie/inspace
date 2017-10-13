<link href="styles.css" rel="stylesheet" type="text/css">
<?php 
header ('content-type: text/html; charset=utf-8');
require_once 'phpQuery.php';
require_once 'connect.php';
	
	$p= getParsedArticles (3,$where);
	$pa = phpQuery::newDocument ($p);
	
foreach($p as $item){
	$img = $item['Pimg'];
	
echo '<a href="#" style="background-color:red;">'.$item["Ptitle"].'</a>';
echo '<br>';
echo "<img src='$img'>" ;
echo '<br>';
echo $item['Pfulltext'].'<br>';
echo $item['Pdate'].'<br>';
echo '<hr>';
echo '<br>';
}
?>

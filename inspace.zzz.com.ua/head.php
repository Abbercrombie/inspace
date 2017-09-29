
<?php 

$news = getNews(20);
$mysqli = false;
function connectDB () {
	
	global $mysqli;
	$mysqli = new mysqli ("localhost","root","","mybase");
	$mysqli->query("SET NAMES 'utf-8'");
}
	
	function closeDB(){
	global $mysqli;
	$mysqli->close();
	}

function getNews ($limit ){
	global $mysqli;
	connectDB();
	if ($id)
		$where = "WHERE `id`=".id;
$result = $mysqli->query("SELECT * FROM `news` ORDER BY `id` DESC LIMIT $limit");	
closeDB();
if (!$id)
return resultToArray ($result);
else return $result->fetch_assoc();
}
function resultToArray ($result) 
{
	$array = array();
	while (($row=$result->fetch_assoc())!=false)
	$array[]=$row;
		return $array;
	
}

?>
<meta charset="utf-8?">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title><?=$title ?></title>

<link href="styles.css" rel="stylesheet" type="text/css">

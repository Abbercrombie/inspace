<?php
header ('content-type: text/html; charset=utf-8');
require_once 'newFunctions.php';

$p= getParsedArticles (340);

foreach ($p as $item)
{   $id=$item['id'];
    echo "Город: ".$item['city'];
    echo "<br>";
    echo "Отделение: ".$item['titleWarhouse'];
    echo "<br>";
    echo $item['grafik'];
    echo "<br>";
    echo "Адресс: ".$item['adress'];
    echo "<br>";
    echo "Телефон: ".$item['phone'];
    echo "<br>";
    echo "id: ".$id;
    echo "<br>";
    echo "<form action='NewParserJson.php' method='POST'><a href='NewParserJson.php?action=delete&id=$id'>Удалить</a></form>";
    $action=$_GET['action'];
    if ($action=="delete")
    {
        $id= $_GET['id'];
        delArticle($id);
        header ("Location:NewParserJson.php");
    }
    echo "<hr>";

}


?>
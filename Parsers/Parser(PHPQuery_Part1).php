<?php
header('content-type: text/html; charset=utf-8');
require 'phpQuery.php';
require_once 'connect.php';
$i = 0;
$url  = 'http://dailyillini.com/category/news/';
$file = file_get_contents($url);
$doc  = phpQuery::newDocument($file);
foreach ($doc->find('.postarea.archivepage .sno-animate') as $article) {
    $i++;
    $article     = pq($article);
    $text        = $article->find('a:first')->html();
    $texturl[$i] = $article->find('a:first')->attr('href');
    parser($texturl, $i);
}
closeDB();
function parser($url, $i)
{
    $file    = file_get_contents($url[$i]);
    $doc     = phpQuery::newDocument($file);
    $article = $doc->find('.postarea ');
    $article = pq($article);
    $article->find('.photocaption')->remove();
    $article->find('.photocredit')->remove();
    $article->find('.captionboxmittop .photocredit')->remove();
    $article->find('.storydetails .storybyline')->remove();
    $article->find('.storydetails .storycategory')->remove();
    $Ptitle    = $article->find('h1')->text();
    $Pimg      = $article->find(' .photowrap img')->attr('src');
    $Pfulltext = $article->find(' p:lt(-2)')->text();
    $Pdate     = $article->find('.storydetails .storydate .time-wrapper')->text();
    $content   = file_get_contents($Pimg);
    file_put_contents('image' . $i . '.jpg', $content);
    addArticleToDB($Pid, $Ptitle, $Pdate, $Pfulltext, $Pimg);
    echo '<br>';
    echo $Ptitle;
    echo '<br>';
    echo "<img src='$Pimg'>";
    echo '<br>';
    echo $Pfulltext;
    echo '<br>' . $Pdate . '<br>';
    echo '<hr> <br>';
}
?>

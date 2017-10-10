<?php
require_once 'functions.php';
$url  = 'http://dailyillini.com/category/news/';
$file = file_get_contents($url);
$i=0;

$myRegtitle = preg_match_all('#<h1\s+?class\s*?=\s*?"(.+?)"\s*?><a\s+?href\s*?=\s*?"(.+?)"\s*?>(.+?)</a></h1>#s', $file, $titles);


foreach ($titles as $texturl) {
$i++;
    $myRegfulltext= preg_match_all ('#<div>(.+?)</div>#s',$texturl[$i],$fulltext);
    
}






/*foreach ($doc->find('.postarea.archivepage .sno-animate') as $article) {
    $i++;
    $article     = pq($article);
    $text        = $article->find('a:first')->html();
    $texturl[$i] = $article->find('a:first')->attr('href');
    parser($texturl, $i);
}*/

?>
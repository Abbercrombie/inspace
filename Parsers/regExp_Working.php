<?php
require_once 'functions.php';
$url  = 'http://dailyillini.com/category/news/';

function parser($url)
{
    $filel = file_get_contents($url);

    preg_match("/<h1\s*?class\s*?=\s*?[\"\']storyheadline[\"\'][^>]*?>(.+?)<\/h1/s", $filel, $title);
    $title = addslashes($title[1]);

    preg_match_all('/<div\s*?class\s*?=\s*?[\"\']photowrap[\"\']\s*?(.+?)\s*?<img\s*?src\s*?=\s*?[\"\'](.+?)[\"\']/s', $filel, $image);

    /*preg_match("/<p[^>]*?>(.+?)<div\s+?id=[^>]*story_bottom[^>]*>/s", $filel, $fulltext);*/
    preg_match("/<div\s*?class\s*?=\s*?[\"\']at\-above\-post\saddthis_tool[\"\']\s*?(.+?)\s*?<div\s+?id=[^>]*story_bottom[^>]*>/s", $filel, $fulltext);

   $text = preg_replace("#<script\s*?(.+?)>(.+?)<\/script>#s",'',$fulltext[0]);
   $text = addslashes($text);
   $text = strip_tags($text);
    $text = trim($text);

    preg_match("/<span\s*?class\s*?=\s*?[\"\']time-wrapper[\"\'][^>]*?>(.+?)<\/span/s", $filel, $date);
    $date = date('Y-m-d', strtotime($date[1]));
    $date = trim($date);
    $date = strip_tags($date);

    print_arr($title);
    print_arr($image[0]);
    print_arr($fulltext[0]);
    print_arr($date);

    addArticleToDB($title, $image[2][0], $text, $date);

}

$file = file_get_contents($url);
preg_match_all('#<h1\s+?class\s*?=\s*?"(.+?)"\s*?><a\s+?href\s*?=\s*?"(.+?)"#s', $file, $href);
$list_href = $href[2];

foreach ($list_href as $href)
{
    parser($href);
    echo "<hr>";

}

?>
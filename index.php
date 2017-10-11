<?php
//require_once 'functions.php';
$url  = 'http://dailyillini.com/category/news/';

//$i=0;
function print_arr($arr)
{
    echo '<pre>' .print_r($arr,true). '</pre>';

}


function parser($url)
{
    $filel = file_get_contents($url);

    preg_match("/<h1\s*?class\s*?=\s*?[\"\']storyheadline[\"\'][^>]*?>(.+?)<\/h1/s", $filel, $title);

    preg_match("/<span\s*?class\s*?=\s*?[\"\']time-wrapper[\"\'][^>]*?>(.+?)<\/span/s", $filel, $date);

    preg_match("/<p[^>]*?>(.+?)<div\s+?id=[^>]*story_bottom[^>]*>/s", $filel, $fulltext);

    preg_match_all("/<div\s*?class\s*?=\s*?[\"\']photowrap[\"\']\s*?(.+?)\s*?<img\s*?src\s*?=\s*?[\"\'](.+?)[\"\']\s*?class\s*?=\s*?[\"\']catboxphoto\sfeature-image[\"\'][^>]*?>/s", $filel, $image);

    print_arr($title[1]);
    print_arr($date[1]);
    print_arr($image);
    print_arr($fulltext[1]);


}


$file = file_get_contents($url);

preg_match_all('#<h1\s+?class\s*?=\s*?"(.+?)"\s*?><a\s+?href\s*?=\s*?"(.+?)"#s', $file, $href);


$list_href = $href[2];

foreach ($list_href as $href){
    parser($href);
    echo "<hr>";
}



/*$filel= file_get_contents($href);

preg_match_all("/<div\s*?class\s*?=\s*?[\"\']postarea[\"\'][^>]*?>(.+?)<div\s+?id=[^>]*story_bottom[^>]*>/s", $filel, $postarea);



preg_match_all("/<h1\s*?class\s*?=\s*?[\"\']storyheadline[\"\'][^>]*?>(.+?)<\/h1/s", $filel, $title);

preg_match_all("/<span\s*?class\s*?=\s*?[\"\']time-wrapper[\"\'][^>]*?>(.+?)<\/span/s", $filel, $date);

preg_match_all("/<p[^>]*?>(.+?)<div\s+?id=[^>]*story_bottom[^>]*>/s", $filel, $fulltext);

preg_match_all("/<div\s*?class\s*?=\s*?[\"\']photowrap[\"\']\s*?(.+?)\s*?<img\s*?src\s*?=\s*?[\"\'](.+?)[\"\']\s*?class\s*?=\s*?[\"\']catboxphoto\sfeature-image[\"\'][^>]*?>/s", $filel, $image);


*/

?>




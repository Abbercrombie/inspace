<?php 
header ('content-type: text/html; charset=utf-8');
require 'phpQuery.php';

	function print_arr($arr)
	{
		echo '<pre>' .print_r($arr,true). '</pre>';
		
	}

	function parser ($url,$start,$end){
		
	if ($start<$end){
	$file = file_get_contents($url);
	$doc = phpQuery::newDocument($file);
				foreach ($doc->find('#article article ')as $article)
				{
			$article = pq($article);

			$article->find('.right')->remove();
			$img = $article->find('.articleIMG a img')->attr('src');
			$text = $article->html();

			print_arr($text);
				}
				$next=$doc->find('#pagination span ')->next()->attr('href');
				if (!empty($next) ) 
				{
					$start++;
					parser($next,$start,$end);	
				}
			}
	}	

$url =  'http://plurrimi.com/' ;
$start=0;
$end=4;
parser($url,$start,$end);








?>
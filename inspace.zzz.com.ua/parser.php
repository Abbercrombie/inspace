<?php 
header ('content-type: text/html; charset=utf-8');
require 'phpQuery.php';

	function print_arr($arr)
	{
		echo '<pre>' .print_r($arr,true). '</pre>';
		
	}

	function parser ($url){
		
	
	$file = file_get_contents($url);
	$doc = phpQuery::newDocument($file);
			
				foreach ($doc->find('.postarea.archivepage .sno-animate:lt(2) ')as $article)
				{
			$article = pq($article);
			$article->find('.categorycat')->remove();
			$article->find('p:first')->remove();
			$article->find('a ')->wrap('<span style="background-color:red;">');
			$img = $article->find(' a img')->attr('src');
			$text = $article->html();

			print_arr($text);
			
				}
				
				
			
	}	
			
$url =  'http://dailyillini.com/category/news/' ;
parser($url);








?>
<?php 
header ('content-type: text/html; charset=utf-8');
require 'phpQuery.php';
require_once 'connect.php';

	function print_arr($arr)
	{
		echo '<pre>' .print_r($arr,true). '</pre>';
		
	}

	function parser ($url){
		
	
	$file = file_get_contents($url);
	$doc = phpQuery::newDocument($file);
			
				$article=$doc->find('.postarea ');
				
			$article = pq($article);
			$article->find('.photocaption')->remove();
			$article->find('.captionboxmittop .photocredit')->remove();
		
			$article->find('.storydetails .storybyline')->remove();
			$article->find('.storydetails .storycategory')->remove();
				$Pid = 1;
				$Ptitle=$article->find('h1');
				 $Pimg =$article->find (' .photowrap img')->attr('src');
				 $Pfulltext=$article->find(' p:lt(-2)');
				 $Pdate=$article->find('.storydetails .storydate .time-wrapper');
			echo "<img src='$Pimg'>";
			echo $Ptitle;
			echo $Pfulltext;
			echo $Pdate;
			
			addArticleToDB($Pid,$Ptitle,$Pdate,$Pfulltext,$Pimg);
				
			
	}	
			
$url =  'http://dailyillini.com/news/2017/09/26/chancellor-condemns-messages-intolerance-campus/' ;
parser($url);








?>
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
			$article->find('.photocredit')->remove();
			$article->find('.captionboxmittop .photocredit')->remove();
		
			$article->find('.storydetails .storybyline')->remove();
			$article->find('.storydetails .storycategory')->remove();
				
				
				//for ($i=0;$i<5;$i++){
				$Pid = 1;
					
				$Ptitle=$article->find('h1');
				
				 $Pimg =$article->find (' .photowrap img')->attr('src');
					
				 $Pfulltext=$article->find(' p:lt(-2)');
					
				 $Pdate=$article->find('.storydetails .storydate .time-wrapper');
					
					$parserarray = array ("Pid"=>"$Pid","Ptitle"=>"$Ptitle","Pimg"=>"$Pimg","Pfulltext"=>"$Pfulltext","Pdate"=>"$Pdate");
					//print_arr($parserarray);
				//}
				
			//echo $Ptitle;
			//echo "<img src='$Pimg'>";
			//echo $Pfulltext;
			//echo $Pdate;
			//echo '<hr> <br>';
			
			for ($i=0;$i<11;$i++){
				
			addArticleToDB($parserarray['Pid'],$parserarray['Ptitle'],$parserarray['Pdate'],$Pparserarray['fulltext'],$parserarray['Pimg']);
				}
			
			//print_arr($parserarray);
	}
						
			

$url = 'http://dailyillini.com/category/news/';
$file = file_get_contents($url);
	$doc = phpQuery::newDocument($file);
	
	foreach($doc->find('.postarea.archivepage .sno-animate')as $article){
	$article = pq($article);
	$text=$article->find('a:first')->html();
	
	
	$texturl=$article->find('a:first')->attr('href');
	
	parser($texturl);
			
			
		
				
	}
	
	


















?>
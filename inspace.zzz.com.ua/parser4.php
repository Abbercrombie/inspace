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
				
				
					
				//$Ptitle=$article->find('h1')->text();
				
				 $Pimg =$article->find (' .photowrap img')->attr('src');
					
				 $Pfulltext=$article->find(' p:lt(-2)')->text();
					
				 $Pdate=$article->find('.storydetails .storydate .time-wrapper')->text();
					
					$parserarray = array ("Pid"=>"$Pid","Ptitle"=>"$Ptitle","Pimg"=>"$Pimg","Pfulltext"=>"$Pfulltext","Pdate"=>"$Pdate");
				
				
					$url = $parserarray['Pimg'];
					
					$content = file_get_contents($url);
				//$path = __DIR__.'/Parser/'.'image1.jpg';
					for ($i=0;$i<20;$i++){
					
					$nameimg = md5 ($i++);
					file_put_contents($nameimg.'.jpg',$content);
					}
					
					
				
				
				//for ($i=0;$i<1;$i++){
				
			//addArticleToDB($parserarray['$i'],$parserarray['Ptitle'],$parserarray['Pdate'],$parserarray['Pfulltext'],$parserarray['Pimg']);
				//}
			//closeDB();
				
			//echo $Ptitle;
			//echo "<img src='$Pimg'>";
			//echo $Pfulltext;
			//echo '<br>'.$Pdate.'<br>' ;
			//echo '<hr> <br>';
			
			
			
			//}
			
			
			
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
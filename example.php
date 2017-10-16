<?php
$url = 'https://api2.nrg-tk.ru/v2/cities?lang=ru';
$file = file_get_contents($url);



$jsonSite=json_decode($file);
echo '<pre>';
$list = $jsonSite->cityList;

var_dump($list);

echo '</pre>';
?>
<?php
function print_arr($arr)
{
    echo '<pre>' .print_r($arr,true). '</pre>';

}

function resultToArray ($result)
{
    $array = array();
    while (($row=$result->fetch_assoc())!=false)
        $array[]=$row;
    return $array;

}
function connectDB()
{

    global $mysqli;
    $mysqli = new mysqli("localhost", "root", "teWDicHu123", "abbercrombieDB");
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    $mysqli->query("SET NAMES 'utf8'");

}
function closeDB()
{
    global $mysqli;
    $mysqli->close();
}



function addWarhouses($city,$titleWarehouse,$adress,$grafik,$phone)
{
    global $mysqli;
    connectDB();
    $result = $mysqli->query( "INSERT IGNORE INTO `jsonParser` (`city`,`titleWarehouse`, `adress`,`grafik`, `phone`) VALUES ('$city','$titleWarehouse','$adress','$grafik','$phone') ");
    return $result;

}


?>
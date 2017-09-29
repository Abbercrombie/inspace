
<?php

function connectDB()
{
    
    global $mysqli;
    $mysqli = new mysqli("mysql.zzz.com.ua", "abercrombie111", "abercrombie1112t", "abercrombie111");
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    $mysqli->query("SET NAMES 'cp1251'");
    return $link;
}


function closeDB()
{
    global $mysqli;
    $mysqli->close();
}


function addArticleToDB($Pid, $Ptitle, $Pdate, $Pfulltext, $Pimg)
{
    global $mysqli;
    connectDB();
    $result = $mysqli->query("SELECT `title` FROM `pparser` WHERE  `Ptitle`='$Ptitle', `Pdate`='$Pdate', `Pfulltext`='$Pfulltext' , `Pimg`='$Pimg'  ORDER BY `Pid` ");
    if (mysql_num_rows($result) <= 0) {
        $result = $mysqli->query("INSERT IGNORE INTO `pparser` (`Pid`,`Ptitle`, `Pdate`, `Pfulltext`, `Pimg`) VALUES ('$Pid','$Ptitle','$Pdate','$Pfulltext','$Pimg') ");
        return $result;
    } else {
        echo "Запись уже существует!";
    }
}

function getParsedArticles($limit, $Pid)
{
    global $mysqli;
    connectDB();
    if ($Pid)
        $where = "WHERE `Pid` = " . $Pid;
    $result = $mysqli->query("SELECT * FROM `pparser` $where ORDER BY `Pid` ASC LIMIT $limit");
    closeDB();
    if (!$id)
        return resultToArray($result);
    else
        return $result->fetch_assoc();
}


?>
























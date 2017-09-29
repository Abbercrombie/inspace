
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

function AddInfo($limit, $id)
{
    global $mysqli;
    connectDB();
    if ($id)
        $where = "WHERE `id` = " . $id;
    $result = $mysqli->query("SELECT * FROM  `users` ORDER BY  `users`.`infoaboutuser` DESC");
    closeDB();
    if (!$id)
        return resultToArray($result);
    else
        return $result->fetch_assoc();
}

function getNews($limit, $id)
{
    global $mysqli;
    connectDB();
    if ($id)
        $where = "WHERE `id` = " . $id;
    $result = $mysqli->query("SELECT * FROM `news` $where ORDER BY `id` DESC LIMIT $limit");
    closeDB();
    if (!$id)
        return resultToArray($result);
    else
        return $result->fetch_assoc();
}

function getUsers($limit, $id)
{
    global $mysqli;
    connectDB();
    if ($id)
        $where = "WHERE `id` = " . $id;
    $result = $mysqli->query("SELECT * FROM `users` $where ORDER BY `id` DESC LIMIT $limit");
    closeDB();
    if (!$id)
        return resultToArray($result);
    else
        return $result->fetch_assoc();
}


function banUser($id, $block)
{
    global $mysqli;
    connectDB();
    
    $result = $mysqli->query("UPDATE `users` SET `block`='1' WHERE `id`='$id'");
    
    closeDB();
    return $result;
    
}

function unbanUser($id, $block)
{
    global $mysqli;
    connectDB();
    
    $result = $mysqli->query("UPDATE `users` SET `block`='0' WHERE `id`='$id'");
    
    closeDB();
    return $result;
    
}


function getDailyNews($limit, $id)
{
    global $mysqli;
    connectDB();
    if ($id)
        $where = "WHERE `id` = " . $id;
    $result = $mysqli->query("SELECT * FROM `dailynews` $where ORDER BY `id` DESC LIMIT $limit");
    closeDB();
    if (!$id)
        return resultToArray($result);
    else
        return $result->fetch_assoc();
}

function resultToArray($result)
{
    $array = array();
    while (($row = $result->fetch_assoc()) != false)
        $array[] = $row;
    return $array;
    
}





function articles_all()
{
    //zapros
    $query  = "SELECT * FROM `news` $where ORDER BY `id` DESC";
    $result = mysqli_query($query);
    
    if (!result)
        die(mysqli_error());
    
    //izvlechenie iz bd
    $n    = mysqli_num_rows($result);
    $news = array();
    
    for ($i = 0; $i < $n; $i++) {
        $row    = mysqli_fetch_assoc($result);
        $news[] = $row;
    }
    return $news;
}
function addArticle($id, $title, $intro, $full)
{
    global $mysqli;
    connectDB();
    
    $result = $mysqli->query("INSERT INTO `news` (`id`,`title`, `intro`, `full`) VALUES ('$id','$title','$intro','$full') ");
    closeDB();
    return $result;
    
}

function addRightArticle($id, $title, $full)
{
    global $mysqli;
    connectDB();
    
    $result = $mysqli->query("INSERT INTO `dailynews` (`id`,`title`, `full`) VALUES ('$id','$title','$full') ");
    closeDB();
    return $result;
    
}

function editArticle($id, $title, $intro, $full)
{
    global $mysqli;
    connectDB();
    
    $result = $mysqli->query("UPDATE `news` SET `title`='$title', `intro`='$intro', `full`='$full' WHERE `id`='$id'");
    
    closeDB();
    return $result;
    
}

function editRightArticle($id, $title, $full)
{
    global $mysqli;
    connectDB();
    
    $result = $mysqli->query("UPDATE `dailynews` SET `title`='$title', `full`='$full' WHERE `id`='$id'");
    
    closeDB();
    return $result;
    
}


function delArticle($id)
{
    global $mysqli;
    connectDB();
    
    $result = $mysqli->query("DELETE FROM `news`  WHERE `id`='$id'");
    
    closeDB();
    return $result;
    
}

function delRightArticle($id)
{
    global $mysqli;
    connectDB();
    
    $result = $mysqli->query("DELETE FROM `dailynews`  WHERE `id`='$id'");
    
    closeDB();
    return $result;
    
}


function getInfoAboutUser($limit)
{
    global $mysqli;
    connectDB();
    if ($_SESSION['logged_user']->id)
        $where = "WHERE `id` = " . $_SESSION['logged_user']->id;
    $result = $mysqli->query("SELECT `infoaboutuser` FROM `users` $where ORDER BY `id` DESC LIMIT $limit");
    closeDB();
    if (!$id)
        return resultToArray($result);
    else
        return $result->fetch_assoc();
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


$addinfo   = AddInfo(10, $_GET["id"]);
$title     = $news["title"];
$news      = getNews(100, $_GET["id"]);
$users     = getUsers(100, $_GET["id"]);
$dailynews = getDailyNews(100, $_GET["id"]);
$infouser  = getInfoAboutUser(1);

?>
























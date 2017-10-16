<meta charset = 'utf-8'>
<?php
$url = 'https://api2.nrg-tk.ru/v2/cities?lang=ru';
$file = file_get_contents($url);
$jsonSite=json_decode($file);
echo '<pre>';
$list = $jsonSite->cityList;

for ($i=0;$i<302;$i++)
{
    $city = ($list[$i]->name);
    echo "Город: $city <br>";

    $countWarehouse = count($list[$i]->warehouses);
    echo "Кол-во отделений : $countWarehouse <br>";
    foreach ($list[$i] as $list2)
    {


        for ($r=0;$r<$countWarehouse;$r++)
        {
            $titleWarehouse = ($list2[$r]->title);
            if (!empty($titleWarehouse))
                echo "Название отделения № $r) : $titleWarehouse <br>";
            $adress = ($list2[$r]->address);
            if (!empty($adress))
                echo "Адресс отделения № $r: $adress <br>";
        }
    }




    foreach ($list[$i]->warehouses as $warehouses)
    {

        $worktimeBudnie = ($warehouses->workTime[0]);
        $worktimeBudnieFrom = ($worktimeBudnie->begin);
        $worktimeBudnieTo = ($worktimeBudnie->end);

        $worktimeSubbota = ($warehouses->workTime[5]);
        $worktimeSubbotaFrom = ($worktimeSubbota->begin);
        $worktimeSubbotaTo = ($worktimeSubbota->end);
        if (!empty($worktimeBudnieFrom and $worktimeBudnieTo and $worktimeSubbotaFrom and $worktimeSubbotaTo))
            $grafik = "График отделения  ПН-ПТ с $worktimeBudnieFrom до $worktimeBudnieTo , Суббота с $worktimeSubbotaFrom до $worktimeSubbotaTo <br> ";
        echo $grafik;
        //$phone = ($warehouses->phone);
        //if (!empty($phone))
        //echo "Телефон отделения № $r : $phone";
    }




    echo '<hr>';
}
echo '</pre>';
?>
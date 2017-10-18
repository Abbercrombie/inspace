<meta charset = 'utf-8'>
<?php
require_once 'functionsJsonParser.php';

function parser ()
{
    $email='';
    $subject='Error';
    $message='Parser is not working';
    $subject="=?utf-8?B?".base64_encode($subject)."?=";
    $headers = "From: abercrombie111@inspace.zzz.com.ua\r\nReply-to: $email\r\nContent type: text/plain; charset=utf-8\r\n";
    $url = 'https://api2.nrg-tk.ru/v2/cities?lang=ru';

    $file = file_get_contents($url);
    $jsonSite = json_decode($file);

    if (!empty($file))
    {
        echo '<pre>';
        $list = $jsonSite->cityList;
        $numOfCities = count($list);

        for ($i = 0; $i < $numOfCities; $i++)
        {

            if (!empty($list[$i]->defaultIdWare))
            {
                $city = ($list[$i]->name);
                echo "Город : $city <br>";
                $countWarehouse = count($list[$i]->warehouses);
                echo "Кол-во отделений : $countWarehouse <br>";

                foreach ($list[$i]->warehouses as $warehouses)
                {
                    $worktimeBudnie = ($warehouses->workTime[0]);
                    $worktimeBudnieFrom = ($worktimeBudnie->begin);
                    $worktimeBudnieTo = ($worktimeBudnie->end);
                    $worktimeSubbota = ($warehouses->workTime[5]);
                    $worktimeSubbotaFrom = ($worktimeSubbota->begin);
                    $worktimeSubbotaTo = ($worktimeSubbota->end);
                    $phone = strip_tags($warehouses->phone);
                    $titleWarehouse = strip_tags($warehouses->title);
                    $adress = strip_tags($warehouses->address);
                    $grafikBudnie = "<br> График отделения ПН-ПТ с $worktimeBudnieFrom до $worktimeBudnieTo <br>";
                    $grafikSubbota = " График отделения СБ    с $worktimeSubbotaFrom до $worktimeSubbotaTo <br> ";

                        if (!empty($titleWarehouse and $adress))
                            echo " <br> Отделение \"$titleWarehouse\" , Адресс : $adress  <br>";
                        if (!empty($worktimeBudnieFrom and $worktimeBudnieTo))
                            echo $grafikBudnie;
                        if (!empty($worktimeSubbotaFrom and $worktimeSubbotaTo))
                            echo $grafikSubbota;
                        if (!empty($phone))
                            echo "Телефон отделения : $phone <br><br>";

                        $grafik = strip_tags($grafikBudnie . $grafikSubbota);

                        addWarhouses($city, $titleWarehouse, $adress, $grafik, $phone);
                }
                echo '<hr>';
            }
        }
        echo '</pre>';
    }
    else
        mail("aabbercrombie@gmail.com",$subject,$message,$headers);
}

parser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        table{
            border-collapse: collapse;
        }
        table td{
            border:1px solid #ccc;
            padding:3px 9px;
        }
    </style>
</head>
<body>
<?php
$cal=[];

$month=(isset($_GET['m']))?$_GET['m']:date("n");
$year=(isset($_GET['y']))?$_GET['y']:date("Y");
echo "<hr>";
echo $_GET['y'];
echo "<hr>";

$nextMonth=$month+1;
if($month>12){
    $nextMonth=2;
    $month=1;
    $year=$year+1;
}
$prevMonth=$month-1;
if($month<1){
    $prevMonth=11;
    $month=12;
    $year=$year-1;
}



$firstDay=$year."-".$month."-1";
$firstDayWeek=date("N",strtotime($firstDay));
$monthDays=date("t",strtotime($firstDay));
$lastDay=$year.'-'.$month.'-'.$monthDays;
$spaceDays=$firstDayWeek-1;
$weeks=ceil(($monthDays+$spaceDays)/7);

for($i=0;$i<$spaceDays;$i++){
    $cal[]='';
}

for($i=0;$i<$monthDays;$i++){
    $cal[]=date("Y-m-d",strtotime("+$i days",strtotime($firstDay)));
}

/* echo "<pre>";
print_r($cal);
echo "</pre>"; */

echo "第一天".$firstDay."星期".$firstDayWeek;
echo "<br>";
echo "該月共".$monthDays."天,最後一天是".$lastDay;
echo "<br>";
echo "月曆天數共".($monthDays+$spaceDays)."天，".$weeks."周";

?>

<div style="display:flex;width:80%;justify-content:space-between;align-items:center">
    <a href="?y=<?=$year?>&m=<?=$prevMonth;?>">上一個月</a>
    <h1><?=$year;?> 年 <?=$month;?> 月份</h1>
    <a href="?y=<?=$year?>&m=<?=$nextMonth;?>">下一個月</a>
</div>

<table>
<?php
foreach($cal as $i => $day){
    if($i%7==0){
        echo "<tr>";
    }
        echo "<td>$day</td>";

    if($i%7==6){
        echo "</tr>";
    }
}

?>
<form action="./calendar.php" method="$_GET">
    <input type="text" name="y" value="<?=$year?>">
</form>

</table>
</body>
</html>
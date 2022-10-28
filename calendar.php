<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link rel="stylesheet" href="style.css">

    <style>
        * {
            margin: 0px;
            padding: 0px;
            text-align: center;
            justify-content: center;
            margin: 0 auto;
            background-repeat: no-repeat;
            /* background-position: center; */
            box-sizing: border-box;
            font-family: "標楷體";
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        table td {
            /* border: 1px solid #ccc; */
            padding: 3px 9px;
            height: 100px;
        }
        img{
            width: 250px;
            /* 圖片漸漸出現效果。 */
            
        }
        /* 這邊是class */
        .see1 {
            /* border: 2px double #000; */
            width: 50px;
            height: 600px;
            margin: 0px;
            border-radius: 20px 0PX 0PX 20PX;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
        }

        .see2 {
            /* border: 2px double #000; */
            width: 50px;
            height: 600px;
            margin: 0px;
            border-radius: 0px 20PX 20PX 0PX;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
        }

        /* 變大變小。 */
        .see1:hover {
            /* 變大1.05倍 */
            transform: scale(1.05);
            /* 變大時間0.3秒 */
            transition-duration: 0.3s;
            /* 更改透明度 */
            background-color: rgba(255, 255, 255, 0.7);
            display: flex;
            align-items: center;
        }

        .see2:hover {
            /* 變大1.05倍 */
            transform: scale(1.05);
            /* 變大時間0.3秒 */
            transition-duration: 0.3s;
            /* 更改透明度 */
            background-color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<?php
$cal = [];

$month = (isset($_GET['m'])) ? $_GET['m'] : date("n");
$year = (isset($_GET['y'])) ? $_GET['y'] : date("Y");
// echo "<hr>";
// echo $_GET['y'];
// echo "<hr>";
// 月份新增地區。
$nextMonth = $month + 1;
if ($month > 12) {
    $nextMonth = 2;
    $month = 1;
    $year = $year + 1;
}
$prevMonth = $month - 1;
if ($month < 1) {
    $prevMonth = 11;
    $month = 12;
    $year = $year - 1;
}
// 年份新增地區。
$nextYear = $year + 1;
$prevYear = $year - 1;



$firstDay = $year . "-" . $month . "-1";
$firstDayWeek = date("N", strtotime($firstDay));
$monthDays = date("t", strtotime($firstDay));
$lastDay = $year . '-' . $month . '-' . $monthDays;
$spaceDays = $firstDayWeek - 1;
$weeks = ceil(($monthDays + $spaceDays) / 7);

for ($i = 0; $i < $spaceDays; $i++) {
    $cal[] = '';
}

for ($i = 0; $i < $monthDays; $i++) {
    $cal[] = date("Y-m-d", strtotime("+$i days", strtotime($firstDay)));
}

/* echo "<pre>";
print_r($cal);
echo "</pre>"; */

// echo "第一天" . $firstDay . "星期" . $firstDayWeek;
// echo "<br>";
// echo "該月共" . $monthDays . "天,最後一天是" . $lastDay;
// echo "<br>";
// echo "月曆天數共" . ($monthDays + $spaceDays) . "天，" . $weeks . "周";

?>



<body>
    <div style="display:flex;width:80%;justify-content:space-between;align-items:center">
        <h1><?= $year; ?> 年 <?= $month; ?> 月份</h1>
    </div>
    <!-- <form action="./calendar.php" method="$_GET">
        <input type="text" name="y" value="<?= $year ?>">
    </form> -->
    <div class="monther<?= $month ?> monther" style="border-radius: 20px;">

        <div style="display:flex;">
            <a style="margin:0px;" href="?y=<?= $prevYear ?>&m=<?= $month; ?>">
                <div class="see1">
                    <p><年</p>
                </div>
            </a>
            <a style="margin: 0px;" href="?y=<?= $year ?>&m=<?= $prevMonth; ?>">
                <div class="see1">
                    <p><月</p>
                </div>
            </a>
            <img src="./perpetual_calendar/<?=$month?>-<?=$month?>.png" alt="">
            <table style="background-color:rgba(255,255,255,0.6);margin:0px;">
                <?php
                foreach ($cal as $i => $day) {
                    if ($i % 7 == 0) {
                        echo "<tr>";
                    }
                    echo "<td>$day</td>";

                    if ($i % 7 == 6) {
                        echo "</tr>";
                    }
                }

                ?>
            </table>
            <a style="margin:0px;" href="?y=<?= $year ?>&m=<?= $nextMonth; ?>">
                <div class="see2">
                    <p>月></p>
                </div>
            </a>
            <a style="margin:0px;" href="?y=<?= $nextYear ?>&m=<?= $month; ?>">
                <div class="see2">
                    <p>年></p>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
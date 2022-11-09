<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link rel="stylesheet"  href="style.css">

    <style>
        /* 宣告運用字體類型，掛載字體。 */
        @font-face {
            font-family: 'mushin';
            src: url(./font-f/mushin.otf);
        }

        * {
            margin: 0px;
            padding: 0px;
            text-align: center;
            justify-content: center;
            margin: 0 auto;
            background-repeat: no-repeat;
            /* background-position: center;  */
            box-sizing: border-box;
            font-family: "mushin";
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        td {
            /* border: 1px solid #ccc; */
            padding: 3px 9px;
            height: 100px;
            width: 120px;
        }

        /* 這邊是前面片的宣告。 */
        img {
            width: 250px;
            /* 圖片漸漸出現效果。 */
            /* 一開圖片透明度。 */
            opacity: 0.8;
            /* 設定名稱，讓電腦知道要改變。 */
            animation-name: example;
            /* 設定變換時間。 */
            animation-duration: 3s;
        }

        /* 宣告變換模式。 */
        @keyframes example {

            /* 宣告變換型態。 */
            from {
                opacity: 0;
            }

            to {
                opacity: 0.8;
            }

            ;
        }

        /* 這邊是class */
        /* 背景圖class宣告。 */
        .see1 {
            /* border: 2px double #000; */
            width: 50px;
            height: 700px;
            margin: 0px;
            border-radius: 20px 0PX 0PX 20PX;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;


        }

        .see2 {
            /* border: 2px double #000; */
            width: 50px;
            height: 700px;
            margin: 0px;
            border-radius: 0px 20PX 20PX 0PX;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;

        }

        .tooltiptext {
            /* 宣告物件為隱藏。 */
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;

            /* Position the tooltip */
            /* 宣告絕對位置。 */
            position: absolute;
            /* 宣告z軸位置。 */
            z-index: 1;
        }

        /* 測試字體會不會跳出來。 OK*/
        .see1:hover .tooltiptext {
            visibility: visible;

        }

        .see2:hover .tooltiptext {
            visibility: visible;

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

        /* 宣告今天的日期變色用的不透明度+0.1 */
        .today {
            background-color: rgba(255, 255, 255, 0.7)
        }

        /* 宣告六日為紅色透明。 */
        .offday {
            background-color: rgba(255, 50, 0, 0.1);
        }

        .daytexttop {
            text-align: left;
            /* 文字靠上對齊。 */
            vertical-align: text-top;
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
    $cal[] = date("d", strtotime("+$i days", strtotime($firstDay)));
    // 這邊要加入判斷今天的公式。
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
    <div class=" test ">12345</div>
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
                    <img src="./perpetual_calendar/rr.png" alt="" style="width: 50px;">
                    <p class="tooltiptext">
                        上一年
                    </p>
                </div>
            </a>
            <a style="margin: 0px;" href="?y=<?= $year ?>&m=<?= $prevMonth; ?>">
                <div class="see1">
                    <img src="./perpetual_calendar/r.png" alt="" style="width: 50px;">
                    <p class="tooltiptext">
                        上個月
                    </p>
                </div>
            </a>
            <img src="./perpetual_calendar/<?= $month ?>-<?= $month ?>.png" alt="">
            <table style="background-color:rgba(255,255,255,0.6);margin:0px;">
                <tr>
                    <td style="font-size:25px;">一</td>
                    <td style="font-size:25px;">二</td>
                    <td style="font-size:25px;">三</td>
                    <td style="font-size:25px;">四</td>
                    <td style="font-size:25px;">五</td>
                    <td style="font-size:25px;" class="offday">六</td>
                    <td style="font-size:25px;" class="offday">日</td>
                </tr>
                <?php
                foreach ($cal as $i => $day) {
                    if ($i % 7 == 0) {
                        echo "<tr class=daytexttop>";
                    }
                    // 宣告如果日期是今天，td的class不一樣。
                    if ("$year-$month-$day" == date("Y-m-d")) {
                        echo "<td class='today daytexttop'>$day</td>";
                    }
                    //  else if($i%7==5 || $i%7==6)
                    // {
                    // echo "<td class=offday>$day</td>";    
                    // }
                    else {
                        echo "<td class=daytexttop>$day</td>";
                    }
                    if ($i % 7 == 6) {
                        echo "</tr>";
                    }
                }

                ?>
            </table>
            <a style="margin:0px;" href="?y=<?= $year ?>&m=<?= $nextMonth; ?>">
                <div class="see2">
                    <img src="./perpetual_calendar/l.png" alt="" style="width: 50px;">
                    <p class="tooltiptext">下月個</p>
                </div>
            </a>
            <a style="margin:0px;" href="?y=<?= $nextYear ?>&m=<?= $month; ?>">
                <div class="see2">
                    <img src="./perpetual_calendar/ll.png" alt="" style="width: 50px ;z-index:1;">
                    <p class="tooltiptext">下一年</p>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
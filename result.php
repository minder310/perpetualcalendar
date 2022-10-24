<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>計算結果</title>
</head>
<body>
<?php
$height=$_GET['height'];
$weight=$_GET['weight'];

echo "身高為".$height."<br>";
echo "體重為".$weight."<br>";

$bmi=round($weight/(($height/100)*($height/100)),1);
echo $bmi;

if($bmi<18.5){
    $level="體重過輕";
}else if($bmi<24){
    $level="健康體位";
}else if($bmi<27){
    $level="過重";
}else if($bmi<30){
    $level="輕度肥胖";
}else if($bmi<35){
    $level="中度肥胖";
}else{
    $level="重度肥胖";
}

?>
<h3>你的BMI計算結果為:<?=$bmi;?></h3>
<div></div>
<div>你的體位判定為:<?=$level;?></div>

<a href="bmi.php">重新測量</a>

</body>
</html>
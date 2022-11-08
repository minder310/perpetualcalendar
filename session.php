<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session</title>
</head>
<body>
    <?php
    // 宣告使用session這樣資料才能互通。
    session_start();
    // 宣告session為，mark。
    $_SESSION['name']='MARK';
    // 輸出宣告陣列。
    echo $_SESSION['name'];
    ?>
    <!-- 連結到其他網站。 -->
    <a href="session_1.php">會員中心</a>
    <a href="session_2.php">個人資料</a>
    <?php
    print_r($_SESSION);
    
    for ($i=0;$i<20; $i++) { 
        // 本頁並沒有宣告，user是直接從server宣告，並建立二微陣列。
        $_SESSION['user'][]=$i.'-'.rand(1000,9999);
    }

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    // 這邊為自動橙橙的COOKIE用來給指定資料作使用。
    print_r($_COOKIE['PHPSESSID']);
    // 強制取用其他人的cookie並且加上時間，讓自己一直處於登陸狀態。
    setcookie('PHPSESSID','t4khkm9lcnnum50bfc9mh0bjei',time()+(60*60*24*365));
    ?>
    
    <!-- 在本業會產出一個自動的cookie叫做phpsessid它是用來回傳資料給伺服器用來看雨紀錄數值用的。 -->
</body>
</html>
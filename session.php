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
    <a href="session_01">會員中心</a>
    <a href="session_02">個人資料</a>
    <?php
    print_r($_SESSION);
    
    for ($i=0;$i<20; $i++) { 
        // 本頁並沒有宣告，user是直接從server宣告，並建立二微陣列。
        $_SESSION['user'][]=$i.'-'.rand(1000,9999);
    }

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    ?>

</body>
</html>
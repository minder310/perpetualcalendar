<?php
    // 要是cookie是空值，加入有效期限1年。
if (!isset($_COOKIE['times'])){
    // sectcookie("名稱","值(歡迎來網站幾次。)","有效期限(增加有效期限。)")
    setcookie('time',0,time()+(60*60*24*365));
}else{
    // 這段看不懂，不知道為什麼重複宣告為time。
    $time=$_COOKIE['time'];
    setcookie('time',$time,time()+(60*60*24*365));
}
print_r($_COOKIE['time']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登錄-session</title>
</head>
<body>
    <h1>會員登錄使用-session</h1>
    <?php
    // 宣告要使用session只要有用到的都必須宣告，資料才能互傳。
    session_start();
    // 當login為空值時。
    if(!isset($_SESSION['login'])){
        // 當error有數值時。
        if(isset($_GET['error'])){
            echo "<span style='color:red'>";
            //輸出error內的內容。
            echo $_GET['error'];
            echo "</span>";
        }
    ?>
    <!-- 連線至check2.php確認密碼 -->
    <form action="check2.php" method="post">
        <!-- 輸入帳號密碼 -->
        <div>帳號<input type="text" name="acc" id=""></div>
        <div>密碼<input type="text" name="pw" id=""></div>
        <!-- 設定登入建 -->
        <div><input type="submit" value="登入"></div>
    </form>
    <?php
    // 登陸成功顯示。
    }else{
        echo "登入成功";
        // 連線去回原中心，網址。
        echo "<a href='center.php'>會員中心</a> |";
        // 執行登出動作。
        echo "<a href='logout.php'>登出</a><br>";
        // 顯示cookie第幾次回來。
        echo "這是你第{$_COOKIE['times']}次回來";
    }
    ?>
</body>
</html>
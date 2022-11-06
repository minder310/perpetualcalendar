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
    // 宣告使用session;
    session_start();
    // 取用session資料"name"資料。
    echo $_SESSION['name'];
    echo "個人資料";
    ?>

</body>
</html>
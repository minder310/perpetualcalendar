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
    
    session_start();
    echo "hi";
    echo $_SESSION['name'];
    ?>
    <a href="session_2.php">個人資料</a>

</body>
</html>
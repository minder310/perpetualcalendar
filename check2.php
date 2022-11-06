<?php
// 宣告使用session資料。
session_start();

// 宣告正確的帳號密碼用以比對。
$users=[
    [
        "name"=>"mack",
        "pw"=>"1234",
        "level"=>"admin",
    ],
    [
        "name"=>"john",
        "pw"=>"5678",
        "level"=>"user",
    ],
    [
        "name"=>"mary",
        "pw"=>"1357",
        "level"=>"vip",
    ]
];
// 接收傳過來的帳號密碼。
$formAcc=$_POST['acc'];
$formPw=$_POST['pw'];

// 一開始宣告$chk=false;
$chk=false;
foreach($users as $user){
    if($user['name']==$formAcc && $user['pw']==$formPw){
        $chk=true;
        $_SESSION['login']=$user;
    }
}
// 這句話是$chk為真。
if($chk){
    // 取用cookie內的time並且+1
    $time=$_COOKIE['time']+1;
    // 宣告cookie內的time陣列，內的time=$time，並且時間+.年。
    setcookie('time',$time,time()+(60*60*24*365));
}else{
    $error="帳號密碼錯誤";
    // 測試回傳值，並且可不可以拿來用。
    $_COOKIE['test']=0;
    setcookie('test','0',time()+(60*60*24));
}
// 要是$error有值。
if(isset($error)){
    // 這邊的意思是導回頁面。但不太理解header
    header("location:login2.php?error=$error");
}else{
    header("location:login2.php");
}

?>
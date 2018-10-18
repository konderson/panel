<?php
session_start();
include ('bd.php');
if(isset($_POST['login']) && isset($_POST['password'])){
    $login=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
    //выбираем из базы логин и пароль для сравнения с результатами из формы"
    $query=mysql_query("SELECT * FROM users  WHERE  login='$login' ");

    $data=mysql_fetch_array($query);

    if(empty($data['login']))
    {
        die("Токого пользователя не существует");
    }
    if($password!=$data['password']){
        die('Введенный пароль не верный ');

    }

$_SESSION['login']=$data['login'];
    $_SESSION['id']=$data['id'];



    header("location: index.php");


}


?>

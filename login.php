<?php
session_start();
if(isset($_POST['login'])&& isset($_POST['password'])){

    include ('bd.php');


    $login=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));


    //выбираем из базы логин и пароль для сравнения с результатами из формы"
    $query=mysql_query("SELECT * FROM users  WHERE  login='$login' ");
echo $login;
    $data=mysql_fetch_array($query);

echo $data['login'];
echo $data['password'];
    if(empty($data['login']))
    {
        die("Токого пользователя не существует");
    }
    if($password!=$data['password']){
        die('Введенный пароль не верный ');

    }

    $_SESSION['login']=$data=['login'];
    $_SESSION['id']=$data['id'];
    header("location: index.php");

}
?>
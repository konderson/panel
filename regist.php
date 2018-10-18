<?php
if(isset($_POST['login']) && isset($_POST['password']))
    $login=htmlspecialchars(trim($_POST['login']));
$password=htmlspecialchars(trim($_POST['password']));
$fio=htmlspecialchars(trim($_POST['fio']));
$email=htmlspecialchars(trim($_POST['email']));
$country=htmlspecialchars(trim($_POST['country']));



if($fio==''  or $login=='' or $country=='' or $password=="" or $mail='')
{

    die('Заполните все поля !');

}
//проверка на уникальноть login в бд
include ('bd.php');
$res=mysql_query("SELECT login FROM `users` WHERE login='$login'");
$data=mysql_fetch_array($res);


if(!empty($data['login'])){
    die("Такой логин уже существует.$login.");
}
if(strlen($password)<=7){
    die("длина пароля не может быть меньше 7 символов !");
}

$query="INSERT INTO `users` (`login`,`password`,`fio`,`email`,`country`) VALUES('$login','$password','$fio','$email','$country') ";
$result=mysql_query($query);
if($result==true) {
    echo '  echo "Вы успешно зарегистрированы! <br><a href=\'index.php\'>На главную</a>"';
}
else{
    echo "Ошибка регистрации! <br><a href='index.php'>На главную</a>";
    echo "Error! ----> ". mysql_error();
}
?>


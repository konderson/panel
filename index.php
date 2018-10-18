<?php
session_start();
?>
<?php
include ('header.php');

if (!isset($_SESSION['login'])|| !isset($_SESSION['ssesion_id'])) {


    ?>

    <section class="foms">
        <div class="form_position">
            <form action="regist.php" method="post">
                <label class="labels">Фио</label>
                <input type="text" name="fio"/>
                <label>Login</label>
                <input type="text" name="login"/>
                <label>Пароль</label>
                <input type="password" name="password"/>
                <label>Email</label>
                <input type="email" name="email"/>
                <label>Странна</label>
                <input type="text" name="country"/>
                <input type="submit" value="Зарегистрироваться">

            </form>


        </div>
        <div class="form_position">

            <form action="testS.php" method="post">
                <label>Login</label>
                <input type="text" name="login"/>
                <label>Пароль</label>
                <input type="password" name="password"/>
                <input type="submit" value="Вход">

            </form>

        </div>

    </section>

    <?php
}



if (isset($_SESSION['login']) or isset($_SESSION['id'])){
include ('bd.php');
    $user=$_SESSION['login'];
    $resolt=mysql_query("SELECT * FROM users where login='$user'");
    $user_data=mysql_fetch_array($resolt);

    echo "<section class='form_position'>";
    echo "ваш логин <b>".$user_data['login'].'</b><br/>';
    echo "Ваше ФИО <b>".$user_data['fio'].'</b><br/>';
    echo "Ваша страна <b>".$user_data['country'].'</b><br/>';
    echo "<a href='ext.php'>Выход</a>";
    include("chat.php");
    echo  "<section/>";





}
?>

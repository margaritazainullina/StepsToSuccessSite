<?php
# Соединямся с БД 
include 'connection.php';
$id_connect = new PDO("mysql: host=$host; dbname=$dbname", $login, $password);

if (isset($_POST['submit'])) {
    $err = array();
# проверям логин 
    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
        $err[] = "Only leters and numbers are allowed";
    }
    if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Login length should be between 3 and 30";
    }
# проверяем, не сущестует ли пользователя с таким именем 
    $query = "SELECT COUNT(user_id) FROM users WHERE user_login='" . mysql_real_escape_string($_POST['login']) . "'";
    run_query($id_connect, $query);
    if (mysql_result($query, 0) > 0) {
        $err[] = "There is already the same login";
    }
# Если нет ошибок, то добавляем в БД нового пользователя 
    if (count($err) == 0) {
        $login = $_POST['login'];
# Убераем лишние пробелы и делаем двойное шифрование 
        $password = md5(md5(trim($_POST['password'])));
        $query = "INSERT INTO users SET user_login='" . $login . "', user_password='" . $password . "'";
        run_query($id_connect, $query);
        header("Location: login.php");
        exit();
    } else {
        print "<b>When registering the following errors occurred:</b><br>";
        foreach ($err AS $error) {
            print $error . "<br>";
        }
    }
}
?>  
<form method="POST"> Login <input name="login" type="text">
    <br> Password <input name="password" type="password"><br> 
    <input name="submit" type="submit" value="Register"> 
</form>
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
    if (strlen($_POST['password']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Password length should be between 3 and 30";
    }
# проверяем, не сущестует ли пользователя с таким именем 
    $query = "SELECT COUNT(user_id) FROM users WHERE user_login='" . $_POST['login'] . "'";
    $userdata = run_query($id_connect, $query);
    foreach ($userdata as $l)
        $err[] = "There is already the same login";

# Если нет ошибок, то добавляем в БД нового пользователя 
    if (count($err) == 0) {
        $login = $_POST['login'];
# Убираем лишние пробелы и делаем двойное шифрование 
        $password = md5(md5(trim($_POST['password'])));
        $query = "INSERT INTO users SET user_login='" . $login . "', email='" . $_POST['email'] . "', user_password='" . $password . "'" . "', role_id=2";
        run_query($id_connect, $query);
        header("Location: index.php");
        exit();
    } else {
        print "<b>When registering the following errors occurred:</b><br>";
        foreach ($err AS $error) {
            print $error . "<br>";
        }
    }
}
?>  
<html>
    <head>
        <link rel="stylesheet" href="style/main.css">
    </head>
    <body>
        <div class="wrapper">
            <img src="style/logo.jpg" style="
                 float: right;
                 margin-right: 30;
                 ">

            <?php
            include './template/menu.php';
            ?> 
            <div class="content"> 
                <form method="POST"> 
                    <table>
                        <tr><td>Login</td><td> <input name="login" type="text"></td>
                        </tr>
                        <tr><td>E-mail</td><td> <input name="email" type="email"></td>
                        </tr>
                        <tr><td>Password</td><td> <input name="password" type="password"></td>
                        </tr>
                        <tr><td colspan="2"><input name="submit" type="submit" value="Register"> </td></tr>
                    </table>
                </form>
            </div>
            <?php
            include './template/footer.php';
            ?> 
        </div>
    </body>
</html>
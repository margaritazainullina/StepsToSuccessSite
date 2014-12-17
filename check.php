<?php

# Соединямся с БД
include 'connection.php';
$id_connect = new PDO("mysql: host=$host; dbname=$dbname; charset=utf8", $login, $password);
# Функция для генерации случайной строки

function generateCode($length = 6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0, $clen)];
    }
    return $code;
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit']) && $_POST['submit'] == "Exit") {
    $_SESSION['authorised'] = false;
    session_write_close();
}

if (!$_SESSION['authorised']) {
    if (isset($_POST['submit']) && $_POST['submit'] == "Login") {
        $query = "SELECT user_id, user_password, user_ip, role_id FROM users WHERE user_login='" . $_POST['login'] . "' LIMIT 1";
        $userdata = run_query($id_connect, $query);

        if ($_POST['login'] == '')
            include './login.php';
        else
        if ($userdata == null) {
            print "Пользователя с таким логином не существует";
            include './login.php';
        } else {
            foreach ($userdata as $l) {
                $user_password = $l["user_password"];
//$user_hash = generateCode($user_password);
                $user_id = $l["user_id"];
                $user_ip = $l["user_ip"];
                $user_role = $l["role_id"];

# Сравниваем пароли
                if ($user_password === md5(md5($_POST['password']))) {
# Генерируем случайное число и шифруем его
                    $hash = md5(generateCode(10));

                    if (!@$_POST['not_attach_ip']) {
# Если пользователя выбрал привязку к IP
# Переводим IP в строку
                        $insip = ", user_ip=INET_ATON('" . $_SERVER['REMOTE_ADDR'] . "')";
                    }

# Записываем в БД новый хеш авторизации и IP
                    $query = "UPDATE users SET user_hash='" . $hash . "' " . $insip . " WHERE user_id='" . $user_id . "'";
                    $userdata = run_query($id_connect, $query);

# Ставим куки
                    setcookie("id", $user_id, time() + 60 * 60 * 24 * 30);
                    setcookie("hash", $hash, time() + 60 * 60 * 24 * 30);

                    $_SESSION['id'] = $user_id;
                    $_SESSION['username'] = $_POST['login'];
                    $_SESSION['role'] = $user_role;
                    $_SESSION['authorised'] = true;

                    print'<div class="authorisation">';
                    print "Hello, " . $_POST['login'] . '!';
                    if ($user_role == 1)
                        print '<a href="admin.php">Admin</a>';
                    print '<form method="POST"> <input name="submit" type="submit" value="Exit"> </form></div>';
                } else {
                    print "Вы ввели неправильный логин/пароль";
                    include './login.php';
                }
            }
        }
    } else
        include './login.php';
}
else {
    print "Hello, " . $_SESSION['username'] . '!';
    if ($_SESSION['role'] == 1)
        print '<a href="admin.php">Admin</a>';
    print '<form method="POST"> <input name="submit" type="submit" value="Exit"> </form></div>';
}
?>
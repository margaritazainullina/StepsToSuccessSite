<?php
# Connect to the database 
include 'connection.php';
$id_connect = new PDO("mysql: host=$host; dbname=$dbname", $login, $password);

// Страница авторизации
# Функция для генерации случайной строки
function generateCode($length = 6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0, $clen)];
    }
    return $code;
}

if (isset($_POST['submit'])) {
    # Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = "SELECT user_id, user_password FROM users WHERE user_login='" . ($_POST['login']) . "' LIMIT 1";
    run_query($id_connect, $query);
    $data = run_query($id_connect, $query);
    foreach ($data as $l) {
        $user_password = $l["user_password"];
        $user_id = $l["user_id"];
    }
    echo '---' . $user_password . '---';
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
        run_query($id_connect, $query);

        # Ставим куки
        setcookie("id", $user_id, time() + 60 * 60 * 24 * 30);
        setcookie("hash", $hash, time() + 60 * 60 * 24 * 30);

        # Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php");
        exit();
    } else {
        print "Username/password is incorrect";
    }
}
?>

<form method="POST">
    Username <input name="login" type="text"><br>
    Password <input name="password" type="password"><br>
    Don't link to IP(not safe) <input type="checkbox" name="not_attach_ip"><br>
    <input name="submit" type="submit" value="Login">
</form>

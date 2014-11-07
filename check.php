<?php

# Соединямся с БД
include 'connection.php';
$id_connect = new PDO("mysql: host=$host; dbname=$dbname", $login, $password);

if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
    $query = "SELECT *,INET_NTOA(user_ip) FROM users WHERE user_id = '" . intval($_COOKIE['id']) . "' LIMIT 1";
    $userdata = run_query($id_connect, $query);
    foreach ($userdata as $l) {
        $user_hash = $l["user_hash"]; 
        $user_login = $l["user_login"];
        $user_id = $l["user_id"];
        $user_ip = $l["user_ip"];
    }

    if ((($user_hash !== $_COOKIE['hash']) or ( $user_id !== $_COOKIE['id'])
            or ( $user_ip !== $_SERVER['REMOTE_ADDR']) and ( $user_ip !== "0"))) {

        setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");

        setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/");

        print "Something's wrong";
    } else {

        print "Hello, " . $user_login . ". All's working!";
    }
} else {

    print "Enable cookie in your browser";
}
?>
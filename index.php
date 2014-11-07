<?php
# Connect to the database 
include 'connection.php';
$id_connect = new PDO("mysql: host=$host; dbname=$dbname", $login, $password);

if (isset($_POST ['submit'])) {
    $err = array();
# Check login 
    if (!preg_match("/[a-zA-Z0-9_]+/", $_POST ['login'])) {
        $err [] = "Username can contain only English letters and numbers";
    }
    if (strlen($_POST ['login']) < 3 or strlen($_POST ['login']) > 30) {
        $err [] = "Username must be at least 3 characters and no more than 30";
    }
# Check to see if an existing member of the user with the same name 
    $query = "SELECT COUNT (user_id) FROM users WHERE user_login = '" . mysql_real_escape_string($_POST [' login ']) . "'";
    if (run_query($id_connect, $query) > 0) {
        $err [] = "A user with this login already exists in the database";
    }  # If there are no errors, then add a new user to the database 
    if (count($err) == 0) {
        $login = $_POST ['login'];
# Uberall extra spaces and make double encryption 
        $password = md5(md5(trim($_POST ['password'])));
        $query = "INSERT INTO users SET user_login = '" . $login . "', user_password = '" . $password . "'";
        run_query($id_connect, $query);
        header("Location: login.php");
        exit();
    } else {
        print "<b> When registering the following errors occurred: </ b> <br>";
        foreach ($err AS $error) {
            print $error . "<br>";
        }
    }
}
?> 
<form method = "POST"> 
    Username <input name = "login" type = "text"> <br> 
    Password <input name = "password" type = "password"> <br> 
    <input name = "submit" type = "submit" value = "Register"> 
    </ form>
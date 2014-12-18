<?php
# Connect to the database 
$id_connect = new PDO("mysql: host=$host; dbname=$dbname; charset=utf8", $login, $password);
?>
<form method="POST" class="loginform"> 
    <table>
        <tr><td><?php print $langArray['LOGIN_USERNAME'] ?></td> <td><input name = "login" type = "text"></td>
        </tr>
        <tr><td><?php print $langArray['LOGIN_PASSWORD'] ?> </td><td><input name="password" type="password"></td>
        </tr>
        </tr>
        <tr><td><input name="submit" type="submit" value="Login"> </td><td><a href="register.php"><?php print $langArray['LOGIN_REGISTER'] ?></a> </td></tr>
    </table>
</form>

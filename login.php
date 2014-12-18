<?php
# Connect to the database 
$id_connect = new PDO("mysql: host=$host; dbname=$dbname", $login, $password);
?>
<form method="POST" class="loginform"> 
    <table>
        <tr><td><?php print $langArray['LOGIN_USERNAME'] ?></td> <td><input name = "login" type = "text"></td>
        </tr>
        <tr><td><?php print $langArray['LOGIN_PASSWORD'] ?> </td><td><input name="password" type="password"></td>
        </tr>
        <tr><td>Don't link to IP(not safe) </td><td><input type="checkbox" name="not_attach_ip"></td>
        </tr>
        <tr><td><input name="submit" type="submit" value="Login"> </td><td><a href="register.php"><?php print $langArray['LOGIN_REGISTER'] ?></a> </td></tr>
    </table>
</form>

<?php
# Connect to the database 
$id_connect = new PDO("mysql: host=$host; dbname=$dbname", $login, $password);


?>
<form method="POST"> 
    <table>
        <tr><td>Username</td> <td><input name = "login" type = "text"></td>
        </tr>
        <tr><td>Password </td><td><input name="password" type="password"></td>
        </tr>
        <tr><td>Don't link to IP(not safe) </td><td><input type="checkbox" name="not_attach_ip"></td>
        </tr>
        <tr><td><input name="submit" type="submit" value="Login"> </td><td><a href="register.php">Register</a> </td></tr>
    </table>
</form>

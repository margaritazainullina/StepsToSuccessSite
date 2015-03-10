<?php
$host = "localhost";
$login = "adminpqT6rmn";//"root";
$password = "rcWcsRLRgYiz";//"";
$dbname = "db_sts_site";

function run_query($connection, $command) {
    try {
        $result = $connection->query($command);
    } catch (PDOException $erreur) {
        echo '<p color="red">error: "</p>' . $erreur->getMessage() . '</p>';
    }
    return $result;
}
?>
    
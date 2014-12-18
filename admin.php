<?php
session_start();
if (!(isset($_SERVER['HTTP_REFERER']) || ( $_SESSION['authorised'] == true ) || ($_SESSION['role'] == 1))) {
    header('HTTP/1.1 403 Forbidden');
    header("Location: error.php");
}
?>
<html>
    <head>
         <title> Управление контентом </title>
        <link rel="stylesheet" href="style/main.css">
    </head>
    <body> 
        <div class="wrapper">
            <img src="style/header.png" style="width: 100%;">

            <?php
            include './template/menu.php';
            ?> 

            <span class="line"></span>
            <?php
            include './check.php';
            
            $id_connect = new PDO("mysql: host=$host; dbname=$dbname", $login, $password);

            //publishing
            if (isset($_POST['publication_type'])) {

                switch ($_POST['publication_type']) {
                    case "news":
                        header("Location: addNews.php");
                        break;
                    case "photo":
                        header("Location: addPhoto.php");
                        break;
                }
            }
            ?>
            <div class="content"> 
                <?php print $langArray['ADD'] ?>
                <form method="post" action="admin.php">
                    <select name="publication_type"> 
                        <option value="" selected="selected"></option>
                        <option value="news"><?php print $langArray['NEWS'] ?></option>
                        <option value="photo"><?php print $langArray['PHOTO'] ?></option>
                    </select>
                    <INPUT TYPE="submit" name="submit" value="OK"/>
                </form>
            </div>
        </div>  
        <?php
        include './template/footer.php';
        ?>   


    </body>
</html>
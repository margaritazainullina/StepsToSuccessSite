<?php
session_start();
if (!(isset($_SERVER['HTTP_REFERER']) || ( $_SESSION['authorised'] == true ) || ($_SESSION['role'] == 1))) {
    header('HTTP/1.1 403 Forbidden');
    header("Location: error.php");
}
?>
<html>
    <head>
        <title>Управление контентом</title>
        <link rel="stylesheet" href="style/main.css">
        <link rel="stylesheet" href="style/menu.css">
        <meta charset="UTF-8">
    </head>
    <body> 
        <div class="wrapper">
            <img src="style/header.png" style="width: 100%;">
            <?php
            include './template/menu.php';
            print '<span class="line"></span>';
            include './check.php';
            ?> 

            <span class="line"></span>   
            <?php
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
                <div class="registration"> 
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
        </div>
        <footer>
            <img src="style/logo_2.png" class="logo_2"><br>
            <img src="style/logo_1.jpg"  class="logo_1"><br>
            <?php
            include './template/footer.php';
            ?>
        </footer>
    </body>
</html>
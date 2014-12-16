
<html>
    <head>
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
            ?>             

            <div class="content"> 
                Добавить
                <form method="post" action="admin.php">
                    <select name="publication_type"> 
                        <option value="" selected="selected"></option>
                        <option value="news">Новость</option>
                        <option value="photo">Фото в галерею</option>
                    </select>
                    <INPUT TYPE="submit" name="submit" />
                </form>
            </div>
        </div>  
        <?php
        include './template/footer.php';
        ?>   

        <?php
        // include 'connection.php';
        $id_connect = new PDO("mysql: host=$host; dbname=$dbname", $login, $password);

        //publishing
        if (isset($_POST['submit'])) {

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
    </body>
</html>
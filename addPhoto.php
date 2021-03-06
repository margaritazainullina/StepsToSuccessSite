<html>
    <head>
        <title>Добавить фотографию</title>
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
            <div class="content">   
                <div class="addContentForm">              
                    <form action="addPhoto.php" method="post" enctype="multipart/form-data">
                        <table> 
                            <tr><td><?php print $langArray['DESC_RUS'] ?></td> <td><textarea type="text" name="header_rus" cols="40" rows="2"></textarea></td>
                                <td><?php print $langArray['DESC_FR'] ?> </td> <td><textarea type="text" name="header_fr" cols="40" rows="2"></textarea></td></tr>
                            <tr><td><?php print $langArray['SEL_IMG'] ?></td>
                                <td><input type="file" name="fileToUpload" id="fileToUpload"></td></tr>
                            <tr><td><input type="submit" name="publish_news" value="OK"></td></tr>
                        </table>
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

            <?php
            // include 'connection.php';
            $id_connect = new PDO("mysql: host=$host; dbname=$dbname; charset=utf8", $login, $password);

            if (isset($_POST['publish_news'])) {
                //image upload
                $uploads_dir = './media/gallery/';
                $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
                $name = $_FILES["fileToUpload"]["name"];
                move_uploaded_file($tmp_name, "$uploads_dir/$name");


                $date = date('Y-m-d h:i:s', time());

                $query = "SELECT MAX(id) FROM gallery";
                $userdata = run_query($id_connect, $query);
                $id = 0;
                foreach ($userdata as $l)
                    $id = $l['MAX(id)'] + 1;

                $filename = $uploads_dir . $name;

                $descRus = '<p>' . $_POST['header_rus'] . '</p>';
                $descFr = '<p>' . $_POST['header_fr'] . '</p>';
                $query = "INSERT INTO gallery VALUES(" . $id . ", '" . $descRus .
                        "','" . $descFr . "','" . $filename . "')";
                $userdata = run_query($id_connect, $query);
                header("Location: added.php");
            }
            ?>
            </body>
            </html>
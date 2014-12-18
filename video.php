<html>
    <head>
        <title>Видео</title>
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
                <article> 
                    <?php
                    $stmt = $id_connect->prepare('SELECT * FROM news where name ="video"');
                    $stmt->execute();
                    $iterator = new IteratorIterator($stmt);

                    foreach ($iterator as $row) {
                        if ($lang == 'rus') {
                            print $row['text_rus'];
                        } else
                            print $row['text_fr'];
                    }
                    ?>
                    <div class="video">
                        <video width="600" height="400" controls>
                            <source src="media/video/Video1.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video></div>
                    <div class="video"><video width="600" height="400" controls>
                            <source src="media/video/Video2.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video></div>
                    <div class="video"> <video width="600" height="400a" controls>
                            <source src="media/video/Video3.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video></div>
                    <div class="video"> <video width="600" height="400" controls>
                            <source src="media/video/Video4.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video></div>
                </article>
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
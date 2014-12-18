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
                    $query = 'SELECT * FROM news where name ="video"';
                    $userdata = run_query($id_connect, $query);

                    if (!isset($_COOKIE['lang'])) {
                        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
                    } else
                        $lang = $_COOKIE['lang'];
                    if($lang=='rus'){
                    // Display the results
                    foreach ($userdata as $row) {
                        print $row['text_rus'];
                    }}
                    else{
                      foreach ($userdata as $row) {
                        print $row['text_rus'];
                    }  
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
            <img src="style/logo_2.png" style="
                 width: 150px;  
                 float: left;
                 margin: 0 50px; "><br>
            <img src="style/logo_1.jpg" style="
                 width: 150px;  
                 float: right;
                 margin:0 50px;"><br>
            <?php
            include './template/footer.php';
            ?>
        </footer>
    </body>
</html>
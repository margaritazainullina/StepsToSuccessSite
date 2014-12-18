<html>
    <head>
        <title>Контакты</title>
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
                   <?php
                $query = 'SELECT * FROM news where name ="contacts"';
                $userdata = run_query($id_connect, $query);

                if (!isset($_COOKIE['lang'])) {
                    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
                } else
                    $lang = $_COOKIE['lang'];
                // Display the results
                foreach ($userdata as $row) {
                    $t = 'text_' . $lang;
                    print '<article>' . $row[$t] .
                            '</article>';
                }
                ?> 
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
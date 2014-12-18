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
                $stmt = $id_connect->prepare('SELECT * FROM news where name ="contacts"');
                $stmt->execute();
                $iterator = new IteratorIterator($stmt);

                foreach ($iterator as $row) {

                    $t = 'text_' . $lang;
                    print '<article>' . $row[$t] .
                            '</article>';
                }
                ?> 


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
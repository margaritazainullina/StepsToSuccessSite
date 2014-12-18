<html>
    <head>
        <title>Новости</title>
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
                $query = 'SELECT * FROM news where name ="about"';
                $userdata = run_query($id_connect, $query);

                $stmt = $id_connect->prepare(' SELECT * FROM news where name ="about" ');
                $stmt->execute();
                $iterator = new IteratorIterator($stmt);

                // Display the results
                foreach ($iterator as $row) {
                    if ($lang == 'rus') {
                        print '<article>' . $row['text_rus'] . '</article>';
                    } else {
                        print '<article>' . $row['text_fr'] . '</article>';
                    }
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
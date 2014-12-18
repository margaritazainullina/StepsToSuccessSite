<html>
    <head>
        <title>Галерея</title>
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
                $query = 'SELECT * FROM gallery';
                $userdata = run_query($id_connect, $query);

                if (!isset($_COOKIE['lang'])) {
                    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
                } else
                    $lang = $_COOKIE['lang'];
                $i = 0;
                print '<table>';
                foreach ($userdata as $row) {
                    if($i%2==0) print '<tr>';
                    print '
                    <td><img src="' . $row['ref'] . '"/>
                    <p style="text-align: center;">' . $row['desc_' . $lang] . '</p> </td>';
                    if($i%2) print '</tr>';
                    $i++;
                }
                print '</table>';
                ?> </article>
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
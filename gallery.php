<html>
    <head>
        <link rel="stylesheet" href="style/main.css">
    </head>
    <body> 
        <div class="wrapper">
            <img src="style/header.png" style="width: 100%;">
            <?php
            include './Language.php';
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); //Detecting Default Browser language
            $language = New Language($lang);
            $langArray = array();
            $langArray = $language->userLanguage();

            include './template/menu.php';
            include './check.php';
            ?> 

            <span class="line"></span>    
            <div class="content"> 
                <span class="line"></span>
                <?php
                $query = 'SELECT * FROM gallery';
                $userdata = run_query($id_connect, $query);

                if (!isset($_COOKIE['lang'])) {
                    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
                } else
                    $lang = $_COOKIE['lang'];
                // Display the results
                foreach ($userdata as $row) {
                    print '<article>
                    <img src="' . $row['ref'] . '"/>
                    <p>' . $row['desc_' . $lang] . '</p>
                </article>';
                }
                ?> 
            </div>
            <?php
            include './template/footer.php';
            ?>   
        </div> 
    </body>
</html>
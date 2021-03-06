<html>
    <head>
        <title>Steps to success</title>
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
                if ($lang == 'rus') {
                    print '<img src="style/main_r.jpg" alt="Main logo"/>';
                } else {
                    print '<img src="style/main_1.jpg" alt="Main logo"/>';
                }
                
                try {

                    // Find out how many items are in the table
                    $total = $id_connect->query(' SELECT COUNT(*) FROM news where name="" ')->fetchColumn();

                    // How many items to list per page
                    $limit = 4;

                    // How many pages will there be
                    $pages = ceil($total / $limit);

                    // What page are we currently on?
                    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                        'options' => array(
                            'default' => 1,
                            'min_range' => 1,
                        ),
                    )));

                    // Calculate the offset for the query
                    $offset = ($page - 1) * $limit;

                    // Some information to display to the user
                    $start = $offset + 1;
                    $end = min(($offset + $limit), $total);

                    // The "back" link
                    $prevlink = ($page > 1) ? '<a href="?page=1" title="' . $langArray['MENU_FIRST'] .
                            '">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="' . $langArray['MENU_PREV'] . ''
                            . '">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

                    // The "forward" link
                    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="' . $langArray['MENU_NEXT'] . '">&rsaquo;</a> <a href="?page=' . $pages . '" title="' . $langArray['MENU_LAST'] . '">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
                    // Prepare the paged query
                    $stmt = $id_connect->prepare('SELECT * FROM news where name="" ORDER BY id desc LIMIT :limit OFFSET :offset');

                    // Bind the query params
                    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                    $stmt->execute();

                    // Do we have any results?
                    if ($stmt->rowCount() > 0) {
                        // Define how we want to fetch the results
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $iterator = new IteratorIterator($stmt);

                        // Display the results
                        foreach ($iterator as $row) {
                            if ($lang == 'rus') {
                                print '<article>
                    <p>' . $row['text_rus'] . '</p>
                    <div class="datetime">' . $row['date'] . '</div>
                            </article>';
                            } else {
                                print '<article>
                    <p>' . $row['text_fr'] . '</p>
                    <div class="datetime">' . $row['date'] . '</div>
                            </article>';
                            }
                        }
                        // Display the paging information
                        echo '<span class="line"></span>';
                        //« ‹ Page 1 of 4 pages, displaying 1-7 of 24 results › »
                        echo '<div id="paging"><p>', $prevlink, $langArray['MENU_1'], $page, $langArray['MENU_2'], $pages, $nextlink, ' </p></div>';
                        echo '<span class="line"></span>';
                    } 
                } catch (Exception $e) {
                    echo '<p>', $e->getMessage(), '</p>';
                }
                ?> 
            </div></div>
        <footer>
            <img src = "style/logo_2.png" style = "
                 width: 150px;  
                 float: left;
                 margin: 0 50px; "><br>
            <img src = "style/logo_1.jpg" style = "
                 width: 150px;  
                 float: right;
                 margin:0 50px;"><br>
            <?php
            include './template/footer.php';
            ?>
        </footer>
    </body>
</html>
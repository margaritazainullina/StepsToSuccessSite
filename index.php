<html>
    <head>
        <link rel="stylesheet" href="style/main.css">
    </head>
    <body> 
        <div class="wrapper">
            <img src="style/header.png" style="width: 100%;">

            <?php
            include './template/menu.php';
            include './check.php';
            ?> 

            <span class="line"></span>    
            <div class="content"> 
                <span class="line"></span>
                <?php
                try {

                    // Find out how many items are in the table
                    $total = $id_connect->query('
        SELECT
            COUNT(*)
        FROM
            news
    ')->fetchColumn();

                    // How many items to list per page
                    $limit = 7;

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
                    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

                    // The "forward" link
                    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
                    // Prepare the paged query
                    $stmt = $id_connect->prepare('SELECT * FROM news ORDER BY id desc LIMIT :limit OFFSET :offset');

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
                            print '<article>
                    <p>' . $row['text_rus'] . '</p>
                    <div class="datetime">' . $row['date'] . '</div>
                </article>';
                        }

                        // Display the paging information
                        echo '<span class="line"></span>';
                        echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';
                        echo '<span class="line"></span>';
                    } else {
                        echo '<p>No results could be displayed.</p>';
                    }
                } catch (Exception $e) {
                    echo '<p>', $e->getMessage(), '</p>';
                }
                ?> 
            </div>
            <?php
            include './template/footer.php';
            ?>   
        </div> 
    </body>
</html>
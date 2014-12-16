<html>
    <head>
        <link rel="stylesheet" href="style/main.css">
    </head>
    <body> 
        <div class="wrapper">
            <img src="style/header.png" style="width: 100%;">

            <?php
            include './template/menu.php';
            ?> 

                <span class="line"></span>
                <?php
                include './check.php';
                ?>             

            <div class="content"> 
                <span class="line"></span>
                <article>
                    <h2>О нашей комманде</h2>
                    <p>Наша скромная комманда по созданию игры насчитывает 3 программистов, и 2 дизайнеров.<br>
                        Руководитель проекта: <a href="https://vk.com/tfilonenko">Филоненко Татьяна</a><br>
                        Программисты:  <a href="https://vk.com/id137099226">Зайнуллина Маргарита</a>,<a href="https://vk.com/agumon">Кононенко Данил</a>.<br>
                        С дезигнерами вообще хз что.<br>
                        Будем рады любым отзывам и предложениям =)<br>
                        А сайт сделали студенты 1 курса французской программы 
                        <a href="https://vk.com/id137099226">Зайнуллина Маргарита</a> и 
                        <a href="https://vk.com/id82487045"> Лена Овсийчук </a>.
                    </p>
                    <div class="datetime">00:18 15.12.2014</div>
                </article>

                <article>
                    <h2>О нашей комманде</h2>
                    <p>Наша скромная комманда по созданию игры насчитывает 3 программистов, и 2 дизайнеров.<br>
                        Руководитель проекта: <a class="contact" href="https://vk.com/tfilonenko">Филоненко Татьяна</a><br>
                        Программисты:  <a class="contact" href="https://vk.com/id137099226">Зайнуллина Маргарита</a>,<a href="https://vk.com/agumon">Кононенко Данил</a>.<br>
                        С дезигнерами вообще хз что.<br>
                        Будем рады любым отзывам и предложениям =)<br>
                        А сайт сделали студенты 1 курса французской программы 
                        <a class="contact" href="https://vk.com/id137099226">Зайнуллина Маргарита</a> и 
                        <a class="contact" href="https://vk.com/id82487045"> Лена Овсийчук </a>.
                    </p>
                    <div class="datetime">00:18 15.12.2014</div>
                </article>
            </div>
             </div>  
        <?php
        include './template/footer.php';
        ?>   
        

    </body>
</html>
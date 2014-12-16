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
                    <h2>Мы вообще молодцы!</h2>
                    <p>Переноска для кошек являются просто спасением для тех владельцев животных, которые привыкли пребывать в разъездах. Допустим, раз или два можно попросить поухаживать за кошкой соседа, но не будете же вы навязываться каждый раз? В таком случае вам просто необходимо купить сумку-переноску для кошек в Харькове! И сделать это лучше всего в нашем специализированном интернет-магазине «Зверюга». У нас представлен широчайший ассортимент сумок для кошек и собак, в котором каждый найдет идеальную для своего любимца модель.
                    </p>
                    <video width="600" height="400" controls>
                        <source src="media/video/Video1.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                     <video width="600" height="400" controls>
                        <source src="media/video/Video2.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                     <video width="600" height="400" controls>
                        <source src="media/video/Video3.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                     <video width="600" height="400" controls>
                        <source src="media/video/Video4.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </article>
            </div>
        </div>  
        <?php
        include './template/footer.php';
        ?>   


    </body>
</html>
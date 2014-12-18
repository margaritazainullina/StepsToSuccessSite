<?php
require_once './Language.php';
//if language wasn't choosen - load browser language
if (!isset($_COOKIE['lang'])) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); //Detecting Default Browser language
    $language = New Language($lang);
    $langArray = array();
    $langArray = $language->userLanguage();
} else {
    $lang = $_COOKIE['lang'];
    $language = New Language($lang);
    $langArray = array();
    $langArray = $language->userLanguage();
}
//change language
if (isset($_POST['lang_rus'])) {
    $lang = 'rus';
    setcookie("lang", $lang, time() + 60 * 60 * 24 * 30);
    $language = New Language($lang);
    $langArray = array();
    $langArray = $language->userLanguage();
}
if (isset($_POST['lang_fr'])) {
    $lang = 'fr';
    setcookie("lang", $lang, time() + 60 * 60 * 24 * 30);
    $language = New Language($lang);
    $langArray = array();
    $langArray = $language->userLanguage();
}
?>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
        <nav>
            <div class="container">
                <ul class="menu">
                    <li class = "lime"><a href="./index.php"><?php print $langArray['MENU_NEWS'] ?></a></li>
                    <li class = "lime"><a href="./about.php"><?php print $langArray['MENU_ABOUT'] ?></a></li>
                    <li class = "lime"><a class="top-heading" href="./gallery.php"><?php print $langArray['MENU_GALLERY'] ?></a></li>
                    <li class = "lime"><a class="top-heading" href="./video.php"><?php print $langArray['MENU_VIDEO'] ?></a></li>
                    <li class = "lime"><a class="top-heading" href="./contacts.php"><?php print $langArray['MENU_CONTACTS'] ?></a></li>
                </ul>
            </div>

            <form method="POST"> 
                <input name="lang_rus" type="submit" value="" class='lang_rus'>
            </form>
            <form method="POST">
                <input name="lang_fr" type="submit" value="" class='lang_fr'> 
            </form>
    </nav>
</body>
</html>


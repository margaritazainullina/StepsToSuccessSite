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
        <meta charset="UTF-8">
        <title></title>
        <link href="style/ddmenu/ddmenu.css" rel="stylesheet" type="text/css" />
        <script src="style/ddmenu/ddmenu.js" type="text/javascript"></script>
    </head>
    <body>
        <nav id="ddmenu">    
            <div class="menu1"><ul>
                    <li class="top-heading">
                        <span class="top-heading"> <?php print $langArray['MENU_ABOUT'] ?></span>
                        <i class="caret"></i>           
                        <div class="dropdown">
                            <div class="dd-inner">
                                <div class="column">
                                    <a href="./about.php"><?php print $langArray['MENU_DESC'] ?></a>
                                    <a href="./guide.php"><?php print $langArray['MENU_GUIDE'] ?></a>
                                </div>  
                            </div>
                        </div>
                    </li>
                    <li class="no-sub"><a class="top-heading" href="./gallery.php"><?php print $langArray['MENU_GALLERY'] ?></a></li>    
                    <li class="no-sub"><a class="top-heading" href="./video.php"><?php print $langArray['MENU_VIDEO'] ?></a></li>  
                    <li class="no-sub"><a class="top-heading" href="./contacts.php"><?php print $langArray['MENU_CONTACTS'] ?></a></li>             
            </div>
            <form method="POST"> 
                <input name="lang_rus" type="submit" value="" class='lang_rus'>
            </form>
            <form method="POST">
                <input name="lang_fr" type="submit" value="" class='lang_fr'> 
            </form>
        </ul>
    </nav>
</body>
</html>
</body>
</html>


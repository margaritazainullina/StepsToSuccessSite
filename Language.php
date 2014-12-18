<?php

class Language {

    private $UserLng;
    private $langSelected;
    public $lang = array();

    public function __construct($userLanguage) {
        $this->UserLng = $userLanguage;
    }

    public function userLanguage() {

        switch ($this->UserLng) {
            /*
              ------------------
              Language: Russian
              ------------------
             */
            case "rus":
                $lang['MENU_ABOUT'] = 'Об игре';
                $lang['MENU_NEWS'] = 'Новости';
                $lang['MENU_GUIDE'] = 'Путеводитель';
                $lang['MENU_GALLERY'] = 'Галерея';
                $lang['MENU_VIDEO'] = 'Видео';
                $lang['MENU_CONTACTS'] = 'Контакты';
                $lang['LOGIN_USERNAME'] = 'Логин';
                $lang['LOGIN_PASSWORD'] = 'Пароль';
                $lang['LOGIN_REGISTER'] = 'Регистрация';
                $lang['LOGIN_EMAIL'] = 'E-mail';
                $lang['MENU_1'] = 'Страница ';
                $lang['MENU_2'] = ' из ';
                $lang['MENU_NEXT'] = 'Следущая страница';
                $lang['MENU_LAST'] = 'Последняя страница';
                $lang['MENU_PREV'] = 'Предыдущая страница';
                $lang['MENU_FIRST'] = 'Первая страница';
                $lang['HELLO'] = 'Вы зашли как  ';
                $lang['EXIT'] = 'Выйти';
                $lang['ADMIN_PAGE'] = 'Добавление контента';
                $lang['WRONG_PASSWORD'] = "Вы ввели неправильный логин/пароль";
                $lang['NO_USER'] = "Пользователя с таким логином не существует";
                $lang['SAME_LOGIN'] = "Уже есть пользователь с таким логином";
                $lang['REG_ERRORS'] = "При регистрации возникли ошибки:";
                $lang['ONLY_LETTERS'] = "Только буквы и цифры";
                $lang['LOGIN_LENGTH'] = "Длина логина должна быть между 3 и 30 символами";
                $lang['PASSW_LENGTH'] = "Длина пароля должна быть между 3 и 30 символами";
                $lang['HEADER_RUS'] = "Заголовок статьи (rus):";
                $lang['HEADER_FR'] = "Заголовок статьи (fr): ";
                $lang['TEXT_RUS'] = "Текст статьи (rus):";
                $lang['TEXT_FR'] = "Текст статьи (fr):";
                $lang['PUBLISH'] = "Опубликовать";
                $lang['SEL_IMG'] = "Выберите изображение:";
                $lang['DESC_RUS'] = "Описание (rus):";
                $lang['DESC_FR'] = "Описание (fr):";
                $lang['ADD'] = "Добавить";
                $lang['NEWS'] = "Новость";
                $lang['PHOTO'] = "Фото в галерею";

                return $lang;
                break;

            /*
              ------------------
              Language: French
              ------------------
             */

            case "fr":
                $lang['MENU_ABOUT'] = 'Informations sur le jeu';
                $lang['MENU_NEWS'] = 'Nouvelles';
                $lang['MENU_GUIDE'] = 'Guide';
                $lang['MENU_GALLERY'] = 'Galerie';
                $lang['MENU_VIDEO'] = 'Video';
                $lang['MENU_CONTACTS'] = 'Coordonnées';
                $lang['LOGIN_USERNAME'] = 'Indefiant';
                $lang['LOGIN_PASSWORD'] = 'Mot de passe';
                $lang['LOGIN_EMAIL'] = 'Courriel';
                $lang['LOGIN_REGISTER'] = 'Enregistrement';
                $lang['MENU_1'] = 'Page ';
                $lang['MENU_2'] = ' sur ';
                $lang['MENU_NEXT'] = 'Page suivante';
                $lang['MENU_LAST'] = 'Dernière page';
                $lang['MENU_PREV'] = 'Page précédente';
                $lang['MENU_FIRST'] = 'Première page';
                $lang['HELLO'] = 'Bonjour, ';
                $lang['EXIT'] = 'Sortir';
                $lang['ADMIN_PAGE'] = 'Gerer le content';
                $lang['WRONG_PASSWORD'] = 'Vous avez entré incorrect login / mot de passe';
                $lang['NO_USER'] = "Aucun utilisateur avec ce nom n\'existe pas";
                $lang['SAME_LOGIN'] = "Il y a déjà un utilisateur avec ce login";
                $lang['REG_ERRORS'] = "Des erreurs en temps d'enregistrement:";
                $lang['ONLY_LETTERS'] = "Seules les lettres et chiffres";
                $lang['LOGIN_LENGTH'] = "Le langue du login doit être entre 3 et 30 caractères";
                $lang['PASSW_LENGTH'] = "Le langue du mot de passe doit être entre 3 et 30 caractères";
                $lang['HEADER_RUS'] = "Titre de l'article (rus):";
                $lang['HEADER_FR'] = "Titre de l'article (fr): ";
                $lang['TEXT_RUS'] = "Texte de l'article (rus):";
                $lang['TEXT_FR'] = "Texte de l'article (fr):";
                $lang['PUBLISH'] = "Publier";
                $lang['SEL_IMG'] = "Sélectionnez une image";
                $lang['DESC_RUS'] = "Description (rus):";
                $lang['DESC_FR'] = "Description (fr):";
                $lang['ADD'] = "Ajouter";
                $lang['NEWS'] = "Une nouvelle";
                $lang['PHOTO'] = "Une photo à la galerie";


                return $lang;
                break;

            /*
              ------------------
              Default Language
              ------------------
             */
            default:

                $lang['MENU_ABOUT'] = 'Informations sur le jeu';
                $lang['MENU_NEWS'] = 'Nouvelles';
                $lang['MENU_GUIDE'] = 'Guide';
                $lang['MENU_GALLERY'] = 'Galerie';
                $lang['MENU_VIDEO'] = 'Video';
                $lang['MENU_CONTACTS'] = 'Coordonnées';
                $lang['LOGIN_USERNAME'] = 'Indefiant';
                $lang['LOGIN_PASSWORD'] = 'Mot de passe';
                $lang['LOGIN_EMAIL'] = 'Courriel';
                $lang['LOGIN_REGISTER'] = 'Enregistrement';
                $lang['MENU_1'] = 'Page ';
                $lang['MENU_2'] = ' sur ';
                $lang['MENU_NEXT'] = 'Page suivante';
                $lang['MENU_LAST'] = 'Dernière page';
                $lang['MENU_PREV'] = 'Page précédente';
                $lang['MENU_FIRST'] = 'Première page';
                $lang['HELLO'] = 'Bonjour, ';
                $lang['EXIT'] = 'Sortir';
                $lang['ADMIN_PAGE'] = 'Gerer le content';
                $lang ['WRONG_PASSWORD'] = 'Vous avez entré incorrect login / mot de passe';
                $lang['NO_USER'] = "Aucun utilisateur avec ce nom n\'existe pas";
                $lang['SAME_LOGIN'] = "Il y a déjà un utilisateur avec ce login";
                $lang['REG_ERRORS'] = "Des erreurs en temps d'enregistrement:";
                $lang['ONLY_LETTERS'] = "Seules les lettres et chiffres";
                $lang['LOGIN_LENGTH'] = "Le langue du login doit être entre 3 et 30 caractères";
                $lang['PASSW_LENGTH'] = "Le langue du mot de passe doit être entre 3 et 30 caractères";
                $lang['HEADER_RUS'] = "Titre de l'article (rus):";
                $lang['HEADER_FR'] = "Titre de l'article (fr): ";
                $lang['TEXT_RUS'] = "Texte de l'article (rus):";
                $lang['TEXT_FR'] = "Texte de l'article (fr):";
                $lang['PUBLISH'] = "Publier";
                $lang['SEL_IMG'] = "Sélectionnez une image";
                $lang['DESC_RUS'] = "Description (rus):";
                $lang['DESC_FR'] = "Description (fr):";
                $lang['ADD'] = "Ajouter";
                $lang['NEWS'] = "Une nouvelle";
                $lang['PHOTO'] = "Une photo à la galerie";

                return $lang;
                break;
        }
    }

}

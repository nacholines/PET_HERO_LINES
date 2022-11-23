<?php
    
    namespace Config;

    define("ROOT", dirname(__DIR__) . "/");
    define("FRONT_ROOT", "/pet_hero/");
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH",  FRONT_ROOT.VIEWS_PATH . "css/");
    define("PEOPLE_IMG_PATH", FRONT_ROOT.VIEWS_PATH . "people-img/");
    define("PET_IMG_PATH", FRONT_ROOT.VIEWS_PATH . "pet-img/");
    define("JS_PATH",  FRONT_ROOT.VIEWS_PATH . "js/");
    define("DB_HOST", "localhost");
    define("DB_NAME", "Pet_hero");
    define("DB_USER", "root");
    define("DB_PASS", "colores");
?>
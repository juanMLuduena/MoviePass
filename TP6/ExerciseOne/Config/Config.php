<?php namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT", "/git/laboratorio-4/TP6/ExerciseOne/");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "layout/styles/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
define("IMG_PATH", VIEWS_PATH . "img/");


//DATABASE

define('DB_HOST', "localhost");
define('DB_NAME', "cellphonesDB");
define('DB_USER', "root");
define('DB_PASS', "");

?>





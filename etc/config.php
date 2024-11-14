<?php
$_urlBase = "http://examen_medio_curso.test/";



define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_NAME', 'dbsistema');
define('DB_PASS', '123456789');


function get_UrlBase($arg1)
{
    return $GLOBALS['_urlBase'] . $arg1;
}
function get_views($arg1)
{
    return $GLOBALS['_urlBase'] . 'views/' . $arg1;
}

function get_models($arg1)
{
    return  $GLOBALS['_urlBase'] . 'models/' . $arg1;
}

function get_etc($arg1)
{
    return $GLOBALS['_urlBase'] . 'etc/' . $arg1;
}

function get_controller($arg1)
{
    return $GLOBALS['_urlBase'] . 'controllers/' . $arg1;
}
function get_js($arg1)
{
    return $GLOBALS['_urlBase'] . 'js/' . $arg1;
}
function get_css($arg1)
{
    return $GLOBALS['_urlBase'] . 'css/' . $arg1;
}

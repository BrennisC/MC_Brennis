<?php
$_urlBase = $_SERVER['DOCUMENT_ROOT'] . '/';



define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_NAME', 'dbsistemas');
define('DB_PASS', '123456789');


function get_UrlBase($arg1)
{
    return $GLOBALS['_urlBase'] . $arg1;
}


function get_UrlBase_view($arg1)
{
    return $GLOBALS['_urlBase'] . 'views/' . $arg1;
}

function get_UrlBase_model($arg1)
{
    return  $GLOBALS['_urlBase'] . 'models/' . $arg1;
}

function get_UrlBase_etc($arg1)
{
    return $GLOBALS['_urlBase'] . 'etc/' . $arg1;
}

function get_UrlBase_controller($arg1)
{
    return $GLOBALS['_urlBase'] . 'controllers/' . $arg1;
}

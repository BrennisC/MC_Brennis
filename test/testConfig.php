<?php

// include carga el recurso y si hay fallas no dice nada 
// require carga el recurso pero si hay fallas emite en mensaje

// include_once cargar sola una vez
// require 

require $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php ';


echo $_urlBase;
echo '<br>';
echo get_UrlBase('pagina.php');
echo '<br>';
echo 'la variables han sido almacenadas';
echo '<br>';

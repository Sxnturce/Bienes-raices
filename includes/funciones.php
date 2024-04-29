<?php

declare(strict_types=1);


define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . "/../imagenes/");
function includeTemplate(string $type, string $nombre)
{
    include TEMPLATES_URL . "/$type/$nombre.php";
}

function varDump($dato)
{
    echo "<pre>";
    var_dump($dato);
    echo "</pre>";
}

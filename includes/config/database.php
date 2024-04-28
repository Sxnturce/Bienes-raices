<?php
function connectDB(): mysqli
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "bienesraices_crud";
    $port = 3306;


    $db = new mysqli($hostname, $username, $password, $database, $port);

    if (!$db) {
        echo "Error: No se pudo conectar a MySQL.";
        exit;
    }
    return $db;
}

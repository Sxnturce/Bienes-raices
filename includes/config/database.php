<?php
function connectDB(): mysqli
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "bienesraices_crud";
    $port = 3306;


    $db = mysqli_connect($hostname, $username, $password, $database, $port);

    if (!$db) {
        echo "Error: No se pudo conectar a MySQL.";
        exit;
    }
    return $db;
}

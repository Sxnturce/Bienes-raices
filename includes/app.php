<?php

declare(strict_types=1);
require 'funciones.php';
require 'config/database.php';
require  __DIR__ . '/../vendor/autoload.php';

$db = connectDB();

use app\Propiedad;

Propiedad::setDB($db);




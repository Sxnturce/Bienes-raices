<?php

declare(strict_types=1);
require("app.php");

function includeTemplate(string $type, string $nombre)
{
    include TEMPLATES_URL . "/$type/$nombre.php";
}

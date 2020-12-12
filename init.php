<?php

require __DIR__ . "/autoload.php";
require __DIR__ . "/db.php";

//Schutz vor Scripts oder schädlichen Angriffen durch neue Kommentare
function e($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

$container = new App\Core\Container();

?>
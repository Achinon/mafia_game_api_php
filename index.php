<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use classes\Importer;
use classes\Request;
use classes\Returner;
use collections\Lobby;

include './classes/Importer.php';

Importer::importClasses();

try {


    $menu = new Lobby();

    var_dump($menu);









    Returner::respond(['cos' => 'tam']);
} catch (Exception $e) { echo $e; }


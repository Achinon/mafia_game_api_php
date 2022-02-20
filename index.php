<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use classes\Import;
use classes\Request;
use classes\Response;
use collections\Lobby;

$classesPath = './classes/';
include "${classesPath}Import.php";

Import::files($classesPath);

try {


    $menu = new Lobby();









//    Response::send(['cos' => 'tam']);
} catch (Exception $e) { echo $e; }


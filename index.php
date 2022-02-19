<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use classes\Importer;
use classes\Request;
use classes\Returner;

include './classes/Importer.php';
//phpinfo();
Importer::importClasses();

try {
    Returner::respond(['cos' => 'tam']);
} catch (Exception $e) { echo $e; }
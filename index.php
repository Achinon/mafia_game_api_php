<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use classes\Import;
use classes\tool\Tool;
use classes\tool\Tools;
use collections\Lobby;
use collections\Player;
use models\Factions;

include "./classes/Import.php";
include "./vendor/autoload.php";

Import::files('./classes/');
Import::files('./database/');
Import::files('./api/');

Tool::get(Tools::initEnv)->use();

$player = new Player();
$player->setName('emil');

//$lobby = Lobby::join($player, '42UCH')

$playerCount = 16;

$town = Factions::Town->getCount($playerCount);
$mafia = Factions::Mafia->getCount($playerCount);
$neutral = Factions::Neutral->getCount($playerCount);

Tool::get(Tools::parseDump)
    ->setType(\tools\Parses::php)
    ->setVariable([$town, $mafia, $neutral])
    ->use();
<?php

//var_dump(!(false | false));
echo '&& - and ' . PHP_EOL;
var_dump((0 && 0));
var_dump((0 && 1));
var_dump((1 && 0));
var_dump((1 && 1));

echo '& - and ' . PHP_EOL;
var_dump((0 & 0));
var_dump((0 & 1));
var_dump((1 & 0));
var_dump((1 & 1));

echo '|| - or' . PHP_EOL;
var_dump((0 || 0));
var_dump((0 || 1));
var_dump((1 || 0));
var_dump((1 || 1));

echo '| - or' . PHP_EOL;
var_dump((0 | 0));
var_dump((0 | 1));
var_dump((1 | 0));
var_dump((1 | 1));
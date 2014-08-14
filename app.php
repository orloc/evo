<?php

require_once __DIR__.'/vendor/autoload.php';

$config = include_once __DIR__.'/config/config.php';

$generator = new Evo\Generator\WorldGenerator($config);

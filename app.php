<?php

require_once __DIR__.'/vendor/autoload.php';

$config = include_once __DIR__.'/config/config.php';

$generator = new Evo\Generator\WorldGenerator($config);

$c = new Evo\Generator\CreatureGenerator($config['creature_attribute'], true);
$c->setPointLimit(30);

$renderer = new Evo\ConsoleColors();

for ($i = 0; $i < 1000; $i++){
    $entity = $c->generate()->getEntity();

    echo $renderer->getColoredString(sprintf("\n\nEntity %d:\n\n", $i));
    echo sprintf("Str: %s\nCon: %s\nSpd: %s",
        $entity->getStrength(),
        $entity->getConstitution(),
        $entity->getSpeed()
    );

    echo $renderer->getColoredString(sprintf("\n\nTotal Points: %s", $entity->getCurrentPoints()),$renderer->getBackgroundColors()['black'],$renderer->getForegroundColors()['red']);

}


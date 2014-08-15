<?php

if (!$loader = include __DIR__.'/vendor/autoload.php'){
    die('You must run composer');
}

use Evo\Provider;

$app = new \Cilex\Application('EvoGen');
$app['evo_config'] = include_once __DIR__.'/config/config.php';

if (!isset($app['evo_config'])){
    throw new \Exception('Configuration not present');
}

$app->register(new Provider\WorldGeneratorProvider());
$app->register(new Provider\CreatureGeneratorProvider());

$app->run(true);


//$creatureGenerator->setPointLimit($config['world']['point_limit']);

//$renderer = new Evo\ConsoleColors();

/*
for ($i = 0; $i < 1000; $i++){
    $entity = $creatureGenerator->generate()->getEntity();

    echo $renderer->getColoredString(sprintf("\n\nEntity %d:\n\n", $i));
    echo sprintf("Str: %s\nCon: %s\nSpd: %s",
        $entity->getStrength(),
        $entity->getConstitution(),
        $entity->getSpeed()
    );

    echo $renderer->getColoredString(sprintf("\n\nTotal Points: %s", $entity->getCurrentPoints()),$renderer->getBackgroundColors()['black'],$renderer->getForegroundColors()['red']);
}
 */


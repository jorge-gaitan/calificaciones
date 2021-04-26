<?php

require __DIR__ . '/vendor/autoload.php';

use Jorge\Modulos\Web;

use Jorge\Modulos\Twig;

$app = new Web();


$twig = new Twig('base.twig');
echo $twig->getRender();

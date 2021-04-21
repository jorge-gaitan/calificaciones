<?php

require __DIR__ . '/vendor/autoload.php';

use Jorge\Modelos\Universidad;
use Jorge\Modulos\Web;

use Jorge\Modulos\Database;

$app = new Web();


Universidad::updateNombreUniversidad(2, "Universidad Martin Lutero");
var_dump(Universidad::getListaUniversidades());

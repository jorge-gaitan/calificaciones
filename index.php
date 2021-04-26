<?php

require __DIR__ . '/vendor/autoload.php';

use Jorge\Modelos\Universidad;
use Jorge\Modelos\carrera;
use Jorge\Modelos\trimestre;
use Jorge\Modelos\asignatura;
use Jorge\Modelos\profesor;
use Jorge\Modulos\Web;

use Jorge\Modulos\Database;

$app = new Web();


// Universidad::updateNombreUniversidad(2, "universidad catolica");
// var_dump(Universidad::getListaUniversidades());


/*$sql = "INSERT INTO carrera(nombre,universidad) VALUES(?, ?)";

$stmt = Database::prepare_execute($sql, ['Jorge',' Martin Lutero']);

var_dump($stmt->errorInfo());
*/

carrera::updateNombreUniversidad(2, 'pedro', 'unicash');
var_dump(carrera::getcarreraById(2));




// trimestre::updateNombretrimestre(2, 'juan','catolica');
// var_dump(trimestre::getListatrimestre());

// asignatura::updateNombreasignatura(2, 'espaniol','sistemas');
// var_dump(asignatura::getListaasignatura());

/*$sql = "INSERT INTO asignatura(nombre,carrera) VALUES(?, ?)";

$stmt = Database::prepare_execute($sql, ['economia',' sistemas']);

var_dump($stmt->errorInfo());
*/

/*$sql = "INSERT INTO profesor(nombre,carrera) VALUES(?, ?)";

$stmt = Database::prepare_execute($sql, ['Jorge',' enfermeria']);

var_dump($stmt->errorInfo());
*/
// profesor::updateNombreprofesor(2, 'kike','enfermeria');
// var_dump(profesor::getListaprofesor());


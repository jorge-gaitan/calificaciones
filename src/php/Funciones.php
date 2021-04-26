<?php

namespace Jorge;

use Jorge\Functions;

/**
 * Instancia contenedora de métodos útiles para el correcto funcionamiento del
 * programa
 */
final class Funciones
{

    use Functions\startsWith,
        Functions\strFormat,
        Functions\same_week,
        Functions\same_day,
        Functions\parseDir,
        Functions\set_array_value,
        Functions\get_array_value,
        Functions\checkArray,
        Functions\array_orderby;
}

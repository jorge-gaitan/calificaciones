<?php

namespace Jorge\Functions;

trait parseDir {

    /**
     * Regresa un directorio con el separador asignado del sistema y elimina los "<b>/../</b>" de la cadena de texto
     * @param array $dir_array Lista con los directorios y el archivo que sera formateado
     * @return string cadena de texto formateada
     */
    public static function parseDir($dir_array) {
        $formated = implode(DIRECTORY_SEPARATOR, $dir_array);
        return (realpath($formated) ? realpath($formated) : $formated);
    }

}

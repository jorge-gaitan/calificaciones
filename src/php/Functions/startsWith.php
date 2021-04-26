<?php

namespace Jorge\Functions;

trait startsWith {

    /**
     * Regresa <b>TRUE</b> o <b>FALSE</b> Si una cadena de texto inicia con el
     * token asignado
     * @param string $haystack Cadena de texto que será analizada
     * @param string $needle Token que se comparara
     * @return boolean <b>TRUE</b> si el texto inicia con <b>$needle</b>
     * en otro caso regresara <b>FALSE</b>
     */
    public static function startsWith($haystack, $needle) {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

}

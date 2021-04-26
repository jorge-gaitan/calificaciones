<?php

namespace Bulk\Modules\Util\Functions;

trait mis_null {

    /**
     * Retorna TRUE si encuentra valores nulos, FALSE al encontrar un nulo
     * @see https://stackoverflow.com/questions/4993104
     * @return boolean
     */
    public static function mis_null() {
        foreach (func_get_args() as $arg) {
            if (is_null($arg)) {
                continue;
            } else {
                return false;
            }
        }
        return true;
    }

}

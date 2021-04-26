<?php

namespace Jorge\Functions;

trait checkArray {

    /**
     * Compara dos arreglos para comprobar si contienen los mismos elementos
     * @param array $ar1
     * @param array $ar2
     * @return boolean <b>TRUE</b> Si los arreglos contienen los mismos elementos o
     * <b>FALSE</b> en caso contrario
     */
    public static function checkArray($ar1, $ar2) {
        foreach ($ar1 as $v) {
            if (array_key_exists($v, $ar2)) {
                continue;
            } else {
                return FALSE;
            }
        }
        return TRUE;
    }

}

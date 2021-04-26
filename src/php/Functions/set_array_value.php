<?php

namespace Jorge\Functions;

trait set_array_value {

    /**
     * 
     * @param array $arr
     * @param string $path
     * @param mixed $val
     * @return array
     */
    public static function set_array_value(&$arr, $path, $val) {
        $loc = &$arr;
        foreach (explode('.', $path) as $step) {
            $loc = &$loc[$step];
        }
        return $loc = $val;
    }

}

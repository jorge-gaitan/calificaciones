<?php

namespace Jorge\Functions;

trait get_array_value {

    /**
     * 
     * @param array $context
     * @param string $name
     * @return array
     */
    public static function get_array_value(&$context, $name) {
        $pieces = explode('.', $name);
        foreach ($pieces as $piece) {
            if (!is_array($context) || !array_key_exists($piece, $context)) {
                // error occurred
                return null;
            }
            $context = &$context[$piece];
        }
        return $context;
    }

}

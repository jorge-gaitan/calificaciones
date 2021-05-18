<?php

namespace Jorge\Functions;

trait redirect {

    /**
     * 
     * @param string $url
     * @param int $statusCode
     */
    public static function redirect($url, $statusCode = 303) {
        if (headers_sent() === false) {
            header('Location: ' . $url, true, $statusCode);
        }
        die();
    }

}

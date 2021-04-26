<?php

namespace Bulk\Modules\Util\Functions;

trait is_base64_encoded {

    public static function is_base64_encoded($data) {
        if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

<?php

namespace Jorge\Functions;

trait same_week {

    /**
     * 
     * @param string $firstDate
     * @param string $secondDate
     * @return bool
     */
    public static function same_week(string $firstDate, string $secondDate): bool {
        $firstDatestro = strtotime($firstDate);
        $secondDatestro = strtotime($secondDate);

        return date('oW', $firstDatestro) === date('oW', $secondDatestro) && date('Y', $firstDatestro) === date('Y', $secondDatestro);
    }

}

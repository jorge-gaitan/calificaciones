<?php

namespace Jorge\Functions;

trait same_day {

    /**
     * 
     * @param string $firstDate
     * @param string $secondDate
     * @return bool
     */
    public function same_day(string $firstDate, string $secondDate): bool {
        $firstDatestro = strtotime($firstDate);
        $secondDatestro = strtotime($secondDate);

        return ($firstDatestro == $secondDatestro);
    }

}

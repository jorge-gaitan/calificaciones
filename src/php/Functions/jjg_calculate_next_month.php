<?php

namespace Bulk\Modules\Util\Functions;

/**
 * @see https://www.jeffgeerling.com/blogs/jeff-geerling/php-calculating-monthly
 */
trait jjg_calculate_next_month {

    /**
     * Function to calculate the same day one month in the future.
     *
     * This is necessary because some months don't have 29, 30, or 31 days. If the
     * next month doesn't have as many days as this month, the anniversary will be
     * moved up to the last day of the next month.
     *
     * @param $start_date (optional)
     *   UNIX timestamp of the date from which you'd like to start. If not given,
     *   will default to current time.
     *
     * @return $timestamp
     *   UNIX timestamp of the same day or last day of next month.
     */
    function jjg_calculate_next_month($start_date = FALSE) {
        if ($start_date) {
            $now = $start_date; // Use supplied start date.
        } else {
            $now = time(); // Use current time.
        }

        // Get the current month (as integer).
        $current_month = date('n', $now);

        // If the we're in Dec (12), set current month to Jan (1), add 1 to year.
        if ($current_month == 12) {
            $next_month = 1;
            $plus_one_month = mktime(0, 0, 0, 1, date('d', $now), date('Y', $now) + 1);
        }
        // Otherwise, add a month to the next month and calculate the date.
        else {
            $next_month = $current_month + 1;
            $plus_one_month = mktime(0, 0, 0, date('m', $now) + 1, date('d', $now), date('Y', $now));
        }

        $i = 1;
        // Go back a day at a time until we get the last day next month.
        while (date('n', $plus_one_month) != $next_month) {
            $plus_one_month = mktime(0, 0, 0, date('m', $now) + 1, date('d', $now) - $i, date('Y', $now));
            $i++;
        }

        return $plus_one_month;
    }

}

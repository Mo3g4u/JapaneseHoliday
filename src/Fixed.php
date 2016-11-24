<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/24
 * Time: 23:09
 */

namespace Mo3g4u\JapaneseHoliday;

/**
 * Class Fixed
 * @package Mo3g4u\JapaneseHoliday
 */
class Fixed extends Holiday
{
    /**
     * Fixed constructor.
     * @param $caption
     * @param $type
     * @param $start
     * @param int $end
     * @param $month
     * @param int $day
     * @param int $nth
     * @param string $dow
     * @param int $year
     */
    public function __construct($caption, $type, $start, $end, $month, $day, $nth, $dow, $year)
    {
        parent::__construct($caption, $type, $start, $end, $month, $day, $nth, $dow, $year);
    }

}
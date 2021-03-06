<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/24
 * Time: 23:16
 */

namespace Mo3g4u\JapaneseHoliday;


/**
 * Class Spring
 * @package Mo3g4u\JapaneseHoliday
 */
class Spring extends Holiday
{
    /**
     * Spring constructor.
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

    /**
     *
     */
    public function calc()
    {
        $day = floor(20.84341 + 0.242194 * ($this->year - 1980) - floor(($this->year - 1980) / 4));
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, $day);
        $this->dateTime = $date;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/24
 * Time: 23:14
 */

namespace Mo3g4u\JapaneseHoliday;


/**
 * Class Happy
 * @package Mo3g4u\JapaneseHoliday
 */
class Happy extends Holiday
{
    /**
     * Happy constructor.
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
     * @throws \Exception
     */
    public function calc()
    {
        $date = new \DateTime();
        $first_week = $date->setDate($this->year, $this->month, 1)->format('w');
        $day = ($this->nth - 1) * 7 + 1;
        $diff = $this->dow - $first_week;
        if($diff < 0) {
            $day += $diff + 7; // 1日の曜日より前の曜日の場合
        } else {
            $day += $diff; // 1日の曜日より後の曜日の場合
        }
        // 組み立てた日付が月の最終日（日数）よりも大きい場合
        if($date->format('t') < $day) {
            throw new \RuntimeException($this->caption . " Out of range");
        }
        $date->setDate($this->year, $this->month, $day);
        $this->dateTime = $date;
    }
}
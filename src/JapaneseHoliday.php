<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/05
 * Time: 22:20
 */

namespace Mo3g4u\JapaneseHoliday;

class JapaneseHoliday
{
    private $nationalHolidays;

    public function __construct()
    {
        $this->nationalHolidays = [
            '2026' => '2026-09-22',
            '2032' => '2032-09-21',
            '2037' => '2037-09-22',
            '2043' => '2043-09-22',
            '2049' => '2049-09-21',
            '2054' => '2054-09-22',
            '2060' => '2060-09-21',
            '2065' => '2065-09-22',
            '2071' => '2071-09-22',
            '2077' => '2077-09-21',
            '2088' => '2088-09-21',
            '2094' => '2094-09-21',
            '2099' => '2099-09-22',
        ];
    }

    /**
     * 対象年の祝日を配列で返す
     * @param $year
     * @return array
     */
    public function getHolidays($year)
    {
        $holidays = [];
        // 現時点では2016年以降だけを対象としている
        if(!$this->yearExist($year) || $year < 2016){
            return $holidays;
        }
        $holidays = [
            $year . '-01-01',  // 元旦
            $year . '-01-' . $this->getNthMondayInMonth($year, 1, 2), // 成人の日
            $year . '-02-11', // 建国記念日
            $year . '-03-' . $this->getVernalEquinox($year), // 春分の日
            $year . '-04-29', // 昭和の日
            $year . '-05-03', // 憲法記念日
            $year . '-05-04', // みどりの日
            $year . '-05-05', // こどもの日
            $year . '-07-' . $this->getNthMondayInMonth($year, 7, 3), // 海の日
            $year . '-08-11', // 山の日
            $year . '-09-' . $this->getNthMondayInMonth($year, 9, 3), // 敬老の日
            $year . '-09-' . $this->getAutumnalEquinox($year), // 秋分の日
            $year . '-10-' . $this->getNthMondayInMonth($year, 10, 2), // 体育の日
            $year . '-11-03', // 文化の日
            $year . '-11-23', // 勤労感謝の日
            $year . '-12-23' // 天皇誕生日
        ];
        if(isset($this->nationalHolidays[$year])){
            $holidays[] = $this->nationalHolidays[$year];
        }
        sort($holidays, SORT_NATURAL);
        return $this->setSustituteHoliday($holidays);
    }

    /**
     * 祝日判定
     * @param $year
     * @param $month
     * @param $day
     * @return bool
     */
    public function isHoliday($year, $month, $day)
    {
        if (!checkdate($month, $day, $year)) {
            return false;
        }

        return in_array(sprintf('%4d-%02d-%02d', $year, $month, $day),
            $this->getHolidays($year));
    }

    /**
     * 振替休日
     * @param $holidays
     * @return array
     */
    private function setSustituteHoliday($holidays){
        $calcHolidays = [];
        foreach ($holidays as $k => $holiday) {
            $date = explode('-', $holiday);
            if (empty($date[0]) or empty($date[1]) or empty($date[2])) {
                continue;
            }
            $timestamp = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
            $calcHolidays[] = $holiday;
            if (date('w', $timestamp) !== '0') { // 祝日が日曜日以外なら継続
                continue;
            }
            // 国民の祝日に関する法律が祝日が日曜日に当たるときは、その日後においてその日に最も近い国民の祝日でない日を休日とする
            $count = 1;
            while(1){
                $nextDay = date('Y-m-d', strtotime('+' . $count . ' day', $timestamp));
                if(!in_array($nextDay, $holidays)){
                    $calcHolidays[] = $nextDay;
                    break;
                }
                $count++;
            }
        }
        return $calcHolidays;
    }

    /**
     * 春分の日
     * @param $year
     * @return bool|float
     */
    private function getVernalEquinox($year)
    {
        if (!$year) {
            return false;
        }
        return floor(20.84341 + 0.242194 * ($year - 1980) - floor(($year - 1980) / 4));
    }

    /**
     * 秋分の日
     * @param $year
     * @return bool|float
     */
    private function getAutumnalEquinox($year)
    {
        if (!$year) {
            return false;
        }
        return floor(23.2488 + 0.242194 * ($year - 1980) - floor(($year - 1980) / 4));
    }

    /**
     * ハッピーマンデー
     * @param int $year
     * @param int $month
     * @param int $n
     * @return string
     */
    private function getNthMondayInMonth($year = 0, $month = 0, $n = 0)
    {
        if (!$this->monthExist($month) or 6 < $n or $n < 0) {
            return '00';
        }

        if ($n === 1) {
            $day = 1;
        } else if ($n === 2) {
            $day = 8;
        } else if ($n === 3) {
            $day = 15;
        } else if ($n === 4) {
            $day = 22;
        } else if ($n === 5) {
            $day = 29;
        }

        if (!checkdate($month, $day, $year)) {
            return '00';
        }

        while (date('w', mktime(0, 0, 0, $month, $day, $year)) !== '1') {
            $day++;
        }

        return sprintf('%02d', $day);
    }

    /**
     * 年チェック
     * @param $year
     * @return bool
     */
    private function yearExist($year){
        return checkdate(1,1,$year);
    }

    /**
     * 月チェック
     * @param int $month
     * @return bool
     */
    private function monthExist($month = 0)
    {
        return checkdate($month, 1, 2000);
    }
}
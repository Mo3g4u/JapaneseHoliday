<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/05
 * Time: 22:20
 */

namespace KazuyaTakeuchi\JapaneseHoliday;


class JapaneseHoliday
{

    public function getHolidays($year)
    {
        $holidays = [];
        if(!$this->yearExist($year)){
            return $holidays;
        }

        $holidays = [
            $year . '-01-01',  // 元旦
            $year . '-01-' . $this->getNthMondayInMonth($year, 1, 2), // 成人の日
            $year . '-02-11', // 建国記念日
            $year . '-03-' . $this->getSpringEquinox($year), // 春分の日
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
            $year . '-12-23', // 天皇誕生日
            // 9月の国民の休日
            '2009-09-22',
            '2015-09-22',
            '2026-09-22',
            '2032-09-21'
            // Todo まだある

        ];

        // Todo ここから再開


        return $holidays;
    }

    public function isHoliday($day){
        return true;
    }





    private function getSpringEquinox($year)
    {
        if (!$year) {
            return false;
        }
        return floor(20.84341 + 0.242194 * ($year - 1980) - floor(($year - 1980) / 4));
    }

    private function getAutumnalEquinox($year)
    {
        if (!$year) {
            return false;
        }
        return floor(23.2488 + 0.242194 * ($year - 1980) - floor(($year - 1980) / 4));
    }



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

    private function yearExist($year){
        return checkdate(1,1,$year);
    }


    private function monthExist($month = 0)
    {
        return checkdate($month, 1, 2000);
    }
}
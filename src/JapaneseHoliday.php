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
            $year . '-12-23' // 天皇誕生日
        ];
        $nationalHoliday = [
            '2026' => '2026-09-22',
            '2032' => '2032-09-21'
        ];
        if(isset($nationalHoliday[$year])){
            $holidays[] = $nationalHoliday[$year];
        }

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

    public function isHoliday($year, $month, $day)
    {
        if (!checkdate($month, $day, $year)) {
            return false;
        }

        return in_array(sprintf('%4d-%02d-%02d', $year, $month, $day),
            $this->getHolidays($year));
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
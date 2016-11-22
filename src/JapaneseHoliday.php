<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/05
 * Time: 22:20
 */

namespace Mo3g4u\JapaneseHoliday;

use Symfony\Component\Yaml\Yaml;

/**
 * Class JapaneseHoliday
 * @package Mo3g4u\JapaneseHoliday
 */
class JapaneseHoliday
{

    /**
     * @param $year
     * @param int $month
     * @return array
     */
    public function getHolidays($year, $month = 0)
    {
        $holidaysConf = Yaml::parse(file_get_contents(__DIR__.'/../config/holidays.yaml'));
        $holidays = [];
        // 設定から祝日を作成
        foreach($holidaysConf as $item){
            if($month > 0 && $month != $item['month']){
                continue;
            }
            $holiday = new Holiday(
                $item['caption'],
                $item['type'],
                $item['start'],
                $item['end'],
                $item['month'],
                $item['day'],
                $item['nth'],
                $item['dow'],
                $year
            );
            if($holiday->isScopeYear()){
                $holiday->setDateTimeByYear();
                $holidays[] = $holiday;
            }

        }

        if($year >= 1973){
            // 振替休日を追加する
            $substituteHoliday = new SubstituteHoliday();
            $holidays = $substituteHoliday->setSubstituteHoliday($holidays);
        }

        if($year >= 1988){
            // 国民の休日を追加する
            $nationalNoliday = new NationalHoliday();
            $holidays = $nationalNoliday->setNationalHoliday($holidays);
        }

        return $holidays;
    }

}
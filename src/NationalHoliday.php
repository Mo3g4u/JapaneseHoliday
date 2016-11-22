<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/21
 * Time: 17:08
 */

namespace Mo3g4u\JapaneseHoliday;


/**
 * Class NationalHoliday
 * @package Mo3g4u\JapaneseHoliday
 */
class NationalHoliday
{

    /**
     * @param $holidays
     * @return array
     */
    public function setNationalHoliday($holidays)
    {
        $setHolidays = [];
        for($i = 0; $i < count($holidays); $i++){
            $setHolidays[] = $holidays[$i];
            if(empty($holidays[$i + 1])){
                break;
            }
            $diff = $holidays[$i]->getDateTime()->diff($holidays[$i + 1]->getDateTime());
            if($diff->format('%R%a') === '+2'){
                $addHoliday = clone $holidays[$i];
                $addHoliday->setDateTime(clone $addHoliday->getDateTime());
                $addHolidayDateTime = $addHoliday->getDateTime();
                $addHolidayDateTime->modify('+1 days');
                $addHoliday->setDateTime($addHolidayDateTime);
                $addHoliday->setCaption('国民の休日');
                $setHolidays[] = $addHoliday;
            }
        }
        return $setHolidays;
    }
}
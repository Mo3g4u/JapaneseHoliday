<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/21
 * Time: 17:11
 */

namespace Mo3g4u\JapaneseHoliday;


/**
 * Class SubstituteHoliday
 * @package Mo3g4u\JapaneseHoliday
 */
class SubstituteHoliday
{

    /**
     * @param $holidays
     * @return array
     */
    public function setSubstituteHoliday($holidays)
    {
        $index = $this->createIndex($holidays);
        $setHolidays = [];
        foreach ($holidays as $holiday) {
            $setHolidays[] = $holiday;
            if($holiday->getDateTime()->format('w') !== '0'){
                continue;
            }
            // 以下日曜日の場合
            $targetHoliday = clone $holiday;
            $targetHoliday->setDateTime(clone $holiday->getDateTime());
            $targetDateTime = $targetHoliday->getDateTime();
            $count = 1;
            while(1){
                $targetDateTime->modify('+1 days');
                $targetHoliday->setDateTime($targetDateTime);
                if(empty($index[$targetDateTime->format('Y-m-d')])){
                    $targetHoliday->setCaption('振替休日');
                    $setHolidays[] = $targetHoliday;
                    break;
                }
                $count++;
            }
        }
        return $setHolidays;
    }

    /**
     * @param $holidays
     * @return array
     */
    private function createIndex($holidays)
    {
        $index = [];
        foreach ($holidays as $holiday) {
            $index[$holiday->getDateTime()->format('Y-m-d')] = 1;
        }
        return $index;
    }
}